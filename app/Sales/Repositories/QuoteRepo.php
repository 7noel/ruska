<?php 

namespace Sales\Repositories;

use Sales\Entities\Quote;

class QuoteRepo extends BaseRepo{

	public function getModel(){
		return new Quote;
	}
	public function search($word)
	{
		$q = Quote::with('model','model.brand')
			->where(function ($query) use ($word) {
				$query->where('id','=',"$word")
					->orwhere('customer','like',"%$word%")
					->orWhere('dni','like',"%$word%")
					->orWhere('email','like',"%$word%");
			});
		if (\Auth::user()->is_superuser==false) {
			$q->where('user_id','=',\Auth::user()->id);
		}
		return $q->get();		
	}
	public function getlistyears()
	{
		$ymin=1990;
		$ymax=date('Y')+1;
		$years = array();
		do {
			$years["$ymax"]="$ymax";
			$ymax--;
		} while ($ymax >= $ymin);
		//dd($years);
		return $years;
	}
	public function fullFind($id)
	{
		return Quote::with('ubigeo','model','model.brand','insurance_category','insurance_category.use_type','user','user.branch','user.branch.entity')->find($id);
	}
}