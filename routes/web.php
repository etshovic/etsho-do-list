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
Route::group(['middleware' => 'to_home'] , function () {
	
	Route::get('/', 'TaskController@index');
	Route::get('{id}/show', 'TaskController@show');
	Route::get('{id}/complete', 'TaskController@complete');
	Route::get('{id}/incomplete', 'TaskController@incomplete');
	Route::get('{id}/delete', 'TaskController@destroy');
	
});
Route::post('task', 'TaskController@store');

Route::group(['prefix' => 'auth' , 'middleware' => 'to_login'] , function (){
	
	Route::get('login', 'AuthController@login');
	Route::post('login', 'AuthController@checklogin');
	Route::get('register', 'AuthController@register');
	Route::post('register', 'AuthController@checkregister');

});
Route::get('auth/logout', 'AuthController@logout');
