<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use App\User;
use App\Categorias;
use App\TipoQuantidade;
use App\Parceiro;
use App\CategoriasProdutosClientes;
use Carbon\Carbon;
use Session;

class ProdutoController extends Controller
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
        $produtos = Produto::get();
        return view('/produtos/visualizar_produtos', compact('produtos'));
    }

    public function indexToEdit()
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $produtos = Produto::get();
        $titulo = " para edição";
        $extension = "edit";
        return view('/produtos/visualizar_produtos', compact('produtos', 'titulo', 'extension'));
    }
    public function indexToExclude()
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $produtos = Produto::get();
        $titulo = " para exclusão";
        $extension = "con_exc";
        $prd_exc = 'newactive';
        return view('/produtos/visualizar_produtos', compact('produtos', 'titulo', 'extension', 'prd_exc'));
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
        $parceiros = Parceiro::get();
        $pertencentes = User::get();
        $tipo_quantidades = TipoQuantidade::get();
        $categorias = CategoriasProdutosClientes::get();
        //dd($categorias);
        $prod_adc = 'newactive';
        return view('/produtos/adicionar_produto', compact("parceiros", 'pertencentes', 'tipo_quantidades', 'prod_adc', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();

        $messages = [

            'required' => 'O campo :attribute é obrigatório.',
            'between' => 'O campo :attribute deve ter tamanho mínimo :min e máximo :max.',
            'email' => 'O texto do campo :attribute não é um e-mail válido.',
            'same' => 'As senhas digitadas não correspondem.',
            'alpha' => 'O campo :attribute deve conter apenas letras.',
            'accepted' => 'Você deve aceitar os termos e condições para usar.'

        ];

        $this->validate($request, [

            "nome" => "required|between: 3,255",
            "preço" => "required|numeric",
            "referência" => "required",
            "quantidade" => "required|numeric",
            "descrição" => "required",
            "categoria" => 'required|numeric',
            "parceiro" => 'required|numeric',

        ], $messages);


        $novo = new Produto;
        $novo->nome = $request->nome;
        $novo->preco = $request->preço;
        $novo->referência = $request->referência;
        $novo->descricao = $request->descrição;
        $novo->peso_ou_quantidade = $request->quantidade;
        $novo->parceiro = $request->parceiro;
        $novo->pertencente = $request->pertencente;
        $novo->tipoquantidade = $request->tipoquantidade;
        $novo->categoria = $request->categoria;
        
        if( $request->hasFile('file') && $request->file('file')->isValid() ){
            $system_time = Carbon::now();
            if( str_contains($request->nome, '?') || str_contains($request->nome, '/') || str_contains($request->nome, ';') || str_contains($request->nome, '\\') || str_contains($request->nome, '*') || str_contains($request->nome, '\"') || str_contains($request->nome, '<') || str_contains($request->nome, '>') || str_contains($request->nome, '|')){
                    $nome_foto = $requst->titulo;
                    if( str_contains($request->nome, '?') ){
                        $nome_foto = str_replace('?', '', $request->nome);
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

                    $name = kebab_case($nome_foto);
                }else{
                    $name = kebab_case($request->nome);
                }
            $extension = $request->file->extension();
            $nome_final = $name .".". $extension;
            $novo->foto = $nome_final;
            $upload = $request->file->storeAs('produtos', $nome_final);
            //return dd($novo);
        }else{
            $novo->foto = "produtos-servicos.png";
        }

        $novo->save();
        $id = $novo->id;
        return $this->show($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($produto)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }
        $produto = Produto::find($produto);
        $pertencentes = User::get();
        $parceiros = Parceiro::get();
        $tipo_quantidades = TipoQuantidade::get();
        $categorias = CategoriasProdutosClientes::get();
        //dd($produto->foto);
        return view('/produtos/visualiza_produto', compact('produto', 'pertencentes', 'parceiros', 'tipo_quantidades', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($produto)
    {
        //
        if(Session::get('id') == null){
            return redirect('/login');
        }else if(Session::get('tipo') != 1){
            abort(403);
        }
        $produto = Produto::find($produto);
        $pertencentes = User::get();
        $parceiros = Parceiro::get();
        $tipo_quantidades = TipoQuantidade::get();
        $categorias = CategoriasProdutosClientes::get();
        $editar = "Editar";
        $prod_alt = 'newactive';
        //dd($produto);
        //dd($editar);
        return view('/produtos/adicionar_produto', compact('produto', 'pertencentes', 'parceiros', 'tipo_quantidades', 'editar', 'prod_alt', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $produto)
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
            'accepted' => 'Você deve aceitar os termos e condições para usar.'

        ];

        $this->validate($request, [

            "nome" => "required|between:10,45",
            "preço" => "required|numeric",
            "referência" => "required",
            "quantidade" => "required|numeric",
            "descrição" => "required",
            "categoria" => 'required|numeric',
            "parceiro" => 'required|numeric',

        ], $messages);


        $novo = Produto::find($produto);
        $novo->nome = $request->nome;
        $novo->preco = $request->preço;
        $novo->referência = $request->referência;
        $novo->descricao = $request->descrição;
        $novo->peso_ou_quantidade = $request->quantidade;
        $novo->parceiro = $request->parceiro;
        $novo->pertencente = $request->pertencente;
        $novo->tipoquantidade = $request->tipoquantidade;
        $novo->categoria = $request->categoria;
        
        if( $request->hasFile('file') && $request->file('file')->isValid() ){
            if(isset($novo->foto) && $novo->foto != 'produtos-servicos.png'){
                $upload = $request->file->storeAs('produtos', $novo->foto);
            }else{
                $system_time = Carbon::now();
                $name = kebab_case($request->nome . $system_time->toDateString());
                $extension = $request->file->extension();
                $nome_final = $name .".". $extension;
                $novo->foto = $nome_final;
                $upload = $request->file->storeAs('produtos', $nome_final);
            }

        }else{
            if(isset($novo->foto)){
                $novo->foto = $novo->foto;
            }
            if($request->file == NULL){
                $novo->foto = 'produtos-servicos.png';
            }
        }

        $novo->save();
        $id = $novo->id;
        return $this->show($id);
    }

    public function excludeThis($id)
    {
        //
        $produto = Produto::find($id);
        $parceiros = Parceiro::get();
        $pertencentes = User::get();
        $tipo_quantidades = TipoQuantidade::get();
        $categorias = CategoriasProdutosClientes::get();
        $prod_exc = 'newactive';
        $exclude = 'tchaubrigado';
        return view('/produtos/adicionar_produto', compact("parceiros", 'pertencentes', 'tipo_quantidades', 'prod_exc', 'exclude', 'produto', 'categorias'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($produto)
    {
        //
        $produto = Produto::find($produto);
        $produto->delete();
        return redirect('/produto');
    }

    public function visualizarMeusProdutos(){
        $produtos = Produto::where('pertencente', Session::get('id'))->get();
        $titulo = 'Meus produtos';
        $minhasEmpresas = Parceiro::where('pertencente', Session::get('id'))->get();
        return view('/produtos/visualizar_produtos', compact('produtos', 'titulo', 'minhasEmpresas'));    
    }

    public function adicionarNovoProduto(){
        $parceiros = Parceiro::get();
        
        $pertencentes = User::get();
        $tipo_quantidades = TipoQuantidade::get();
        $categorias = CategoriasProdutosClientes::get();
        //dd($categorias);
        $prod_adc = 'newactive';
        $add = 'add';
        return view('/produtos/adicionar_produto', compact("parceiros", 'pertencentes', 'tipo_quantidades', 'prod_adc', 'categorias', 'add'));
    }

    public function visualizarMeuProduto($produto){
        $titulo = 'Meu Produto';
        $produto = Produto::find($produto);
        $pertencentes = User::get();
        $parceiros = Parceiro::get();
        $tipo_quantidades = TipoQuantidade::get();
        $categorias = CategoriasProdutosClientes::get();
        $botoes = "";
        //dd($produto->foto);
        return view('/produtos/visualiza_produto', compact('produto', 'pertencentes', 'parceiros', 'tipo_quantidades', 'categorias', 'titulo'));
    }
}
