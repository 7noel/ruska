<?php 

namespace Sales\Repositories;

use Sales\Entities\Exchange;

class ExchangeRepo extends BaseRepo{

	public function getModel(){
		return new Exchange;
	}
	public function search($word)
	{
		return Exchange::where('created_at','like',"%$word%")->get();
	}
	public function lastCreated()
	{
		return Exchange::order_by('created_at', 'desc')->first();
	}
}