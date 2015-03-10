<?php

use Sales\Repositories\QuoteRepo;
use Sales\Managers\QuoteManager;
use Sales\Repositories\UbigeoRepo;
use Sales\Repositories\BrandRepo;
use Sales\Repositories\ModelRepo;
use Sales\Repositories\UseTypeRepo;
use Sales\Repositories\InsuranceCategoryRepo;
use Sales\Repositories\RateRepo;
use Sales\PdfGenerators\Cotizacion;

class QuoteController extends BaseController{

	protected $quoteRepo;
	protected $ubigeoRepo;
	protected $brandRepo;
	protected $modelRepo;
	protected $rateRepo;
	protected $insuranceCategoryRepo;
	protected $useTypeRepo;

	public function __construct(UseTypeRepo $useTypeRepo, RateRepo $rateRepo, InsuranceCategoryRepo $insuranceCategoryRepo, ModelRepo $modelRepo, BrandRepo $brandRepo, UbigeoRepo $ubigeoRepo, QuoteRepo $quoteRepo) {
		$this->quoteRepo = $quoteRepo;
		$this->ubigeoRepo = $ubigeoRepo;
		$this->brandRepo = $brandRepo;
		$this->modelRepo = $modelRepo;
		$this->rateRepo = $rateRepo;
		$this->insuranceCategoryRepo = $insuranceCategoryRepo;
		$this->useTypeRepo = $useTypeRepo;
	}
	public function listFind(){
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$quotes = $this->quoteRepo->search($search);
		} else {
			$quotes = array();
		}
		return View::make('quotes/listFind', compact('quotes','search'));
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			$ubigeo = $this->ubigeoRepo->listUbigeo();
			$models = array();
			$brands = $this->brandRepo->getlist();
			$brand_id = 0;
			$insurance_categories = array();
			$use_types = $this->useTypeRepo->getlist();
			$use_type_id = 0;
			$years = $this->quoteRepo->getlistyears();
			return View::make('quotes/form', compact('ubigeo','brands','brand_id','models','insurance_categories','use_types','use_type_id','years'));
		} else {
			$model = $this->quoteRepo->newModel();
			$data = Input::all();
			$data['user_id'] = Auth::user()->id;
			$manager = new QuoteManager($model, $data);
			$manager->save();
			$quote = $manager->getmodel();
			//dd($quote->id);
			return Redirect::route('quote',$quote->id);
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$quote = $this->quoteRepo->find($id);
			return View::make('quotes/form', compact('quote'));
		} else {
			$data=Input::all();
			$quote = $this->quoteRepo->find($data['id']);
			$manager = new QuoteManager($quote, Input::all());
			$manager->save();
			return Redirect::route('quotes');
		}
	}
	public function destroy($id)
	{
		$this->quoteRepo->destroy($id);
		return Redirect::route('quotes');
	}
	public function confirmQuote($id)
	{
		$quote = $this->quoteRepo->fullFind($id);
		$quote->is_confirmed = true;
		if ($quote->save()) {
			$staff[] = ['name'=>'Noel Huillca', 'email'=>'noel.logan@gmail.com'];
			$staff[] = ['name'=>'Elmer Rodriguez', 'email'=>'erodriguez36@terra.com'];
			//$staff[] = ['name'=>'Carlos Bendezu Ruska', 'email'=>'carlos@ruska.com.pe'];
			//$staff[] = ['name'=>'Sra. Madeleine Torres', 'email'=>'mtorresb@ruska.com.pe'];
			//$staff[] = ['name'=>'Sr. Harry Ramirez del Aguila', 'email'=>'hramirez@ruska.com.pe'];
			$data = compact('quote');
			foreach ($staff as $key => $user) {
				Mail::send('emails.validate', $data, function($message) use ($user){
					$message->from('noel.logan@gmail.com', 'Laravel');
					$message->to($user['email'], $user['name'])->subject('Prueba del Cotizador Web');
				});
			}
			return "La cotización fue validada";
		} else {
			return "No se pudo validar la cotización";
		}
	}
	public function listquote($id)
	{
		//dd($id);
			$search='';
			$quotes[] = $this->quoteRepo->find($id);
			$this->notFoundUnless($quotes[0]);
 			return View::make('quotes/listFind', compact('quotes','search'));
	}
	public function pdf($id)
	{
		$quote = $this->quoteRepo->fullFind($id);
		$pdf = new Cotizacion();
		$pdf->quote = $quote;
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->body();
		$pdf->Output();
		exit;
	}
}