@extends('app.app')

@section('conteudo')
<div class="container">
	<div class="coisa5">&nbsp;</div>
	<div class="row">
	<div class="col-md-8">
		@foreach ($noticias as $noticia)
				@if ($noticia->f_ou_v == 0) 
					<div class="offset-md-1 col-md-10 offset-md-1 text-center bloco-noticia">
						<img src="{{asset('/storage/noticia/'.$noticia->endereco)}}" class="tamanho-img-noticia"><br>
						<div>
							<a href="/blog/noticia/{{$noticia->id}}" class="titulo-noticia" style="float:left;">{{$noticia->conteudo_titulo_resumido}}</a>
						</div>
						<br>
						<br>
						<br>
						<div class="texto-acoes">
							Autor: @foreach ($autores as $autor)
								@if ($autor->id == $noticia->autor)
									{{$autor->nome}}
								@endif
							@endforeach | Criado: {{$noticia->created_at->diffForHumans()}}
							<br>
							@php
								$comments = 0;
							@endphp
							@foreach ($comentarios as $comentario)
							 	@if ($comentario->id_postagem == $noticia->id)
							 		@php
							 			$comments++;
							 		@endphp
							 	@endif
							 @endforeach {{$comments}} comentários |
							@foreach ($pastas as $pasta)
								@if ($pasta->id == $noticia->pasta)
									<a href="/blog/pasta/{{$pasta->id}}" class="texto-acoes"><i class="far fa-folder-open"></i>&nbsp;{{$pasta->descricao}}</a> 
								@endif
							@endforeach
						</div>
						<div class="texto-noticia">
							<p>
								{{$noticia->conteudo_resumido}}	
							</p>
						</div>
						<div class="leia-mais">
							<p>
								<a href="/blog/noticia/{{$noticia->id}}" class="texto-acoes">Continue Lendo...</a>
							</p>
						</div>
						<hr>
					</div>

				@elseif($noticia->f_ou_v == 1) {{-- Significa vídeo --}}.
					<div class="offset-md-1 col-md-10 offset-md-1 text-center bloco-noticia">
						<img src="https://img.youtube.com/vi/{{str_after($noticia->endereco, 'https://www.youtube.com/watch?v=')}}/maxresdefault.jpg" class="tamanho-img-noticia"><br>
						<div>
							<a href="/blog/noticia/{{$noticia->id}}" class="titulo-noticia" style="float:left;">{{$noticia->conteudo_titulo_resumido}}</a>
						</div>
						<div class="texto-acoes">
							<br>
							<br>
							<br>
							Autor: @foreach ($autores as $autor)
								@if ($autor->id == $noticia->autor)
									{{$autor->nome}}
								@endif
							@endforeach | Criado: {{$noticia->created_at->diffForHumans()}}
							<br>
							@php
								$comments = 0;
							@endphp
							@foreach ($comentarios as $comentario)
							 	@if ($comentario->id_postagem == $noticia->id)
							 		@php
							 			$comments++;
							 		@endphp
							 	@endif
							 @endforeach {{$comments}} comentários |
							@foreach ($pastas as $pasta)
								@if ($pasta->id == $noticia->pasta)
									<a href="/blog/pasta/{{$pasta->id}}" class="texto-acoes"><i class="far fa-folder-open"></i>&nbsp;{{$pasta->descricao}}</a> 
								@endif
							@endforeach
						</div>
						<div class="texto-noticia">
							<p>
								{{$noticia->conteudo_resumido}}	
							</p>
						</div>
						<div class="leia-mais">
							<p>
								<a href="/blog/noticia/{{$noticia->id}}" class="texto-acoes">Continue Lendo...</a>
							</p>
						</div>
						<hr>
					</div>
				@elseif($noticia->f_ou_v == 2)
					<div class="offset-md-1 col-md-10 offset-md-1 text-center bloco-noticia">
						<div>
							<a href="/noticias/{{$noticia->id}}" class="titulo-noticia" style="float:left;">{{$noticia->conteudo_titulo_resumido}}</a>
						</div>
						<div class="texto-acoes">
							Autor: @foreach ($autores as $autor)
								@if ($autor->id == $noticia->autor)
									{{$autor->nome}}
								@endif
							@endforeach | Criado: {{$noticia->created_at->diffForHumans()}}
							<br>
							@php
								$comments = 0;
							@endphp
							@foreach ($comentarios as $comentario)
							 	@if ($comentario->id_postagem == $noticia->id)
							 		@php
							 			$comments++;
							 		@endphp
							 	@endif
							 @endforeach {{$comments}} comentários |
							@foreach ($pastas as $pasta)
								@if ($pasta->id == $noticia->pasta)
									<a href="/blog/pasta/{{$pasta->id}}" class="texto-acoes"><i class="far fa-folder-open"></i>&nbsp;{{$pasta->descricao}}</a> 
								@endif
							@endforeach
						</div>
						<div class="texto-noticia">
							<p>
								{{$noticia->conteudo_resumido}}	
							</p>
						</div>
						<div class="leia-mais">
							<p>
								<a href="/blog/noticia/{{$noticia->id}}" class="texto-acoes">Continue Lendo...</a>
							</p>
						</div>
						<hr>
					</div>
				@endif
			@endforeach
			<div class="row pagination">
			<div class="col-md-12 pagination-block">
				Mais notícias:<br><br>{{$noticias->links()}}<br><br>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<br>
		<br>
		<p>Pastas</p>
		@foreach ($pastas as $pasta)
			<p><i class="far fa-folder-open"></i> <a href="/blog/pasta/{{$pasta->id}}">{{$pasta->descricao}}</a></p>
		@endforeach
	</div>
	</div>
</div>
@endsection