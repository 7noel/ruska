@extends('layoutadmin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
		@if(Request::is('usuarios/actualizar/*'))
			<h1>Editar Asesor Financiero</h1>
			{{ Form::model($user, ['route'=>['users_delete', $user->id], 'method'=>'GET', 'role'=>'form', 'class'=>'delete', 'novalidate']) }}
			{{ Form::submit('Eliminar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
			{{ Form::model($user, ['route'=>'users_update', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal', 'novalidate']) }}
			{{ Form::hidden('id') }}
		@else
			<h1>Registrar Asesor Financiero</h1>			
			{{ Form::open(['route'=>'users_register', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal']) }}
		@endif
			{{ Field::text('username') }}
			{{ Field::password('password') }}
			{{ Field::password('password_confirmation')}}
			{{ Field::email('email') }}
			{{ Field::text('first_name') }}
			{{ Field::text('last_name') }}
			{{ Field::select('branch_id',$branches) }}
			{{ Field::checkbox('is_staff') }}
			{{ Field::checkbox('is_superuser') }}
			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}
		</div>
	</div>

</div> <!-- /container -->

@stop