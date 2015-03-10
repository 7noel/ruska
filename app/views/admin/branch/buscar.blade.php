@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>plop</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Departamento</th>
            <th>Provincia</th>
            <th>Distrito</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($branches as $branch)
            <tr>
                <td>{{ $branch->id}}</td>
                <td>{{ $branch->name }}</td>
                <td>{{ $branch->ubigeo->departamento }}</td>
                <td>{{ $branch->ubigeo->provincia }}</td>
                <td>{{ $branch->ubigeo->distrito }}</td>
                <td width="50">
                    <a href="" class="btn btn-default">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop