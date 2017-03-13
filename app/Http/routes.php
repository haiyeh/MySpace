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
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::group(['namespace' => 'Site'], function(){

    Route::any('/', ['as' => 'index', 'uses' => 'SiteController@index']);
	Route::any('getUser', ['as' => 'getUser', 'uses' => 'SiteController@getUser']);
	Route::any('createDiary', ['as' => 'creatediary', 'uses' => 'DiaryController@createDiary']);
	Route::any('diary/store', ['as' => 'storediary', 'uses' => 'DiaryController@store']);
	Route::any('createSay', ['as' => 'createsay', 'uses' => 'SayController@createSay']);
	Route::any('say/store', ['as' => 'storesay', 'uses' => 'SayController@store']);
	Route::any('uploadPic', ['as' => 'uploadpic', 'uses' => 'PicController@uploadPic']);
	Route::any('setting', ['as' => 'setting', 'uses' => 'SetController@index']);
	Route::any('newAlbum', ['as' => 'newAlbum', 'uses' => 'PicController@newAlbum']);
	Route::any('pic/storeAlbum', ['as' => 'storealbum', 'uses' => 'PicController@storeAlbum']);
    Route::any('pic/uploadify', ['as' => 'upload', 'uses' => 'PicController@uploadify']);
    Route::get('pic/readAlbum/{album_id}', ['as' => 'readAlbum', 'uses' => 'PicController@readAlbum']);

    Route::any('diary', ['as' => 'diary', 'uses' => 'DiaryController@index']);
    Route::any('read/{id}', ['as' => 'read', 'uses' => 'DiaryController@read']);
    Route::any('say', ['as' => 'say', 'uses' => 'SayController@index']);
    Route::any('picture', ['as' => 'picture', 'uses' => 'PicController@index']);
    Route::any('praise', ['as' => 'praise', 'uses' => 'SiteController@praise']);
    Route::any('comment', ['as' => 'comment', 'uses' => 'SiteController@comment']);
    Route::get('register', 'UserController@applyAccount');
    Route::any('saveUser', 'UserController@saveUser');
    Route::any('userMsg', 'UserController@userMsg');
    Route::any('userInfo', 'UserController@userInfo');
    Route::get('message', ['as' => 'message', 'uses' => 'MessageController@index']);
    Route::any('storeMessage', ['as' => 'storeMessage', 'uses' => 'MessageController@storeMessage']);
    Route::group(['middleware' => 'auth'], function(){
    });
    Route::get('register', 'UserController@applyAccount');
    Route::any('registerInfo', 'UserController@register');
    Route::get('password', 'PwdController@password');
    Route::any('pwdReset', 'PwdController@pwdReset');
    Route::get('head', 'UserController@head');
    Route::any('head_reset', 'UserController@head_reset');
});

Route::group(['namespace' => 'Admin'], function (){
    Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@index']);
    Route::get('admin/diary', ['as' => 'diary' , 'uses' => 'DiaryController@index']);
    Route::get('admin/comment', ['as' => 'comment' , 'uses' => 'CommentController@index']);
    Route::get('admin/say', ['as' => 'say' , 'uses' => 'SayController@index']);
    Route::get('admin/image', ['as' => 'image' , 'uses' => 'PicController@index']);
    Route::get('admin/album', ['as' => 'album' , 'uses' => 'PicController@album']);
    ROute::get('admin/message', ['as' => 'message', 'uses' => 'MessageController@index']);
    Route::get('admin/getAlbumMsg', ['as' => 'getAlbumMsg' , 'uses' => 'PicController@getAlbumMsg']);
    Route::get('admin/getAlbumDelete', ['as' => 'getAlbumDelete' , 'uses' => 'PicController@getAlbumDelete']);
    Route::get('admin/getAlbumEdit', ['as' => 'getAlbumEdit' , 'uses' => 'PicController@getAlbumEdit']);
    Route::any('admin/editAlbumStore', ['as' => 'editAlbumStore' , 'uses' => 'PicController@editAlbumStore']);
    Route::get('admin/getDiaryMsg/{id}', ['as' => 'getDiaryMsg' , 'uses' => 'DiaryController@getDiaryMsg']);
    Route::get('admin/getDiaryEdit/{id}', ['as' => 'getDiaryEdit' , 'uses' => 'DiaryController@getDiaryEdit']);
    Route::get('admin/getDiaryDelete', ['as' => 'getDiaryDelete' , 'uses' => 'DiaryController@getDiaryDelete']);
    Route::get('admin/sayDelete', 'SayController@sayDelete');
    Route::get('admin/getSayEdit/{id}', 'SayController@getSayEdit');
    Route::get('admin/commentDel', 'CommentController@commentDel');
    Route::get('admin/messageDel', 'MessageController@messageDel');
    Route::get('admin/imageDel', 'PicController@imageDel');
    Route::get('admin/source', 'SourceController@index');
    Route::get('admin/sourceDelete', 'SourceController@sourceDelete');
    Route::any('admin/storeSource', 'SourceController@storeSource');
    Route::get('admin/addSource', function (){
        return view('admin.addSource');
    });
    Route::get('admin/getSourceEdit/{id}', 'SourceController@getSourceEdit');
    Route::get('admin/city', 'CityController@index');
    Route::any('admin/storeCity', 'CityController@storeCity');
    Route::get('admin/cityDel', 'CityController@cityDel');
    Route::get('admin/user', 'UserController@index');
    Route::get('admin/login', 'AuthController@index');
    Route::post('admin/getLogin', 'AuthController@login');
    Route::get('admin/logout', 'AuthController@logout');
    Route::get('admin/system', 'SystemController@index');
    Route::any('admin/systemSave', 'SystemController@save');
    Route::get('admin/password', 'AdminController@password');
    Route::any('admin/pwdReset', 'AdminController@pwdReset');
    Route::get('admin/head', 'UserController@headImg');
    Route::any('admin/headDel', 'UserController@headDel');
    Route::get('admin/addHead', 'UserController@addHead');
    Route::any('admin/upload', 'UserController@head_upload');
});