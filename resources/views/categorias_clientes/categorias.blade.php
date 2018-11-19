@extends('app.app_interno', ['perfil' => '', 'create_perfil' => '', 'visualiza_perfil' => '', 'editar_perfil' => '', 'excluir_perfil' =>'', 'eps' => 'newactive', 'inc_empresa' => '', "exb_emp" => '', 'emp_ed' => '', 'emp_ex' => ''])

@section('conteudo')
	<div class="container-fluid" align="center">
	<div class="coisa5">&nbsp;</div>
	<div class="row">
		<div class="col-md-12">
			<p class="titulo-categorias">Categorias das Empresas</p>
		</div>
	</div>
	@include('/inc.errors')
	<form action="@if(isset($edit))
		{{action('CategoriasController@update', $categoria->id)}}
	@else
		/cc
	@endif" method="post">
		{{ csrf_field() }}
		@if(isset($edit))
			{{ method_field('PATCH') }}
		@endif
		<div class="row @if(isset($edit))
			alert alert-success
		@endif">
			<div class="col-md-12">
				@if(isset($edit))
					<p>Editando categoria existente</p>
				@else
					<p>Adicionar nova categoria</p>
				@endif
			</div>
			<div class="offset-md-2 col-md-4 form-group">
				<input type="text" id="descrição" name="descrição" class="form-control" @if (isset($edit))
					value="{{$categoria->descricao}}"
				@else
					placeholder="Descrição..."
				@endif/>
			</div>
			<div class="col-md-4 form-group">
				<button type="submit" role="submit" class="btn btn-success">@if (isset($edit))
					{{-- expr --}}
					Editar categoria
				@else
					Cadastrar categoria
				@endif</button>
			</div>
		</div>
	</form>
	<div class="row show-md-hide-sm">
		<div class="col-md-1 text-center">
			<strong>ID</strong>
		</div>
		<div class="col-md-8 text-center">
			<strong>Descrição</strong>
		</div>
		<div class="col-md-3 text-center">
			<strong>Ações</strong>
		</div>
	</div>
	@php
		$contador = 0;
	@endphp
	@if (isset($categorias))
	   @foreach ($categorias as $categoria)
	    	@if ($contador%2 == 0)
	    	<div class="row linha-escura menor-categorias">
		    		<div class="col-md-12">
		    			<strong>ID: </strong>{{$categoria->id}} <br>
						<strong>Descrição:</strong> {{$categoria->descricao}} <br>
						<strong>Ações: </strong><form id="form{{$categoria->id}}" action="{{action('CategoriasController@destroy', $categoria->id)}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<strong><a href="/cc/{{$categoria->id}}/edit" class="action-links"><i class="fas fa-pen"></i> Editar</a></strong>
							<button class="nobutton" type="submit"><strong><i class="fas fa-trash-alt"></i> Excluir</strong></button>
						</form>
		    		</div>
		    	</div>
	    		<div class="row linha-escura">
	    			<div class="col-md-1 text-center">
						<strong>{{$categoria->id}}</strong>
					</div>
					<div class="col-md-8 text-left">
						<strong>{{$categoria->descricao}}</strong>
					</div>
					<div class="col-md-3 text-center">
						<form id="form{{$categoria->id}}" action="{{action('CategoriasController@destroy', $categoria->id)}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<strong><a href="/cc/{{$categoria->id}}/edit" class="action-links"><i class="fas fa-pen"></i> Editar</a></strong>
							<button class="nobutton" type="submit"><strong><i class="fas fa-trash-alt"></i> Excluir</strong></button>
						</form>
					</div>
		    	</div>
		    	
		    	@php
		    		$contador++
		    	@endphp
	    	@else
	    	<div class="row linha-clara menor-categorias">
	    		<div class="col-md-12">
					<strong>ID: </strong>{{$categoria->id}} <br>
					<strong>Descrição:</strong> {{$categoria->descricao}} <br>
					<strong>Ações:</strong> <form id="form{{$categoria->id}}" action="{{action('CategoriasController@destroy', $categoria->id)}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<strong><a href="/cc/{{$categoria->id}}/edit" class="action-links"><i class="fas fa-pen"></i> Editar</a></strong>
							<button type="submit"  class="nobutton" ><strong><i class="fas fa-trash-alt"></i> Excluir</strong></button>
						
					</form>
				</div>
	    	</div>
	    	<div class="row linha-clara">
    			<div class="col-md-1 text-center">
					<strong>{{$categoria->id}}</strong>
				</div>
				<div class="col-md-8 text-left">
					<strong>{{$categoria->descricao}}</strong>
				</div>
				<div class="col-md-3 text-center">
					<form id="form{{$categoria->id}}" action="{{action('CategoriasController@destroy', $categoria->id)}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<strong><a href="/cc/{{$categoria->id}}/edit" class="action-links"><i class="fas fa-pen"></i> Editar</a></strong>
							<button type="submit"  class="nobutton" ><strong><i class="fas fa-trash-alt"></i> Excluir</strong></button>
						
					</form>
				</div>
	    	</div>
	    	@php
	    		$contador++
	    	@endphp
	    	@endif
	    @endforeach 
	@endif
	<div class="coisa5">&nbsp;</div>
	</div>
@endsection