<?php 
		//ENTIDADES
		Route::get('entidades', ['as' => 'entities','uses' => 'EntitiesController@listFind']);
		Route::get('entidades/nuevo', ['as' => 'entities_new','uses' => 'EntitiesController@register']);
		Route::post('entidades/nuevo', ['as' => 'entities_register','uses' => 'EntitiesController@register']);
		Route::get('entidades/actualizar/{id}', ['as' => 'entities_read','uses' => 'EntitiesController@update']);
		Route::post('entidades/actualizar', ['as' => 'entities_update','uses' => 'EntitiesController@update']);
		Route::get('entidades/delete/{id}', ['as' => 'entities_delete','uses' => 'EntitiesController@destroy']);

		//AGENCIAS
		Route::get('agencias', ['as' => 'branches','uses' => 'BranchController@listFind']);
		Route::get('agencias/nuevo', ['as' => 'branches_new','uses' => 'BranchController@register']);
		Route::post('agencias/nuevo', ['as' => 'branches_register','uses' => 'BranchController@register']);
		Route::get('agencias/actualizar/{id}', ['as' => 'branches_read','uses' => 'BranchController@update']);
		Route::post('agencias/actualizar', ['as' => 'branches_update','uses' => 'BranchController@update']);
		Route::get('agencias/delete/{id}', ['as' => 'branches_delete','uses' => 'BranchController@destroy']);

		//USUARIOS
		Route::get('usuarios', ['as'=>'users', 'uses'=>'UserController@listFind']);
		Route::get('usuarios/nuevo', ['as'=>'users_new', 'uses'=>'UserController@register']);
		Route::post('usuarios/nuevo', ['as'=>'users_register', 'uses'=>'UserController@register']);
		Route::get('usuarios/actualizar/{id}', ['as'=>'users_read', 'uses'=>'UserController@update']);
		Route::post('usuarios/actualizar', ['as'=>'users_update', 'uses'=>'UserController@update']);
		Route::get('usuarios/delete/{id}', ['as' => 'users_delete','uses' => 'UserController@destroy']);
		Route::get('resetpassword/{id}', ['as' => 'reset_password', 'uses' => 'UserController@resetPassword']);

		//TIPOS DE VEHICULOS
		Route::get('tiposvehiculo', ['as' => 'vehicle_types','uses' => 'VehicleTypeController@listFind']);
		Route::get('tiposvehiculo/nuevo', ['as' => 'vehicle_types_new','uses' => 'VehicleTypeController@register']);
		Route::post('tiposvehiculo/nuevo', ['as' => 'vehicle_types_register','uses' => 'VehicleTypeController@register']);
		Route::get('tiposvehiculo/actualizar/{id}', ['as' => 'vehicle_types_read','uses' => 'VehicleTypeController@update']);
		Route::post('tiposvehiculo/actualizar', ['as' => 'vehicle_types_update','uses' => 'VehicleTypeController@update']);
		Route::get('tiposvehiculo/delete/{id}', ['as' => 'vehicle_types_delete','uses' => 'VehicleTypeController@destroy']);

		//MARCAS
		Route::get('marcas', ['as' => 'brands','uses' => 'BrandController@listFind']);
		Route::get('marcas/nuevo', ['as' => 'brands_new','uses' => 'BrandController@register']);
		Route::post('marcas/nuevo', ['as' => 'brands_register','uses' => 'BrandController@register']);
		Route::get('marcas/actualizar/{id}', ['as' => 'brands_read','uses' => 'BrandController@update']);
		Route::post('marcas/actualizar', ['as' => 'brands_update','uses' => 'BrandController@update']);
		Route::get('marcas/delete/{id}', ['as' => 'brands_delete','uses' => 'BrandController@destroy']);

		//TIPOS DE USO
		Route::get('usos', ['as' => 'use_types','uses' => 'UseTypeController@listFind']);
		Route::get('usos/nuevo', ['as' => 'use_types_new','uses' => 'UseTypeController@register']);
		Route::post('usos/nuevo', ['as' => 'use_types_register','uses' => 'UseTypeController@register']);
		Route::get('usos/actualizar/{id}', ['as' => 'use_types_read','uses' => 'UseTypeController@update']);
		Route::post('usos/actualizar', ['as' => 'use_types_update','uses' => 'UseTypeController@update']);
		Route::get('usos/delete/{id}', ['as' => 'use_types_delete','uses' => 'UseTypeController@destroy']);

		//CATEGORIA DE SEGURO
		Route::get('categoriaseguro', ['as' => 'insurance_categories','uses' => 'InsuranceCategoryController@listFind']);
		Route::get('categoriaseguro/nuevo', ['as' => 'insurance_categories_new','uses' => 'InsuranceCategoryController@register']);
		Route::post('categoriaseguro/nuevo', ['as' => 'insurance_categories_register','uses' => 'InsuranceCategoryController@register']);
		Route::get('categoriaseguro/actualizar/{id}', ['as' => 'insurance_categories_read','uses' => 'InsuranceCategoryController@update']);
		Route::post('categoriaseguro/actualizar', ['as' => 'insurance_categories_update','uses' => 'InsuranceCategoryController@update']);
		Route::get('categoriaseguro/delete/{id}', ['as' => 'insurance_categories_delete','uses' => 'InsuranceCategoryController@destroy']);

		//MODELOS DE VEHICULO
		Route::get('modelos', ['as' => 'models','uses' => 'ModelController@listFind']);
		Route::get('modelos/nuevo', ['as' => 'models_new','uses' => 'ModelController@register']);
		Route::post('modelos/nuevo', ['as' => 'models_register','uses' => 'ModelController@register']);
		Route::get('modelos/actualizar/{id}', ['as' => 'models_read','uses' => 'ModelController@update']);
		Route::post('modelos/actualizar', ['as' => 'models_update','uses' => 'ModelController@update']);
		Route::get('modelos/delete/{id}', ['as' => 'models_delete','uses' => 'ModelController@destroy']);

		//TASAS
		Route::get('tasas', ['as' => 'rates','uses' => 'RateController@listFind']);
		Route::get('tasas/nuevo', ['as' => 'rates_new','uses' => 'RateController@register']);
		Route::post('tasas/nuevo', ['as' => 'rates_register','uses' => 'RateController@register']);
		Route::get('tasas/actualizar/{id}', ['as' => 'rates_read','uses' => 'RateController@update']);
		Route::post('tasas/actualizar', ['as' => 'rates_update','uses' => 'RateController@update']);
		Route::get('tasas/delete/{id}', ['as' => 'rates_delete','uses' => 'RateController@destroy']);

		//Tipo de Cambio
		Route::resource('exchange', 'ExchangeController');
		