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

Route::get('/lorem', 'PageController@lorem')->name('page.lorem');
Route::post('/lorem', 'PageController@LoremGen')->name('page.loremgen');

Route::get('/usergenerator', 'PageController@user')->name('page.user');
Route::post('/usergenerator', 'PageController@UserGen')->name('page.usergen');
