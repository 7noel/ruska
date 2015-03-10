<?php

use Sales\Repositories\ExchangeRepo;
use Sales\Managers\ExchangeManager;

class ExchangeController extends BaseController {

	protected $exchangeRepo;

	public function __construct(ExchangeRepo $exchangeRepo) {
		$this->exchangeRepo = $exchangeRepo;
	}

	public function index()
	{
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$exchanges = $this->exchangeRepo->search($search);
		} else {
			$exchanges = $this->exchangeRepo->all();
		}
		return View::make('admin/exchanges/listFind', compact('exchanges','search'));
	}

	public function create()
	{
		return View::make('admin/exchanges/form');
	}

	public function store()
	{
		$model = $this->exchangeRepo->newModel();
		$manager = new ExchangeManager($model, Input::all());
		$manager->save();
		return Redirect::route('exchange.index');
	}

	public function show($id)
	{
		$exchange = $this->exchangeRepo->find($id);
		dd($exchange);
	}

	public function edit($id)
	{
		$exchange = $this->exchangeRepo->find($id);
		return View::make('admin/exchanges/form', compact('exchange'));
	}

	public function update($id)
	{
		$data=Input::all();
		$exchange = $this->exchangeRepo->find($id);
		$manager = new ExchangeManager($exchange, Input::all());
		$manager->save();
		return Redirect::route('exchange.index');
	}

	public function destroy($id)
	{
		$this->exchangeRepo->destroy($id);
		return Redirect::route('exchange.index');
	}
}
