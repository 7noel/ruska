<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class ModelManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'name'                  => 'required',
			'brand_id'              => 'required',
			'vehicle_type_id'       => 'required',
			'insurance_category_id' => 'required',
			'have_gps'				=> 'in:1,0'
		];
		return $rules;
	}
	public function prepareData($data)
	{
		$checks = array('have_gps');
		foreach ($checks as $key => $value) {
			if (!array_key_exists($value, $data)) {
				$data[$value]=false;
			}
		}
		return $data;
	}
}