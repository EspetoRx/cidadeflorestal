@extends('app.app_interno',['perfil' => 'newactive', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => 'newactive', 'excluir_perfil' =>'', 'eps' => '', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => '', 'prod_adc' => ''])

@section('conteudo')
	<div class="container-fluid">
		<div class="coisa5">&nbsp;</div>
		@include('/inc.errors')
		<form id="addForm" method="post" action="{{action('UsersController@update',  $id)}}" enctype="multipart/form-data">
			{{ csrf_field() }}
    		{{ method_field('PATCH') }}
			<div class="row bloco">
				<div class="col-md-12" align="center">
					@if (isset($titulo))
						<p class="titulo-page">{{$titulo}}</p>
					@else
						<p class="titulo-page">Editar Perfil</p>
					@endif
				</div>
				<div class="col-md-2 text-center" align="center">
					<img id="foto" src="{{url("storage/users/$user->foto")}}" class="foto-perfil" /><br><br>
					<p><input type="radio" id="vazio" name="vazio" class="nao-mostrar" checked="false" value="1"></input>
					<label for="vazio" role="button" class="btn botao-nav botao-exclude" onClick="trocaFoto()">Excluir</label>
					<input type="file" name="file" id="file" class="inputfile margin-left-10-non-sm" onChange="readURL(this);" value="{{asset("storage/users/$user->foto")}}"/>
					<label for="file" class="btn botao-nav">Inserir</label> 
					</p>
				</div>
				<div class="col-md-5">
					<h3 class="titulo-campo">Nome:</h3>
					<input type="text" id="nome" name="nome" class="form-control input-edit" value="{{$user->nome}}"/>
					<h3 class="titulo-campo">E-mail:</h3>
					<input type="email" id="email" name="email" class="form-control input-edit" value="{{$user->email}}"/>
				</div>
				<div class="col-md-5">
					<h3 class="titulo-campo">Empresa:</h3>
					<input type="text" id="empresa" name="empresa" class="form-control readonly" readonly/>
					<h3 class="titulo-campo">Tipo:</h3>
					{{-- <input type="text" id="tipo" name="tipo" class="form-control input-edit" /> --}}
					<select name="tipo" id="tipo" class="form-control" @if (Session::get('tipo') != 1)
						readonly=""
					@endif>
						@foreach ($tipos as $tipo)
							{{-- expr --}}
							@if($tipo->id == $user->tipo)
								<option value="{{ $tipo->id }}" selected>{{ $tipo->id }} - {{ $tipo->descricao }}</option>
							@else
								<option value="{{ $tipo->id }}">{{ $tipo->id }} - {{ $tipo->descricao }}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="offset-md-7 col-md-5 menor dist text-right">
					<a href="/meuPerfil" type="button" class="btn btn-active" role="button">Cancelar edição</a>&nbsp;&nbsp;
					<button type="submit" class="btn botao-nav" role="submit">Editar perfil</button>
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
		$('#foto').attr('src', '{{asset('storage/users/perfil.jpg')}}');
		$('#file').attr('value', "perfil.jpg");
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