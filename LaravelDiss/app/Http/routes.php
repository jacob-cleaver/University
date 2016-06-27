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

Route::group(['middleware' => 'web'], function() {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/projects', 'ProjectController@index');
    Route::get('/myspace', 'MySpaceController@index');
    Route::get('/learnmore', 'LearnMoreController@index');
});

    Route::get('profile', 'UserController@profile');
    Route::post('profile', 'UserController@update_avatar');

    Route::get('settings', 'SettingsController@index');

// Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('admin', ['middleware' => 'admin', 'uses' => 'AdminController@index']);

// Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');


