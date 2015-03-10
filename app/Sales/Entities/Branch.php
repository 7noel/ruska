<?php namespace Sales\Entities;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Branch extends \Eloquent {
	protected $fillable = ['name','address','ubigeo_id','administrator','entity_id','is_active'];
	use SoftDeletingTrait;
	//protected $perPage = 5;

	public function users()
	{
		return $this->hasMany('Sales\Entities\User');
	}

	public function ubigeo()
	{
		return $this->hasOne('Sales\Entities\Ubigeo','id','ubigeo_id');
	}
	public function entity()
	{
		return $this->belongsTo('Sales\Entities\Entity');
	}
}