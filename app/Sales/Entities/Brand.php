<?php namespace Sales\Entities;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Brand extends \Eloquent {
	protected $fillable = ['name'];
	use SoftDeletingTrait;
	
	public function models()
	{
		return $this->hasMany('Sales\Entities\Model');
	}
}