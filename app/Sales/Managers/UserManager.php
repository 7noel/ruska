<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class UserManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'username'              =>'required|unique:users,username,'.$this->entity->id,
			'first_name'            =>'required',
			'last_name'             =>'required',
			'email'                 =>'required|email|unique:users,email,'.$this->entity->id,
			'password'              =>'confirmed',
			'password_confirmation' =>'',
			'branch_id'             =>'required',
			'is_staff'              =>'in:1,0',
			'is_superuser'          =>'in:1,0'
		];
		return $rules;
	}
	public function prepareData($data)
	{
		$checks = array('is_staff','is_superuser');
		foreach ($checks as $key => $value) {
			if (!array_key_exists($value, $data)) {
				$data[$value]=false;
			}
		}
		return $data;
	}
}