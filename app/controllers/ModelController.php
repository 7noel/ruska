<?php 
use Sales\Repositories\ModelRepo;
use Sales\Repositories\VehicleTypeRepo;
use Sales\Repositories\BrandRepo;
use Sales\Repositories\InsuranceCategoryRepo;
use Sales\Repositories\UseTypeRepo;

use Sales\Managers\ModelManager;

class ModelController extends BaseController{

	protected $modelRepo;
	protected $vehicleTypeRepo;
	protected $brandRepo;
	protected $insuranceCategoryRepo;
	protected $useTypeRepo;

	public function __construct(ModelRepo $modelRepo,VehicleTypeRepo $vehicleTypeRepo, BrandRepo $brandRepo, InsuranceCategoryRepo $insuranceCategoryRepo, UseTypeRepo $useTypeRepo) {
		$this->modelRepo = $modelRepo;
		$this->vehicleTypeRepo = $vehicleTypeRepo;
		$this->brandRepo = $brandRepo;
		$this->insuranceCategoryRepo = $insuranceCategoryRepo;
		$this->useTypeRepo = $useTypeRepo;
	}
	public function ajaxListar($brand_id)
	{
		$lista = $this->modelRepo->ajaxListar($brand_id);
		return Response::json($lista);
	}
	public function getSeguro($model, $uso){
		$model = $this->modelRepo->getSeguro($model, $uso);
		echo $model->insurance_category_id;
	}
	public function listFind(){
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$models = $this->modelRepo->search($search);
		} else {
			$models = $this->modelRepo->all();
		}
		return View::make('admin/models/listFind', compact('models','search'));		
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			$brands = $this->brandRepo->getlist();
			$vehicle_types = $this->vehicleTypeRepo->getlist();
			$use_types = $this->useTypeRepo->getlist();
			$use_type_id = 1;
			$insurance_categories = $this->insuranceCategoryRepo->getlist2(1);
			return View::make('admin/models/form',compact('brands','vehicle_types','insurance_categories','use_types','use_type_id'));
		} else {
			$model = $this->modelRepo->newModel();
			$manager = new ModelManager($model, Input::all());
			$manager->save();
			return Redirect::route('models');
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$model = $this->modelRepo->find($id);
			$brands = $this->brandRepo->getlist();
			$vehicle_types = $this->vehicleTypeRepo->getlist();
			$use_types = $this->useTypeRepo->getlist();
			$use_type_id = $this->insuranceCategoryRepo->getUseType($model->insurance_category_id);
			$insurance_categories = $this->insuranceCategoryRepo->getlist2(1);
			return View::make('admin/models/form', compact('model','brands','vehicle_types','insurance_categories','use_types','use_type_id'));
		} else {
			$data=Input::all();
			$model = $this->modelRepo->find($data['id']);
			$manager = new ModelManager($model, Input::all());
			$manager->save();
			return Redirect::route('models');
		}
	}
	public function destroy($id)
	{
		$this->modelRepo->destroy($id);
		return Redirect::route('models');
	}
}