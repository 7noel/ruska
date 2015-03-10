<?php
use Sales\PdfGenerators\Cotizacion;

class HomeController extends BaseController {
	public function index()
	{
		return View::make('home');
	}
	public function pdf()
	{
		$pdf = new Cotizacion();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		for($i=1;$i<=40;$i++)
		    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
		$pdf->Output();
		exit;
	}
}
