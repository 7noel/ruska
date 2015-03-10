<?php 

namespace Sales\Repositories;

use Sales\Entities\Entity;

class EntityRepo extends BaseRepo{

	public function getModel(){
		return new Entity;
	}
	public function find2($id){
		return Entity::with('branches','branches.ubigeo')->find($id);
	}
	public function search($word)
	{
		return Entity::where('name','like',"%$word%")->get();
		//return Entity::all();
	}
}