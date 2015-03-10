<?php 

namespace Sales\Repositories;

use Sales\Entities\UseType;

class UseTypeRepo extends BaseRepo{

	public function getModel(){
		return new UseType;
	}
	public function search($word)
	{
		return UseType::where('name','like',"%$word%")->get();
	}
}