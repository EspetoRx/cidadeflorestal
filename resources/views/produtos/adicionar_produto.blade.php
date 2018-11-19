@extends('app.app_interno',['perfil' => '', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => 'newactive', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => ''])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
		<form id="addForm" method="post" action="
		@if(isset($editar) || isset($exclude))
			@if(isset($editar)){{action('ProdutoController@update', $produto->id)}}@endif
			@if(isset($exclude)){{action('ProdutoController@destroy', $produto->id)}}@endif
		@else
			/produto
		@endif" enctype="multipart/form-data">
			{{ csrf_field() }}
			@if(isset($editar))
					{{ method_field('PATCH') }}
			@endif
			@if(isset($exclude))
					{{ method_field('DELETE') }}
			@endif
			<div class="row bloco">
				<div class="col-md-12" align="center">
					<p class="titulo-page">@if(isset($editar))
							Editar
						@else
							@if(isset($exclude))
								Excluir
							@else
								Adicionar Novo
							@endif
					@endif Produto ou Serviço</p>
					@include('/inc.errors')
				</div>
				<div class="col-md-2 text-center" align="center">

					<img id="foto" src="@if(isset($editar) || isset($exclude))
							{{asset('storage/produtos/'.$produto->foto)}}
						@else
							{{asset('images/produtos-servicos.png')}}
					@endif" class="foto-perfil" /><br><br>
					@if(!isset($exclude))
						<p><input type="radio" id="vazio" name="vazio" class="nao-mostrar" checked="false" value="1"></input>
					<label for="vazio" role="button" class="btn botao-nav botao-exclude" onClick="trocaFoto()">Excluir</label>
							<input type="file" name="file" id="file" class="inputfile margin-left-10-non-sm" onChange="readURL(this);" value=""/>
							<label for="file" class="btn botao-nav">Inserir</label> 
						</p>
					@endif
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="nome" class="titulo-campo">Nome</label>
						<input type="text" name="nome" id="nome" class="form-control input-new" @if(isset($editar) || isset($exclude))
							value="{{$produto->nome}}"
						@else
							placeholder="Nome do produto"
					@endif @if(isset($exclude))readonly=""@endif/>
					</div>
					<div class="form-group">
						<label for="preço" class="titulo-campo">Preço</label>
						<div class="input-group">
							<div class="input-group-prepend">
							    <span class="input-group-text aspects-input" id="basic-addon1">R$</span>
							</div>
							<input type="number" step="0.01" name="preço" id="preço" class="form-control input-new" @if(isset($editar) || isset($exclude))
								    value="{{$produto->preco}}"
								@else
									placeholder="9,99"
								@endif @if(isset($exclude))readonly=""@endif/>	
						</div>
						
					</div>
					<div class="form-group">
						<label for="referência" class="titulo-campo">Referência</label>
						<input type="text" name="referência" id="referência" class="form-control input-new" @if(isset($editar) || isset($exclude))
										    value="{{$produto->referência}}"
										@else
											placeholder="ref 0x00256"
										@endif @if(isset($exclude))readonly=""@endif/>
					</div>
					<div class="form-group">
						<label for="quantidade" class="titulo-campo">Quantidade</label>
						<div class="input-group">
							<input type="number" name="quantidade" id="quantidade" class="form-control input-new" @if(isset($editar) || isset($exclude))
										    value="{{$produto->peso_ou_quantidade}}"
										@else
											placeholder="500"
										@endif @if(isset($exclude))readonly=""@endif/>
							<div class="input-group-append">
								<select class="form-control aspects-input" id="tipoquantidade" name="tipoquantidade" @if(isset($exclude))readonly=""@endif>
									@foreach ($tipo_quantidades as $tipoquantidade)
										@if (isset($produto) && $tipoquantidade['id']== $produto->tipoquantidade)
											<option value="{{$tipoquantidade['id']}}" selected>{{$tipoquantidade['descricao']}}</option>
										@else
											<option value="{{$tipoquantidade['id']}}">{{$tipoquantidade['descricao']}}</option>
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
						<select id="pertencente" name="pertencente" class="form-control input-new" @if(!isset($produto) || !isset($exclude))onChange="ativaEmpresas();" @endif @if(isset($exclude) || isset($add))readonly=""@endif>
							@if (!isset($produto) || !isset($exclude) || !isset($add))
								<option selected disabled>----------Escolha aqui o pertencente------------</option>
							@endif
							@foreach ($pertencentes as $pertencente)
								@if (isset($produto) && $pertencente['id']== $produto->pertencente)
									<option value="{{$pertencente['id']}}" selected>{{$pertencente['id']}} - {{$pertencente['nome']}}</option>
								@elseif(isset($add) && $pertencente['id'] == Session::get('id'))
									<option value="{{$pertencente['id']}}" selected>{{$pertencente['id']}} - {{$pertencente['nome']}}</option>
								@else
									<option value="{{$pertencente['id']}}">{{$pertencente['id']}} - {{$pertencente['nome']}}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="parceiro" class="titulo-campo">Empresa vendedora</label>
						<select id="parceiro" name="parceiro" class="form-control input-new" onChange="abreLista();"  @if(!isset($editar) && !isset($add))
										    disabled="false"
										@endif @if(isset($exclude))readonly=""@endif>
							@if (!isset($produto) || !isset($exclude))
								<option selected disabled>----------Defina o pertencente------------</option>
							@endif
							
							@foreach ($parceiros as $parceiro)
								{{-- expr --}}
								@if (isset($produto) && $parceiro['id'] == $produto->parceiro)
									<option value="{{$parceiro['id']}}" selected>{{$parceiro['id']}} - {{$parceiro['nome_fantasia']}}</option>
								@elseif($parceiro['pertencente'] == Session::get('id'))
									<option value="{{$parceiro['id']}}">{{$parceiro['id']}} - {{$parceiro['nome_fantasia']}}</option>
								@elseif(!isset($add))
									<option value="{{$parceiro['id']}}">{{$parceiro['id']}} - {{$parceiro['nome_fantasia']}}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="categoria" class="titulo-campo">Categoria</label>
						<select id="categoria" name="categoria" class="form-control input-new categoria" @if(!isset($editar))
							{{-- expr --}}
							disabled='false'
						@endif						
							@if(isset($exclude))readonly=""@endif>
							@if (!isset($produto) || !isset($exclude))
								<option selected disabled>----------Defina a empresa vendedora------------</option>
							@endif
							@foreach ($categorias as $categoria)
								{{-- expr --}}
								@if (isset($produto) && $categoria['id'] == $produto->categoria)
									<option value="{{$categoria->id}}" selected>{{$categoria->id}} - {{$categoria->descricao}}</option>
								@else
									<option value="{{$categoria->id}}">{{$categoria->id}} - {{$categoria->descricao}}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="descrição" class="titulo-campo">Descrição do produto</label>
						<textarea name="descrição" id="descrição" class="form-control input-new" style="resize: none; height: 100px;" @if(!isset($editar) || isset($exclude))
									    placeholder="Minha empresa é a melhor da minha região..."
									@endif @if(isset($exclude))readonly=""@endif>@if(isset($editar)||isset($exclude)){{$produto->descricao}}@endif</textarea>
					</div>
				</div>
				
				<div class="col-md-2">
					&nbsp;
				</div>
				<div class="col-md-5">
					&nbsp;
				</div>
				@if(!isset($editar) && !isset($exclude))
					<div class="col-md-5 menor dist text-right">
						<button type="button" class="btn btn-active" role="button" onClick="clearForm();">Cancelar adição</button>&nbsp;&nbsp;
						<button type="submit" class="btn botao-nav" role="submit" >Adicionar produto</button>
					</div>
				@endif
				@if(isset($editar))
					<div class="col-md-5 menor dist text-right">
						<a href="/prd_edt" class="btn btn-active" role="button">Cancelar edição</a>&nbsp;&nbsp;
						<button type="submit" class="btn botao-nav" role="submit" >Editar produto</button>
					</div>
				@endif
				@if(isset($exclude))
					<div class="col-md-5 menor dist text-right">
						<a href="/prd_exc" class="btn btn-active" role="button">Cancelar exclusão</a>&nbsp;&nbsp;
						<button type="submit" class="btn botao-nav" role="submit" >Excluir produto</button>
					</div>
				@endif
			</div>
		</form>
	</div>
	<script type="text/javascript">

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#foto')
                    .attr('src', e.target.result);
                $('#vazio').attr('checked', "false");
                $('#vazio').attr('value', 1);
               // $('#file').attr('value', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }  

	</script>

	<script type="text/javascript">

	function trocaFoto(){
		$('#foto').attr('src', '{{asset('images/produtos-servicos.png')}}');
		$('#file').attr('value', "");
		$('#vazio').attr('checked', "true");
		$('#vazio').attr('value', 0);
	}

	</script>

	<script type="text/javascript">
		function clearForm(){
			document.getElementById("addForm").reset();
		}
	</script>

	<script type="text/javascript">
		function abreLista(){
			$('#categoria').html("<option selected disabled>----------Defina a empresa vendedora------------</option>");
			$('#categoria').prop("disabled", false);
			@foreach ($parceiros as $parceiro)
				if({{$parceiro->id}} == document.getElementById('parceiro').value){
					var categoria = {{$parceiro->categoria}};
				}
			@endforeach
			@foreach ($categorias as $categoria)
				if(categoria == {{$categoria->categoria_clientes}}){
					$('#categoria').append("<option value='{{$categoria->id}}'>{{$categoria->id}} - {{$categoria->descricao}}</option>");
				}
			@endforeach

		}
	</script>
	<script type="text/javascript">
		function ativaEmpresas(){
			$('#parceiro').html("<option selected disabled>----------Defina aqui a empresa------------</option>");
			$('#parceiro').prop("disabled", false);
			$('#categoria').html("<option selected disabled>----------Defina a empresa vendedora------------</option>");
			$('#categoria').prop("disabled", true);
			@foreach ($parceiros as $parceiro)
				if({{$parceiro->pertencente}} == document.getElementById('pertencente').value){
					$('#parceiro').append("<option value={{$parceiro->id}}>{{$parceiro->id}} - {{$parceiro->nome_fantasia}}</option>");
				}
			@endforeach
		}
	</script>
@endsection