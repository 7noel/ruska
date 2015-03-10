@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Entidades Financieras</h1>
    <div>
        {{ Form::open(['route'=>'entities', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('entities_new') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($entidades as $entidad)
            <tr>
                <td>
                    <a href="{{ route('entities_read', [$entidad->id]) }}" >
                        {{ $entidad->name }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop