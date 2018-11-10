<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return '$id';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = DB::table('projects')->where('id', $id)->first();

        if ($project->user_id == Auth::id()) {
            $names = DB::table('names')
                ->where('project_id', $id)
                ->get();

            $whattsapp = urlencode($project->welcome_text);
            $i = DB::table('projects')->first();
            $eingeladen = DB::select('SELECT * FROM dabei JOIN names ON names.id = dabei.names_id WHERE names.project_id = ?', [$id]);
            $zusagen = DB::select('SELECT * FROM dabei JOIN names ON names.id = dabei.names_id WHERE names.project_id = ? AND dabei.dabei = 1', [$id]);
            $absagen = DB::select('SELECT * FROM dabei JOIN names ON names.id = dabei.names_id WHERE names.project_id = ? AND dabei.dabei = 0', [$id]);
            
            $var = [
                'names' => $names,
                'project_id' => $id,
                'whattsapp' => $whattsapp,
                'i' => $i,
                'eingeladen' => count($eingeladen),
                'zusagen' => $zusagen,
                'absagen' => $absagen
            ];    
            // return view('invite.ajax', ['names' => $names], ['id' => $id]);
            return view('invite.invite', ['var' => $var]);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
