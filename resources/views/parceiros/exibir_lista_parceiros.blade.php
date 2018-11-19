@extends('app.app_interno',['perfil' => '', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => 'newactive', 'inc_empresa' => '', "exb_emp" => 'newactive', 'emp_ed' => '', 'emp_ex' => '', 'prod_adc' => ''])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
			<div class="row bloco">
				<div class="col-md-12" align="center">
					@if (isset($titulo))
						<p class="titulo-page">{{$titulo}}</p>
					@else
						<p class="titulo-page">Visualizar empresas</p>
					@endif
				</div>
				@php
					$contador = 0;
				@endphp
				@if (count($parceiros) == 0)
					<div style="margin-top: 40px; text-align: center !important; width:100%;"><p>Você não possui empresas para serem exibidas. =(</p></div>
				@endif
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
								@if(isset($my_enterprise))
									<a href="{{url('/minhaEmpresa', $parceiro->id)}}" class="link-ele">
									<p>{{ $parceiro->nome_fantasia }}</p>
								</a>
								@elseif(isset($my_enterprise_edit))
									<a href="{{url('/minhaEmpresaEdit', $parceiro->id)}}" class="link-ele">
									<p>{{ $parceiro->nome_fantasia }}</p>
								@else
								<a href="/parceiro/{{ $parceiro->id }}" class="link-ele">
									<p>{{ $parceiro->nome_fantasia }}</p>
								</a>
								@endif
							</div>
						</div>
					@else
						<div class="col-md-3 exib" align="center">
							<div class="parceiro">
								<img src="{{url("storage/parceiros/$parceiro->foto")}}" class="foto-perfil"/>
								<br />
								<br />
								@if(isset($my_enterprise))
									<a href="{{url('/minhaEmpresa', $parceiro->id)}}" class="link-ele">
									<p>{{ $parceiro->nome_fantasia }}</p>
								</a>
								@elseif(isset($my_enterprise_edit))
									<a href="{{url('/minhaEmpresaEdit', $parceiro->id)}}" class="link-ele">
									<p>{{ $parceiro->nome_fantasia }}</p>
								@else
								<a href="/parceiro/{{ $parceiro->id }}" class="link-ele">
									<p>{{ $parceiro->nome_fantasia }}</p>
								</a>
								@endif
							</div>
						</div>
					@endif
				@endforeach
		</div>
@endsection