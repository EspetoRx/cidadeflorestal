<?php

namespace App\Http\Controllers;

use App\CategoriasProdutosClientes;
use Illuminate\Http\Request;
use App\Categorias;

class CategoriasProdutosClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = CategoriasProdutosClientes::get();
        $lastcategoria = CategoriasProdutosClientes::get()->last();
        $categorias_parceiro = Categorias::get();
        $cpc = 'newactive';
        return view('/categorias_produtos/categorias', compact('categorias', 'categorias_parceiro', 'lastcategoria','cpc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'between' => 'O campo :attribute deve ter tamanho mínimo :min e máximo :max.',
            'email' => 'O texto do campo :attribute não é um e-mail válido.',
            'same' => 'As senhas digitadas não correspondem.',
            'alpha' => 'O campo :attribute deve conter apenas letras.',
            'accepted' => 'Você deve aceitar os termos e condições para usar.'
        ];

        $this->validate($request, [

            "categoria_parceiro" => "required",
            "descrição" => "required",

        ], $messages);

        $categorias = CategoriasProdutosClientes::where('categoria_clientes', '=', $request->categoria_parceiro)->get()->last();
        //return($categorias);

        $novo = new CategoriasProdutosClientes;
        $novo->categoria_clientes = $request->categoria_parceiro;
        $novo->id_this = $categorias->id_this + 1;
        $novo->descricao = $request->descrição;
        $novo->save();

        $insert_success = ['Categoria inserida com sucesso! =D'];

        $categorias = CategoriasProdutosClientes::get();
        $lastcategoria = CategoriasProdutosClientes::get()->last();
        $categorias_parceiro = Categorias::get();
        $cpc = 'newactive';
        return view('/categorias_produtos/categorias', compact('categorias', 'categorias_parceiro', 'lastcategoria', 'insert_success', 'cpc'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriasProdutosClientes  $categoriasProdutosClientes
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriasProdutosClientes $categoriasProdutosClientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriasProdutosClientes  $categoriasProdutosClientes
     * @return \Illuminate\Http\Response
     */
    public function edit($cpc)
    {
        //
        $edit = 'edit';
        $categorias = CategoriasProdutosClientes::get();
        $categoria = CategoriasProdutosClientes::find($cpc);
        $lastcategoria = CategoriasProdutosClientes::get()->last();
        $categorias_parceiro = Categorias::get();
        $cpc = 'newactive';
        return view('/categorias_produtos/categorias', compact('categorias', 'categoria', 'categorias_parceiro', 'lastcategoria', 'edit', 'cpc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriasProdutosClientes  $categoriasProdutosClientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cpc)
    {
        //

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'between' => 'O campo :attribute deve ter tamanho mínimo :min e máximo :max.',
            'email' => 'O texto do campo :attribute não é um e-mail válido.',
            'same' => 'As senhas digitadas não correspondem.',
            'alpha' => 'O campo :attribute deve conter apenas letras.',
            'accepted' => 'Você deve aceitar os termos e condições para usar.'
        ];

        $this->validate($request, [

            "categoria_parceiro" => "required",
            "descrição" => "required",

        ], $messages);

        $categoria = CategoriasProdutosClientes::find($cpc);

        if($request->categoria_parceiro != $categoria->categoria_clientes){
            $categorias = CategoriasProdutosClientes::where('categoria_clientes', '=', $request->categoria_parceiro)->get()->last();
            $categoria->categoria_clientes = $request->categoria_parceiro;
            $categoria->descricao = $request->descrição;
            $categoria->id_this = $categorias->id_this + 1;
        }else{
            $categoria->descricao = $request->descrição;
        }

        $categoria->save();

        $insert_success = ['Categoria editada com sucesso! =D'];

        $categorias = CategoriasProdutosClientes::get();
        $lastcategoria = CategoriasProdutosClientes::get()->last();
        $categorias_parceiro = Categorias::get();
        $cpc = 'newactive';
        return view('/categorias_produtos/categorias', compact('categorias', 'categorias_parceiro', 'lastcategoria', 'insert_success', 'cpc'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriasProdutosClientes  $categoriasProdutosClientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($cpc)
    {
        //
        $categoria = CategoriasProdutosClientes::find($cpc);
        $categoria->delete();
        $insert_success = ['Categoria deletada com sucesso! =D'];

        $categorias = CategoriasProdutosClientes::get();
        $lastcategoria = CategoriasProdutosClientes::get()->last();
        $categorias_parceiro = Categorias::get();
        $cpc = 'newactive';
        return view('/categorias_produtos/categorias', compact('categorias', 'categorias_parceiro', 'lastcategoria', 'insert_success', 'cpc'));
    }
}
