<?php namespace Sales\Entities;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class InsuranceCategory extends \Eloquent {
	protected $fillable = ['name','use_type_id','alias'];
	use SoftDeletingTrait;
	
	public function models()
	{
		return $this->hasMany('Sales\Entities\Model');
	}
	public function rates()
	{
		return $this->hasMany('Sales\Entities\Rate');
	}
	public function use_type()
	{
		return $this->belongsTo('Sales\Entities\UseType');
	}
	public function quotes()
	{
		return $this->hasMany('Sales\Entities\Quote');
	}
}