<?php namespace Sales\Entities;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UseType extends \Eloquent {
	protected $fillable = ['name'];
	use SoftDeletingTrait;
	
	public function insurance_categories()
	{
		return $this->hasMany('Sales\Entities\InsurenceCategory');
	}
}