<?php

use Sales\Repositories\UseTypeRepo;
use Sales\Managers\UseTypeManager;

class UseTypeController extends BaseController{

	protected $useTypeRepo;

	public function __construct(UseTypeRepo $useTypeRepo) {
		$this->useTypeRepo = $useTypeRepo;
	}
	public function listFind(){
		
		
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$usos = $this->useTypeRepo->search($search);
		} else {
			$usos = $this->useTypeRepo->all();
		}
		return View::make('admin/use_types/listFind', compact('usos','search'));
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			return View::make('admin/use_types/form');
		} else {
			$model = $this->useTypeRepo->newModel();
			$manager = new UseTypeManager($model, Input::all());
			$manager->save();
			return Redirect::route('use_types');
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$use_type = $this->useTypeRepo->find($id);
			return View::make('admin/use_types/form', compact('use_type'));
		} else {
			$data=Input::all();
			$use_type = $this->useTypeRepo->find($data['id']);
			$manager = new UseTypeManager($use_type, Input::all());
			$manager->save();
			return Redirect::route('use_types');
		}
	}
	public function destroy($id)
	{
		$this->useTypeRepo->destroy($id);
		return Redirect::route('use_types');
	}
}