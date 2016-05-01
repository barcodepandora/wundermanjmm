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

// Route for drafts
Route::get('draft','WelcomeController@draft');

// Route for viewing gallery
Route::post('gallery', ['as' => 'gallery', 'uses' => 'ImageController@go2images']);

// Route for CRUD gallery
Route::resource('/image', 'ImageController');

// Route for upload form
Route::post('nueva', ['as' => 'nueva', 'uses' => 'ImageController@nueva']);

// Route for save a person
Route::post('register', ['as' => 'register', 'uses' => 'ClientController@store']);

//Route::post('boo', ['as' => 'boo', 'uses' => 'WelcomeController@go2sandy']);
//Route::get('gallery', 'ImageController@go2images'); 
