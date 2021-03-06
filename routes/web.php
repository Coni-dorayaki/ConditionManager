<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user','middleware' => 'auth'], function() {
     Route::get('condition/create', 'User\ConditionController@add');
     Route::post('condition/create', 'User\ConditionController@create');
     Route::get('condition', 'User\ConditionController@index');
     Route::get('condition/edit', 'User\ConditionController@edit');
     Route::post('condition/edit', 'User\ConditionController@update');
     Route::get('condition/delete', 'User\ConditionController@delete');
});
