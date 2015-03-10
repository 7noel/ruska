<?php 
use Sales\Repositories\UseTypeRepo;
use Sales\Repositories\InsuranceCategoryRepo;
use Sales\Managers\InsuranceCategoryManager;

class InsuranceCategoryController extends BaseController{

	protected $insuranceCategoryRepo;
	protected $useTypeRepo;

	public function __construct(InsuranceCategoryRepo $insuranceCategoryRepo, UseTypeRepo $useTypeRepo) {
		$this->insuranceCategoryRepo = $insuranceCategoryRepo;
		$this->useTypeRepo = $useTypeRepo;
	}
	public function ajaxListar($use_type_id)
	{
		$lista = $this->insuranceCategoryRepo->ajaxListar($use_type_id);
		return Response::json($lista);
	}
	public function listFind(){
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$insurance_categories = $this->insuranceCategoryRepo->search($search);
		} else {
			$insurance_categories = $this->insuranceCategoryRepo->all();
		}
		return View::make('admin/insurance_categories/listFind', compact('insurance_categories','search'));		
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			$use_types = $this->useTypeRepo->getlist();
			return View::make('admin/insurance_categories/form',compact('use_types'));
		} else {
			$model = $this->insuranceCategoryRepo->newModel();
			$manager = new InsuranceCategoryManager($model, Input::all());
			$manager->save();
			return Redirect::route('insurance_categories');
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$insurance_category = $this->insuranceCategoryRepo->find($id);
			$use_types = $this->useTypeRepo->getlist();
			return View::make('admin/insurance_categories/form', compact('insurance_category','use_types'));
		} else {
			$data=Input::all();
			$insurance_category = $this->insuranceCategoryRepo->find($data['id']);
			$manager = new InsuranceCategoryManager($insurance_category, Input::all());
			$manager->save();
			return Redirect::route('insurance_categories');
		}
	}
	public function destroy($id)
	{
		$this->insuranceCategoryRepo->destroy($id);
		return Redirect::route('insurance_categories');
	}
}