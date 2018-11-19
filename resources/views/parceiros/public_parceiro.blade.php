@extends('app.app')

@section('conteudo')
<div class="container">
	<div class="coisa5">&nbsp;</div>
	<div class="row">
		<div class="col-md-12">
			<p class="titulo-page">{{$parceiro->nome_fantasia}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<img src="{{asset('/storage/parceiros/'.$parceiro->foto)}}" style="width: 100%;">
		</div>
		<div class="col-md-9">
			<p><b>Razão social:</b> {{$parceiro->razao_social}}</p>
			<p><b>Nome fantasia:</b> {{$parceiro->nome_fantasia}}</p>
			<p><b>Email:</b> <a href="mailto:{{$parceiro->email}}">{{$parceiro->email}}</a></p>
			<p><b>CNPJ:</b> {{$parceiro->CNPJ}}</p>
			<p><b>Endereço:</b> <a href="https://www.google.com.br/maps/place/{!! str_replace(' ', '+', $parceiro->endereco_completo) !!}">{{$parceiro->endereco_completo}}</a></p>
			<p><b>Telefone:</b> {{$parceiro->telefone}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p>Descrição da empresa:</p>
			<p>{{$parceiro->descricao}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p>Produtos desta empresa:</p>
		</div>
		@php
			$contador = 0;
		@endphp
		@if (count($produtos) == 0)
			<div class="col-md-12">
				<p>Esta empresa ainda não possui produtos cadastrados. =(</p>	
			</div>
		@else
		@foreach ($produtos as $produto)
			{{-- expr --}}
			@if ($contador++ % 4 == 0)
				{{-- expr --}}
				<div class="col-md-12"><br></div>
				<div class="col-md-3 exib" align="center">
					<div class="parceiro">
						<img src="{{url("storage/produtos/$produto->foto")}}" class="foto-perfil"/>
						<br />
						<br />
						<a href="/empresa/produto/{{ $produto->id }}" class="link-ele">
							<p>{{ $produto->nome }}</p>
						</a>
					</div>
				</div>
			@else
				<div class="col-md-3 exib" align="center">
					<div class="parceiro">
						<img src="{{url("storage/produtos/$produto->foto")}}" class="foto-perfil"/>
						<br />
						<br />
						<a href="/empresa/produto/{{ $produto->id }}" class="link-ele">
							<p>{{ $produto->nome }}</p>
						</a>
					</div>
				</div>
			@endif
		@endforeach
		@endif
	</div>
</div>
<br>
<br>
@endsection