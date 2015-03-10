<?php namespace Sales\Entities;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = array('username','password','first_name','last_name','email','branch_id','is_staff','is_superuser','remember_token');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function setPasswordAttribute($value)
	{
		if (!empty($value)) {
			$this->attributes['password'] = \Hash::make($value);
		}
	}

	public function branch()
	{
		return $this->belongsTo('Sales\Entities\Branch');
	}
	public function quotes()
	{
		return $this->hasMany('Sales\Entities\Quote');
	}
}