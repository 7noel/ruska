@extends('layoutlogin')

@section('content')

<div class="container">
	{{ Form::open(['route'=>'login', 'method'=>'POST', 'role'=>'form', 'class'=>'form-signin']) }}
		@if (Session::has('login_error'))
			<span class='alert alert-danger'>Credenciales no validas</span>
		@endif
        <h2 class="form-signin-heading">Ruska y Asociados</h2>
		{{ Form::input('text','username',null,['class'=>'form-control', 'placeholder'=>'usuario', 'autofocus'=>'autofocus']) }}
		{{ Form::password('password',['class'=>'form-control','placeholder'=>'contraseña']) }}
		<div class="checkbox">
          <label>
          	{{ Form::checkbox('remember') }} Recordárme
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button>
	{{ Form::close() }}

</div>

@stop