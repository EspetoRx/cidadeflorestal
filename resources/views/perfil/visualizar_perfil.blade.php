@extends('app.app_interno',['perfil' => 'newactive', 'create_perfil' => '', 'visualiza_perfil' => 'newactive', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => '', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => '', 'prod_adc' => ''])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
		<div class="row bloco">
			<div class="col-md-12" align="center">
				@if (isset($title))
					<p class="titulo-page">{{$title}}</p>
				@else
					<p class="titulo-page">Visualiza Perfil</p>
				@endif
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
				@if(isset($empresas) && count($empresas) != 0)
					<select id="empresas" name="empresas" class="form-control" onchange="location = this.value">
						<option value="#" disabled="" selected="">
								----Escolha uma empresa abaixo----
							</option>
						@foreach ($empresas as $empresa)
							@if (Session::get('tipo') == 1)
								{{-- expr --}}
								<option value="{{'/parceiro/'.$empresa->id}}">
								{{$empresa->id}} - {{$empresa->nome_fantasia}}
								</option>
							@else
								<option value="{{'/minhaEmpresa/'.$empresa->id}}">
								{{$empresa->id}} - {{$empresa->nome_fantasia}}
								</option>
							@endif
							
						@endforeach
					</select>
				@else
					<p>Este perfil ainda não possui empresas cadastradas.</p>
				@endif
				<h3 class="titulo-campo">Tipo:</h3>
				<p>{{$user->tipo}} - {{ $descricao }}</p>
			</div>
		</div>
	</div>
@endsection