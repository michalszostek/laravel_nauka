<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/search', 'SearchController@users');

Route::resource('/users', 'UsersController', ['except' => ['create', 'store', 'index']]);

Route::get('/user_avatar/{id}/{size}', 'ImagesController@user_avatar');

Route::get('/default_avatar/{sex}/{size}', 'ImagesController@default_avatar');