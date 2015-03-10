@extends('layoutadmin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Request::is('agencias/actualizar/*'))
			<h1>Editar Agencia</h1>
			{{ Form::model($branch, ['route'=>['branches_delete', $branch->id], 'method'=>'GET', 'role'=>'form', 'class'=>'delete', 'novalidate']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($branch, ['route'=>'branches_update', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal', 'novalidate']) }}
			{{ Form::hidden('id') }}
		@else
			<h1>Registrar Agencia</h1>			
			{{ Form::open(['route'=>'branches_register', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
			{{ Field::select('entity_id',$entities) }}
			{{ Field::text('name') }}
			{{ Field::text('administrator') }}
			{{ Field::text('address') }}
			{{ Field::select('departamento',$ubigeo['departamento'],$ubigeo['value']['departamento'],['id'=>'lstDepartamento']) }}
			{{ Field::select('provincia',$ubigeo['provincia'],$ubigeo['value']['provincia'],['id'=>'lstProvincia']) }}
			{{ Field::select('ubigeo_id',$ubigeo['distrito'],$ubigeo['value']['distrito'],['id'=>'lstDistrito']) }}

			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop