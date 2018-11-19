@extends('app.app_interno',['perfil' => 'newactive', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'newactive', 'eps' => '', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => '', 'prod_adc' => ''])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
			<div class="row bloco">
				<div class="col-md-12" align="center">
					<p class="titulo-page">Visualizar Perfis para exclusão</p>
				</div>
				@php
					$contador = 0;
				@endphp
				@foreach ($perfis as $perfil)
					{{-- expr --}}
					@if ($contador++ % 4 == 0)
						{{-- expr --}}
						<div class="col-md-12"><br></div>
						<div class="col-md-3 exib" align="center">
							<div class="parceiro">
								<img src="{{url("storage/users/$perfil->foto")}}" class="foto-perfil"/>
								<br />
								<br />
								<a href="/confirmar_exclusao_perfil/{{ $perfil->id }}" class="link-ele">
									<p>{{ $perfil->nome }}</p>
								</a>
							</div>
						</div>
					@else
						<div class="col-md-3 exib" align="center">
							<div class="parceiro">
								<img src="{{url("storage/users/$perfil->foto")}}" class="foto-perfil"/>
								<br />
								<br />
								<a href="/confirmar_exclusao_perfil/{{ $perfil->id }}" class="link-ele">
									<p>{{ $perfil->nome }}</p>
								</a>
							</div>
						</div>
					@endif
				@endforeach
		</div>
@endsection