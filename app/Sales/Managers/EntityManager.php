<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class EntityManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'name'      =>'required|unique:entities,name',
			'is_active' =>'in:1,0',
		];

		return $rules;
	}
}