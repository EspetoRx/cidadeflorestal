<!DOCTYPE html>
<html lang="pt-br">
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
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway:100" />
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="{{asset("font/css/all.css")}}">
	<!-- FAVICON -->  
	<link rel="shortcut icon" href="{{asset('images/Favicon.ico')}}" type="image/x-icon" />
  </head>
  <body>
	
      @include('app.cabecalho')
	  <div id="sec1" class="coisa section">
	  </div>
	  <div class="container-fluid">
		<div class="row anchor">
			<div class="col-md-12" align="center">
				<h1>Conheça nossa cidade</h1>
			</div>
			<div class="col-md-12" align="center">
				<h3>Veja como Florestal é linda e tudo que ela pode oferecer!</h3>
			</div>
			<div class="col-md-12" align="center">
				<iframe src="https://www.youtube.com/embed/cQmbhr4sY2A" frameborder="0" allow="autoplay; encrypted-media"></iframe>
			</div>
			<div class="col-md-12" align="center">
				<a href="#sec2" class="scrollSuave" id="indi"><i class="fa fa-angle-double-down scroll-button" aria-hidden="true" style="color: #A0D149; font-size: 60px;"></i></a>
			</div>
		</div>
		<div id="sec2" class="coisa2 section">
	    </div>
		<div class="row anchor">
			<div class="col-md-12" align="center">
				<h1>Nossos serviços</h1>
			</div>
			<div class="col-md-12" align="center" >
				<h3>Confira todos os nossos serviços!</h3>
			</div>
			<div class="col-md-3 mae" style="margin-top: 20px;" align="center">
				<div class="icone">
					<i class="fa fa-cart-plus"></i>
				</div>
				<h3 class="title-icone">PUBLICIDADE</h3>
				<br>
				<p>Aqui, você, comerciante ou profissional autônomo, pode oferecer seus produtos e serviços no guia comercial da cidade de Florestal.</p>
			</div>
			<div class="col-md-3 mae" style="margin-top: 20px;" align="center">
				<div class="icone">
					<i class="fas fa-sync-alt"></i>
				</div>
				<h3 class="title-icone">NOVIDADES & INFORMAÇÕES</h3>
				<br>
				<p>Fique por dentro do que está acontecendo na cidade de Florestal através do nosso blog.</p>
			</div>
			<div class="col-md-3 mae" style="margin-top: 20px;" align="center">
				<div class="icone">
					<i class="fab fa-whatsapp"></i>
				</div>
				<h3 class="title-icone">WHATSAPP</h3>
				<br>
				<p>Adicione Cidade Florestal em seu WhatsApp. Envie a palavra chave FLORESTAL para (31) 988 809 992 e participe das mais diversas promoções.</p>
			</div>
			<div class="col-md-3 mae" style="margin-top: 20px;" align="center">
				<div class="icone">
					<i class="fa fa-shopping-cart"></i>
				</div>
				<h3 class="title-icone">CRIAÇÃO DE SITE OU LOJA VIRTUAL</h3>
				<br>
				<p>Quer vender mais? Amplie sua carteira de clientes com um site ou loja online. Podemos construir para você!</p>
			</div>
			<div class="col-md-12" align="center">
				<a href="#sec3" class="scrollSuave" id="indi1"><i class="fa fa-angle-double-down scroll-button sb2" aria-hidden="true" style="color: #A0D149; font-size: 60px;"></i></a>
			</div>
		</div>
		<div id="sec3" class="coisa3 section">
	    </div>
		<div class="row anchor imagem">
			<div class="col-md-12" align="center">
				<p class="block-title">Dados & Metas alcançadas</p>
			</div>
			<div class="col-md-3" align="center">
				<div class="col-md-12">
					<p class="block-title b-t2 counter" data-counter-time="1000" data-counter-delay="0">7652</p>
				</div>
				<div class="col-md-12">
					<p class="block-desc">Cidadãos</p>
				</div>
			</div>
			<div class="col-md-3" align="center">
				<div class="col-md-12">
					<p class="block-title b-t2 counter" data-counter-time="1000" data-counter-delay="0">38</p>
				</div>
				<div class="col-md-12">
					<p class="block-desc">Empresas</p>
				</div>
			</div>
			<div class="col-md-3" align="center">
				<div class="col-md-12">
					<p class="block-title b-t2 counter" data-counter-time="1000" data-counter-delay="0">30</p>
				</div>
				<div class="col-md-12">
					<p class="block-desc">Colaboradores do site</p>
				</div>
			</div>
			<div class="col-md-3" align="center">
				<div class="col-md-12">
					<p class="block-title b-t2 counter" data-counter-time="1000" data-counter-delay="0">18</p>
				</div>
				<div class="col-md-12">
					<p class="block-desc">Parceiros</p>
				</div>
			</div>
			<div class="col-md-12 sb3"></div>
			<div class="col-md-12" align="center">
				<a href="#sec4" class="scrollSuave" id="indi2"><i class="fa fa-angle-double-down scroll-button sb4" aria-hidden="true" style="color: #A0D149; font-size: 60px;"></i></a>
			</div>
		</div>
		<div id="sec4" class="coisa4 section">
	    </div>
		<div class="row">
			<div class="col-md-12" align="center">
				<h1>Parceiros</h1>
			</div>
			<div class="col-md-12 botoes" align="center">
				<input type="checkbox" name="pc" value="0" id="pc0" style="display: none;" >
				<label for="pc0" class="btn btn-lg botao"><p class="p-btn">TODOS</p></label>
				@foreach ($categorias as $categoria)
					<input type="checkbox" name="pc" value="0" id="pc{{$categoria->id}}" style="display: none;">
					<label for="pc{{$categoria->id}}" class="btn btn-lg botao"><p class="p-btn">{{$categoria->descricao}}</p></label>
				@endforeach
			</div>
			<div class="row col-md-12" id="pc">
				@foreach ($parceiros as $parceiro)
					<div class="col-md-3 exib" align="center">
						<div class="parceiro">
							<br />
							<a href="/empresa/{{$parceiro->id}}"><img src="{{asset('storage/parceiros/'.$parceiro->foto)}}" class="foto-parceiro"/></a>
							<br />
							<br />
							<a href="/empresa/{{$parceiro->id}}" class="link_parceiro"><p>{{$parceiro->nome_fantasia}}</p></a>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col-md-offset-3 exib" align="center">
			</div>
			<div class="col-md-12" align="center">
				<a href="#sec5" class="scrollSuave" id="indi3"><i class="fa fa-angle-double-down scroll-button sb5" aria-hidden="true" style="color: #A0D149; font-size: 60px;"></i></a>
			</div>
		</div>
		<div id="sec5" class="coisa4 section">
	    </div>
	    <div class="row">
			<div class="col-md-12" align="center">
				<h1>Notícias</h1>
			</div>
			<div class="col-md-12" align="center">
				<h3>Veja nossas notícias e fique por dentro das últimas novidades em nossa cidade!</h3>
			</div>
			<div class="col-md-12">&nbsp;</div>
			<!--<div class="col-md-12" align="center">-->
				@foreach ($noticias as $noticia)
					<div class="col-md-6 exib" align="center">
						<div class="parceiro noticia">
							<br>
							@if ($noticia->f_ou_v == 0)
								<img src="{{asset('/storage/noticia/'.$noticia->endereco)}}" class="foto-parceiro"/>
							@elseif($noticia->f_ou_v == 1)
								<img src="https://img.youtube.com/vi/{{str_after($noticia->endereco, 'https://www.youtube.com/watch?v=')}}/maxresdefault.jpg" class="foto-parceiro">
							@endif
							<br>
							<h3 class="title-noticia"><a href="/blog/noticia/{{$noticia->id}}" class="link_parceiro">{{$noticia->conteudo_titulo_resumido}}</a></h3>
							<br>
							<p class="post-noticia">
								<i class="fas fa-user-alt"></i> Autor: 	@foreach ($autores as $autor)
											@if ($autor->id == $noticia->autor)
												{{$autor->nome}}
											@endif
									   	@endforeach
								| <i class="fas fa-calendar-alt"></i> Criado: {{$noticia->created_at->diffForHumans()}} |
								<i class="fas fa-comments"></i> 
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
							</p>
							<br>
							<p id="desc-noticia-1" class="desc-noticia">{{$noticia->conteudo_resumido}}</p>
							<a href="/blog/noticia/{{$noticia->id}}" class="link-noti">Continue Lendo...</a>
						</div>
					</div>
				@endforeach
			<!--</div>-->
			<div class="col-md-12" align="center">
				<br>
				<a href="/blog" class="btn btn-lg botao"><p class="p-btn">Veja mais notícias, acesse nosso blog! =D</p></a>
			</div>
			<div class="col-md-12" align="center">
				<a href="#sec6" class="scrollSuave" id="indi4"><i class="fa fa-angle-double-down scroll-button sb5" aria-hidden="true" style="color: #A0D149; font-size: 60px;"></i></a>
			</div>
	    </div>
		<div id="sec6" class="coisa4 section">
	    </div>
		<div class="row">
			<div class="col-md-12" align="center">
				<h1>Entre em contato conosco</h1>
			</div>
			<div class="col-md-12" align="center">
				<h3>Você pode nos encontrar das mais diferentes formas. Fique ligado!</h3>
			</div>
			<div class="col-md-12" style="margin-bottom: 20px;">&nbsp;</div>
			<div class="col-md-3" align="center">
				<p><i class="fa fa-phone icone-contato"></i><br><br>
				Telefone<br>
				+55 (31) 988 809 992</p>
			</div>
			<div class="col-md-3" align="center">
				<p><a href="mailto:contato@cidadeflorestal.com.br"><i class="fa fa-envelope icone-contato"></i></a><br><br>
				E-mail<br>
				contato@cidadeflorestal.com.br</p>
			</div>
			<div class="col-md-3" align="center">
				<p><a href="https://www.google.com/maps/place/Rua+Benedito+Valadares%2C+602%2C+Centro%2C+Florestal%2C+Minas+Gerais" target="_blank"><i class="fa fa-map-marker fa-fw icone-contato" ></i></a><br><br>
				Localização<br>
				R. Benedito Valadares, 602, Centro, Florestal.</p>
			</div>
			<div class="col-md-3" align="center" >
				<p>
					<a href="http://fb.com/cidadeflorestal" target="_blank"><i class="fab fa-facebook-f icone-contato"></i></i></a><br><br>
					fb.com/cidadeflorestal
				</p>
			</div>
			<div class="col-md-12">&nbsp;</div>
			<div class="col-md-6" id="mapa" align="center">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3751.87611998408!2d-44.43079548508614!3d-19.887452186627545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa720e7c9188b63%3A0x9d1484c77a4852b4!2sR.+Benedito+Valadares%2C+602%2C+Florestal+-+MG%2C+35690-000!5e0!3m2!1spt-BR!2sbr!4v1540085774334" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
			</div>
			<div class="col-md-6" align="center">
				<div id="contato" class="email-cont">
					<h3 class="title-cont">Envie-nos uma mensagem </h3><i class="far fa-smile-wink"></i>
					<form action="#" method="post">
						<input type="text" id="nome" name="nome" class="form-control form-camp" placeholder="Seu nome." required/>
						<br>
						<input type="email" id="email" name="email" class="form-control form-camp" placeholder="E-mail." required/>
						<br>
						<textarea id="mensagem" name="mensagem" class="form-control form-camp" placeholder="Escreva aqui sua mensagem." style="resize: none; height: 80px;" required></textarea>
						<br>
						<button type="submit" class="btn btn-sm botao"><i class="fa fa-paper-plane"></i> Enviar mensagem</button>&nbsp;
						<button type="reset" class="btn btn-sm botao"><i class="fa fa-times-circle"></i> Limpar formulário</button>
					</form>
				</div>
			</div>
			<div class="col-md-12">&nbsp;</div>
			<div class="col-md-12">&nbsp;</div>
		</div>
		@include('app.rodape')
	</div>
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
	  
	<!-- Script de acionamento do contador -->
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('js/jquery.countup.js')}}"></script>
	<script src="{{asset('js/my.js')}}"></script>
	
	<script type="text/javascript">
		$('#pc0').on('click', function(){
			$('#pc').html("@foreach ($parceiros as $parceiro)<div class=\"col-md-3 exib\" align=\"center\"><div class=\"parceiro\"><br /><img src=\"{{asset('storage/parceiros/'.$parceiro->foto)}}\" class=\"foto-parceiro\"/><br /><br /><p>{{$parceiro->nome_fantasia}}</p></div></div>@endforeach");
			$('.section').each(function () {
			  alturas[$(this).prop('id')] = $(this).offset().top;
			});
		});
		@foreach($categorias as $categoria)
			$('#pc{{$categoria->id}}').on('click', function(){
				$('#pc').html("@foreach ($parceiros as $parceiro) @if($parceiro->categoria == $categoria->id)<div class=\"col-md-3 exib\" align=\"center\"><div class=\"parceiro\"><br /><img src=\"{{asset('storage/parceiros/'.$parceiro->foto)}}\" class=\"foto-parceiro\"/><br /><br /><p>{{$parceiro->nome_fantasia}}</p></div></div>@endif @endforeach");
			});
			$('.section').each(function () {
			  alturas[$(this).prop('id')] = $(this).offset().top;
			});
		@endforeach
		function retorna(){
			$('#pc').html("@foreach ($parceiros as $parceiro)<div class=\"col-md-3 exib\" align=\"center\"><div class=\"parceiro\"><br /><img src=\"{{asset('storage/parceiros/'.$parceiro->foto)}}\" class=\"foto-parceiro\"/><br /><br /><p>{{$parceiro->nome_fantasia}}</p></div></div>@endforeach");
		}
	</script>

	<script>
		$('.counter').countUp();
	</script>
  </body>
</html>
