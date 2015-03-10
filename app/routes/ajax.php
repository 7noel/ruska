<?php 
//Obtener provincas y distritos x ajax
Route::get('/listarProvincias/{departamento}', ['as' => 'ajaxprovincias','uses' => 'UbigeoController@ajaxProvincias']);
Route::get('listarDistritos/{departamento}/{provincia}', ['as' => 'ajaxdistritos','uses' => 'UbigeoController@ajaxDistritos']);
//Obtener lista de categorias de seguros x ajax
Route::get('listarCategoriasSeguro/{use_type_id}', ['as' => 'ajaxcategoriaseguro','uses' => 'InsuranceCategoryController@ajaxListar']);
//Listar Modelos
Route::get('listarModelos/{brand_id}', ['as' => 'ajaxmodelos','uses' => 'ModelController@ajaxListar']);
//no imprime json, solo un echo
Route::get('seleccionarSeguro/{model}/{uso}', ['as' => 'getseguro','uses' => 'ModelController@getSeguro']);
Route::get('getRate/{seguro}/{year}', ['as' => 'getrate','uses' => 'RateController@getRate']);
Route::get('getPmin/{seguro}/{year}', ['as' => 'getpmin','uses' => 'RateController@getPmin']);