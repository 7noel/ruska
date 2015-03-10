@extends('layoutadmin')

@section('content')

<div class="container">
    <h1>{{ $branches[0]->entity->name }}</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($branches as $branch)
            <tr>
                <td>{{ $branch->id}}</td>
                <td>{{ $branch->name }}</td>
                <td width=20>
                    <a href="" class="btn btn-default">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </a>
                </td>
                <td width="50">
                    <a href="" class="btn btn-info">
                        Agencias
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- /container -->

@stop