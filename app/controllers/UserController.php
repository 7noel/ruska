<?php

use Sales\Repositories\UserRepo;
use Sales\Repositories\BranchRepo;

use Sales\Entities\User;
use Sales\Managers\RegisterManager;
use Sales\Managers\AccountManager;
use Sales\Managers\UserManager;

class UserController extends BaseController{

	protected $userRepo;
	protected $branchRepo;

	public function __construct(UserRepo $userRepo, BranchRepo $branchRepo) {
		$this->userRepo   = $userRepo;
		$this->branchRepo = $branchRepo;
	}
	public function listFind()
	{
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$users = $this->userRepo->search($search);
		} else {
			$users = $this->userRepo->all();
		}
		return View::make('admin/users/listFind',compact('users','search'));
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			$branches = $this->branchRepo->getList();
			return View::make('admin/users/form',compact('branches'));
		} else {
			$user = $this->userRepo->newUser();
			$manager = new RegisterManager($user, Input::all());
			$manager->save();
			return Redirect::route('users');
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$user = $this->userRepo->find($id);
			$this->notFoundUnless($user);
			$branches = $this->branchRepo->getList();
			return View::make('admin/users/form', compact('user','branches'));
		} else {
			$data=Input::all();
			$user = $this->userRepo->find($data['id']);
			$manager = new UserManager($user, Input::all());
			$manager->save();
			return Redirect::route('users');
		}
	}
	public function account()
	{
		if (!Request::isMethod('post')) {
			$user = Auth::user();
			$branches = $this->branchRepo->getList();
			return View::make('admin/users/account', compact('user','branches'));
		} else {
			$user = Auth::user();
			$manager = new AccountManager($user, Input::all());
			$manager->save();
			return Redirect::route('users');
		}
	}
	public function destroy($id)
	{
		$this->userRepo->destroy($id);
		return Redirect::route('users');
	}
	public function resetPassword($id)
	{
		$data=['id'=>$id, 'password'=>'123', 'password_confirmation'=>'123'];
		$user = $this->userRepo->find($data['id']);
		$manager = new AccountManager($user, $data);
		$manager->save();
		return Redirect::back();
	}
}