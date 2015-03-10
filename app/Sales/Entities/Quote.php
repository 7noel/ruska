<?php namespace Sales\Entities;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Quote extends \Eloquent {
	protected $fillable = ['customer','dni','birth','address','ubigeo_id','email','phone','currency','value','rate','primaneta','factor','primatotal','is_conformed','model_id','serie','motor','placa','insurance_category_id','user_id'];
	use SoftDeletingTrait;
	
	public function model()
	{
		return $this->belongsTo('Sales\Entities\Model');
	}
	public function insurance_category()
	{
		return $this->belongsTo('Sales\Entities\InsuranceCategory');
	}
	public function user()
	{
		return $this->belongsTo('Sales\Entities\User');
	}
	public function ubigeo()
	{
		return $this->hasOne('Sales\Entities\Ubigeo','id','ubigeo_id');
	}
	/*public function getPaginateBranchesAttribute(){
		return Branch::with('ubigeo')->where('entity_id', $this->id)->paginate();
	}*/
}