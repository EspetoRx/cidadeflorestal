<?php

namespace App\Http\Controllers;

use App\Parceiro;
use App\User;
use App\Categorias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class ParceiroController extends Controller
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
            abort(403);
        }
        $parceiros = Parceiro::get();
        return view('/parceiros/exibir_lista_parceiros', compact('parceiros'));
    }

    public function indexToEdit()
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $parceiros = Parceiro::get();
        return view('/parceiros/visualiza_parceiros_editar', compact('parceiros'));
    }
    public function indexToExclude()
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $parceiros = Parceiro::get();
        return view('/parceiros/visualiza_parceiros_excluir', compact('parceiros'));
    }

    public function excludeThis($id){
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $data = Parceiro::find($id);
        $categorias = Categorias::get();
        $pertencentes = User::get();
        return view('/parceiros/confirmar_exclusao_parceiro', compact('data', 'categorias', 'pertencentes'));
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
        $categorias = Categorias::get();
        $pertencentes = User::get();
        //dd($categorias);
        return view('/parceiros/adicionar_parceiro', compact("categorias", 'pertencentes'));
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
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $data = $request->all();
        $parceiro = new Parceiro;

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'between' => 'O campo :attribute deve ter tamanho mínimo :min e máximo :max.',
            'email' => 'O texto do campo :attribute não é um e-mail válido.',
            'regex' => 'O campo :attribute não está correto.',
            'url' => 'O campo :attribute inserido não é válido.'
        ];

        $this->validate($request, [

            "razão_social" => "required|between:5,45",
            "nome_fantasia" => "required|between:5,45",
            "cnpj" => "required",
            "telefone" => "required",
            "categoria" => "required",
            "email" => "required|email",
            "endereço" => "required",
            "pertencente" => 'required',
            "descrição" => "required",

        ], $messages);

        if(isset($request->website)){
            $this->validate($request, [

                "website" => "url"

            ], $messages);
            $parceiro->website = $request->website;
        }else{
            $parceiro->website = NULL;
        }

        $dados = Parceiro::where('email', '=', $request->email)->get();
        if( $dados->count() != 0){

            $erros_bd = ['Já existe uma empresa com o mesmo email.'];
            $categorias = Categorias::get();
            $pertencentes = User::get();
            return view("/parceiros.adicionar_parceiro", compact('erros_bd', 'categorias', 'pertencentes'));
        }

        if( $request->hasFile('file') && $request->file('file')->isValid() ){
            $system_time = Carbon::now();
            if( str_contains($request->nome_fantasia, '?') || str_contains($request->nome_fantasia, '/') || str_contains($request->nome_fantasia, ';') || str_contains($request->nome_fantasia, '\\') || str_contains($request->nome_fantasia, '*') || str_contains($request->nome_fantasia, '\"') || str_contains($request->nome_fantasia, '<') || str_contains($request->nome_fantasia, '>') || str_contains($request->nome_fantasia, '|')){
                    if( str_contains($request->nome_fantasia, '?') ){
                        $nome_foto = str_replace('?', '', $request->título);
                    }
                    if( str_contains($request->nome_fantasia, '/') || str_contains($nome_foto, '/') ){
                        $nome_foto = str_replace('/', '', $nome_foto);
                    }
                    if( str_contains($request->nome_fantasia, ';') || str_contains($nome_foto, '/') ){
                        $nome_foto = str_replace(';', '', $nome_foto);
                    }
                    if( str_contains($request->nome_fantasia, '\\') || str_contains($nome_foto, '\\') ){
                        $nome_foto = str_replace('\\', '', $nome_foto);
                    }
                    if( str_contains($request->nome_fantasia, '*') || str_contains($nome_foto, '*') ){
                        $nome_foto = str_replace('*', '', $nome_foto);
                    }
                    if( str_contains($request->nome_fantasia, '\"') || str_contains($nome_foto, '\"') ){
                        $nome_foto = str_replace('\"', '', $nome_foto);
                    }
                    if( str_contains($request->nome_fantasia, '<') || str_contains($nome_foto, '<') ){
                        $nome_foto = str_replace('<', '', $nome_foto);
                    }
                    if( str_contains($request->nome_fantasia, '<') || str_contains($nome_foto, '<') ){
                        $nome_foto = str_replace('<', '', $nome_foto);
                    }
                    if( str_contains($request->nome_fantasia, '|') || str_contains($nome_foto, '|') ){
                        $nome_foto = str_replace('|', '', $nome_foto);
                    }

                    $name = kebab_case($nome_foto .' '.$system_time->toDateString());
                }else{
                    $name = kebab_case($request->nome_fantasia .' '.$system_time->toDateString());
                }
            $extension = $request->file->extension();
            $nome_final = $name .".". $extension;
            $parceiro->foto = $nome_final;
            $upload = $request->file->storeAs('parceiros', $nome_final);
            //return dd($novo);
        }else{
            $parceiro->foto = "logo-empresa.jpg";
        }

        $parceiro->razao_social = $request->razão_social;
        $parceiro->nome_fantasia = $request->nome_fantasia;
        $parceiro->cnpj = $request->cnpj;
        $parceiro->telefone = $request->telefone;
        $parceiro->categoria = $request->categoria;
        $parceiro->pertencente = $request->pertencente;
        $parceiro->email = $request->email;
        $parceiro->endereco_completo = $request->endereço;
        $parceiro->descricao = $request->descrição;

        $parceiro->save();
        return redirect('/parceiro/'.$parceiro->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parceiro  $parceiro
     * @return \Illuminate\Http\Response
     */
    public function show($parceiro)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $data = Parceiro::find($parceiro);
        //return($data);
        $categorias = Categorias::get();
        $pertencentes = User::get();
        return view('/parceiros.exibir_parceiro', compact('data', 'categorias', 'pertencentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parceiro  $parceiro
     * @return \Illuminate\Http\Response
     */
    public function edit($parceiro)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $data = Parceiro::find($parceiro);
        $categorias = Categorias::get();
        $pertencentes = User::get();
        return view('/parceiros.editar_parceiro', compact('data', 'categorias', 'pertencentes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parceiro  $parceiro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $parceiro)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }
        
        $data = $request->all();
        $parceiro = Parceiro::find($parceiro);

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'between' => 'O campo :attribute deve ter tamanho mínimo :min e máximo :max.',
            'email' => 'O texto do campo :attribute não é um e-mail válido.',
            'regex' => 'O campo :attribute não está correto.',
            'url' => 'O campo :attribute inserido não é válido.'
        ];

        $this->validate($request, [

            "razão_social" => "required|between:5,45",
            "nome_fantasia" => "required|between:5,45",
            "cnpj" => "required",
            "telefone" => "required",
            "categoria" => "required",
            "email" => "required|email",
            "endereço" => "required",
            "pertencente" => 'required',
            "descrição" => "required",

        ], $messages);

        if(isset($request->website)){
            $this->validate($request, [

                "website" => "url"

            ], $messages);
            $parceiro->website = $request->website;
        }else{
            $parceiro->website = NULL;
        }

        if( $request->hasFile('file') && $request->file('file')->isValid() ){
            if( $parceiro->foto != 'logo-empresa.jpg' ){
                $upload = $request->file->storeAs('parceiros', $parceiro->foto);
            }else{
                $system_time = Carbon::now();
                $name = kebab_case($request->nome_fantasia . $system_time->toDateString());
                $extension = $request->file->extension();
                $nome_final = $name .".". $extension;
                $parceiro->foto = $nome_final;
                $upload = $request->file->storeAs('parceiros', $nome_final);
            }
        }else{
            if($request->vazio == 0){
                $parceiro->foto = 'logo-empresa.jpg';
            }else{
                $parceiro->foto = $parceiro->foto;
            }
        }

        $parceiro->razao_social = $request->razão_social;
        $parceiro->nome_fantasia = $request->nome_fantasia;
        $parceiro->cnpj = $request->cnpj;
        $parceiro->telefone = $request->telefone;
        $parceiro->categoria = $request->categoria;
        $parceiro->pertencente = $request->pertencente;
        $parceiro->email = $request->email;
        $parceiro->endereco_completo = $request->endereço;
        $parceiro->descricao = $request->descrição;

        $parceiro->save();
        //dd(Session::get('tipo'));
        if(Session::get('tipo') === 1)
            return redirect('/parceiro/'.$parceiro->id);
        else
            return redirect('/minhaEmpresa/'.$parceiro->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parceiro  $parceiro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $parceiro = Parceiro::find($id);
        $parceiro->delete();

        return redirect("/parceiro");
    }

    public function escolheEmpresa(){

        $parceiros = Parceiro::where('pertencente', Session::get('id'))->get();
        $my_enterprise = 'newactive';
        $titulo = 'Minhas empresas';
        return view('/parceiros/exibir_lista_parceiros', compact('parceiros', 'my_enterprise', 'titulo'));

    }
    public function escolheEmpresaEditar(){

        $parceiros = Parceiro::where('pertencente', Session::get('id'))->get();
        $titulo = 'Editar minhas empresas';
        $my_enterprise_edit = 'newactive';
        return view('/parceiros/exibir_lista_parceiros', compact('parceiros', 'my_enterprise_edit', 'titulo'));

    }

    public function minhaEmpresa($id){
        $data = Parceiro::find($id);
        //return($data);
        $categorias = Categorias::get();
        $pertencentes = User::get();
        $titulo = 'Minha empresa';
        $my_enterprise = 'newactive';
        return view('/parceiros.exibir_parceiro', compact('data', 'categorias', 'pertencentes', 'titulo' , 'my_enterprise'));
    }

    public function editMinhaEmpresa($id){
        $data = Parceiro::find($id);
        //return($data);
        $categorias = Categorias::get();
        $pertencentes = User::get();
        $titulo = 'Minha empresa';
        $my_enterprise_edit = 'newactive';
        return view('/parceiros.editar_parceiro', compact('data', 'categorias', 'pertencentes', 'titulo' , 'my_enterprise_edit'));
    }
}
