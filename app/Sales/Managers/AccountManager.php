<?php 
namespace Sales\Managers;
use Sales\Managers\Basemanager;

class AccountManager extends Basemanager{
	public function getRules()
	{
		if (\Request::is('resetpassword/*')) {
			$rules =[
				'password'              =>'confirmed',
				'password_confirmation' =>'',
			];
		} else {
			$rules =[
				'password'=>'confirmed|min:8|max:15',
				'password_confirmation'=>'',
			];
		}
		return $rules;
	}
}