@extends('layoutadmin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Request::is('categoriaseguro/actualizar/*'))
			<h1>Editar Categoría de Seguro</h1>
			{{ Form::model($insurance_category, ['route'=>['insurance_categories_delete', $insurance_category->id], 'method'=>'GET', 'role'=>'form', 'class'=>'delete']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($insurance_category, ['route'=>'insurance_categories_update', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
			{{ Form::hidden('id') }}
		@else
			<h1>Registrar Categoría de Seguro</h1>			
			{{ Form::open(['route'=>'insurance_categories_register', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
			{{ Field::text('name') }}
			{{ Field::text('alias') }}
			{{ Field::select('use_type_id',$use_types) }}
			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}

		</div>
	</div>
</div>

@stop