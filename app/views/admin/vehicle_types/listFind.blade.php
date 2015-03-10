@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Tipos de Vehículo</h1>
    <div>
        {{ Form::open(['route'=>'vehicle_types', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('vehicle_types_new') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($vehicle_types as $vehicle_type)
            <tr>
                <td>
                    <a href="{{ route('vehicle_types_read', [$vehicle_type->id]) }}" >
                        {{ $vehicle_type->name }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop
