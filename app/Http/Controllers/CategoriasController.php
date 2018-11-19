<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categorias::get();
        //dd($categorias_parceiro);
        $cc = 'newactive';
        return view('/categorias_clientes/categorias', compact('categorias', 'cc'));
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

            "descrição" => "required",

        ], $messages);

        $novo = new Categorias;
        $novo->descricao = $request->descrição;
        $novo->save();

        $insert_success = ['Categoria inserida com sucesso! =D'];

        $categorias = Categorias::get();
        $cc = 'newactive';
        return view('/categorias_clientes/categorias', compact('categorias', 'cc', 'insert_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit = 'edit';
        $categorias = Categorias::get();
        $categoria = Categorias::find($id);
        $cc = 'newactive';
        return view('/categorias_clientes/categorias', compact('categorias', 'cc', 'categoria', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

            "descrição" => "required",

        ], $messages);

        
        $novo = Categorias::find($id);
        $novo->descricao = $request->descrição;
        $novo->save();

        $insert_success = ['Categoria alterada com sucesso! =D'];

        $categorias = Categorias::get();
        $cc = 'newactive';
        return view('/categorias_clientes/categorias', compact('categorias', 'cc', 'insert_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $novo = Categorias::find($id);
        $novo->delete();

        $insert_success = ['Categoria deletada com sucesso! =D'];

        $categorias = Categorias::get();
        $cc = 'newactive';
        return view('/categorias_clientes/categorias', compact('categorias', 'cc', 'insert_success'));
    }
}
