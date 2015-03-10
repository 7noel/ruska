@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Marcas</h1>
    <div>
        {{ Form::open(['route'=>'brands', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('brands_new') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
                <td>
                    <a href="{{ route('brands_read', [$brand->id]) }}" >
                        {{ $brand->name }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop
