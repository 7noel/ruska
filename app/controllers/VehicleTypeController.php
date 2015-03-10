<?php

use Sales\Repositories\VehicleTypeRepo;
use Sales\Managers\VehicleTypeManager;

class VehicleTypeController extends BaseController{

	protected $vehicleTypeRepo;

	public function __construct(VehicleTypeRepo $vehicleTypeRepo) {
		$this->vehicleTypeRepo = $vehicleTypeRepo;
	}
	public function listFind(){
		
		
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$vehicle_types = $this->vehicleTypeRepo->search($search);
		} else {
			$vehicle_types = $this->vehicleTypeRepo->all();
		}
		return View::make('admin/vehicle_types/listFind', compact('vehicle_types','search'));
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			return View::make('admin/vehicle_types/form');
		} else {
			$model = $this->vehicleTypeRepo->newModel();
			$manager = new VehicleTypeManager($model, Input::all());
			$manager->save();
			return Redirect::route('vehicle_types');
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$vehicle_type = $this->vehicleTypeRepo->find($id);
			return View::make('admin/vehicle_types/form', compact('vehicle_type'));
		} else {
			$data=Input::all();
			$vehicle_type = $this->vehicleTypeRepo->find($data['id']);
			$manager = new VehicleTypeManager($vehicle_type, Input::all());
			$manager->save();
			return Redirect::route('vehicle_types');
		}
	}
	public function destroy($id)
	{
		$this->vehicleTypeRepo->destroy($id);
		return Redirect::route('vehicle_types');
	}
}