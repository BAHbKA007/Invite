<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AjaxController extends Controller
{
    public function post(Request $request){

        function shorten($url){
            $login = "o_36mrc5r96s";
            $api_key = "R_7dbc4a737db64436bb01f82635b9907e";
            $ch = curl_init('http://api.bitly.com/v3/shorten?login='.$login.'&apiKey='.$api_key.'&longUrl='.$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $resuslt = curl_exec($ch);
            $res = json_decode($resuslt,true);
            return $res['data']['url'];
          }
          
        function clicks($url){
            $bitly_access_token = '4f4e7b6ae50bcb076a1678b7050051143bd36e72';
            $ch = curl_init('https://api-ssl.bitly.com/v3/link/clicks?access_token='.$bitly_access_token.'&link='.$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $resuslt = curl_exec($ch);
            $res = json_decode($resuslt,true);
            return $res['data']['link_clicks'];
        }

        function istNameVorhanden($name, $id){
            $e = DB::table('names')->where([
                ['names', '=', $name],
                ['project_id', '=', $id]
            ])->count();
            if ($e == 0) {
                return false;
            } else {
                return true;
            }
        }

        $response = array(
            'status' => 'success',
            'names' => $request->name,
            'art' => $request->art,
            'id' => $request->id
        );
        $a = response()->json($response);


        //post in Tabelle names

        if ( $response['art'] == 'post' && !istNameVorhanden($response['names'],$response['id']) ) {
            $name_raw = explode(",",$response['names']);
            $name_raw[0] = trim($name_raw[0]);

            // if (isset($name_raw[1])) {
            //     $name_raw[1] = trim($name_raw[1]);
            // } else {
            //     $name_raw[1] = NULL;
            // }

            $hash = hash('crc32', $response['names'].$response['id'], FALSE);
            $bitly = shorten('https://leichtbewaff.net/home/'.$hash);

            if (count($name_raw) == 1) {
                
                DB::table('names')->insert([
                    'names' => $response['names'],
                    'project_id' => $response['id'],
                    'bitly' => $bitly,
                    'hash' => $hash
                ]);

                $last_id_names = DB::select('SELECT * FROM names ORDER BY id DESC LIMIT 1')[0]->id;

                DB::table('dabei')->insert([
                    'name' => $name_raw[0],
                    'names_id' => $last_id_names
                ]);

            } elseif (count($name_raw) == 2) {

                DB::table('names')->insert([
                    'names' => $response['names'],
                    'project_id' => $response['id'],
                    'bitly' => $bitly,
                    'hash' => $hash
                ]);

                $last_id_names = DB::select('SELECT * FROM names ORDER BY id DESC LIMIT 1')[0]->id;

                DB::table('dabei')->insert([
                    'name' => $name_raw[0],
                    'names_id' => $last_id_names
                ]);

                DB::table('dabei')->insert([
                    'name' => $name_raw[1],
                    'names_id' => $last_id_names
                ]);
            }

            return view('test', ['a' => 1]);
        }

        //del in Tabelle names

        elseif ($response['art'] == 'del') {
            DB::table('names')
                ->where('id', '=', $response['id'])
                ->delete();
            return view('test', ['a' => 1]);
        }

        elseif ($response['art'] == 'dabei') {
            DB::table('dabei')
                ->where('id', $response['id'])
                ->update(['dabei' => $response['names']]);
        }
        
        if ($response['art'] == 'count') {
            $count = DB::select('SELECT * FROM names WHERE id = ?',[$response['id']])[0]->count;
            $count = $count + 1;
            DB::table('names')
                ->where('id', $response['id'])
                ->update(['count' => $count]);
        }

        return view('test', ['a' => 0]);
    }
}