@extends('app.app_interno')

@section('conteudo')
	<div class="container-fluid">
		<div class="coisa5">&nbsp;</div>
		<div class="row">
			<div class="offset-md-2 col-md-8 offset-md-2" align="center">
				<p class="titulo-page">{{$noticia->titulo}}</p><hr>
			</div>
		</div>
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
						</a> | <a href="/noticias/{{$noticia->id}}/edit" class="texto-acoes"><i class="fas fa-pen"></i> Editar</a> | <a href="/noticias/{{$noticia->id}}" class="texto-acoes"><i class="fas fa-trash-alt"></i> Excluir</a>
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
						</a> | <a href="/noticias/{{$noticia->id}}/edit" class="texto-acoes"><i class="fas fa-pen"></i> Editar</a> | <a href="/noticias/{{$noticia->id}}" class="texto-acoes"><i class="fas fa-trash-alt"></i> Excluir</a>
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
						</a> | <a href="/noticias/{{$noticia->id}}/edit" class="texto-acoes"><i class="fas fa-pen"></i> Editar</a> | <a href="/noticias/{{$noticia->id}}" class="texto-acoes"><i class="fas fa-trash-alt"></i> Excluir</a>
					</div>
					<div class="texto-noticia">
						<p>
							{!!nl2br(e($noticia->texto_noticia))!!}
						</p>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection