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


Route::group(['prefix' => 'admin','namespace'=>'Admin'], function() {

	Route::get('login','LoginController@loginForm');
	Route::post('login','LoginController@login');
	Route::resource('post', 'PostController');
	Route::get('customer','CustomerController@index');
	
});

Route::group(['namespace'=>'Web'], function() {

	Route::get('/',function(){
		return view('welcome');
	});

	Route::resource('post', 'PostController', ['names' => [
	    'create' => 'post.build'
	]]);

	Route::get('/post/{post}', function (App\Post $post) {
	    return $post;
	});

    Route::get('post', 'PostController@index');
});


