<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<h2>Se ha validado una cotización emitida en la web</h2>
	<p>Cotización N°: {{ $quote->id }} </p>
	<p>Cliente: {{ $quote->customer }}</p>
	<p>DNI/RUC: {{ $quote->dni }} </p>
	<p>Direccion: {{ $quote->address." ".$quote->ubigeo->departamento." ".$quote->ubigeo->provincia." ".$quote->ubigeo->distrito }} </p>
	<p>Correo: {{ $quote->email }} </p>
	<p>Telefono: {{ $quote->phone }} </p>
	<h2>Datos de la Unidad:</h2>
	<p>Marca: {{ $quote->model->brand->name }} </p>
	<p>Modelo: {{ $quote->model->name }} </p>
	<p>N° de Serie: {{ $quote->serie }} </p>
	<p>N° de Motor: {{ $quote->motor }} </p>
	<p>Placa: {{ $quote->placa }} </p>
	<p>Tipo de uso: {{ $quote->insurance_category->use_type->name }} </p>
	<p>Categoría de seguro: {{ $quote->insurance_category->name }} </p>
	<p>Valor: {{ $quote->currency." ". number_format($quote->value,2) }}</p>
	<p>Tasa: {{ $quote->rate }} </p>
	<p>Prima Neta: {{ $quote->currency." ". number_format($quote->primaneta,2) }}</p>
	<p>Prima Total: {{ $quote->currency." ". number_format($quote->primatotal,2) }} </p>
	<p>Entidad Financiera: {{ $quote->user->branch->entity->name }} </p>
	<p>Agencia Solicitante: {{$quote->user->branch->name }} </p>
	<p>Gestor de Negocio: {{ $quote->user->first_name." ".$quote->user->last_name }} </p>
</body>
</html>