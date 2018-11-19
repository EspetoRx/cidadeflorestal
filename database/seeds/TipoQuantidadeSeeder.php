<?php

use Illuminate\Database\Seeder;
use App\TipoQuantidade;

class TipoQuantidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipoquantidade1 = new TipoQuantidade;
        $tipoquantidade1->descricao = 'mL';
        $tipoquantidade1->save();

        $tipoquantidade2 = new TipoQuantidade;
        $tipoquantidade2->descricao = 'L';
        $tipoquantidade2->save();

        $tipoquantidade3 = new TipoQuantidade;
        $tipoquantidade3->descricao = 'g';
        $tipoquantidade3->save();

        $tipoquantidade4 = new TipoQuantidade;
        $tipoquantidade4->descricao = 'Kg';
        $tipoquantidade4->save();

        $tipoquantidade5 = new TipoQuantidade;
        $tipoquantidade5->descricao = 'vagas';
        $tipoquantidade5->save();
    }
}
