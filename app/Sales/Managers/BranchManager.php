<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class BranchManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'name'          =>'required|unique:entities,name',
			'address'       =>'',
			'ubigeo_id'     =>'required',
			'administrator' =>'required',
			'entity_id'     =>'required',
			'is_active'     =>'in:1,0'
		];

		return $rules;
	}
}