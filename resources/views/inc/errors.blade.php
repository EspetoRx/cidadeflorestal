@if ( count ($errors) != 0)
	{{-- expr --}}
	<div class="alert alert-danger row">
		<div class="col-md-12">

			{{-- Título da caixa de erros --}}

			@if ( count ($errors) == 1 )
				{{-- expr --}}

				<p class="titulo-erro">ERRO ENCONTRADO</p>

			@else

				<p class="titulo-erro">ERROS ENCONTRADOS</p>

			@endif

			{{-- Apresentar os erros (concatenação) --}}
			<ul class="text-left" align="justify">
				@foreach ($errors->all() as $erro)
					{{-- expr --}}

					<li>{{ $erro }}</li>

				@endforeach
			</ul>
		
		</div>
	</div>
@endif

{{-- Apresentação dos erros da validação com o banco de dados --}}
@if ( isset ($erros_bd) )
	{{-- expr --}}

	<div class="alert alert-danger">
		
		@if ( count ($erros_bd) == 1 )
			{{-- expr --}}

			<p class="titulo-erro">ERRO DE BANCO DE DADOS</p>

		@else

			<p class="titulo-erro">ERROS DE BANCO DE DADOS</p>

		@endif

		<ul class="text-left">
			@foreach ($erros_bd as $erro)
				{{-- expr --}}

				<li align="justify">{{ $erro }}</li>

			@endforeach
		</ul>

		

	</div>
@endif

@if ( isset ($insert_success) )
	{{-- expr --}}

	<div class="alert alert-success">

		<ul class="text-left">
			@foreach ($insert_success as $insert_succes)
				{{-- expr --}}

				<li align="justify">{{ $insert_succes }}</li>

			@endforeach
		</ul>

		

	</div>
@endif

@if ( session()->has('insert_success') )
	{{-- expr --}}

	<div class="alert alert-success">

		<ul class="text-left">

				{{-- expr --}}

				<li align="justify">{{ session()->get('insert_success') }}</li>

		</ul>

		

	</div>
@endif
