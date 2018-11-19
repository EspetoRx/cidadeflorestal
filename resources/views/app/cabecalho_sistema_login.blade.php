<!-- The fixed navbar will overlay your other content, unless you add padding to the bottom of the <body>. Tip: By default, the navbar is 50px high.  -->
	<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #92BD58;">
	   <a id="logo" class="navbar-brand scrollSuave" href="#sec1" style="logo"><img src="{{asset('images/logo.png')}}" height="40px" alt="Início"/></a>
	   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	   <span class="navbar-toggler-icon" style="color: black;"></span>
	   </button>
	   <div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav ml-auto">
			 <li class="nav-item">
				<a class="nav-link scrollSuave @if (isset($index))
					{{$index}}
				@endif" href="/#sec1">INÍCIO</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link scrollSuave" href="/#sec2">SERVIÇOS</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link scrollSuave" href="/#sec3">DADOS & METAS</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link scrollSuave @if (isset($empresa))
					{{$empresa}}
				@endif" href="/#sec4">PARCEIROS</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link scrollSuave @if (isset($noticiam))
					{{$noticiam}}
				@endif" href="/#sec5">NOTÍCIAS</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link scrollSuave" href="/#sec6">CONTATO</a>
			 </li>
			  <li class="nav-item">
				<a href="/login"><button type="button" class="btn botao-nav">Acesso do parceiro</button></a>
			 </li>
		  </ul>
			 <!--<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Dropdown
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				   <a class="dropdown-item" href="#">Action</a>
				   <a class="dropdown-item" href="#">Another action</a>
				   <div class="dropdown-divider"></div>
				   <a class="dropdown-item" href="#">Something else here</a>
				</div>
			 </li>
			 <li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			 </li>
		  
		  <form class="form-inline my-2 my-lg-0">
			 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		  </form>-->
	   </div>	
	</nav>