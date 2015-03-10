@extends('layout')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
  <script>
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: 'Anterior',
		nextText: 'Siguiente',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		weekHeader: 'Sm',
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);
	$(function () {
		var currentYear = (new Date).getFullYear();
		$( "#datepicker" ).datepicker({
			dateFormat: 'DD, d MM, yy',
			changeMonth: true,
			changeYear: true,
			yearRange: '1950:'+currentYear,
			altField: "#birth",
			altFormat: 'yy-mm-dd',
	    });
	});
</script>
<div class="container">
	<div class="">
		<div class="">
		@if(Request::is('tasas/actualizar/*'))
			<h2>Editar Cotización</h2>
			{{ Form::model($quote, ['route'=>['quotes_delete', $quote->id], 'method'=>'GET', 'role'=>'form', 'class'=>'delete']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($quote, ['route'=>'quotes_update', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
			{{ Form::hidden('id') }}
		@else
			<h2>Registrar Cotización</h2>			
			{{ Form::open(['route'=>'quotes_register', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
		<table>
			<tbody>
			<tr>
				<td width="500">{{ Field::text('customer',null,['required'=>'required', 'autofocus' => 'autofocus']) }}</td>
				<td width="500">{{ Field::text('dni',null,['required'=>'required']) }}</td>
			</tr>
			<tr>
				<td width="500">
					<div class="form-group-sm">
						{{ Form::label('birth', 'Nacimiento', ['class'=>'col-sm-4 control-label']) }}
						<div class="col-sm-8">
						{{ Form::text('datepicker', null, ['id'=>'datepicker', 'class'=>'form-control']) }}
						{{ Form::hidden('birth', null, ['id'=>'birth']) }}
						@if($errors)
							<p class="error_message">{{ $errors->first('birth') }}</p>
						@endif
						</div>
					</div>
				</td>
				<td width="500">{{ Field::text('address',null,['id'=>'address','required'=>'required']) }}</td>
			</tr>
			<tr>
				<td width="500">{{ Field::select('departamento',$ubigeo['departamento'],$ubigeo['value']['departamento'],['id'=>'lstDepartamento','required'=>'required']) }}</td>
			</tr>
			<tr>
				<td width="500">{{ Field::select('provincia',$ubigeo['provincia'],$ubigeo['value']['provincia'],['id'=>'lstProvincia','required'=>'required']) }}</td>
			</tr>
			<tr>
				<td width="500">{{ Field::select('ubigeo_id',$ubigeo['distrito'],$ubigeo['value']['distrito'],['id'=>'lstDistrito','required'=>'required']) }}</td>
			</tr>
			<tr>
				<td width="500">{{ Field::text('email',null,['id'=>'email']) }}</td>
				<td width="500">{{ Field::text('phone') }}</td>
			</tr>
			<tr>
				<td width="500">{{ Field::select('brand_id',$brands, $brand_id, ['id'=>'brand_id','required'=>'required']) }}</td>
				<td width="500">{{ Field::select('model_id',$models, null, ['id'=>'model_id','required'=>'required']) }}</td>
			</tr>
			<tr>
				<td width="500">{{ Field::text('serie') }}</td>
				<td width="500">{{ Field::text('motor') }}</td>
			</tr>
			<tr>
				<td width="500">{{ Field::text('placa') }}</td>
			</tr>
			<tr>
				<td width="500">{{ Field::select('use_type_id', $use_types, $use_type_id, ['id'=>'use_type_id','required'=>'required']) }}</td>
				<td width="500">{{ Field::select('insurance_category_id',$insurance_categories, null, ['id'=>'insurance_category_id','required'=>'required']) }}</td>
			</tr>
			<tr>
				<td width="500">{{ Field::select('year',$years, null, ['id'=>'year','required'=>'required']) }}</td>
				<td width="500">
					<div class="form-group-sm">
						{{ Form::label('value', 'Valor Comercial', ['class'=>'col-sm-4 control-label']) }}
						<div class="col-sm-6">
							<div class="input-group">
								<div class="input-group-btn">
									{{ Form::select('currency',['1'=>'US$','2'=>'S/.'],null,['id'=>'currency','class'=>'input-sm']) }}
								</div>
								{{ Form::text('value',null,['id'=>'value','required'=>'required','class'=>'form-control']) }}
							</div>
						
						@if($errors->first('value'))
							<p class="error_message">{{ $error }}</p>
						@endif
							
						</div>
  					</div>
				</td>
			</tr>
			<tr>
				<td width="500">{{ Field::text('primaneta',null,['readonly'=>'readonly','id'=>'primaneta']) }}</td>
				<td width="500">{{ Field::text('primatotal',null,['readonly'=>'readonly','id'=>'primatotal']) }}</td>
			</tr>
			<tr>
				<td width="500" colspan="2" align="center">{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}</td>
			</tr>
				
			</tbody>
		</table>
		{{ Form::hidden('rate',null,['id'=>'rate']) }}
		{{ Form::hidden('factor',1.2154, ['id'=>'factor']) }}
		{{ Form::close() }}

		</div>
	</div>
</div>
<script>
	if ($('#birth') != '') {
		var ff=toDate1($('#birth').val());
		$("#datepicker").val($.datepicker.formatDate('DD, d MM, yy', ff));
	};
</script>
@stop