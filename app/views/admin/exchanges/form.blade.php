@extends('layoutadmin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Request::is('*/edit'))
			<h1>Editar Tipo de Cambio</h1>
			{{ Form::model($exchange, ['route'=>['exchange.destroy',$exchange->id], 'method'=>'DELETE', 'role'=>'form', 'class'=>'delete']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($exchange, ['route'=>['exchange.update', $exchange->id], 'method'=>'PUT', 'role'=>'form', 'class'=>'form-horizontal']) }}
			{{ Form::hidden('id') }}
		@else
			<h1>Registrar Tipo de Cambio</h1>			
			{{ Form::open(['route'=>'exchange.store', 'method'=>'POST','role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
			{{ Field::text('sales') }}
			{{ Field::text('purchase') }}
			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}

		</div>
	</div>
</div>

@stop