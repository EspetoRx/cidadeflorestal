<?php

use Illuminate\Database\Seeder;
use App\tipo_usuario;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$tipo0 = new tipo_usuario;
    	$tipo0->descricao = "Administrador";
    	$tipo0->save();

    	$tipo1 = new tipo_usuario;
    	$tipo1->descricao = "Parceiro";
    	$tipo1->save();
    }
}
