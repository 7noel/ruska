<?php

use Sales\Repositories\UserRepo;

class AuthController extends BaseController{

	protected $userRepo;

	public function __construct(UserRepo $userRepo) {
		$this->userRepo = $userRepo;
	}
	public function signin()
	{
		return View::make('admin/users/login');
	}
	public function login()
	{
		$data = Input::only('username','password','remember');
		$credentials = ['username'=>$data['username'], 'password'=>$data['password']];
		//$credentials = ['username'=>'Myah', 'password'=>'123456'];
		if (Auth::attempt($credentials, $data['remember'])) {
			if (Auth::user()->is_superuser==true) {
				return Redirect::route('entities');
			} else {
				return Redirect::route('home');
			}
		}
		return Redirect::back()->with('login_error',1);
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::route('signin');
	}
}