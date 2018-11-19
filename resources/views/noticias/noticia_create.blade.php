@extends('app.app_interno')

@section('conteudo')
<div class="container-fluid">
	<div class="coisa5">&nbsp;</div>
	<form @if(isset($edit)) 
			action="{{action('NoticiaController@update', $noticia->id)}}" 
		@elseif(isset($exclude)) 
			action="{{action('NoticiaController@destroy', $noticia->id)}}" 
		@else 
			action="{{ route('noticias.store') }}" 
		@endif method="post" enctype="multipart/form-data">
		@if(isset($edit))
			{{ method_field('PATCH') }}
		@elseif(isset($exclude))
			{{ method_field('DELETE') }}
		@endif
		{{ csrf_field() }}
	<div class="row">
		<div class="col-md-12">
			@if(isset($edit))
				<p class="titulo-noticia">Alterando notícia</p>
			@elseif(isset($exclude))
				<p class="titulo-noticia">Tem certeza de que quer excluir esta notícia do blog?</p>
			@else
				<p class="titulo-noticia">Inserir nova notícia no Blog</p>
			@endif
		</div>
	</div>
	@include('/inc.errors')
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="título">Título da Notícia</label> 
				<input type="text" name="título" id="título" @if(isset($edit) || isset($exclude))
						value="{{$noticia->titulo}}"
					@else
						placeholder="Título da notícia..."
					@endif 
					@if(isset($exclude))
						readonly=""
					@endif class="form-control"/>
			</div>
			<div class="form-group">
				<label for="texto_da_notícia">Texto da Notícia</label> 
				<textarea name="texto_da_notícia" id="texto_da_notícia" @if(!isset($edit) || !isset($exclude))
						placeholder="Corpo do texto da notícia..."
					@endif class="form-control text-area-noresize" rows="10" @if(isset($exclude))
						readonly=""
					@endif>@if(isset($edit) || isset($exclude)){{$noticia->texto_noticia}}@endif</textarea>
			</div>
			<div class="form-group">
				<label for="autor">Autor</label> 
				<select name="autor" id="autor" class="form-control" @if(isset($exclude))
						readonly=""
					@endif>
					@if(!isset($edit) && !isset($exclude))
						@foreach ($autores as $autor)
							<option value="{{$autor->id}}">{{$autor->nome}}</option>
						@endforeach
					@else
						@foreach ($autores as $autor)
							@if ($autor->id == $noticia->autor)
								<option value="{{$autor->id}}" selected>{{$autor->nome}}</option>
							@else
								<option value="{{$autor->id}}">{{$autor->nome}}</option>
							@endif
						@endforeach
					@endif
				</select>
			</div>
			<div class="form-group">
				<label for="pasta">Pasta</label> 
				<select name="pasta" id="pasta" class="form-control" @if(isset($exclude))
						readonly=""
					@endif>
					@if(!isset($edit) && !isset($exclude))
						@foreach ($pastas as $pasta)
							<option value="{{$pasta->id}}">{{$pasta->descricao}}</option>
						@endforeach
					@else
						@foreach ($pastas as $pasta)
							@if ($noticia->pasta == $pasta->id)
								<option value="{{$pasta->id}}" selected>{{$pasta->descricao}}</option>
							@else
								<option value="{{$pasta->id}}">{{$pasta->descricao}}</option>
							@endif
						@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="foto_ou_vídeo">Foto ou Vídeo?</label> <br>
				<div class="form-check form-check-inline">
					<input class="from-check-input" type="radio" onClick="abrirFoto();" name="foto_ou_vídeo" id="foto_ou_vídeo1" value="0" @if(isset($edit))
						@if ($noticia->f_ou_v == 0)
							checked="true"
						@endif
					@elseif(isset($exclude))
						@if ($noticia->f_ou_v == 0)
							checked="true"
						@endif
					@endif @if(isset($exclude))
						disabled=""
					@endif>
					<label class="form-check-label" for="foto_ou_vídeo1" onClick="abrirFoto();">&nbsp;Foto</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="from-check-input" type="radio" onClick="abrirVideo();" name="foto_ou_vídeo" id="foto_ou_vídeo2" value="1" @if( (isset($edit) || isset($exclude)) && $noticia->f_ou_v == 1)
						checked="true"
					@endif
					@if( isset($exclude) && $noticia->f_ou_v == 1)
						checked="true"
					@endif onClick="abrirVideo();" @if(isset($exclude))
						disabled=""
					@endif>
					<label class="form-check-label" for="foto_ou_vídeo2" >&nbsp;Vídeo</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="from-check-input" type="radio" name="foto_ou_vídeo" id="foto_ou_vídeo3" value="2" @if( isset($edit) && $noticia->f_ou_v == 2)
						checked="true" 
					@endif
					@if( isset($exclude) && $noticia->f_ou_v == 2)
						checked="true" 
					@endif @if(!isset($edit) && !isset($exclude)) checked="true" @endif onClick="nenhuma();" @if(isset($exclude))
						disabled=""
					@endif>
					<label class="form-check-label" for="foto_ou_vídeo3" >&nbsp;Nenhuma</label>
				</div>
			</div>
			<div class="form-group @if (!isset($exclude)) @if(!isset($edit) || $noticia->f_ou_v == 2) nao-mostrar @endif @if(isset($edit) && $noticia->f_ou_v == 0)nao-mostrar @endif @else
				@endif" id="video">
				@if (!isset($exclude))
					<label for="endereço">Endereço do Vídeo no Youtube</label> 
					<input type="text" name="endereço" id="endereco" placeholder="Endereço do vídeo" class="form-control" onBlur="carregaVideo();" @if(isset($edit))
							value="{{$noticia->endereco}}"
						@else
							placeholder="https://www.youtube.com/watch?v=inQ69WPY3Ls"
						@endif/>
				@endif
				<div id="source">
					@if(isset($edit))
						<iframe class='video' height='500px'' src='https://www.youtube.com/embed/{{str_after($noticia->endereco, 'https://www.youtube.com/watch?v=')}}' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
					@endif
					@if(isset($exclude) && $noticia->f_ou_v == 1)
						<iframe class='video' height='500px'' src='https://www.youtube.com/embed/{{str_after($noticia->endereco, 'https://www.youtube.com/watch?v=')}}' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
					@endif
				</div>
			</div>
			<div class="form-group
				@if (!isset($exclude)) 
					@if(!isset($edit) || $noticia->f_ou_v == 2) 
						nao-mostrar 
					@endif 
					@if(isset($edit) && $noticia->f_ou_v == 1) 
						nao-mostrar 
					@endif
				@endif" id="foto">
				@if (!isset($exclude))
					<label>Upload da Foto</label>
					<br> 
					<button type="button" role="button" class="btn botao-nav" onClick="trocaFoto();">Exclui</button>&nbsp;
					<input type="file" name="file" id="file" class="inputfile margin-left-10-non-sm" onChange="readURL(this);" value=""/>
					<label for="file" class="btn botao-nav">@if(isset($edit)) Editar @else Inserir @endif</label>
					<img src="@if(isset($edit) && $noticia->f_ou_v != 2 && $noticia->f_ou_v != 1){{asset('/storage/noticia/'.$noticia->endereco)}}@endif" id="imagem-source" class="foto-louca"/> 
				@else
					<img src="@if(isset($exclude) && $noticia->f_ou_v == 0){{asset('/storage/noticia/'.$noticia->endereco)}}@endif" id="imagem-source" class="foto-louca"/> 
				@endif		
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center botoes-noticia">
			@if(!isset($edit) && !isset($exclude))
				<button type="button" class="btn btn-active" role="button" onClick="clearForm();">Cancelar adição de notícia</button>&nbsp;&nbsp;
			@else
				@if (isset($edit))
					<a href="/noticias" class="btn btn-active" role="button">Cancelar edição desta notícia</a>
				@elseif(isset($exclude))
					<a href="/noticias" class="btn btn-active" role="button">Cancelar exclusão desta notícia</a>
				@endif
			@endif
			<button type="submit" class="btn botao-nav" role="submit">@if(!isset($edit) && !isset($exclude))Adicionar notícia @else @if (isset($edit))
				Editar notícia
			@elseif(isset($exclude))
				Excluir notícia
			@endif @endif</button>
		</div>
	</div>
	</form>	
</div>
	<script type="text/javascript">
		function nenhuma(){
			if(!$('#video').hasClass('nao-mostrar')){$('#video').addClass('nao-mostrar');}
			if(!$('#foto').hasClass('nao-mostrar')){$('#foto').addClass('nao-mostrar');}
			$('#endereco').attr('value', "");
			$('#source').html("");
			$('#file').attr('value', "");
			$('#imagem-source').attr('src', "");
		}
		function abrirVideo(){
			$('#video').removeClass('nao-mostrar');
			$('#foto').addClass('nao-mostrar');
			$('#file').attr('value', "");
			$('#imagem-source').attr('src', "");
		}
		function abrirFoto(){
			$('#video').addClass('nao-mostrar');
			$('#foto').removeClass('nao-mostrar');
			$('#endereco').attr('value', "");
			$('#source').html("");
		}
		
		function carregaVideo(){
			var endereco = $('#endereco');
			var code = endereco.val().substring(endereco.val().indexOf("=") + 1);
			$('#source').html("<iframe class='video' height='500px'' src='https://www.youtube.com/embed/"+ code +"' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>");
		}
		function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#imagem-source')
	                    .attr('src', e.target.result);
	               // $('#file').attr('value', e.target.result);
	            };
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    function trocaFoto(){
			$('#imagem-source').attr('src', '');
			$('#file').attr('value', "");
		}
		function clearForm(){
			document.getElementById("form").reset();
		}
	</script>
@endsection