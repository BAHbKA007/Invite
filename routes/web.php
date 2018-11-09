<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->middleware('auth');
Auth::routes();
Route::resource('/home', 'HomeController')->middleware('auth');
Route::get('home/{home}', 'HomeController@show');
Route::resource('/invite', 'InviteController')->middleware('auth');

//Ajax
Route::get('/invite', function(){ return view('invite.ajax'); });
Route::post('/postajax','AjaxController@post');