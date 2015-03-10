<?php

use Sales\Repositories\UbigeoRepo;

class UbigeoController extends BaseController{

	protected $ubigeoRepo;

	public function __construct(UbigeoRepo $ubigeoRepo) {
		$this->ubigeoRepo = $ubigeoRepo;
	}
	public function ajaxProvincias($departamento)
	{
		$provincias = $this->ubigeoRepo->ajaxProvincias($departamento);
		return Response::json($provincias);
	}
	public function ajaxDistritos($departamento,$provincia)
	{
		$distritos = $this->ubigeoRepo->ajaxDistritos($provincia);
		return Response::json($distritos);
	}
}