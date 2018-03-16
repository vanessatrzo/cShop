<?php

 DB::listen(function($query){
 	//echo "<pre>{$query->sql}</pre>";
 });

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login'); 

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register'); 

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('barcode', 'PagesController@barcode');
Route::get('prueba', 'PagesController@prueba');
Route::get('webcam2', 'PagesController@webcam2');
//Route::get('shop', ['as' => 'shop', 'uses' => 'PagesController@shop']);

Route::resource('clientes', 'ClientsController');

Route::resource('usuarios', 'UsersController');
//Route::post('usuarios', ['as' => 'usuarios.storep', 'uses' => 'UsersController@storep']);

Route::resource('articulos', 'ProductsController');

Route::resource('categorias', 'CategoriesController');
Route::resource('webcam', 'WebcamController');
Route::resource('compras', 'SalesController');
Route::resource('pagos', 'PaymentsController');

//Route::get('clientes/{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::post('uploadimage', 'UserController@uploadImage');

// Route::get('webcam', ['as' => 'webcam.index', 'uses' => 'WebcamController@index']);
// Route::get('webcam/create', ['as' => 'webcam.create', 'uses' => 'WebcamController@create']);
// Route::post('webcam', ['as' => 'webcam.store', 'uses' => 'WebcamController@store']);
// Route::get('webcam/{id}', ['as' => 'webcam.show', 'uses' => 'WebcamController@show']);
// Route::get('webcam/{id}/edit', ['as' => 'webcam.edit', 'uses' => 'WebcamController@edit']);
// Route::put('webcam/{id}', ['as' => 'webcam.update', 'uses' => 'WebcamController@update']);
// Route::delete('webcam/{id}', ['as' => 'webcam.destroy', 'uses' => 'WebcamController@destroy']);