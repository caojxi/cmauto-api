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

Route::post('login', 'Auth\AuthController@authenticate');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('me', 'Auth\AuthController@me');

    Route::group(['prefix' => 'api'], function () {
        Route::resource('users', 'UserController');

        Route::resource('clients', 'ClientController');
    });
});

Route::get('/', function () {
    return view('welcome');
});
