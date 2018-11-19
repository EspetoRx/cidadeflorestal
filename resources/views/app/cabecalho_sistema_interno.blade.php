	<!-- The fixed navbar will overlay your other content, unless you add padding to the bottom of the <body>. Tip: By default, the navbar is 50px high.  -->
	<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #92BD58;">
	   <a id="logo" class="navbar-brand scrollSuave" href="/" style="logo"><img src="{{asset('images/logo.png')}}" height="40px" alt="Início"/></a>
	   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	   <span class="navbar-toggler-icon" style="color: black;"></span>
	   </button>
	   <div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav ml-auto">
			  <li class="nav-item dropdown  @if(isset($perfil))
				       {{$perfil}}
				       @else

				   @endif">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Perfis & Usuários
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				   <a class="dropdown-item @if (isset($my_profile))
				   	{{"newactive"}}
				   @endif" href="/meuPerfil"><img src="{{asset('/storage/users/'.Session::get('foto'))}}" style="height: 20px; width: 20px; border-radius: 20%;" /> Meu perfil</a>
				   <a class="dropdown-item @if (isset($edit_my_profile))
				   		{{$edit_my_profile}}
				   @endif" href="/alterarMeuPerfil/"><i class="fas fa-pencil-alt"></i> Alterar meu perfil</a>
				   @if (Session::get('tipo') == 1)
				   		<div class="dropdown-divider"></div>
				   		<a class="dropdown-item  @if(isset($visualiza_perfil))
				       		{{$visualiza_perfil}}
				       @else

				   		@endif" href="/perfil">Ver Perfis</a>
				   		<a class="dropdown-item  @if(isset($create_perfil))
				       		{{$create_perfil}}
				       @else

				   		@endif" href="/perfil/create">Adicionar perfil</a>
				   		<a class="dropdown-item  @if(isset($editar_perfil))
				       		{{$editar_perfil}}
				       	@else

					   @endif" href="/perfil_editar">Alterar outros perfis</a>
					   <a class="dropdown-item @if(isset($excluir_perfil))
					   {{$excluir_perfil}}
					   @endif" href="/perfil_excluir">Excluir perfil</a>
					   <a class="dropdown-item  @if(isset($tp))
					       {{$tp}}
					       @else

					   @endif" href="/tp">Tipos de Perfis</a>
					   @endif
				   
				</div>
			  </li>
			  &nbsp;&nbsp;
			  <li class="nav-item dropdown  @if(isset($eps))
				       {{$eps}}
				       @else

				   @endif">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Empresa, Produtos & Serviços
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				   <a class="dropdown-item  @if(isset($my_enterprise))
					       {{$my_enterprise}}
					       @else

					   @endif" href="/escolheEmpresa"><i class="fas fa-store-alt"></i> Minhas empresas</a>
				   <a class="dropdown-item @if(isset($my_enterprise_edit))
					       {{$my_enterprise_edit}}
					       @else

					   @endif" href="/escolheEmpresaEditar"><i class="fas fa-store"></i> Alterar minhas empresas</a>
				   <a class="dropdown-item @if(isset($add))
					       'newsactive'
					       @else

					   @endif" href="/visualizarMeusProdutos"><i class="fas fa-gift"></i> Meus produtos & serviços</a>
				   @if (Session::get('tipo') == 1)
				   		<div class="dropdown-divider"></div>
					   <a class="dropdown-item @if(isset($prod_vis))
					       {{$prod_vis}}
					       @else

					   @endif" href="/produto">Ver produtos ou serviços</a>
					   <a class="dropdown-item @if(isset($prod_adc))
					       {{$prod_adc}}
					       @else

					   @endif" href="/produto/create">Incluir produto ou serviço</a>
					   <a class="dropdown-item @if(isset($prod_alt))
					       {{$prod_alt}}
					       @else

					   @endif" href="/prd_edt">Alterar produto ou serviço</a>
					   <a class="dropdown-item @if(isset($prod_exc))
					       {{$prod_exc}}
					       @else

					   @endif" href="/prd_exc">Excluir produto ou serviço</a>
					   <a class="dropdown-item @if(isset($cpc))
					       {{$cpc}}
					       @else

					   @endif" href="/cpc">Categorias dos Produtos</a>
					   <div class="dropdown-divider"></div>
					   <a class="dropdown-item  @if(isset($prod_emp))
					       {{$prod_emp}}
					       @else

					   @endif" href="/parceiro">Ver empresas</a>
					   <a class="dropdown-item  @if(isset($emp_ed))
					       {{$emp_ed}}
					       @else

					   @endif" href="/parceiro_editar">Alterar outras empresas</a>
					   <a class="dropdown-item  @if(isset($inc_empresa))
					       {{$inc_empresa}}
					       @else

					   @endif" href="/parceiro/create">Incluir nova empresa</a>
					   <a class="dropdown-item  @if(isset($emp_ex))
					       {{$emp_ex}}
					       @else

					   @endif" href="/parceiro_excluir">Excluir empresa</a>
					   <a class="dropdown-item @if(isset($cc))
					       {{$cc}}
					       @else

					   @endif" href="/cc">Categorias das Empresas</a>
					@endif
				</div>
			  </li>
			  &nbsp;&nbsp;
			  <li class="nav-item dropdown  @if(isset($bnc))
				       {{$bnc}}
				       @else

				   @endif">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Blog, Notícias & Comentários
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item @if(isset($my_news))
					       {{$my_news}}
					       @else
					   @endif" href="/minhasNoticias"><i class="far fa-newspaper"></i> Minhas notícias</a>
					<a class="dropdown-item @if(isset($my_news))
					       {{$my_news}}
					       @else
					   @endif" href="/addicionarNoticia"><i class="fas fa-plus"></i> 
					   Adicionar notícia</a>
					@if (Session::get('tipo') == 1)
						<div class="dropdown-divider"></div>
						<a class="dropdown-item  @if(isset($noticia_visualize))
					       {{$noticia_visualize}}
					       @else
					   @endif" href="/noticias">Notícias</a>
					   
					   <a class="dropdown-item  @if(isset($noticia_create))
					       {{$noticia_create}}
					       @else

					   @endif" href="/noticias/create">Incluir notícia</a>
					   <a class="dropdown-item @if(isset($noticia_altera))
					       {{$noticia_altera}}
					       @else

					   @endif" href="/noticias">Alterar notícia</a>
					   <a class="dropdown-item @if(isset($noticia_exclude))
					       {{$noticia_exclude}}
					       @else

					   @endif" href="/noticias">Excluir notícia</a>
					   <div class="dropdown-divider"></div>
					   <a class="dropdown-item @if(isset($comment))
					       {{$comment}}
					       @else

					   @endif" href="/comentario">Gerenciar comentários</a>
					   <div class="dropdown-divider"></div>
					   <a class="dropdown-item  @if(isset($pasta))
					       {{$pasta}}
					       @else

					   @endif" href="/pasta">Pastas</a>
					@endif
				   
				</div>
			  </li>
			  &nbsp;&nbsp;
			  <li class="nav-item">
			  	<form id="logout-form" action="{{ route('logout') }}" method="POST">
			  		{{ csrf_field() }}
			  		<button type="submit" class="btn botao-nav">Logout</button>
			  	</form>
			  </li>
		  </ul>
	   </div>	
	</nav>