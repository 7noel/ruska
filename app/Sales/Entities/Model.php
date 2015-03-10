<?php namespace Sales\Entities;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Model extends \Eloquent {
	protected $fillable = ['name','have_gps','brand_id','vehicle_type_id','insurance_category_id'];
	use SoftDeletingTrait;
	
	public function models()
	{
		return $this->hasMany('Sales\Entities\Model');
	}
	public function brand()
	{
		return $this->belongsTo('Sales\Entities\Brand');
	}
	public function vehicle_type()
	{
		return $this->belongsTo('Sales\Entities\VehicleType');
	}
	public function insurance_category()
	{
		return $this->belongsTo('Sales\Entities\InsuranceCategory');
	}
	public function quotes()
	{
		return $this->hasMany('Sales\Entities\Quote');
	}
}