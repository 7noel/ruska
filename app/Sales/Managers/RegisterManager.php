<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class RegisterManager extends Basemanager{
	public function getRules()
	{
		$rules =[
			'username'              =>'required|unique:users,username',
			'first_name'            =>'required',
			'last_name'             =>'required',
			'email'                 =>'required|email|unique:users,email',
			'password'              =>'required|confirmed',
			'password_confirmation' =>'required',
			'is_staff'              =>'in:1,0',
			'is_superuser'          =>'in:1,0'
		];

		return $rules;
	}
}