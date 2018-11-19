@extends('app.app_interno')

@section('conteudo')
<div class="container" align="center">
	<div class="coisa5">&nbsp;</div>
	<div class="row">
		<div class="col-md-12">
			<p class="titulo-categorias">Gerência de Comentários</p>
			<br>
		</div>
	</div>
	<div class="row show-md-hide-sm">
		<div class="col-md-1" align="center">
			<p>ID</p>
		</div>
		<div class="col-md-3" align="center">
			<p>Autor</p>
		</div>
		<div class="col-md-4" align="center">
			<p>Comentário</p>
		</div>
		<div class="col-md-3" align="center">
			<p>Notícia</p>
		</div>
		<div class="col-md-1" align="center">
			<p>Ações</p>
		</div>
	</div>
		@php
			$contador = 0;
		@endphp
		@if (count($comentarios) == 0)
			<div class="col-md-12" align="center">
				<br>
				<br>
				<p>Não existem comentários a serem exibidos. =D</p>
				<br>
				<br>
				<br>
				<br>
			</div>
		@else
		@foreach ($comentarios as $comentario)
			<div class="row @if ($contador%2==0)
				linha-escura
			@else
				linha-clara
			@endif menor-categorias">
			<div class="col-md-1" align="left">
					<b>ID:</b> {{$comentario->id}}
				</div>
				<div class="col-md-3">
					<b>Autor:</b> {{$comentario->autor}}
				</div>
				<div class="col-md-4">
					<b>Comentário: </b>{{$comentario->comentario}}
				</div>
				@foreach ($noticias as $noticia)
					@if ($noticia->id == $comentario->id_postagem)
						<div class="col-md-3">
							<b>Notícia: </b>{{$noticia->titulo}}
						</div>
					@endif
				@endforeach
				<div class="col-md-1" align="center">
					
					<form method="post" action="{{action('ComentarioController@update', $comentario->id)}}" id="sim{{$comentario->id}}">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<a href="#" onClick="document.getElementById('sim{{$comentario->id}}').submit()" ><i class="fas fa-check"></i> Sim</a>  <br class="show-md-hide-sm"> 
					</form>
					<form method="post" action="{{action('ComentarioController@destroy', $comentario->id)}}" id="nao{{$comentario->id}}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<a href="#" onClick="document.getElementById('nao{{$comentario->id}}').submit()"><i class="fas fa-times"></i> Não</a>
					</form>
				</div>
			</div>
			<div class="row @if ($contador%2==0)
				linha-escura
			@else
				linha-clara
			@endif">
				<div class="col-md-1" align="center">
					{{$comentario->id}}
				</div>
				<div class="col-md-3">
					{{$comentario->autor}}
				</div>
				<div class="col-md-4">
					{{$comentario->comentario}}
				</div>
				@foreach ($noticias as $noticia)
					@if ($noticia->id == $comentario->id_postagem)
						<div class="col-md-3">
							{{$noticia->titulo}}
						</div>
					@endif
				@endforeach
				<div class="col-md-1" align="center">
					
					<form method="post" action="{{action('ComentarioController@update', $comentario->id)}}" id="sim{{$comentario->id}}">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<a href="#" onClick="document.getElementById('sim{{$comentario->id}}').submit()" ><i class="fas fa-check"></i> Sim</a>  <br> 
					</form>
					<form method="post" action="{{action('ComentarioController@destroy', $comentario->id)}}" id="nao{{$comentario->id}}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<a href="#" onClick="document.getElementById('nao{{$comentario->id}}').submit()"><i class="fas fa-times"></i> Não</a>
					</form>
				</div>
			</div>
			@php
				$contador++;
			@endphp
		@endforeach
		@endif
		<br>
		<br>
</div>
@endsection