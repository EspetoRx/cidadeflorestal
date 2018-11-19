@extends('app.app_interno',['perfil' => '', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => 'newactive', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => '', 'prod_adc' => '', 'prod_vis' => 'newactive'])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
		{{-- <form id="addForm" method="post" action="/produto" enctype="multipart/form-data">
			{{ csrf_field() }} --}}
			
			<div class="row bloco">
				<div class="col-md-12" align="center">
					@if(isset($titulo))
						<p class="titulo-page">{{$titulo}}</p>
					@else
						<p class="titulo-page">Visualizar Produto ou Serviço</p>
					@endif
					@include('/inc.errors')
				</div>
				<div class="col-md-2 text-center" align="center">

					<img id="foto" src="{{asset('storage/produtos/'.$produto->foto)}}" class="foto-perfil" /><br><br>
					{{-- <p><a href="" class="btn botao-nav" onClick="resetURL();">Exclui</a>
					<input type="file" name="file" id="file" class="inputfile margin-left-10-non-sm" onChange="readURL(this);" value=""/>
					<label for="file" class="btn botao-nav" onClick="">Inserir</label> 
					</p> --}}
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="nome" class="titulo-campo">Nome</label>
						<input type="text" name="nome" id="nome" class="form-control input-new" value="{{$produto->nome}}" readonly="" />
					</div>
					<div class="form-group">
						<label for="preço" class="titulo-campo">Preço</label>
						<div class="input-group">
							<div class="input-group-prepend">
							    <span class="input-group-text aspects-input" id="basic-addon1">R$</span>
							</div>
							<input type="number" step="0.01" name="preço" id="preço" class="form-control input-new" value="{{$produto->preco}}" readonly=""/>	
						</div>
						
					</div>
					<div class="form-group">
						<label for="referência" class="titulo-campo">Referência</label>
						<input type="text" name="referência" id="referência" class="form-control input-new" value="{{$produto->referência}}"readonly=""/>
					</div>
					<div class="form-group">
						<label for="quantidade" class="titulo-campo">Quantidade</label>
						<div class="input-group">
							<input type="number" name="quantidade" id="quantidade" class="form-control input-new" value="{{$produto->peso_ou_quantidade}}" readonly=""/>
							<div class="input-group-append">
								<select class="form-control aspects-input" id="tipoquantidade" name="tipoquantidade"readonly="">
									@foreach ($tipo_quantidades as $tipoquantidade)
										@if ($tipoquantidade->id == $produto->tipoquantidade)
											<option class="aspects-input" value="{{$tipoquantidade->id}}" selected>{{$tipoquantidade->descricao}}
										</option>
										@else
										<option class="aspects-input" value="{{$tipoquantidade->id}}">{{$tipoquantidade->descricao}}
										</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="pertencente" class="titulo-campo">Pertencente</label>
						<select id="pertencente" name="pertencente" class="form-control input-new" readonly="">
							@foreach ($pertencentes as $pertencente)
								@if ($pertencente->id == $produto->pertencente)
									<option value="{{$pertencente['id']}}" selected>{{$pertencente['id']}} - {{$pertencente['nome']}}</option>
								@else
									<option value="{{$pertencente['id']}}">{{$pertencente['id']}} - {{$pertencente['nome']}}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="parceiro" class="titulo-campo">Empresa vendedora</label>
						<select id="parceiro" name="parceiro" class="form-control input-new"readonly="">
							@foreach ($parceiros as $parceiro)
								{{-- expr --}}
								@if ($parceiro['id'] == $produto->parceiro)
									<option value="{{$parceiro['id']}}" selected>{{$parceiro['id']}} - {{$parceiro['nome_fantasia']}}</option>
								@else
									<option value="{{$parceiro['id']}}">{{$parceiro['id']}} - {{$parceiro['nome_fantasia']}}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="categoria" class="titulo-campo">categoria</label>
						<select id="categoria" name="categoria" class="form-control input-new"readonly="">
							@foreach ($categorias as $categoria)
								{{-- expr --}}
								@if ($categoria->id == $produto->categoria)
									<option value="{{$categoria->id}}" selected>{{$categoria->id}} - {{$categoria->descricao}}</option>
								@else
									<option value="{{$categoria->id}}">{{$categoria->id}} - {{$categoria->descricao}}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="descrição" class="titulo-campo">Descrição do produto</label>
						<textarea name="descrição" id="descrição" class="form-control input-new" style="resize: none; height: 100px;" readonly="">{{$produto->descricao}}</textarea>
					</div>
				</div>
				
				{{-- <div class="col-md-2">
					&nbsp;
				</div>
				<div class="col-md-5">
					&nbsp;
				</div>
				<div class="col-md-5 menor dist text-right">
					<button type="button" class="btn btn-active" role="button" onClick="clearForm();">Cancelar adição</button>&nbsp;&nbsp;
					<button type="submit" class="btn botao-nav" role="submit" >Adicionar produto</button>
				</div> --}}
			</div>
		{{-- </form> --}}
	</div>
	{{-- <script type="text/javascript">

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#foto')
                    .attr('src', e.target.result);
                //$('#file').attr('value', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

	</script>

	<script type="text/javascript">

	function resetURL(){
		document.getElementById('foto').src="{{asset('storage/parceiros/logo-empresa.jpg')}}";
		$('#file').attr('value', '');
	}

	</script>

	<script type="text/javascript">
		function clearForm(){
			document.getElementById("addForm").reset();
		}
	</script> --}}
@endsection