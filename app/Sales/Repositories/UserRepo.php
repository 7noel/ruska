<?php 

namespace Sales\Repositories;

use Sales\Entities\User;

class UserRepo extends BaseRepo{

	public function getModel(){
		return new User;
	}
	public function newUser()
	{
		$user = new User();
		return $user;
	}
	public function all()
	{
		return User::with('branch')->get();
	}
	public function search($word)
	{
		return User::with('branch')
			->where('first_name','like',"%$word%")
			->where('last_name','like',"%$word%",'OR')
			->where('email','like',"%$word%",'OR')
			->where('username','like',"%$word%",'OR')
			->get();

	}
}