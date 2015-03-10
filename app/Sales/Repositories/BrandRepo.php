<?php 

namespace Sales\Repositories;

use Sales\Entities\Brand;

class BrandRepo extends BaseRepo{

	public function getModel(){
		return new Brand;
	}
	public function search($word)
	{
		return Brand::where('name','like',"%$word%")->get();
	}
}