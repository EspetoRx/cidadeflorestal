@extends('app.app_interno',['perfil' => '', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => 'newactive', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => 'newactive', 'prod_adc' => ''])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
			<div class="row bloco">
				<div class="col-md-12" align="center">
					<p class="titulo-page">Visualizar Empresas para exclusão</p>
				</div>
				@php
					$contador = 0;
				@endphp
				@foreach ($parceiros as $parceiro)
					{{-- expr --}}
					@if ($contador++ % 4 == 0)
						{{-- expr --}}
						<div class="col-md-12"><br></div>
						<div class="col-md-3 exib" align="center">
							<div class="parceiro">
								<img src="{{url("storage/parceiros/$parceiro->foto")}}" class="foto-perfil"/>
								<br />
								<br />
								<a href="/con_exc_parceiro/{{ $parceiro->id }}" class="link-ele">
									<p>{{ $parceiro->nome_fantasia }}</p>
								</a>
							</div>
						</div>
					@else
						<div class="col-md-3 exib" align="center">
							<div class="parceiro">
								<img src="{{url("storage/parceiros/$parceiro->foto")}}" class="foto-perfil"/>
								<br />
								<br />
								<a href="/con_exc_parceiro/{{ $parceiro->id }}" class="link-ele">
									<p>{{ $parceiro->nome_fantasia }}</p>
								</a>
							</div>
						</div>
					@endif
				@endforeach
		</div>
@endsection