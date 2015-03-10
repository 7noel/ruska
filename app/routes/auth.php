<?php 
//LOGIN
Route::get('login', ['as'=>'signin', 'uses'=>'AuthController@signin']);
Route::post('login', ['as'=>'login', 'uses'=>'AuthController@login']);
Route::get('logout', ['as'=>'logout', 'uses'=>'AuthController@logout']);
