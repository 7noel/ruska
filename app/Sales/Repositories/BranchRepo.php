<?php 

namespace Sales\Repositories;

use Sales\Entities\Branch;

class BranchRepo extends BaseRepo{

	public function getModel(){
		return new Branch;
	}
	public function all_entity($entity_id)
	{
		return Branch::with('entity')->where('entity_id',"=",$entity_id)->get();
	}
	public function all()
	{
		return  Branch::with('entity','ubigeo')->get();
	}
	public function autocomplete($term)
	{
		return Branch::where('name','like',"%$term%")->get();
	}
	public function search($word)
	{
		return Branch::with('entity','ubigeo')
			->where('name','like',"%$word%")
			->where('address','like',"%$word%",'OR')
			->where('administrator','like',"%$word%",'OR')
			->get();
	}
	public function getList2($entity_id)
	{
		return Branch::where('entity_id','=',$entity_id)->lists('name','id');
	}
}