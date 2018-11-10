<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App;
use URL;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::user();
        //$id = Auth::id();
        //$users = DB::select('select * from users where active = ?', [1]);
        $projects = DB::select('SELECT * FROM projects WHERE user_id = ?', [Auth::id()]);
        return view('home.home', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projects = DB::select('SELECT * FROM projects WHERE user_id = ?', [Auth::id()]);
        $this->validate($request,[
            'title'=>'required',
            'phone' => 'nullable|regex:/(49)[0-9]/',
            'pic_jpg' => 'image|nullable|max:1999',
            'bg_jpg' => 'image|nullable|max:1999'
        ]);

        function doImage($image,$request)
        {

            if (App::environment('local')) {
                $pfad = 'storage/cover_images/';
            } else {
                $pfad = 'invite/storage/app/public/cover_images/';
            }

            if($request->hasFile($image)){

                $filenameWithExt = $request->file($image)->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($image)->getClientOriginalExtension();
                $fileNameToStore = str_replace(' ','_',str_replace('_jpg','',$image).$filename.'_'.time().'.'.$extension);

                //resize wenn pic_jpg (whattsapp erlaubt keine Bilder > 300kb als Vorschau)
                if ($image == 'bg_jpg') {
                    $path = $request->file($image)->storeAs('public/cover_images',$fileNameToStore);
                } else {
                    $img = Image::make($_FILES[$image]['tmp_name'])
                    ->resize(850, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save($pfad.$fileNameToStore,80);
                }

            } else {

                if ($image == 'bg_jpg') {
                    $fileNameToStore = 'bg.jpg';
                } elseif ($image == 'pic_jpg') {
                    $fileNameToStore = 'pic.jpg';
                }
            }
            return $fileNameToStore;
        }

        DB::table('projects')->insert([
            'title' => $request->input('title'), 
            'welcome_text' => $request->input('welcome_text'),
            'welcome_text_plural' => $request->input('welcome_text_plural'),
            'phone' => $request->input('phone'),   
            'location_text' => $request->input('location_text'), 
            'bg_jpg' => doImage('bg_jpg',$request), 
            'pic_jpg' => doImage('pic_jpg',$request), 
            'user_id' => Auth::id()
        ]);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = DB::select(' SELECT
                                    dabei.id,
                                    dabei.name,
                                    dabei.dabei,
                                    names.names,
                                    names.hash,
                                    names.id as names_id,
                                    projects.title,
                                    projects.welcome_text,
                                    projects.welcome_text_plural,
                                    projects.phone,
                                    projects.location_text,
                                    projects.bg_jpg,
                                    projects.pic_jpg
                                FROM
                                    dabei
                                JOIN names ON dabei.names_id = names.id
                                JOIN projects ON names.project_id = projects.id
                                WHERE hash = ?', [$id]);
        return view('home.wellcome',['var' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $project = DB::select('SELECT * FROM projects WHERE id = ?', [$id])->first();
        $project = DB::table('projects')->where('id', $id)->first();
        if ($project->user_id == Auth::id()) {
            return view('home/edit', ['project' => $project]);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projects = DB::select('SELECT * FROM projects WHERE user_id = ?', [Auth::id()]);
        $this->validate($request,[
            'title'=>'required',
            'phone' => 'nullable|regex:/(49)[0-9]/',
            'pic_jpg' => 'image|nullable|max:1999',
            'bg_jpg' => 'image|nullable|max:1999'
        ]);

        function doImage($image,$request,$id)
        {

            if (App::environment('local')) {
                $pfad = 'storage/cover_images/';
            } else {
                $pfad = 'invite/storage/app/public/cover_images/';
            }
    
            if($request->hasFile($image)){
                $project = DB::select('SELECT bg_jpg,pic_jpg FROM projects WHERE id = ?', [$id])[0];

                if ($image == 'bg_jpg' && $project->bg_jpg != 'bg.jpg') {
                    unlink($pfad.$project->bg_jpg);
                }

                if ($image == 'pic_jpg' && $project->pic_jpg != 'pic.jpg') {
                    unlink($pfad.$project->pic_jpg);
                }

                $filenameWithExt = $request->file($image)->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($image)->getClientOriginalExtension();
                $fileNameToStore = str_replace(' ','_',str_replace('_jpg','',$image).$filename.'_'.time().'.'.$extension);
                $path = $request->file($image)->storeAs('public/cover_images',$fileNameToStore);
            } else {
                $projects = DB::select('SELECT * FROM projects WHERE id = ?', [$id])[0];

                if ($image == 'bg_jpg') {
                    $project = DB::select('SELECT bg_jpg FROM projects WHERE id = ?', [$id])[0];
                    $fileNameToStore = $project->bg_jpg;
                } elseif ($image == 'pic_jpg') {
                    $project = DB::select('SELECT pic_jpg FROM projects WHERE id = ?', [$id])[0];
                    $fileNameToStore = $project->pic_jpg;
                }
            }
            return $fileNameToStore;
        }

        DB::table('projects')
        ->where('id', $id)
        ->update([
            'title' => $request->input('title'), 
            'welcome_text' => $request->input('welcome_text'),
            'welcome_text_plural' => $request->input('welcome_text_plural'),
            'phone' => $request->input('phone'),   
            'location_text' => $request->input('location_text'), 
            'bg_jpg' => doImage('bg_jpg',$request,$id), 
            'pic_jpg' => doImage('pic_jpg',$request,$id), 
            'user_id' => Auth::id()
        ]);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (App::environment('local')) {
            $pfad = 'storage/cover_images/';
        } else {
            $pfad = 'invite/storage/app/public/cover_images/';
        }
        
        $project = DB::table('projects')->where('id', $id)->first();
        if ($project->user_id == Auth::id()) {
            if ($project->bg_jpg != 'bg.jpg') {
                unlink($pfad.$project->bg_jpg);
            }
            if ($project->pic_jpg != 'pic.jpg') {
                unlink($pfad.$project->pic_jpg);
            }
            DB::table('projects')->where('id', '=', $id)->delete();
            return redirect('/home');
        } else {
            return redirect('/home');
        }
    }
}
