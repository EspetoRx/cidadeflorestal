@extends('app.app')

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
		<div class="row">
			<div class="col-md-12">
				<p class="titulo-page">{{$produto->nome}}</p>
				<br>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="{{asset('storage/produtos/'.$produto->foto)}}" style="width: 100%;">
			</div>
			<div class="col-md-9">
				<p>Descrição: {{$produto->descricao}}</p>
				<p>Referência: {{$produto->referência}}</p>
				<p>Quantidade: {{$produto->peso_ou_quantidade}} {{$medida->descricao}}</p>
				<p>Preço: R$ {{$produto->preco}}</p>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
@endsection