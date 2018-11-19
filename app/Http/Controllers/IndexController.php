<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;
use App\Parceiro;
use App\Noticia;
use App\User;
use App\Pasta;
use App\Produto;
use App\TipoQuantidade;
use App\Comentario;

class IndexController extends Controller
{
    //
    public function index(){
    	$categorias = Categorias::get();
    	$parceiros = Parceiro::get();
    	$noticias = Noticia::orderBy('created_at', 'desc')->take(2)->get();
    	$autores = User::get();
    	$pastas = Pasta::get();
    	$index = 'active';
        $comentarios = Comentario::get();
    	return view('/index.index_page', compact('categorias', 'parceiros', 'noticias', 'autores', 'pastas', 'index', 'comentarios'));
    }

    public function paginaParceiro($id){
    	$parceiro = Parceiro::find($id);
    	$produtos = Produto::where('parceiro', $id)->get();
    	$empresa = 'active';
    	return view('/parceiros.public_parceiro', compact('parceiro', 'empresa', 'produtos'));
    }

    public function paginaProduto($id){
    	$produto = Produto::find($id);
    	$empresa = 'active';
    	$medida = TipoQuantidade::find($produto->tipoquantidade);
    	return view('/produtos/produto_publico', compact('produto', 'empresa', 'medida'));
    }

    public function blog(){
        $noticias = Noticia::orderBy('created_at', 'desc')->paginate(5);
        $autores = User::get();
        $pastas = Pasta::get();
        $comentarios = Comentario::get();
        $noticiam = 'active';
        return view('/noticias/blog', compact('noticias', 'autores', 'pastas', 'noticiam', 'comentarios'));
    }

    public function blogPasta($id){
        $noticias = Noticia::where('pasta', $id)->orderBy('created_at', 'desc')->paginate(5);
        $autores = User::get();
        $pastas = Pasta::get();
        $comentarios = Comentario::get();
        $noticiam = 'active';
        return view('/noticias/blog', compact('noticias', 'autores', 'pastas', 'noticiam', 'comentarios'));
    }

    public function blogNoticia($id){
        $noticia = Noticia::find($id);
        $autores = User::get();
        $pastas = Pasta::get();
        $comentarios = Comentario::where('id_postagem', $id)->where('verificador',1)->get();
        $noticiam = 'active';
        return view('/noticias/blog_noticia', compact('noticia', 'autores', 'pastas', 'noticiam', 'comentarios'));
    }
}
