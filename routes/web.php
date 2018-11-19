<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');


Route::resource('/perfil', 'UsersController');
Route::get('/perfil_editar', 'UsersController@indexToEdit');
Route::get('/perfil_excluir', 'UsersController@indexToExclude');
Route::get('/confirmar_exclusao_perfil/{id}', 'UsersController@excludeThis');
Route::get('/meuPerfil', 'UsersController@visualizaMeuPerfil');
Route::get('/alterarMeuPerfil', 'UsersController@alterarMeuPerfil');

Route::resource('/parceiro', 'ParceiroController');
Route::get('/parceiro_editar', 'ParceiroController@indexToEdit');
Route::get('/parceiro_excluir', 'ParceiroController@indexToExclude');
Route::get('/con_exc_parceiro/{id}', 'ParceiroController@excludeThis');
Route::get('/escolheEmpresa', 'ParceiroController@escolheEmpresa');
Route::get('/escolheEmpresaEditar', 'ParceiroController@escolheEmpresaEditar');
Route::get('/minhaEmpresa/{id}', 'ParceiroController@minhaEmpresa');
Route::get('/minhaEmpresaEdit/{id}', 'ParceiroController@editMinhaEmpresa');
Route::get('/empresa/{id}', 'IndexController@paginaParceiro');

Route::resource('/produto', 'ProdutoController');
Route::get('/prd_edt', 'ProdutoController@indexToEdit');
Route::get('/prd_exc', 'ProdutoController@indexToExclude');
Route::get('/produto/{id}/con_exc', 'ProdutoController@excludeThis');
Route::get('/visualizarMeusProdutos', 'ProdutoController@visualizarMeusProdutos');
Route::get('/visualizarMeuProduto/{id}', 'ProdutoController@visualizarMeuProduto');
Route::get('/adicionarNovoProduto', 'ProdutoController@adicionarNovoProduto');
Route::get('/empresa/produto/{id}', 'IndexController@paginaProduto');

Route::resource('/cpc', 'CategoriasProdutosClientesController');

Route::resource('/cc', 'CategoriasController');

Route::resource('/tp', 'tipo_usuarioController');

Route::resource('/pasta', 'PastaController');

Route::resource('/noticias', 'NoticiaController');
Route::get('/noticias/view_pasta/{id}', 'NoticiaController@indexPasta');
Route::get('/noticias/exclude_this/{id}', 'NoticiaController@excludeThis');
Route::get('/minhasNoticias', 'NoticiaController@minhasNoticias');
Route::get('/addicionarNoticia', 'NoticiaController@addMinha');
Route::get('/blog', 'IndexController@blog');
Route::get('/blog/pasta/{id}', 'IndexController@blogPasta');
Route::get('/blog/noticia/{id}', 'IndexController@blogNoticia');

Route::resource('/comentario', 'ComentarioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
