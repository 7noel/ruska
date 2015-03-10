<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class QuoteManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'customer'      =>'required',
			'dni'			=>'required|digits_between:8,12',
			'birth'			=>'required',
			'address'		=>'required',
			'ubigeo_id'		=>'required',
			'email'			=>'email',
			'phone'			=>'',
			'currency'		=>'',
			'value'			=>'required|numeric',
			'rate'			=>'required|numeric',
			'primaneta'		=>'required|numeric',
			'factor'		=>'',
			'primatotal'	=>'required|numeric',
			'factor'		=>'required|numeric',
			'serie'			=>'',
			'motor'			=>'',
			'placa'			=>'',
			'model_id'		=>'required',
			'year'			=>'required|digits:4',
			'insurance_category_id'	=>'required',
			'user_id'		=>'required',
			'is_confirmed' =>'in:1,0'
		];

		return $rules;
	}
	public function prepareData($data)
	{
		$checks = array('is_confirmed');
		foreach ($checks as $key => $value) {
			if (!array_key_exists($value, $data)) {
				$data[$value]=false;
			}
		}
		return $data;
	}
}