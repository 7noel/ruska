@extends('layoutadmin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Request::is('marcas/actualizar/*'))
			<h1>Editar Marca</h1>
			{{ Form::model($brand, ['route'=>['brands_delete', $brand->id], 'method'=>'GET', 'role'=>'form', 'class'=>'delete']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($brand, ['route'=>'brands_update', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
			{{ Form::hidden('id') }}
		@else
			<h1>Registrar Marca</h1>			
			{{ Form::open(['route'=>'brands_register', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
			{{ Field::text('name') }}
			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}

		</div>
	</div>
</div>

@stop