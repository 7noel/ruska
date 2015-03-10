<?php namespace Sales\Entities;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Rate extends \Eloquent {
	protected $fillable = ['year','rate','minimun','insurance_category_id'];
	use SoftDeletingTrait;
	
	public function insurance_category()
	{
		return $this->belongsTo('Sales\Entities\InsuranceCategory');
	}
}