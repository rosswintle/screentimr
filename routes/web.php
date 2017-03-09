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

Route::get('/', 'TimerController@index');

Auth::routes();

Route::get('/home', 'TimerController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('settings', 'UserSettingController@edit');
    Route::post('settings', 'UserSettingController@update');

});