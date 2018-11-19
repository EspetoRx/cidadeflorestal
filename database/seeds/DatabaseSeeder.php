<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriasSeeder::class);
        $this->call(ParceirosSeeder::class);
        $this->call(PerfisSeeder::class);
        $this->call(TipoQuantidadeSeeder::class);
        $this->call(TiposSeeder::class);
        $this->call(CategoriasProdutosClientesSeeder::class);
        $this->call(ProdutosSeeder::class);
        $this->call(PastasSeeder::class);
        $this->call(NoticiasSeeder::class);

    }
}
