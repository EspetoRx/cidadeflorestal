<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipo_usuario;

class tipo_usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = tipo_usuario::get();
        //dd($categorias_parceiro);
        $tp = 'newactive';
        return view('/tipo_usuario/tipo_usuario', compact('categorias', 'tp'));
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

        $novo = new tipo_usuario;
        $novo->descricao = $request->descrição;
        $novo->save();

        $insert_success = ['Tipo inserido com sucesso! =D'];

        $categorias = tipo_usuario::get();
        $tp = 'newactive';
        return view('/tipo_usuario/tipo_usuario', compact('categorias', 'tp', 'insert_success'));
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
        $categorias = tipo_usuario::get();
        $categoria = tipo_usuario::find($id);
        $tp = 'newactive';
        return view('/tipo_usuario/tipo_usuario', compact('categorias', 'tp', 'categoria', 'edit'));
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

        $novo = tipo_usuario::find($id);
        $novo->descricao = $request->descrição;
        $novo->save();

        $insert_success = ['Tipo alterado com sucesso! =D'];

        $categorias = tipo_usuario::get();
        $tp = 'newactive';
        return view('/tipo_usuario/tipo_usuario', compact('categorias', 'tp', 'insert_success'));
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
        $novo = tipo_usuario::find($id);
        $novo->delete();

        $insert_success = ['Tipo removido com sucesso! =D'];

        $categorias = tipo_usuario::get();
        $tp = 'newactive';
        return view('/tipo_usuario/tipo_usuario', compact('categorias', 'tp', 'insert_success'));
    }
}
