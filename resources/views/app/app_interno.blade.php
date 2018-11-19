<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cidade Florestal</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
	<!-- CSS -->
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<!-- FONTE RALEWAY -->
	<link rel="stylesheet" type="text/css" href="hhtp://fonts.googleapis.com/css?family=Raleway:100" />
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="{{asset("font/css/all.css")}}">
	<!-- FAVICON -->  
	<link rel="shortcut icon" href="{{asset('images/Favicon.ico')}}" type="image/x-icon" />
  </head>
  <body>

  	@include('app.cabecalho_sistema_interno')

  	<div class="container-fluid">
  		
  		@yield('conteudo')
  		@include('app.rodape')
  	</div>

  </body>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.js')}}"></script>
	  
	<!-- Script de acionamento do contador -->
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>

</html>
