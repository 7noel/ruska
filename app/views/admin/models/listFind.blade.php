@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Modelos de Vehículos</h1>
    <div>
        {{ Form::open(['route'=>'models', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('models_new') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Tipo de Vehículo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
            <tr>
                <td>
                    <a href="{{ route('models_read', [$model->id]) }}" >
                        {{ $model->name }}
                    </a>
                </td>
                <td>{{ $model->brand->name }}</td>
                <td>{{ $model->vehicle_type->name }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop
