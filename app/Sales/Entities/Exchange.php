<?php namespace Sales\Entities;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Exchange extends \Eloquent {
	protected $fillable = ['sales','purchase'];
	use SoftDeletingTrait;
	
}