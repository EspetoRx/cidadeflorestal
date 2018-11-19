@extends('app.app_interno',['perfil' => '', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => 'newactive', 'inc_empresa' => 'newactive', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => '', 'prod_adc' => ''])

@section('conteudo')
	<div class="container">
		<div class="coisa5">&nbsp;</div>
		<form id="addForm" method="post" action="/parceiro" enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<div class="row bloco">
				<div class="col-md-12" align="center">
					<p class="titulo-page">Adicionar Nova Empresa</p>
					@include('/inc.errors')
				</div>
				<div class="col-md-2 text-center" align="center">

					<img id="foto" src="{{asset('images/logo-empresa.jpg')}}" class="foto-perfil" /><br><br>
					<p><button type="button" role="button" class="btn botao-nav" onClick="trocaFoto();">Exclui</button>
					<input type="file" name="file" id="file" class="inputfile margin-left-10-non-sm" onChange="readURL(this);" value=""/>
					<label for="file" class="btn botao-nav" onClick="">Inserir</label> 
					</p>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="razão_social" class="titulo-campo">Razão Social</label>
						<input type="text" name="razão_social" id="razão_social" class="form-control input-new" placeholder="Borgin & Burkes LTDA..."/>
					</div>
					<div class="form-group">
						<label for="nome_fantasia" class="titulo-campo">Nome Fantasia</label>
						<input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control input-new" placeholder="Borgin Tecnologias..."/>
					</div>
					<div class="form-group">
						<label for="cnpj" class="titulo-campo">CNPJ</label>
						<input type="text" name="cnpj" id="cnpj" class="form-control input-new" placeholder="XX.XXX.XXX/XXX-XX"/>
					</div>
					<div class="form-group">
						<label for="telefone" class="titulo-campo">Telefone</label>
						<input type="text" name="telefone" id="telefone" class="form-control input-new" placeholder="(XX) XXX XXX XXX"/>
					</div>
					<div class="form-group">
						<label for="categoria" class="titulo-campo">Categoria</label>
						<select id="categoria" name="categoria" class="form-control input-new">
							@foreach ($categorias as $categoria)
								{{-- expr --}}
								<option value="{{$categoria['id']}}">{{$categoria['id']}} - {{$categoria['descricao']}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="email" class="titulo-campo">Email</label>
						<input type="email" name="email" id="email" class="form-control input-new" placeholder="exemplo@borgin.burkes"/>
					</div>
					<div class="form-group">
						<label for="website" class="titulo-campo">Website</label>
						<input type="url" name="website" id="website" class="form-control input-new" placeholder="http://borgin&burkes.com..." />
					</div>
					<div class="form-group">
						<label for="endereço" class="titulo-campo">Endereço completo</label>
						<input type="text" name="endereço" id="endereço" class="form-control input-new" placeholder="Alameda dos professores, nº 157, Roma" />
					</div>
					<div class="form-group">
						<label for="pertencente" class="titulo-campo">Pertencente</label>
						<select id="pertencente" name="pertencente" class="form-control input-new">
							@foreach ($pertencentes as $pertencente)
								{{-- expr --}}
								<option value="{{$pertencente['id']}}">{{$pertencente['id']}} - {{$pertencente['nome']}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="descrição" class="titulo-campo">Descrição da empresa</label>
						<textarea name="descrição" id="descrição" class="form-control input-new" style="resize: none; height: 100px;" placeholder="Minha empresa é a melhor da minha região..."></textarea>
					</div>
				</div>
				
				<div class="col-md-2">
					&nbsp;
				</div>
				<div class="col-md-5">
					&nbsp;
				</div>
				<div class="col-md-5 menor dist text-right">
					<button type="button" class="btn btn-active" role="button" onClick="clearForm();">Cancelar adição</button>&nbsp;&nbsp;
					<button type="submit" class="btn botao-nav" role="submit" >Adicionar empresa</button>
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
		$('#foto').attr('src', '{{asset('storage/parceiros/logo-empresa.jpg')}}');
		$('#file').attr('value', "");
	}

	</script>

	<script type="text/javascript">
		function clearForm(){
			document.getElementById("addForm").reset();
		}
	</script>
@endsection