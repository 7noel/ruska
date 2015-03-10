@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Tipos de Uso</h1>
    <div>
        {{ Form::open(['route'=>'use_types', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('use_types_new') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($usos as $uso)
            <tr>
                <td>
                    <a href="{{ route('use_types_read', [$uso->id]) }}" >
                        {{ $uso->name }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop
