@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Agencias</h1>
    <div>
        {{ Form::open(['route'=>'branches', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('branches_new') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Entidad</th>
            <th>Administrador</th>
            <th>Departamento Provincia Distrito</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($branches as $branch)
            <tr>
                <td>
                    <a href="{{ route('branches_read', [$branch->id]) }}" >
                        {{ $branch->name }}
                    </a>
                </td>
                <td>{{ $branch->entity->name }}</td>
                <td>{{ $branch->administrator }}</td>
                <td>{{ $branch->ubigeo->departamento." ".$branch->ubigeo->provincia." ".$branch->ubigeo->distrito }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop