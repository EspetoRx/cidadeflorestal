<?php

use Illuminate\Database\Seeder;
use App\Pasta;

class PastasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pasta = new Pasta;
        $pasta->descricao = "Leis Municipais de Florestal";
        $pasta->save();

        $pasta = new Pasta;
        $pasta->descricao = "Cursos";
        $pasta->save();

        $pasta = new Pasta;
        $pasta->descricao = "Alunos CEDAF";
        $pasta->save();

        $pasta = new Pasta;
        $pasta->descricao = "Informativos";
        $pasta->save();

        $pasta = new Pasta;
        $pasta->descricao = "Eventos";
        $pasta->save();
    }
}
