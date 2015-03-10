<?php 

namespace Sales\PdfGenerators;


class Cotizacion extends \Fpdf{

	function Header()
	{
		$this->SetFillColor(200,200,200);
		$this->SetFont('Arial','',9);
		$this->Cell(0,5,utf8_decode('COTIZACIÓN DE SE GURO PARA AUTOMOVIL, CMTA. SW, CMTA. PANEL, CMTA. RURAL (HASTA 9 ASIENTOS)'),0,1,'C');
		$this->SetFont('Arial','',7);
		$this->Cell(0,5,date_format($this->quote->created_at,'d/m/Y'),0,1,'R');
//		$this->Ln(5);
		$this->SetFont('Arial','',12);
		$this->Cell(0,5,utf8_decode('AUTOTOTAL'),0,1,'C');
		$this->SetFont('Arial','',10);
		$this->Cell(0,5,utf8_decode('USO PARTICULAR'),0,1,'C');
		
		$this->Ln(5);
		$this->SetFont('Arial','',9);
		$this->Cell(50,5,utf8_decode('ASEGURADO'),1,0);
		$this->Cell(120,5,utf8_decode($this->quote->customer),1,1,'L',1);
		$this->Cell(50,5,utf8_decode('CONTRATANTE'),1,0);
		$this->Cell(120,5,utf8_decode($this->quote->customer),1,1,'L',1);
		$this->Cell(50,5,utf8_decode('ENDOSATARIO'),1,0);
		$this->Cell(120,5,utf8_decode(''),1,1,'L',1);
		$this->Cell(50,5,utf8_decode('TELEFONO'),1,0);
		$this->Cell(120,5,utf8_decode($this->quote->phone),1,1,'L',1);
		$this->Cell(50,5,utf8_decode('FECHA DE NACIMIENTO'),1,0);
		$birth = new \DateTime($this->quote->birth);
		$this->Cell(120,5,$birth->format('d/m/Y'),1,1,'L',1);
		$this->Cell(50,5,utf8_decode('R.U.C'),1,0);
		$this->Cell(120,5,utf8_decode($this->quote->dni),1,1,'L',1);
		$this->Cell(50,5,utf8_decode('CORREDOR'),1,0);
		$this->Cell(120,5,utf8_decode('SRES. RUSKA & ASOCIOADOS CORREDORES DE SEGUROS'),1,1,'L',1);
		$this->Cell(50,5,utf8_decode('VIGENCIA DE LA POLIZA'),1,0);
		$this->Cell(120,5,utf8_decode('1 AÑO'),1,1,'L',1);		
	}
	function Footer()
	{
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	public function body()
	{
		$this->SetFont('Arial','',8);
		$this->Ln(5);
		$this->Cell(130,5,utf8_decode('COBERTURAS'),1,0,'C');
		$this->Cell(40,5,utf8_decode('SUMA ASEGURADA'),1,1,'C');
		$this->Cell(170,5,utf8_decode('AUTOMOVIL , CMTA. SW, CMTA. PANEL, CMTA. RURAL (HASTA 9 ASIENTOS)'),1,1,'C');

		$this->Cell(130,5,utf8_decode('Daño propio (choque, vuelco, incendio, robo total y/o parcial, rotura de lunas), hasta'),'LR',0);
		$this->Cell(40,5,utf8_decode('Valor Comercial'),1,1,'C');
		$this->Cell(130,5,utf8_decode('Responsabilidad Civil de ocupantes por vehículos (según tarjeta de propiedad, excepto al conductor), hasta'),1,0);
		$this->Cell(40,5,$this->quote->currency." ".number_format(50000,2),1,1,'C');
		$this->Cell(130,5,utf8_decode('Responsabilidad Civil de terceros'),1,0);
		$this->Cell(40,5,$this->quote->currency." ".number_format(150000,2),1,1,'C');
		$this->Cell(130,5,utf8_decode('Accesorios Musicales, hasta'),1,0);
		$this->Cell(40,5,$this->quote->currency." ".number_format(1000,2),1,1,'C');
		$this->Cell(130,5,utf8_decode('Accidentes de los ocupantes: Máximo 5 ocupantes'),1,0);
		$this->Cell(40,5,utf8_decode('Según N° de Asientos'),1,1,'C');
		$this->Cell(130,5,utf8_decode('Muerte o invalidez Permanente, c/u'),1,0);
		$this->Cell(40,5,$this->quote->currency." ".number_format(20000,2),1,1,'C');
		$this->Cell(130,5,utf8_decode('Gastos Médicos c/u hasta'),1,0);
		$this->Cell(40,5,$this->quote->currency." ".number_format(4000,2),1,1,'C');
	}
}