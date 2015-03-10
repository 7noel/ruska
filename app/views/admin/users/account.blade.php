@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Cambia tu contraseña</h1>
			{{ Form::model($user, ['route'=>'update_account', 'method'=>'POST', 'role'=>'form']) }}
			{{ Form::label('username','USUARIO: '.$user->username) }}
			<br>
			{{ Form::label('fullname','NOMBRE COMPLETO: '.$user->first_name.' '.$user->last_name) }}
			<br>
			{{ Form::label('email','CORREO: '.$user->email) }}
			<br>
			{{ Form::label('branch','AGENCIA: '.$branches[$user->branch_id]) }}
			@if($user->is_staff)
			<br>
			{{ Form::label('staff','ES EMPLEADO') }}
			@endif
			@if($user->is_superuser)
			<br>
			{{ Form::label('superuser','ES SUPERUSUARIO') }}
			@endif
			{{ Field::password('password') }}
			{{ Field::password('password_confirmation')}}

			{{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
			{{ Form::close() }}
		</div>
	</div>

</div> <!-- /container -->

@stop