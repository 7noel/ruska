<?php 
use Sales\Repositories\RateRepo;
use Sales\Repositories\UseTypeRepo;
use Sales\Repositories\InsuranceCategoryRepo;
use Sales\Managers\RateManager;


class RateController extends BaseController{

	protected $rateRepo;
	protected $insuranceCategoryRepo;
	protected $useTypeRepo;

	public function __construct(UseTypeRepo $useTypeRepo, RateRepo $rateRepo, InsuranceCategoryRepo $insuranceCategoryRepo) {
		$this->rateRepo = $rateRepo;
		$this->insuranceCategoryRepo = $insuranceCategoryRepo;
		$this->useTypeRepo = $useTypeRepo;
	}
	public function getRate($seguro,$year)
	{
		$rate = $this->rateRepo->getRate($seguro,$year);
		echo $rate[0]->rate;
	}
	public function getPmin($seguro,$year)
	{
		$rate = $this->rateRepo->getRate($seguro,$year);
		echo $rate[0]->minimun;
	}
	public function listFind(){
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$rates = $this->rateRepo->search($search);
		} else {
			$rates = $this->rateRepo->all();
		}
		return View::make('admin/rates/listFind', compact('rates','search'));		
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			$insurance_categories = array();
			$use_types = $this->useTypeRepo->getlist();
			$use_type_id = 0;
			return View::make('admin/rates/form',compact('insurance_categories','use_types','use_type_id'));
		} else {
			$model = $this->rateRepo->newModel();
			$manager = new RateManager($model, Input::all());
			$manager->save();
			return Redirect::route('rates');
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$rate = $this->rateRepo->find($id);
			$use_types = $this->useTypeRepo->getlist();
			$use_type_id = $this->insuranceCategoryRepo->getUseType($rate->insurance_category_id);
			$insurance_categories = $this->insuranceCategoryRepo->getList2($use_type_id);
			return View::make('admin/rates/form', compact('rate','insurance_categories','use_types','use_type_id'));
		} else {
			$data=Input::all();
			$rate = $this->rateRepo->find($data['id']);
			$manager = new RateManager($rate, Input::all());
			$manager->save();
			return Redirect::route('rates');
		}
	}
	public function destroy($id)
	{
		$this->rateRepo->destroy($id);
		return Redirect::route('rates');
	}
	public function autocomplete()
	{
		$term=Input::get('term');
		$rates=$this->rateRepo->autocomplete($term);
		foreach ($rates as $rate) {
			$result[]=['value'=>$rate->name,'id'=>$rate->id, 'label'=>$rate->name];
		}
		//$result[]=['value'=>'Hola','id'=>'idd','label'=>'Hola'];
		return Response::json($result);
	}
}