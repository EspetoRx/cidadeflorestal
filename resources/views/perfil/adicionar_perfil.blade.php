@extends('app.app_interno',['perfil' => 'newactive', 'create_perfil' => 'newactive', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => '', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => '', 'prod_adc' => ''])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
		
		<form id="addForm" method="post" action="/perfil" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="row bloco">
				<div class="col-md-12" align="center">
					<p class="titulo-page">Adicionar Novo Perfil</p>
					@include('/inc.errors')
				</div>
				<div class="col-md-2 text-center" align="center">
					<img id="foto" src="{{asset('images/perfil.jpg')}}" class="foto-perfil" /><br><br>
					<p><button type="button" role="button" class="btn botao-nav" onClick="trocaFoto();">Exclui</button>&nbsp;
					<input type="file" name="file" id="file" class="inputfile margin-left-10-non-sm" onChange="readURL(this);" value=""/>
					<label for="file" class="btn botao-nav">Inserir</label> 
					</p>
				</div>
				<div class="col-md-5">
					<h3 class="titulo-campo">Nome:</h3>
					<input type="text" id="nome" name="nome" class="form-control input-edit" />
					<h3 class="titulo-campo">E-mail:</h3>
					<input type="email" id="email" name="email" class="form-control input-edit" />
				</div>
				<div class="col-md-5">
					<h3 class="titulo-campo">Empresa:</h3>
					<input type="text" id="empresa" name="empresa" class="form-control readonly" readonly/>
					<h3 class="titulo-campo">Tipo:</h3>
					{{-- <input type="text" id="tipo" name="tipo" class="form-control input-edit" /> --}}
					<select name="tipo" id="tipo" class="form-control">
						@foreach ($tipos as $tipo)
							{{-- expr --}}
							<option value="{{ $tipo->id }}">{{ $tipo->id }} - {{ $tipo->descricao }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2">
					&nbsp;
				</div>
				<div class="col-md-5">
					<h3 class="titulo-campo">Senha:</h3>
					<input type="password" id="senha" name="senha" class="form-control input-edit" />
				</div>
				<div class="col-md-5">
					<h3 class="titulo-campo">Confirmação da senha:</h3>
					<input type="password" id="confirmação_de_senha" name="confirmação_de_senha" class="form-control input-edit" />
				</div>
				<div class="col-md-2">
					&nbsp;
				</div>
				<div class="col-md-5">
					&nbsp;
				</div>
				<div class="col-md-5 menor dist">
					<button type="button" class="btn btn-active" role="button" onClick="clearForm();">Cancelar adição</button>&nbsp;&nbsp;
					<button type="submit" class="btn botao-nav" role="submit">Adicionar perfil</button>
				</div>
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
               // $('#file').attr('value', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }  

	</script>

	<script type="text/javascript">

	function trocaFoto(){
		$('#foto').attr('src', '{{asset('storage/users/perfil.jpg')}}');
		$('#file').attr('value', "");
	}

	</script>

	<script type="text/javascript">
		function clearForm(){
			document.getElementById("addForm").reset();
		}
	</script>
@endsection