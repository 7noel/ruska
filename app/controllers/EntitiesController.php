<?php

use Sales\Repositories\EntityRepo;
use Sales\Managers\EntityManager;

class EntitiesController extends BaseController{

	protected $entityRepo;

	public function __construct(EntityRepo $entityRepo) {
		$this->entityRepo = $entityRepo;
	}
	public function listFind(){
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$entidades = $this->entityRepo->search($search);
		} else {
			$entidades = $this->entityRepo->all();
		}
		return View::make('admin/entities/listFind', compact('entidades','search'));
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			return View::make('admin/entities/form');
		} else {
			$model = $this->entityRepo->newModel();
			$manager = new EntityManager($model, Input::all());
			$manager->save();
			return Redirect::route('entities');
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$entity = $this->entityRepo->find($id);
			return View::make('admin/entities/form', compact('entity'));
		} else {
			$data=Input::all();
			$entity = $this->entityRepo->find($data['id']);
			$manager = new EntityManager($entity, Input::all());
			$manager->save();
			return Redirect::route('entities');
		}
	}
	public function destroy($id)
	{
		$this->entityRepo->destroy($id);
		return Redirect::route('entities');
	}
}