@extends('app.app')

@section('conteudo')
<div class="container">
	<div class="coisa5">&nbsp;</div>
	<div class="row">
		@if ($noticia->f_ou_v == 0) 
				<div class="offset-md-2 col-md-8 offset-md-2 text-center bloco-noticia">
					<img src="{{asset('/storage/noticia/'.$noticia->endereco)}}" class="tamanho-img-noticia"><br>
					<div class="texto-acoes">
						Autor: @foreach ($autores as $autor)
							@if ($autor->id == $noticia->autor)
								{{$autor->nome}}
							@endif
						@endforeach | Criado: {{$noticia->created_at->diffForHumans()}}
						<br>
						<a href="/noticias/view_pasta/{{$noticia->pasta}}" class="texto-acoes">
							<i class="far fa-folder-open"></i>@foreach ($pastas as $pasta)
								@if ($pasta->id == $noticia->pasta)
									{{$pasta->descricao}}
								@endif
							@endforeach
						</a>
					</div>
					<div class="texto-noticia">
						<p>
							{!!nl2br(e($noticia->texto_noticia))!!}
						</p>
					</div>
					<hr>
				</div>

			@elseif ($noticia->f_ou_v == 1) {{-- Significa vídeo --}}.
				<div class="offset-md-2 col-md-8 offset-md-2 text-center bloco-noticia">
					<iframe class='video-visualiza' height='500px'' src='https://www.youtube.com/embed/{{str_after($noticia->endereco, 'https://www.youtube.com/watch?v=')}}' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe><br>
					<div class="texto-acoes">
						Autor: @foreach ($autores as $autor)
							@if ($autor->id == $noticia->autor)
								{{$autor->nome}}
							@endif
						@endforeach | Criado: {{$noticia->created_at->diffForHumans()}}
						<br>
						<a href="/noticias/{{$noticia->pasta}}" class="texto-acoes">
							<i class="far fa-folder-open"></i>@foreach ($pastas as $pasta)
								@if ($pasta->id == $noticia->pasta)
									{{$pasta->descricao}}
								@endif
							@endforeach
						</a>
					</div>
					<div class="texto-noticia">
						<p>
							{!!nl2br(e($noticia->texto_noticia))!!}
						</p>
					</div>
					<hr>
				</div>
			@elseif ($noticia->f_ou_v == 2) {{-- Significa vídeo --}}.
				<div class="offset-md-2 col-md-8 offset-md-2 text-center bloco-noticia">
					<div class="texto-acoes">
						Autor: @foreach ($autores as $autor)
							@if ($autor->id == $noticia->autor)
								{{$autor->nome}}
							@endif
						@endforeach | Criado: {{$noticia->created_at->diffForHumans()}}
						<br>
						<a href="/noticias/view_pasta/{{$noticia->pasta}}" class="texto-acoes">
							<i class="far fa-folder-open"></i>@foreach ($pastas as $pasta)
								@if ($pasta->id == $noticia->pasta)
									{{$pasta->descricao}}
								@endif
							@endforeach
						</a>
					</div>
					<div class="texto-noticia">
						<p>
							{!!nl2br(e($noticia->texto_noticia))!!}
						</p>
					</div>
				</div>
			@endif
	</div>
	<form method="post" action="{{action('ComentarioController@store')}}">
	{{ csrf_field() }}
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<p>Comentar:</p>
		</div>
		<div class="offset-md-2 col-md-8" align="center">
			@include('inc.errors')
		</div>
		<div class="offset-md-2 col-md-8">
			Nota: Seu comentário não aparecerá até que um moderador o avalie. E, não se preocupe, seu e-mail é secreto.
			<br>
			<br>
		</div>
		<div class="offset-md-2 col-md-4 form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" class="form-control" id="nome" placeholder="Entre aqui o seu nome." @if (old('nome') != null)
				value = "{{old('nome')}}"
			@endif>
		</div>
		<div class="form-group col-md-4 ">
			<label for="email">Email</label>
			<input type="text" name="email" class="form-control" id="email" placeholder="seu.email@provedor.com" @if (old('email') != null)
				value = "{{old('email')}}"
			@endif>
		</div>
		<div class="offset-md-2 col-md-8">
			<label for="comentario">Comentário</label>
			<textarea id="comentario" name="comentário" placeholder="Coloque aqui o seu comentario." class="form-control" rows="4" style="resize: none;">@if (old('comentario') != null)
				{{old('comentario')}}
			@endif</textarea>
			<br>
		</div>
		<div class="offset-md-2 col-md-8" align="right">
			<input type="hidden" name="id_postagem" value="{{$noticia->id}}">
			<button class="btn btn-lg botao" type="submit">Enviar comentário</button>
		</div>
	</div>
	</form>
	<div class="row" align="center">
		@if (count($comentarios) == 0)
			<p>Este artigo ainda não possui comentários feitos. ={ Seja o primeiro a comentar.</p>
		@endif
		@foreach ($comentarios as $comentario)
			<div class="offset-md-2 col-md-8" align="left">
				<b>Autor: </b>{{$comentario->autor}}<br>
				<b>Comentário: </b><br>
				{{$comentario->comentario}}
				<br>
				<br>
			</div>
			
		@endforeach
		<br>
	</div>

</div>
<br>
<br>
@endsection