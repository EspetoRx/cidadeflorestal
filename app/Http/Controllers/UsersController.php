<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\User;
use App\Parceiro;
use App\tipo_usuario;
use Session;

class UsersController extends Controller
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
        $perfis = User::get();
        return view('perfil.visualiza_perfis', compact('perfis'));
    }

    public function indexToEdit()
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $perfis = User::get();
        return view('perfil.visualiza_perfis_editar', compact('perfis'));
    }
    public function indexToExclude()
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $perfis = User::get();
        return view('perfil.visualiza_perfis_excluir', compact('perfis'));
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
        $tipos = tipo_usuario::get();
        //return $tipos;
        //dd($tipos);
        return view('perfil.adicionar_perfil', compact('tipos'));
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

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'between' => 'O campo :attribute deve ter tamanho mínimo :min e máximo :max.',
            'email' => 'O texto do campo :attribute não é um e-mail válido.',
            'same' => 'As senhas digitadas não correspondem.',
            'alpha' => 'O campo :attribute deve conter apenas letras.',
            'accepted' => 'Você deve aceitar os termos e condições para usar.'
        ];

        $this->validate($request, [

            "nome" => "required|between:10,45|regex:/^[\pL\s\-]+$/u",
            "senha" => "required|between:8,15",
            "confirmação_de_senha" => "required|between:8,15|same:senha",
            "email" => "required|email",
            "tipo" => "required",

        ], $messages);


        $dados = User::where('email', '=', $request->email)
                         ->get();

        if( $dados->count() != 0){

            $erros_bd = ['Já existe um usuário com um mesmo email.'];

            return view("perfil.adicionar_perfil", compact('erros_bd'));
        }

        $novo = new User;
        $novo->nome = $request->nome;
        $novo->email = $request->email;
        $novo->senha = Hash::make($request->senha);
        $novo->tipo = $request->tipo;


        if( $request->hasFile('file') && $request->file('file')->isValid() ){
            $system_time = Carbon::now();
            if( str_contains($request->nome, '?') || str_contains($request->nome, '/') || str_contains($request->nome, ';') || str_contains($request->nome, '\\') || str_contains($request->nome, '*') || str_contains($request->nome, '\"') || str_contains($request->nome, '<') || str_contains($request->nome, '>') || str_contains($request->nome, '|')){
                    if( str_contains($request->nome, '?') ){
                        $nome_foto = str_replace('?', '', $request->título);
                    }
                    if( str_contains($request->nome, '/') || str_contains($nome_foto, '/') ){
                        $nome_foto = str_replace('/', '', $nome_foto);
                    }
                    if( str_contains($request->nome, ';') || str_contains($nome_foto, '/') ){
                        $nome_foto = str_replace(';', '', $nome_foto);
                    }
                    if( str_contains($request->nome, '\\') || str_contains($nome_foto, '\\') ){
                        $nome_foto = str_replace('\\', '', $nome_foto);
                    }
                    if( str_contains($request->nome, '*') || str_contains($nome_foto, '*') ){
                        $nome_foto = str_replace('*', '', $nome_foto);
                    }
                    if( str_contains($request->nome, '\"') || str_contains($nome_foto, '\"') ){
                        $nome_foto = str_replace('\"', '', $nome_foto);
                    }
                    if( str_contains($request->nome, '<') || str_contains($nome_foto, '<') ){
                        $nome_foto = str_replace('<', '', $nome_foto);
                    }
                    if( str_contains($request->nome, '<') || str_contains($nome_foto, '<') ){
                        $nome_foto = str_replace('<', '', $nome_foto);
                    }
                    if( str_contains($request->nome, '|') || str_contains($nome_foto, '|') ){
                        $nome_foto = str_replace('|', '', $nome_foto);
                    }

                    $name = kebab_case($nome_foto .' '.$system_time->toDateString());
                }else{
                    $name = kebab_case($request->nome .' '.$system_time->toDateString());
                }
            $extension = $request->file->extension();
            $nome_final = $name .".". $extension;
            $novo->foto = $nome_final;
            $upload = $request->file->storeAs('users', $nome_final);
            //return dd($novo);
        }else{
            $novo->foto = "perfil.jpg";
        }

        $novo->save();

        $id = $novo->id;
        return $this->show($id);
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
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $user = User::find($id);
        $descricao = tipo_usuario::find($user['tipo']);
        $descricao = $descricao->descricao;
        $empresas = Parceiro::where('pertencente', '=', $user->id)->get();
        Cache::flush();
        return view("perfil.visualizar_perfil", compact('user', 'descricao', 'empresas'));
    }

    public function excludeThis($id)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $user = User::where('id', '=', $id)->get()->first();
        $descricao = tipo_usuario::find($user['tipo']);
        //dd($descricao);
        $descricao = $descricao->descricao;
        
        return view("perfil.confirmar_exclusao_perfil", compact('user', 'descricao', 'id'));
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
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $user = User::where('id', '=', $id)->get()->first();
        $tipos = tipo_usuario::get();
        return view('perfil.editar_perfil', compact('user', 'tipos', 'id'));
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
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'between' => 'O campo :attribute deve ter tamanho mínimo :min e máximo :max.',
            'email' => 'O texto do campo :attribute não é um e-mail válido.',
            'same' => 'As senhas digitadas não correspondem.',
            'alpha' => 'O campo :attribute deve conter apenas letras.',
            'accepted' => 'Você deve aceitar os termos e condições para usar.'
        ];

        $this->validate($request, [

            "nome" => "required|between:10,45|regex:/^[\pL\s\-]+$/u",
            "email" => "required|email",
            "tipo" => "required",

        ], $messages);


        $user = User::find($id);

        //dd($request);
        if( $request->hasFile('file') && $request->file('file')->isValid() ){

            if( isset($user->foto) && $user->foto != 'perfil.jpg' ){
                $upload = $request->file->storeAs('users', $user->foto);
            }else{
                $system_time = Carbon::now();
                $name = kebab_case($request->nome . $system_time->toDateString());
                $extension = $request->file->extension();
                $nome_final = $name .".". $extension;
                $user->foto = $nome_final;
                $upload = $request->file->storeAs('users', $nome_final);
            }
            //return dd($novo);
        }else{
            if(isset($user->foto)){
                $user->foto = $user->foto;
            }
            if($request->file == NULL){
                $user->foto = 'perfil.jpg';
            }
        }
        
        
        //dd($user);
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->tipo = $request->tipo;
        $user->save();
        $id = User::find($id);
        $id = $id->id;
        if(Session::get('tipo') == 1)
            return $this->show($id);
        else
            return $this->visualizaMeuPerfil();
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
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $user = User::find($id);
        $user->delete();

        return redirect("/perfil");
    }


    /*---------------------------------------------------------------*/
    /* FUNÇÃO TELA INICIAL                                           */
    /*---------------------------------------------------------------*/

    public function visualizaMeuPerfil(){
        if(Session::get('id') == null){
            return redirect('/login');
        }
        $user = User::find(Session::get('id'));
        $descricao = tipo_usuario::find($user['tipo']);
        $descricao = $descricao->descricao;
        $empresas = Parceiro::where('pertencente', '=', $user->id)->get();
        $my_profile = 'newactive';
        $title = 'Meu perfil';
        Cache::flush();
        return view("perfil.visualizar_perfil", compact('title', 'user', 'descricao', 'empresas', 'my_profile'));
    }

    /*---------------------------------------------------------------*/
    /* FUNÇÃO ALTERAÇÃO DE PERFIL                                    */
    /*---------------------------------------------------------------*/

    public function alterarMeuPerfil(){
        if(Session::get('id') == null){
            return redirect('/login');
        }
        $titulo = 'Editar meu perfil';
        $edit_my_profile = 'newactive';
        $id = Session::get('id');
        $user = User::find($id);
        $tipos = tipo_usuario::get();
        return view('perfil.editar_perfil', compact('user', 'tipos', 'id', 'titulo', 'edit_my_profile'));
    }
}
