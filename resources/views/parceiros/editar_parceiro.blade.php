@extends('app.app_interno',['perfil' => '', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => 'newactive', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => 'newactive', 'emp_ex' => '', 'prod_adc' => ''])

@section('conteudo')
	<div class="container-fluid">
		<div class="coisa5">&nbsp;</div>
		<form id="addForm" method="post" action="{{action('ParceiroController@update', $data->id)}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			@include('/inc.errors')
			<div class="row bloco">
				<div class="col-md-12" align="center">
					<p class="titulo-page">Editar empresa</p>
				</div>
				<div class="col-md-2 text-center" align="center">
					<img id="foto" src="{{url("storage/parceiros/$data->foto")}}" class="foto-perfil" /><br><br>
					<p>
						<input type="radio" id="vazio" name="vazio" class="nao-mostrar" checked="false" value="1"></input>
						<label for="vazio" role="button" class="btn botao-nav botao-exclude" onClick="trocaFoto()">Excluir</label>

					<input type="file" name="file" id="file" class="inputfile margin-left-10-non-sm" onChange="readURL(this);" value=""/>
					<label for="file" class="btn botao-nav">Alterar</label> 
					</p>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="razão_social" class="titulo-campo">Razão Social</label>
						<input type="text" name="razão_social" id="razão_social" class="form-control input-new" value="{{$data->razao_social}}" />
					</div>
					<div class="form-group">
						<label for="nome_fantasia" class="titulo-campo">Nome Fantasia</label>
						<input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control input-new" value="{{$data->nome_fantasia}}" />
					</div>
					<div class="form-group">
						<label for="cnpj" class="titulo-campo">CNPJ</label>
						<input type="text" name="cnpj" id="cnpj" class="form-control input-new" value="{{$data->CNPJ}}" />
					</div>
					<div class="form-group">
						<label for="telefone" class="titulo-campo">Telefone</label>
						<input type="text" name="telefone" id="telefone" class="form-control input-new" value="{{$data->telefone}}" />
					</div>
					<div class="form-group">
						<label for="categoria" class="titulo-campo">Categoria</label>
						<select id="categoria" name="categoria" class="form-control input-new" >
							@foreach ($categorias as $categoria)
								{{-- expr --}}
								@if ($categoria['id'] == $data->categoria)
									{{-- expr --}}
									<option value="{{$categoria['id']}}" selected>{{$categoria['id']}} - {{$categoria['descricao']}}</option>
								@else
									<option value="{{$categoria['id']}}">{{$categoria['id']}} - {{$categoria['descricao']}}</option>
								@endif
								
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="email" class="titulo-campo">Email</label>
						<input type="email" name="email" id="email" class="form-control input-new"value="{{$data->email}}" readonly="" />
					</div>
					<div class="form-group">
						<label for="website" class="titulo-campo">Website</label>
						<input type="url" name="website" id="website" class="form-control input-new" value="{{$data->website}}"  />
					</div>
					<div class="form-group">
						<label for="endereço" class="titulo-campo">Endereço completo</label>
						<input type="text" name="endereço" id="endereço" class="form-control input-new" value="{{$data->endereco_completo}}"  />
					</div>
					<div class="form-group">
						<label for="pertencente" class="titulo-campo">Pertencente</label>
						<select id="pertencente" name="pertencente" class="form-control input-new" >
							@foreach ($pertencentes as $pertencente)
								{{-- expr --}}
								@if ($pertencente['id'] == $data->pertencente)
									{{-- expr --}}
									<option value="{{$pertencente['id']}}" selected>{{$pertencente['id']}} - {{$pertencente['nome']}}</option>
								@else
									<option value="{{$pertencente['id']}}">{{$pertencente['id']}} - {{$pertencente['nome']}}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="descrição" class="titulo-campo">Descrição da empresa</label>
						<textarea name="descrição" id="descrição" class="form-control input-new" style="resize: none; height: 100px;">{{$data->descricao}}</textarea>
					</div>
				</div>
				
				<div class="col-md-2">
					&nbsp;
				</div>
				<div class="col-md-5">
					&nbsp;
				</div>
				<div class="col-md-5 menor dist text-right">
					<a href="/parceiro_editar" type="button" class="btn btn-active" role="button">Cancelar edição</a>&nbsp;&nbsp;
					<button type="submit" class="btn botao-nav" role="submit" >Editar empresa</button>
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
		$('#foto').attr('src', '{{asset('storage/parceiros/logo-empresa.jpg')}}');
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
@endsection