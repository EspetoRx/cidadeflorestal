<?php

use Illuminate\Database\Seeder;
use App\Produto;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $produto = new Produto;
        $produto->nome = "Pães de Queijo Recheados com Catupiry";
        $produto->foto = "pães-de-queijo-recheados-com-catupiry2018-11-12.jpeg";
        $produto->preco = 50.00;
        $produto->referência = "PDQC";
        $produto->peso_ou_quantidade = 2;
        $produto->tipoquantidade = 4;
        $produto->pertencente = 8;
        $produto->parceiro = 8;
        $produto->categoria = 5;
        $produto->descricao = "Venha saborear esta maravilhosa iguaria vinda diretamente do sudeste mineiro. É crocante por fora e macio por dentro.";
        $produto->save();

        $produto = new Produto;
        $produto->nome = "O Futuro do Empreendedor da Computação";
        $produto->foto = "o-futuro-do-empreendedor-da-computação2018-11-12.png";
        $produto->preco = 10.99;
        $produto->referência = "OFEC";
        $produto->peso_ou_quantidade = 30;
        $produto->tipoquantidade = 5;
        $produto->pertencente = 7;
        $produto->parceiro = 7;
        $produto->categoria = 21;
        $produto->descricao = "Palestra destinada aos estudantes de computação da UFV-CAF. Nela discutiremos como será o futuro do empreendedor em computação de acordo com a visão do MEJ.";
        $produto->save(); 

    }
}
