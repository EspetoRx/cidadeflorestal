<?php

namespace App\Http\Controllers;

use App\Noticia;
use App\User;
use App\Pasta;
use App\Comentario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            return redirect('/minhasNoticias');
        }
        $noticia_visualize = 'newactive';
        $bnc = 'newactive';
        $noticias = Noticia::orderBy('created_at', 'desc')->paginate(5);
        $pastas = Pasta::get();
        $autores = User::get();
        return view('/noticias/noticia_index', compact('noticia_visualize', 'bnc', 'noticias', 'autores', 'pastas'));
    }

    public function indexPasta($id)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $noticia_visualize = 'newactive';
        $bnc = 'newactive';
        $noticias = Noticia::where('pasta', $id)->orderBy('created_at', 'desc')->paginate(5);
        $pastas = Pasta::get();
        $autores = User::get();
        $pasta_vis = $id;
        return view('/noticias/noticia_index', compact('noticia_visualize', 'bnc', 'noticias', 'autores', 'pastas', 'pasta_vis'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $autores = User::get();
        $pastas = Pasta::get();
        $noticia_create = 'newactive';
        $bnc = 'newactive';
        return view('/noticias/noticia_create', compact('noticia_create', 'autores', 'pastas', 'bnc'));
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
        if(Session::get('id') == null){
            return redirect('/login');
        }
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

            "título" => "required|between:3,255",
            "texto_da_notícia" => "required|min:3",
            "autor" => "required",
            "pasta" => "required",
            "foto_ou_vídeo" => "required",

        ], $messages);

        $novo = new Noticia;

        if($request->foto_ou_vídeo == 1){

            $this->validate($request, [

                "endereço" => "required|url"

            ], $messages);

            $novo->endereco = $request->endereço;

        }else if($request->foto_ou_vídeo == 0){

            if( $request->hasFile('file') && $request->file('file')->isValid() ){
                $system_time = Carbon::now();
                if( str_contains($request->título, '?') || str_contains($request->título, '/') || str_contains($request->título, ';') || str_contains($request->título, '\\') || str_contains($request->título, '*') || str_contains($request->título, '\"') || str_contains($request->título, '<') || str_contains($request->título, '>') || str_contains($request->título, '|')){
                    if( str_contains($request->título, '?') ){
                        $nome_foto = str_replace('?', '', $request->título);
                    }
                    if( str_contains($request->título, '/') || str_contains($nome_foto, '/') ){
                        $nome_foto = str_replace('/', '', $nome_foto);
                    }
                    if( str_contains($request->título, ';') || str_contains($nome_foto, '/') ){
                        $nome_foto = str_replace(';', '', $nome_foto);
                    }
                    if( str_contains($request->título, '\\') || str_contains($nome_foto, '\\') ){
                        $nome_foto = str_replace('\\', '', $nome_foto);
                    }
                    if( str_contains($request->título, '*') || str_contains($nome_foto, '*') ){
                        $nome_foto = str_replace('*', '', $nome_foto);
                    }
                    if( str_contains($request->título, '\"') || str_contains($nome_foto, '\"') ){
                        $nome_foto = str_replace('\"', '', $nome_foto);
                    }
                    if( str_contains($request->título, '<') || str_contains($nome_foto, '<') ){
                        $nome_foto = str_replace('<', '', $nome_foto);
                    }
                    if( str_contains($request->título, '<') || str_contains($nome_foto, '<') ){
                        $nome_foto = str_replace('<', '', $nome_foto);
                    }
                    if( str_contains($request->título, '|') || str_contains($nome_foto, '|') ){
                        $nome_foto = str_replace('|', '', $nome_foto);
                    }

                    $name = kebab_case($nome_foto .' '.$system_time->toDateString());
                }else{
                    $name = kebab_case($request->título .' '.$system_time->toDateString());
                }
                $extension = $request->file->extension();
                $nome_final = $name .".". $extension;
                $novo->endereco = $nome_final;
                $upload = $request->file->storeAs('noticia', $nome_final);
                //return dd($novo);
            }

        }else if($request->foto_ou_vídeo == 2){
            $novo->endereco = '';
        }

        

        $novo->titulo = $request->título;
        $novo->texto_noticia = $request->texto_da_notícia;
        $novo->f_ou_v = $request->foto_ou_vídeo;
        $novo->autor = $request->autor;
        $novo->pasta = $request->pasta;
        $novo->save();

        return redirect('/noticias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($noticia)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }
        $noticia_visualize = 'newactive';
        $bnc = 'newactive';
        $noticia = Noticia::find($noticia);
        $autores = User::get();
        $pastas = Pasta::get();
        return view('/noticias/noticia_visualize', compact('noticia_visualize', 'bnc', 'noticia', 'autores', 'pastas'));
    }

    public function excludeThis($noticia)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }
        $noticia_exclude = 'newactive';
        $bnc = 'newactive';
        $noticia = Noticia::find($noticia);
        $autores = User::get();
        $pastas = Pasta::get();
        $exclude = 'exclude';
        return view('/noticias/noticia_create', compact('noticia_exclude', 'bnc', 'noticia', 'autores', 'pastas', 'exclude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }
        $autores = User::get();
        $pastas = Pasta::get();
        $noticia = Noticia::find($id);
        $edit = 'edit';
        $noticia_altera = 'newactive';
        $bnc = 'newactive';
        return view('/noticias/noticia_create', compact('noticia_altera', 'autores', 'pastas', 'bnc', 'edit', 'noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Session::get('id') == null){
            return redirect('/login');
        }
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

            "título" => "required|between:3,255",
            "texto_da_notícia" => "required|min:3",
            "autor" => "required",
            "pasta" => "required",
            "foto_ou_vídeo" => "required",

        ], $messages);

        $novo = Noticia::find($id);

        if($request->foto_ou_vídeo == 1){

            $this->validate($request, [

                "endereço" => "required|url"

            ], $messages);

            $novo->endereco = $request->endereço;

        }else if($request->foto_ou_vídeo == 0){

            if( $request->hasFile('file') && $request->file('file')->isValid() ){
                $system_time = Carbon::now();
                if( str_contains($request->título, '?') || str_contains($request->título, '/') || str_contains($request->título, ';') || str_contains($request->título, '\\') || str_contains($request->título, '*') || str_contains($request->título, '\"') || str_contains($request->título, '<') || str_contains($request->título, '>') || str_contains($request->título, '|')){
                    if( str_contains($request->título, '?') ){
                        $nome_foto = str_replace('?', '', $request->título);
                    }
                    if( str_contains($request->título, '/') || str_contains($nome_foto, '/') ){
                        $nome_foto = str_replace('/', '', $nome_foto);
                    }
                    if( str_contains($request->título, ';') || str_contains($nome_foto, '/') ){
                        $nome_foto = str_replace(';', '', $nome_foto);
                    }
                    if( str_contains($request->título, '\\') || str_contains($nome_foto, '\\') ){
                        $nome_foto = str_replace('\\', '', $nome_foto);
                    }
                    if( str_contains($request->título, '*') || str_contains($nome_foto, '*') ){
                        $nome_foto = str_replace('*', '', $nome_foto);
                    }
                    if( str_contains($request->título, '\"') || str_contains($nome_foto, '\"') ){
                        $nome_foto = str_replace('\"', '', $nome_foto);
                    }
                    if( str_contains($request->título, '<') || str_contains($nome_foto, '<') ){
                        $nome_foto = str_replace('<', '', $nome_foto);
                    }
                    if( str_contains($request->título, '<') || str_contains($nome_foto, '<') ){
                        $nome_foto = str_replace('<', '', $nome_foto);
                    }
                    if( str_contains($request->título, '|') || str_contains($nome_foto, '|') ){
                        $nome_foto = str_replace('|', '', $nome_foto);
                    }

                    $name = kebab_case($nome_foto .' '.$system_time->toDateString());
                }else{
                    $name = kebab_case($request->título .' '.$system_time->toDateString());
                }
                $extension = $request->file->extension();
                $nome_final = $name .".". $extension;
                $novo->endereco = $nome_final;
                $upload = $request->file->storeAs('noticia', $nome_final);
                //return dd($novo);
            }else{
                $novo->endereco = "";
            }

        }

        $novo->titulo = $request->título;
        $novo->texto_noticia = $request->texto_da_notícia;
        $novo->f_ou_v = $request->foto_ou_vídeo;
        $novo->autor = $request->autor;
        $novo->pasta = $request->pasta;
        $novo->save();
        return redirect('/noticias/'.$novo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }
        $noticia = Noticia::find($id);
        $noticia->delete();
        return redirect('/noticias');
    }


    /* MINHAS NOTÍCIAS */

    public function minhasNoticias(){
        if(Session::get('id') == null){
            return redirect('/login');
        }
        $noticia_visualize = 'newactive';
        $bnc = 'newactive';
        $noticias = Noticia::where('autor', Session::get('id'))->orderBy('created_at', 'desc')->paginate(5);
        $pastas = Pasta::get();
        $autores = User::get();
        return view('/noticias/noticia_index', compact('noticia_visualize', 'bnc', 'noticias', 'autores', 'pastas'));
    }

    public function addMinha(){
        if(Session::get('id') == null){
            return redirect('/login');
        }
        $autores = User::where('id', Session::get('id'))->get();
        $pastas = Pasta::get();
        $noticia_create = 'newactive';
        $bnc = 'newactive';
        return view('/noticias/noticia_create', compact('noticia_create', 'autores', 'pastas', 'bnc'));
    }

}
