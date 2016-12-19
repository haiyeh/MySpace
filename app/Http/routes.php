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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['namespace' => 'Site'], function(){
	// Route::get('/', function(){
	// 	return view('site/index');
	// });
	Route::get('/', ['as' => 'index', 'uses' => 'SiteController@index']);
	Route::get('diary', ['as' => 'diary', 'uses' => 'DiaryController@index']);
	Route::get('say', ['as' => 'say', 'uses' => 'SayController@index']);
	Route::get('picture', ['as' => 'picture', 'uses' => 'PicController@index']);
	Route::get('setting', ['as' => 'setting', 'uses' => 'SetController@index']);
});