<?php 

namespace Sales\Repositories;

use Sales\Entities\InsuranceCategory;

class InsuranceCategoryRepo extends BaseRepo{

	public function getModel(){
		return new InsuranceCategory;
	}
	public function search($word)
	{
		return InsuranceCategory::where('name','like',"%$word%")->with('use_type')->get();
	}
	public function all()
	{
		return InsuranceCategory::with('use_type')->get();
	}
	public function getUseType($id){
		return InsuranceCategory::find($id)->use_type_id;
	}
	public function getList2($use_type_id, $name='name', $id='id')
	{
		return InsuranceCategory::where('use_type_id','=',$use_type_id)->lists($name, $id);
	}
	public function ajaxListar($use_type_id)
	{
		return InsuranceCategory::where('use_type_id','=',$use_type_id)->get();
	}
}