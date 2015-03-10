@extends('layout')

@section('content')

<div class="container">
    <h1>Cotizaciones</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Asesor</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Caja de Lima</td>
            <td>01/02/2015</td>
            <td>Cliente 1</td>
            <td>Asesorrrrrrrr</td>
            <td width="50">
                <a href="" class="btn btn-default">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                </a>
            </td>
        </tr>
        </tbody>
    </table>

</div> <!-- /container -->

@stop