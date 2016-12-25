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

// 认证路由...
Route::any('auth/login', 'Auth\AuthController@getLogin');
Route::any('auth/login', 'Auth\AuthController@postLogin');
Route::any('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['namespace' => 'Site'], function(){
	Route::any('getUser', ['as' => 'getUser', 'uses' => 'SiteController@getUser']);
	Route::any('createDiary', ['as' => 'creatediary', 'uses' => 'DiaryController@createDiary']);
	Route::any('diary/store', ['as' => 'storediary', 'uses' => 'DiaryController@store']);
	Route::any('createSay', ['as' => 'createsay', 'uses' => 'SayController@createSay']);
	Route::any('say/store', ['as' => 'storesay', 'uses' => 'SayController@store']);
	Route::any('uploadPic', ['as' => 'uploadpic', 'uses' => 'PicController@uploadPic']);
	Route::any('setting', ['as' => 'setting', 'uses' => 'SetController@index']);
	Route::any('newAlbum', ['as' => 'newAlbum', 'uses' => 'PicController@newAlbum']);
	Route::any('pic/storeAlbum', ['as' => 'storealbum', 'uses' => 'PicController@storeAlbum']);
});

Route::group(['namespace' => 'Site'], function(){
		Route::any('/', ['as' => 'index', 'uses' => 'SiteController@index']);
		Route::any('diary', ['as' => 'diary', 'uses' => 'DiaryController@index']);
		Route::any('read/{id}', ['as' => 'read', 'uses' => 'DiaryController@read']);
		Route::any('say', ['as' => 'say', 'uses' => 'SayController@index']);
		Route::any('picture', ['as' => 'picture', 'uses' => 'PicController@index']);
	});