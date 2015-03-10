@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Tipo de Cambio</h1>
    <div>
        {{ Form::open(['route'=>'exchange.index', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('exchange.create') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Venta</th>
            <th>Compra</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($exchanges as $exchange)
            <tr>
                <td>
                    <a href="{{ route('exchange.edit', $exchange->id) }}" >
                        {{ date("d-m-Y", strtotime($exchange->created_at)) }}
                    </a>
                </td>
                <td>{{ $exchange->sales }} </td>
                <td>{{ $exchange->purchase }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop
