<?php

namespace App\Http\Controllers;

use App\Pasta;
use Illuminate\Http\Request;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Pasta::get();
        //dd($categorias_parceiro);
        $bnc = 'newactive';
        $pasta = 'newactive';
        return view('/pastas/pasta', compact('categorias', 'pasta', 'bnc'));
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

        $novo = new Pasta;
        $novo->descricao = $request->descrição;
        $novo->save();

        $insert_success = ['Pasta inserida com sucesso! =D'];

        $categorias = Pasta::get();
        $pasta = 'newactive';
        $bnc = 'newactive';
        return view('/pastas/pasta', compact('categorias', 'pasta', 'insert_success', 'bnc'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function show(Pasta $pasta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit = 'edit';
        $categorias = Pasta::get();
        $categoria = Pasta::find($id);
        $pasta = 'newactive';
        $bnc = 'newactive';
        return view('/pastas/pasta', compact('categorias', 'pasta', 'categoria', 'edit', 'bnc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasta  $pasta
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

        $novo = Pasta::find($id);
        $novo->descricao = $request->descrição;
        $novo->save();

        $insert_success = ['Pasta alterada com sucesso! =D'];

        $categorias = Pasta::get();
        $pasta = 'newactive';
        $bnc = 'newactive';
        return view('/pastas/pasta', compact('categorias', 'pasta', 'insert_success', 'bnc'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $novo = Pasta::find($id);
        $novo->delete();

        $insert_success = ['Pasta excluída com sucesso! =D'];

        $categorias = Pasta::get();
        $pasta = 'newactive';
        $bnc = 'newactive';
        return view('/pastas/pasta', compact('categorias', 'pasta', 'insert_success', 'bnc'));
    }
}
