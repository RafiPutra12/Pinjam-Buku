<?php

use Illuminate\Http\Request;

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('/book/{limit}/{offset}', 'BookController@getAll');
Route::get('/tes', 'UserController@tes');

Route::middleware(['jwt.verify'])->group(function(){

	Route::post('/book/{limit}/{offset}', 'BookController@find');
	Route::post('/book/register', 'BookController@register');
	Route::post('/book/ubah', "BookController@ubah");
	Route::get('/book/{id}', 'BookController@show');
	Route::post('/book', 'BookController@store');
	Route::put('/book/{id}', 'BookController@update');
	Route::delete('/book/{id}', 'BookController@destroy');

	//user
	Route::get('user/auth', "UserController@getAuthenticatedUser");
	Route::get('user/{limit}/{offset}', "UserController@getAll");
	Route::post('user/{limit}/{offset}', "UserController@find");
	Route::delete('user/delete/{id}', "UserController@delete");
	Route::post('user/ubah', "UserController@ubah");
	Route::get('user/data', "UserController@index");

	//cek login
	Route::get('user/check' , "UserController@getAuthenticatedUser");

	//Peminjam
	Route::post('pinjam/{id}', "PinjamController@index");
	Route::post('kembali/{id}', "PinjamController@kembali");
	Route::get('pinjam/{limit}/{offset}', "PinjamController@getAll");


});
