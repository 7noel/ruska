<?php namespace Sales\Entities;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Entity extends \Eloquent {
	protected $fillable = ['name','is_active'];
	use SoftDeletingTrait;
	
	public function branches()
	{
		return $this->hasMany('Sales\Entities\Branch');
	}
	/*public function getPaginateBranchesAttribute(){
		return Branch::with('ubigeo')->where('entity_id', $this->id)->paginate();
	}*/
}