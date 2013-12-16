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

// ennþá að venjast mac lyklaborðinu fuu lolz

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {

	Route::get('/', 'AdminController@index');
	Route::post('/', 'AdminController@createBlog');

	Route::get('edit/{id}', 'AdminController@edit');
	Route::post('edit/{id}', 'AdminController@postEdit');
	Route::get('delete/{id}', 'AdminController@delete');

});

Route::get('blog/{id}', 'BlogController@single');

Route::get('login', 'BlogController@login');
Route::get('logout', 'BlogController@logout');
Route::post('login', 'BlogController@auth');
Route::get('/', 'BlogController@index');