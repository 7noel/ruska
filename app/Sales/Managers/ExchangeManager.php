<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class ExchangeManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'sales'      =>'required',
			'purchase'      =>'required',
		];

		return $rules;
	}
}