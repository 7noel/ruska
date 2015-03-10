<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class RateManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'name'                  => 'required',
			'brand_id'              => 'required',
			'vehicle_type_id'       => 'required',
			'insurance_category_id' => 'required'
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