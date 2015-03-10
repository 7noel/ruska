<?php 

namespace Sales\Repositories;

use Sales\Entities\Model;

class ModelRepo extends BaseRepo{

	public function getModel(){
		return new Model;
	}
	public function search($word)
	{
		return Model::where('name','like',"%$word%")->with('brand','vehicle_type','insurance_category')->get();
	}
	public function all()
	{
		return Model::with('brand','vehicle_type','insurance_category')->get();
	}
	public function ajaxListar($brand_id)
	{
		return Model::where('brand_id','=',$brand_id)->get();
	}
	public function getSeguro($id,$uso)
	{
		return Model::find($id);
	}
}