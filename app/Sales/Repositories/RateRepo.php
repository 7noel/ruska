<?php 

namespace Sales\Repositories;

use Sales\Entities\Rate;

class RateRepo extends BaseRepo{

	public function getModel(){
		return new Rate;
	}
	public function search($word)
	{
		return Rate::where('year','like',"%$word%")->with('insurance_category','insurance_category.use_type')->get();
	}
	public function all()
	{
		return Rate::with('insurance_category','insurance_category.use_type')->get();
	}
	public function getRate($seguro,$year)
	{
		return Rate::where('year',"=","$year")
				->where('insurance_category_id',"=","$seguro")
				->orderBy('created_at', 'desc')
				->get();
	}
}