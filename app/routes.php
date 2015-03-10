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

Route::get('hola', function()
{
	return View::make('hello');
});

require(__DIR__.'/routes/auth.php');
require(__DIR__.'/routes/ajax.php');
Route::get('pdf', ['as'=>'pdf', 'uses'=>'HomeController@pdf']);

//Verifica si está logueado
Route::group(['before'=>'auth'], function (){
	//cambiar contraseña de tu cuenta
	Route::get('account', ['as'=>'account', 'uses'=>'UserController@account']);
	Route::post('account', ['as'=>'update_account', 'uses'=>'UserController@account']);
	//exige cambiar contraseña por defecto (123)
	Route::group(['before'=>'password_changed'], function(){
		require(__DIR__.'/routes/customer.php');
	});

	//solo para administrador
	Route::group(['before'=>'is_superuser'], function(){
		require(__DIR__.'/routes/admin.php');
	});
});
