<?php 

		//pagina de inicio
		Route::get('/', ['as' => 'home','uses' => 'QuoteController@listFind']);

		//cotizaciones
		Route::get('cotizacion', ['as' => 'quotes','uses' => 'QuoteController@listFind']);
		Route::get('cotizacion/nuevo', ['as' => 'quotes_new','uses' => 'QuoteController@register']);
		Route::post('cotizacion/nuevo', ['as' => 'quotes_register','uses' => 'QuoteController@register']);
		Route::get('cotizacion/actualizar/{id}', ['as' => 'quotes_read','uses' => 'QuoteController@update']);
		Route::post('cotizacion/actualizar', ['as' => 'quotes_update','uses' => 'QuoteController@update']);
		Route::get('cotizacion/delete/{id}', ['as' => 'quotes_delete','uses' => 'QuoteController@destroy']);
		Route::get('cotizacion/confirmar/{id}', ['as' => 'quotes_delete','uses' => 'QuoteController@destroy']);

		//COTIZACION POR ID
		Route::get('cotizacion/{id}', ['as' => 'quote','uses' => 'QuoteController@listquote']);

		//Validar cotizacion
		Route::post('validarCotizacion/{id}', ['as' => 'validacotizacion','uses' => 'QuoteController@confirmQuote']);

		//cotizacion en pdf
		Route::get('cotizacion/pdf/{id}', ['as' => 'quotepdf','uses' => 'QuoteController@pdf']);
