<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class VehicleTypeManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'name'      =>'required|unique:entities,name',
		];

		return $rules;
	}
}