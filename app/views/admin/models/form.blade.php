@extends('layoutadmin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Request::is('modelos/actualizar/*'))
			<h1>Editar Modelo de Vehículo</h1>
			{{ Form::model($model, ['route'=>['models_delete', $model->id], 'method'=>'GET', 'role'=>'form', 'class'=>'delete']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($model, ['route'=>'models_update', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
			{{ Form::hidden('id') }}
		@else
			<h1>Registrar Modelo de Vehículo</h1>			
			{{ Form::open(['route'=>'models_register', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
			{{ Field::text('name') }}
			{{ Field::select('brand_id',$brands) }}
			{{ Field::select('vehicle_type_id',$vehicle_types) }}
			{{ Field::select('use_type_id', $use_types, $use_type_id, ['id'=>'use_type_id','disabled'=>'disabled']) }}
			{{ Field::select('insurance_category_id',$insurance_categories, null, ['id'=>'insurance_category_id']) }}
			{{ Field::checkbox('have_gps') }}
			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop