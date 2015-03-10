<?php

use Sales\Repositories\BrandRepo;
use Sales\Managers\BrandManager;

class BrandController extends BaseController{

	protected $brandRepo;

	public function __construct(BrandRepo $brandRepo) {
		$this->brandRepo = $brandRepo;
	}
	public function listFind(){
		
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$brands = $this->brandRepo->search($search);
		} else {
			$brands = $this->brandRepo->all();
		}
		return View::make('admin/brands/listFind', compact('brands','search'));
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			return View::make('admin/brands/form');
		} else {
			$model = $this->brandRepo->newModel();
			$manager = new BrandManager($model, Input::all());
			$manager->save();
			return Redirect::route('brands');
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$brand = $this->brandRepo->find($id);
			return View::make('admin/brands/form', compact('brand'));
		} else {
			$data=Input::all();
			$brand = $this->brandRepo->find($data['id']);
			$manager = new BrandManager($brand, Input::all());
			$manager->save();
			return Redirect::route('brands');
		}
	}
	public function destroy($id)
	{
		$this->brandRepo->destroy($id);
		return Redirect::route('brands');
	}
}