@extends('app.app_interno',['perfil' => 'newactive', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'newactive', 'eps' => '', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => '', 'prod_adc' => ''])

@section('conteudo')
	<div class="container">
		<form action="{{action('UsersController@destroy', $user->id)}}" method="post" >
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
		<div class="coisa5">&nbsp;</div>
		<div class="row bloco">
			<div class="col-md-12" align="center">
				<p class="titulo-page">Você quer mesmo excluir este perfil?</p>
			</div>
			<div class="col-md-2" align="center">
				<img src="{{url("storage/users/$user->foto")}}" class="foto-perfil"/>
			</div>
			<div class="col-md-5">
				<h3 class="titulo-campo">Nome:</h3>
				<p>{{ $user->nome }}</p>
				<h3 class="titulo-campo">E-mail:</h3>
				<p>{{ $user->email }}</p>
			</div>
			<div class="col-md-5">
				<h3 class="titulo-campo">Empresa:</h3>
				<p>Nome fantasia da empresa.</p>
				<h3 class="titulo-campo">Tipo:</h3>
				<p>{{$user->tipo}} - {{ $descricao }}</p>
			</div>
			<div class="offset-md-7 col-md-5 menor dist text-right">
					<a href="/perfil_excluir" type="button" class="btn btn-active" role="button">Cancelar exclusão</a>&nbsp;&nbsp;
					<button type="submit" class="btn botao-nav" role="submit">Excluir perfil</button>
				</div>
		</div>
		</form>
	</div>
@endsection