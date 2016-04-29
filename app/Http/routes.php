<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('sandy', 'WelcomeController@conface');
Route::post('sandy', ['as' => 'sandy', 'uses' => 'WelcomeController@conface']);

Route::any('welcomefacebook', ['as' => 'welcomefacebook', 'uses' => 'WelcomeController@welcomefacebook']);

/*Route::get('/', function() { 
	return redirect('/image'); 
});*/
Route::post('gallery', ['as' => 'gallery', 'uses' => 'ImageController@go2images']);
Route::resource('/image', 'ImageController');


Route::post('boo', ['as' => 'boo', 'uses' => 'WelcomeController@go2sandy']);

//Route::get('gallery', 'ImageController@go2images'); 
