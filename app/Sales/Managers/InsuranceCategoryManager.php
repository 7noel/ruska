<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class InsuranceCategoryManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'name'			=> 'required',
			'alias'			=> 'required',
			'use_type_id'	=> 'required',
		];
		return $rules;
	}
}