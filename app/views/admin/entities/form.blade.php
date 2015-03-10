@extends('layoutadmin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Request::is('entidades/actualizar/*'))
			<h1>Editar Entidad Financiera</h1>
			{{ Form::model($entity, ['route'=>['entities_delete', $entity->id], 'method'=>'GET', 'role'=>'form', 'class'=>'delete', 'novalidate']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($entity, ['route'=>'entities_update', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal', 'novalidate']) }}
			{{ Form::hidden('id') }}
		@else
			<h1>Registrar Entidad Financiera</h1>			
			{{ Form::open(['route'=>'entities_register', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
			{{ Field::text('name') }}
			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}

		</div>
	</div>
</div>

@stop