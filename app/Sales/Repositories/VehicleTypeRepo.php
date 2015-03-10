<?php 

namespace Sales\Repositories;

use Sales\Entities\VehicleType;

class VehicleTypeRepo extends BaseRepo{

	public function getModel(){
		return new VehicleType;
	}
	public function search($word)
	{
		return VehicleType::where('name','like',"%$word%")->get();
	}
}