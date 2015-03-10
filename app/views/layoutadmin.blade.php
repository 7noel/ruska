<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Ruska y Asociados</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ asset('/') }}">RUSKA Y ASOCIADOS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="#">Cotizaciones</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ asset('entidades') }}">Entidades Financieras</a></li>
                        <li><a href="{{ asset('agencias') }}">Agencias</a></li>
                        <li><a href="{{ asset('usuarios') }}">Asesores</a></li>
                        <li><a href="{{ asset('exchange') }}">Tipo de Cambio</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Vehículos <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ asset('tiposvehiculo') }}">Tipos de Vehículo</a></li>
                        <li><a href="{{ asset('marcas') }}">Marcas</a></li>
                        <li><a href="{{ asset('modelos') }}">Modelos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tasas <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ asset('usos') }}">Tipos de Uso</a></li>
                        <li><a href="{{ asset('categoriaseguro') }}">Categoría de Seguro</a></li>
                        <li><a href="{{ asset('tasas') }}">Tasas</a></li>
                    </ul>
                </li>
            </ul>
        @if (Auth::check())
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="icon icon-wh i-profile"></span> {{ Auth::user()->first_name }}  <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('account') }}">Cambiar Contraseña</a></li>
                        <li><a href="{{ route('logout') }}">Salir</a></li>
                    </ul>
                </li>
            </ul>
        @else
            <ul class="nav navbar-nav navbar-right">
                <li class="logeado"><button type="submit" class="btn btn-success">Sign out</button></li>
            </ul>
        @endif
        </div><!--/.nav-collapse -->
    </div>
</nav>

@yield('content')



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/general.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/admin/admin.js') }}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script language="JavaScript" type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>