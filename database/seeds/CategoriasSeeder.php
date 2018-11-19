<?php

use Illuminate\Database\Seeder;
use App\Categorias;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria0 = new Categorias;
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
    	$categoria4->save();
    }
}
