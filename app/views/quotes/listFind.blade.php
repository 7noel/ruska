@extends('layout')

@section('content')

<div class="container">
    <h1>Cotizaciones</h1>
    <div>
        {{ Form::open(['route'=>'quotes', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Por nombre, dni, ruc', 'autofocus' => 'autofocus','required'=>'required'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('quotes_new') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Cliente</th>
            <th>DNI/RUC</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($quotes as $quote)
            <tr>
                <td>{{ $quote->id }} </td>
                <td>{{ $quote->customer }} </td>
                <td>{{ $quote->dni }} </td>
                <td>{{ $quote->model->brand->name }} </td>
                <td>{{ $quote->model->name }} </td>
                <td width="50">
                    @if($quote->is_confirmed)
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    @else
                    <a href="#" class="btn btn-success btn-validate" data-id="{{ $quote->id }}">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Validar
                    </a>
                    @endif
                </td>
                <td width="50">
                    <a href="{{ route('quotepdf',$quote->id) }}" target='_blank' class="btn btn-success">
                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span> PDF
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            {{ Form::open(['route'=>['validacotizacion', 'QUOTE_ID'], 'method'=>'POST', 'role'=>'form', 'id'=>'form-validate']) }}
            {{ Form::close() }}
</div> <!-- /container -->

@stop