<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;
use Redirect;
use App\Noticia;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comentarios = Comentario::where('verificador',0)->get();
        $noticias = Noticia::get();
        $bnc = 'newactive';
        $comment = 'newactive';
        return view('/comentarios.comentarios', compact('bnc', 'comentarios', 'comment', 'noticias'));
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
            'accepted' => 'Você deve aceitar os termos e condições para usar.',
            'alpha_dash' => 'O campo :attribute pode conter somente letras, números e espaços.',
        ];

        $this->validate($request, [

            "nome" => "required|between:3,255",
            "email" => "required|min:3|email",
            "comentário" => "required"

        ], $messages);

        $novo = new Comentario;
        $novo->autor = $request->nome;
        $novo->email = $request->email;
        $novo->comentario = $request->comentário;
        $novo->id_postagem = $request->id_postagem;
        $novo->verificador = 0;
        $novo->save();

        $insert_success = "Comentário feito com sucesso! Aguarde a aprovação da moderação.";

        return redirect('/blog/noticia/'.$request->id_postagem)->with(compact('insert_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update($comentario)
    {
        //
        $comentario = Comentario::find($comentario);
        $comentario->verificador = 1;
        $comentario->save();

        return redirect('/comentario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy($comentario)
    {
        //
        $comentario = Comentario::find($comentario);
        $comentario->delete();

        return redirect('/comentario');
    }
}
