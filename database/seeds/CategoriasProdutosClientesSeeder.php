<?php

use Illuminate\Database\Seeder;
use App\CategoriasProdutosClientes;

class CategoriasProdutosClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        /*$categoria0 = new Categorias;
    	$categoria0->descricao = "Alimentício";
    	$categoria0->save();

    	$categoria1 = new Categorias;
        $categoria1->descricao = "Hotelaria & Pousadas";
        $categoria1->save();

        $categoria2 = new Categorias;
        $categoria2->descricao = "Comércio";
        $categoria2->save();

        $categoria3 = new Categorias;
        $categoria3->descricao = "Restaurantes";
        $categoria3->save();

        $categoria4 = new Categorias;
    	$categoria4->descricao = "Parceiros";
    	$categoria4->save();*/

    	$categoria0 = new CategoriasProdutosClientes;
    	//$categoria0->descricao = "Alimentício";
    	$categoria0->categoria_clientes = 1;
        $categoria0->id_this = 1;
        $categoria0->descricao = "Prato Feito";
    	$categoria0->save();

    	$categoria1 = new CategoriasProdutosClientes;
        //$categoria1->descricao = "Hotelaria & Pousadas";
        $categoria1->categoria_clientes = 1;
        $categoria1->id_this = 2;
        $categoria1->descricao = "Marmitex";
        $categoria1->save();

        $categoria2 = new CategoriasProdutosClientes;
        //$categoria2->descricao = "Comércio";
        $categoria2->categoria_clientes = 1;
        $categoria2->id_this = 3;
        $categoria2->descricao = "Self-service";
        $categoria2->save();

        $categoria3 = new CategoriasProdutosClientes;
        //$categoria3->descricao = "Restaurantes";
        $categoria3->categoria_clientes = 1;
        $categoria3->id_this = 4;
        $categoria3->descricao = "Bebida";
        $categoria3->save();

        $categoria4 = new CategoriasProdutosClientes;
    	//$categoria4->descricao = "Parceiros";
    	$categoria4->categoria_clientes = 1;
        $categoria4->id_this = 5;
        $categoria4->descricao = "Lanche";
    	$categoria4->save();
/* FALTOU A VARIÁVEL CATEGORIA 5 E SÓ NA CATEGORIA 10 ME DEI CONTA DE QUE ELA ESTAVA FALTANDO,
E COMO NÃO FAZ DIFERENÇA VOU DEIXAR ASSIM MESMO -- RSRSRSRSS */
    	$categoria6 = new CategoriasProdutosClientes;
    	//$categoria0->descricao = "Alimentício";
    	$categoria6->categoria_clientes = 2;
        $categoria6->id_this = 1;
        $categoria6->descricao = "Pernoite";
    	$categoria6->save();

    	$categoria7 = new CategoriasProdutosClientes;
        //$categoria1->descricao = "Hotelaria & Pousadas";
        $categoria7->categoria_clientes = 2;
        $categoria7->id_this = 2;
        $categoria7->descricao = "Pernoit Suíte Master + Café da Manhã";
        $categoria7->save();

        $categoria8 = new CategoriasProdutosClientes;
        //$categoria2->descricao = "Comércio";
        $categoria8->categoria_clientes = 2;
        $categoria8->id_this = 3;
        $categoria8->descricao = "Pacote de Fim de Semana";
        $categoria8->save();

        $categoria9 = new CategoriasProdutosClientes;
        //$categoria3->descricao = "Restaurantes";
        $categoria9->categoria_clientes = 2;
        $categoria9->id_this = 4;
        $categoria9->descricao = "Pay day";
        $categoria9->save();

        $categoria10 = new CategoriasProdutosClientes;
    	//$categoria4->descricao = "Parceiros";
    	$categoria10->categoria_clientes = 2;
        $categoria10->id_this = 5;
        $categoria10->descricao = "Sessão de fotos";
    	$categoria10->save();

    	$categoria11 = new CategoriasProdutosClientes;
    	//$categoria0->descricao = "Alimentício";
    	$categoria11->categoria_clientes = 3;
        $categoria11->id_this = 1;
        $categoria11->descricao = "Bar";
    	$categoria11->save();

    	$categoria12 = new CategoriasProdutosClientes;
        //$categoria1->descricao = "Hotelaria & Pousadas";
        $categoria12->categoria_clientes = 3;
        $categoria12->id_this = 2;
        $categoria12->descricao = "Lanchonete";
        $categoria12->save();

        $categoria13 = new CategoriasProdutosClientes;
        //$categoria2->descricao = "Comércio";
        $categoria13->categoria_clientes = 3;
        $categoria13->id_this = 3;
        $categoria13->descricao = "Supermercardo";
        $categoria13->save();

        $categoria14 = new CategoriasProdutosClientes;
        //$categoria3->descricao = "Restaurantes";
        $categoria14->categoria_clientes = 3;
        $categoria14->id_this = 4;
        $categoria14->descricao = "Padaria";
        $categoria14->save();

        $categoria15 = new CategoriasProdutosClientes;
    	//$categoria4->descricao = "Parceiros";
    	$categoria15->categoria_clientes = 3;
        $categoria15->id_this = 5;
        $categoria15->descricao = "Casa de construção";
    	$categoria15->save();

    	$categoria16 = new CategoriasProdutosClientes;
    	//$categoria0->descricao = "Alimentício";
    	$categoria16->categoria_clientes = 4;
        $categoria16->id_this = 1;
        $categoria16->descricao = "Humbugueria";
    	$categoria16->save();

    	$categoria17 = new CategoriasProdutosClientes;
        //$categoria1->descricao = "Hotelaria & Pousadas";
        $categoria17->categoria_clientes = 4;
        $categoria17->id_this = 2;
        $categoria17->descricao = "Comida Mineira";
        $categoria17->save();

        $categoria18 = new CategoriasProdutosClientes;
        //$categoria2->descricao = "Comércio";
        $categoria18->categoria_clientes = 4;
        $categoria18->id_this = 3;
        $categoria18->descricao = "Comida Popular";
        $categoria18->save();

        $categoria19 = new CategoriasProdutosClientes;
        //$categoria3->descricao = "Restaurantes";
        $categoria19->categoria_clientes = 4;
        $categoria19->id_this = 4;
        $categoria19->descricao = "Japonês";
        $categoria19->save();

        $categoria20 = new CategoriasProdutosClientes;
    	//$categoria4->descricao = "Parceiros";
    	$categoria20->categoria_clientes = 4;
        $categoria20->id_this = 5;
        $categoria20->descricao = "Pizzaria";
    	$categoria20->save();

    	$categoria21 = new CategoriasProdutosClientes;
    	//$categoria0->descricao = "Alimentício";
    	$categoria21->categoria_clientes = 5;
        $categoria21->id_this = 1;
        $categoria21->descricao = "Difusor de conhecimento";
    	$categoria21->save();

    	$categoria22 = new CategoriasProdutosClientes;
        //$categoria1->descricao = "Hotelaria & Pousadas";
        $categoria22->categoria_clientes = 5;
        $categoria22->id_this = 2;
        $categoria22->descricao = "Fornecedor";
        $categoria22->save();

        $categoria23 = new CategoriasProdutosClientes;
        //$categoria2->descricao = "Comércio";
        $categoria23->categoria_clientes = 5;
        $categoria23->id_this = 3;
        $categoria23->descricao = "Supermercardo";
        $categoria23->save();

        $categoria24 = new CategoriasProdutosClientes;
        //$categoria3->descricao = "Restaurantes";
        $categoria24->categoria_clientes = 5;
        $categoria24->id_this = 4;
        $categoria24->descricao = "MEI";
        $categoria24->save();

        $categoria25 = new CategoriasProdutosClientes;
    	//$categoria4->descricao = "Parceiros";
    	$categoria25->categoria_clientes = 5;
        $categoria25->id_this = 5;
        $categoria25->descricao = "Outro tipo";
    	$categoria25->save();
    }
}
