<?php 

namespace Sales\Repositories;

use Sales\Entities\Entity;

abstract class BaseRepo{

	protected $model;

	public function __construct() {
		$this->model = $this->getModel();
	}
	public function newModel()
	{
		$model = new $this->model();
		return $model;
	}

	abstract public function getModel();
	
	public function find($id){
		return $this->model->find($id);
	}
	public function all()
	{
		return $this->model->all();
	}
	public function getList($name='name', $id='id')
	{
		return $this->model->lists($name, $id);
	}
	public function all_with_deleted()
	{
		return $this->model->withTrashed()->get();
	}
	public function all_only_deleted()
	{
		return $this->model->onlyTrashed()->get();
	}
	public function jsonArray($array,$value,$label)
	{
		foreach ($array as $valor) {
			$data[]=array("value"=>$valor[$value],
				'label'=>$valor[$label],
				'id'=>$valor
			);
		}
		return Response::json($data);
	}
	public function destroy($id)
	{
		return $this->model->destroy($id);
	}
}