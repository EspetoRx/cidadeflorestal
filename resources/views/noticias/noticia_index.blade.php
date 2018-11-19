@extends('app.app_interno')

@section('conteudo')
	<div class="container-fluid">
		<div class="coisa5">&nbsp;</div>
		<div class="row">
			<div class="offset-md-2 col-md-8 offset-md-2" align="center">
				@if (isset($pasta_vis))
					<p class="titulo-page">Vizualizar Notícias da pasta 
					@foreach($pastas as $pasta)
						@if ($pasta->id == $pasta_vis)
							{{$pasta->descricao}}
						@endif
					@endforeach
					</p><hr>
				@else
					<p class="titulo-page">Vizualizar Notícias</p><hr>
				@endif
			</div>
		</div>
		<div class="row">
			@foreach ($noticias as $noticia)
				@if ($noticia->f_ou_v == 0) 
					<div class="offset-md-2 col-md-8 offset-md-2 text-center bloco-noticia">
						<img src="{{asset('/storage/noticia/'.$noticia->endereco)}}" class="tamanho-img-noticia"><br>
						<div>
							<a href="/noticias/{{$noticia->id}}" class="titulo-noticia" style="float:left;">{{$noticia->conteudo_titulo_resumido}}</a>
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
							@foreach ($pastas as $pasta)
								@if ($pasta->id == $noticia->pasta)
									<a href="/noticias/view_pasta/{{$pasta->id}}" class="texto-acoes"><i class="far fa-folder-open"></i>&nbsp;{{$pasta->descricao}}</a> 
								@endif
							@endforeach
							 | <a href="/noticias/{{$noticia->id}}/edit" class="texto-acoes"><i class="fas fa-pen"></i> Editar</a> | <a href="/noticias/exclude_this/{{$noticia->id}}" class="texto-acoes"><i class="fas fa-trash-alt"></i> Excluir</a>
						</div>
						<div class="texto-noticia">
							<p>
								{{$noticia->conteudo_resumido}}	
							</p>
						</div>
						<div class="leia-mais">
							<p>
								<a href="/noticias/{{$noticia->id}}" class="texto-acoes">Continue Lendo...</a>
							</p>
						</div>
						<hr>
					</div>

				@elseif($noticia->f_ou_v == 1) {{-- Significa vídeo --}}.
					<div class="offset-md-2 col-md-8 offset-md-2 text-center bloco-noticia">
						<img src="https://img.youtube.com/vi/{{str_after($noticia->endereco, 'https://www.youtube.com/watch?v=')}}/maxresdefault.jpg" class="tamanho-img-noticia"><br>
						<div>
							<a href="/noticias/{{$noticia->id}}" class="titulo-noticia" style="float:left;">{{$noticia->conteudo_titulo_resumido}}</a>
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
							@foreach ($pastas as $pasta)
								@if ($pasta->id == $noticia->pasta)
									<a href="/noticias/view_pasta/{{$pasta->id}}" class="texto-acoes"><i class="far fa-folder-open"></i>&nbsp;{{$pasta->descricao}}</a> |
								@endif
							@endforeach
							 <a href="/noticias/{{$noticia->id}}/edit" class="texto-acoes"><i class="fas fa-pen"></i> Editar</a> | <a href="/noticias/exclude_this/{{$noticia->id}}" class="texto-acoes"><i class="fas fa-trash-alt"></i> Excluir</a>
						</div>
						<div class="texto-noticia">
							<p>
								{{$noticia->conteudo_resumido}}	
							</p>
						</div>
						<div class="leia-mais">
							<p>
								<a href="/noticias/{{$noticia->id}}" class="texto-acoes">Continue Lendo...</a>
							</p>
						</div>
						<hr>
					</div>
				@elseif($noticia->f_ou_v == 2)
					<div class="offset-md-2 col-md-8 offset-md-2 text-center bloco-noticia">
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
							@foreach ($pastas as $pasta)
								@if ($pasta->id == $noticia->pasta)
									<a href="/noticias/view_pasta/{{$pasta->id}}" class="texto-acoes"><i class="far fa-folder-open"></i>&nbsp;{{$pasta->descricao}}</a> 
								@endif
							@endforeach
							| <a href="/noticias/{{$noticia->id}}/edit" class="texto-acoes"><i class="fas fa-pen"></i> Editar</a> | <a href="/noticias/exclude_this/{{$noticia->id}}" class="texto-acoes"><i class="fas fa-trash-alt"></i> Excluir</a>
						</div>
						<div class="texto-noticia">
							<p>
								{{$noticia->conteudo_resumido}}	
							</p>
						</div>
						<div class="leia-mais">
							<p>
								<a href="/noticias/{{$noticia->id}}" class="texto-acoes">Continue Lendo...</a>
							</p>
						</div>
						<hr>
					</div>
				@endif
			@endforeach
		</div>
		<div class="row pagination">
			<div class="col-md-12 pagination-block">
				Mais notícias:<br><br>{{$noticias->links()}}<br><br>
			</div>
		</div>
	</div>
@endsection