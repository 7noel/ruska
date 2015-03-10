@extends('layoutadmin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Request::is('tiposvehiculo/actualizar/*'))
			<h1>Editar Tipo de Vehículo</h1>
			{{ Form::model($vehicle_type, ['route'=>['vehicle_types_delete', $vehicle_type->id], 'method'=>'GET', 'role'=>'form', 'class'=>'delete']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($vehicle_type, ['route'=>'vehicle_types_update', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
			{{ Form::hidden('id') }}
		@else
			<h1>Registrar Tipo de Vehículo</h1>			
			{{ Form::open(['route'=>'vehicle_types_register', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
			{{ Field::text('name') }}
			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}

		</div>
	</div>
</div>

@stop