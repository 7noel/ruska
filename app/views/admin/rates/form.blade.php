@extends('layoutadmin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Request::is('tasas/actualizar/*'))
			<h1>Editar Tasa</h1>
			{{ Form::model($rate, ['route'=>['rates_delete', $rate->id], 'method'=>'GET', 'role'=>'form', 'class'=>'delete']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($rate, ['route'=>'rates_update', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
			{{ Form::hidden('id') }}
		@else
			<h1>Registrar Tasa</h1>			
			{{ Form::open(['route'=>'rates_register', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
			{{ Field::select('use_type_id', $use_types, $use_type_id, ['id'=>'use_type_id']) }}
			{{ Field::select('insurance_category_id',$insurance_categories, null, ['id'=>'insurance_category_id']) }}
			{{ Field::text('year') }}
			{{ Field::text('rate') }}
			{{ Field::text('minimun') }}
			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}

		</div>
	</div>
</div>

@stop