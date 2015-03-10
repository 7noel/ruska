@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Tasas</h1>
    <div>
        {{ Form::open(['route'=>'rates', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('rates_new') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Año</th>
            <th>Tipo de Uso</th>
            <th>Categoria de Seguro</th>
            <th>tasa</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($rates as $rate)
            <tr>
                <td>
                    <a href="{{ route('rates_read', [$rate->id]) }}" >
                        {{ $rate->year }}
                    </a>
                </td>
                <td>{{ $rate->insurance_category->use_type->name }}</td>
                <td>{{ $rate->insurance_category->name}}</td>
                <td>{{ $rate->rate }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop
