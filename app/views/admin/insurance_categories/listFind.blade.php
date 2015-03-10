@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>Categorías de Seguro</h1>
    <div>
        {{ Form::open(['route'=>'insurance_categories', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline']) }}
        {{ Form::text('search',$search,['class'=>'form-control','placeholder'=>'Ingrese los criterios de busqueda', 'autofocus' => 'autofocus'])}}
        {{ Form::submit('Buscar', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
    <div>
        <a href="{{ route('insurance_categories_new') }}" class="btn btn-success">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Tipo de Uso</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($insurance_categories as $insurance_category)
            <tr>
                <td>
                    <a href="{{ route('insurance_categories_read', [$insurance_category->id]) }}" >
                        {{ $insurance_category->name }}
                    </a>
                </td>
                <td>{{ $insurance_category->alias }}</td>
                <td>{{ $insurance_category->use_type->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop
