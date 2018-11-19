@extends('app.app_interno',['perfil' => '', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => 'newactive', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => 'newactive', 'prod_adc' => '' ])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
		<form id="addForm" method="post" action="{{route('parceiro.destroy', ['id' => $data->id])}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			@include('/inc.errors')
			<div class="row bloco">
				<div class="col-md-12" align="center">
					<p class="titulo-page">Visualizar Empresa para exclusão</p>
				</div>
				<div class="col-md-2 text-center" align="center">
					<img id="foto" src="{{url("storage/parceiros/$data->foto")}}" class="foto-perfil" /><br><br>
					{{-- <p><a href="" class="btn botao-nav" onClick="resetURL();">Exclui</a>
					<input type="file" name="file" id="file" class="inputfile margin-left-10-non-sm" onChange="readURL(this);" value=""/>
					<label for="file" class="btn botao-nav" onClick="">Inserir</label> 
					</p> --}}
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="razão_social" class="titulo-campo">Razão Social</label>
						<input type="text" name="razão_social" id="razão_social" class="form-control input-new" value="{{$data->razao_social}}" readonly="" />
					</div>
					<div class="form-group">
						<label for="nome_fantasia" class="titulo-campo">Nome Fantasia</label>
						<input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control input-new" value="{{$data->nome_fantasia}}" readonly=""/>
					</div>
					<div class="form-group">
						<label for="cnpj" class="titulo-campo">CNPJ</label>
						<input type="text" name="cnpj" id="cnpj" class="form-control input-new" value="{{$data->CNPJ}}" readonly=""/>
					</div>
					<div class="form-group">
						<label for="telefone" class="titulo-campo">Telefone</label>
						<input type="text" name="telefone" id="telefone" class="form-control input-new" value="{{$data->telefone}}" readonly=""/>
					</div>
					<div class="form-group">
						<label for="categoria" class="titulo-campo">Categoria</label>
						<select id="categoria" name="categoria" class="form-control input-new" readonly="">
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
						<input type="email" name="email" id="email" class="form-control input-new"value="{{$data->email}}" readonly=""/>
					</div>
					<div class="form-group">
						<label for="website" class="titulo-campo">Website</label>
						<input type="url" name="website" id="website" class="form-control input-new" value="{{$data->website}}" readonly="" />
					</div>
					<div class="form-group">
						<label for="endereço" class="titulo-campo">Endereço completo</label>
						<input type="text" name="endereço" id="endereço" class="form-control input-new" value="{{$data->endereco_completo}}" readonly="" />
					</div>
					<div class="form-group">
						<label for="pertencente" class="titulo-campo">Pertencente</label>
						<select id="pertencente" name="pertencente" class="form-control input-new" readonly="">
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
						<textarea name="descrição" id="descrição" class="form-control input-new" style="resize: none; height: 100px;" readonly="">{{$data->descricao}}</textarea>
					</div>
				</div>
				
				<div class="col-md-2">
					&nbsp;
				</div>
				<div class="col-md-5">
					&nbsp;
				</div>
				<div class="col-md-5 menor dist text-right">
					<a href="/parceiro_excluir" type="button" class="btn btn-active" role="button">Cancelar exclusao</a>&nbsp;&nbsp;
					<button type="submit" class="btn botao-nav" role="submit" >Excluir empresa</button>
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
	</script>
@endsection