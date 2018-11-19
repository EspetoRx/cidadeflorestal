<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        /*
        1 - Verificar se os dados foram preenchidos corretamente;
        2 - Ir à procura do usuário na base de dados
        3 - Verificar se usuário e senha do banco de dados cor-
            responde aos inseridos no formulário.
        4 - Se os dados forem válidos, criar sessão de usuário 
            (Sessions)
        */

        //Validação

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'between' => 'O campo :attribute deve ter tamanho mínimo :min e máximo :max.',
            'email' => 'O texto do campo :attribute não é um e-mail válido.',
            'same' => 'As senhas digitadas não correspondem.',
            'alphanum' => 'O campo :attribute deve ser alfanumérico.',
            'accepted' => 'Você deve aceitar os termos e condições para usar.'
        ];


        $this->validate($request,[

            "email" => "required|email",
            "senha" => "required",

        ], $messages);

        //Verifcar se o usuario existe
        $usuario = User::where('email','=',$request->email)->first();

        //Verifica se existe o usuario
        if( !$usuario ){

            $erros_bd = ["Não foi identificado um usuário com este email."];

            return view('/auth/login', compact('erros_bd'));

        }else{

            // Verifica se a senha corresponde ao guardado no BD.

            if( !Hash::check($request->senha, $usuario->senha) ){

                $erros_bd = ["A senha está incorreta."];

                return view('/auth/login', compact('erros_bd'));

            }

        }

        //Criar / abrir sessão de usuário
        Session::put('login', 'sim');
        Session::put('id', $usuario->id);
        Session::put('nome', $usuario->nome);
        Session::put('email', $usuario->email);
        Session::put('tipo', $usuario->tipo);
        Session::put('foto', $usuario->foto);

        return redirect('/meuPerfil');
    }

    public function showLoginForm(){
        if( !Session::has('login') ){
            //$index = 'active';
            return view('/auth/login', compact('index'));
        }else
            return redirect('/meuPerfil');
    }

    public function logout(){
        //Destruir a sessão
        Session::flush();

        return redirect('/');
    }
}
