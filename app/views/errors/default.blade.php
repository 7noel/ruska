<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Ruska / Error {{ $code }} </title>
    
	<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
</head>


<div class="alert alert-danger">
    <h1><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Error <strong>{{ $code }}</strong></h1>
    <h2>{{ $message }}</h2>
</div>

</html>