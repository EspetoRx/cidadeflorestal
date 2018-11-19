@extends('app.app_interno',['perfil' => '', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => 'newactive', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => '', 'prod_adc' => '', 'prod_vis' => 'newactive'])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
			<div class="row bloco">
				<div class="col-md-12" align="center">
					<p class="titulo-page">@if(isset($titulo))
						{{$titulo}}
					@else
						Visualizar Produtos
					@endif</p>
				</div>
				@php
					$contador = 0;
				@endphp
				@if (count($minhasEmpresas)!=0)
					<div style="margin-top: 40px; text-align: center !important; width:100%; color: white !important;"><a href="/adicionarNovoProduto" class="btn botao-nav">Adicionar um produto ou serviço</a></div>
				@else
					<div style="margin-top: 40px; text-align: center !important; width:100%;"><p>Você não possui empresas cadastradas para cadastrar um produto. =(</p></div>
				@endif
				@if (count($produtos) == 0)
					<div style="margin-top: 40px; text-align: center !important; width:100%;"><p>Você não possui produtos para serem exibidos. =(</p></div>
				@endif
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
								<a href="/produto/{{ $produto->id }}@if(isset($extension))
									@if ($extension == "edit")
										/edit
									@else
										@if ($extension == "con_exc")
										/con_exc
										@endif
									@endif
								@endif" class="link-ele">
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
								<a href="/produto/{{ $produto->id }}@if(isset($extension))
									@if ($extension == "edit")
										/edit
									@else
										@if ($extension == "con_exc")
											/con_exc
										@endif
									@endif
								@endif" class="link-ele">
									<p>{{ $produto->nome }}</p>
								</a>
							</div>
						</div>
					@endif
				@endforeach
		</div>
@endsection