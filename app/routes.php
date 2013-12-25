<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('asset/{path?}', function($path) {
	return Bloggy::output($path);
})->where('path', '.+');

Route::group(array('prefix' => 'api', 'before' => 'auth'), function() {
	Route::post('create', 'ApiController@create');
	Route::post('edit/{id}', 'ApiController@edit');
});

Route::group(array('before' => 'auth'), function() {
	Route::get('edit/{id}', 'BlogController@edit');
	Route::get('delete/{id}', 'BlogController@delete');
	Route::get('create', 'BlogController@create');
});

Route::get('blog/{id}', 'BlogController@single');
Route::get('blog', 'BlogController@index');

Route::get('install', function() {
	DatabaseInstall::install();
});

Route::get('login', 'BlogController@login');
Route::get('logout', 'BlogController@logout');
Route::post('login', 'BlogController@auth');
Route::get('/', 'BlogController@index');