@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Asesores</h1>
    <div>
        {{ Form::open(['route'=>'users', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
   <div>
        <a href="{{ route('users_new') }}" class="btn btn-success delete">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>email</th>
            <th>Agencia</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    <a href="{{ route('users_read', [$user->id]) }}" >
                        {{ $user->first_name }}
                    </a>
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->branch->name }}</td>
                <td width="50">
                    <a href="{{ route('reset_password', [$user->id]) }}" class="btn btn-default">Reset password</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop