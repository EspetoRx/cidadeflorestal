<?php

use Illuminate\Database\Seeder;
use App\User;

class PerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User;
        $user->nome = "Charles Lacerda";
        $user->email = "charles.lacerda@cidadeflorestal.com.br";
        $user->senha = Hash::make("charles123");
        $user->tipo = 1;
        $user->foto = "charles-lacerda2018-11-09.png";
        $user->save();

        $user1 = new User;
        $user1->nome = "Lucas Carvalho de Oliveira";
        $user1->email = "lcdo2392@gmail.com";
        $user1->senha = Hash::make("lucas123");
        $user1->tipo = 2;
        $user1->foto = "lucas-carvalho-de-oliveira2018-11-09.jpeg";
        $user1->save();

        $user2 = new User;
        $user2->nome = "Dono do Sítio dos Mangais";
        $user2->email = "parceiro.sitiodosmangais@cidadeflorestal.com.br";
        $user2->senha = Hash::make("mangais123");
        $user2->tipo = 2;
        $user2->foto = "dono-do-sítio-dos-mangais2018-11-09.jpeg";
        $user2->save();

        $user3 = new User;
        $user3->nome = "Dono da Borracharia do Saulo";
        $user3->email = "parceiro.borrachariadosaulo@cidadeflorestal.com.br";
        $user3->senha = Hash::make("saulo123");
        $user3->tipo = 2;
        $user3->foto = "dono-da-borracharia-do-saulo2018-11-09.jpeg";
        $user3->save();

		$user4 = new User;
        $user4->nome = "Administrador da Rádio Florestal";
        $user4->email = "radio@florestal.mg.gov.br";
        $user4->senha = Hash::make("radio123");
        $user4->tipo = 2;
        $user4->foto = "administrador-da-rádio-florestal2018-11-09.jpeg";
        $user4->save();

        $user5 = new User;
        $user5->nome = "Dono da Projetaar";
        $user5->email = "projetaar@cidadeflorestal.com.br";
        $user5->senha = Hash::make("projetaar123");
        $user5->tipo = 2;
        $user5->foto = "dono-da-projetaar2018-11-09.jpeg";
        $user5->save();

        $user6 = new User;
        $user6->nome = "Luiz Ottoni";
        $user6->email = "luiz@ottoni.pre.vest";
        $user6->senha = Hash::make("ottoni123");
        $user6->tipo = 2;
        $user6->foto = "luiz-ottoni2018-11-09.jpeg";
        $user6->save();

        $user7 = new User;
        $user7->nome = "Maria Ester";
        $user7->email = "maria.ester@gmail.com";
        $user7->senha = Hash::make("maria123");
        $user7->tipo = 2;
        $user7->foto = "maria-ester2018-11-09.jpeg";
        $user7->save();

        $user8 = new User;
        $user8->nome = "Dono do Depósito Nossa Senhora Aparecida";
        $user8->email = "deposito@nossa.senhora";
        $user8->senha = Hash::make("deposito123");
        $user8->tipo = 2;
        $user8->foto = "dono-do-depósito-nossa-senhora-aparecida2018-11-09.jpeg";
        $user8->save();

        $user9 = new User;
        $user9->nome = "Tia Lucinha";
        $user9->email = "tia@lucinha.com.br";
        $user9->senha = Hash::make("tialucinha123");
        $user9->tipo = 2;
        $user9->foto = "tia-lucinha2018-11-09.jpeg";
        $user9->save();

        $user10 = new User;
        $user10->nome = "Dono do Googls";
        $user10->email = "googls@gmail.com";
        $user10->senha = Hash::make("googls123");
        $user10->tipo = 2;
        $user10->foto = "dono-do-googls2018-11-09.jpeg";
        $user10->save();

        $user11 = new User;
        $user11->nome = "Dono da Ótica Melgaço";
        $user11->email = "otica@melgaco.com.br";
        $user11->senha = Hash::make("otica123");
        $user11->tipo = 2;
        $user11->foto = "dono-daótica-melgaço2018-11-09.jpeg";
        $user11->save();

        $user12 = new User;
        $user12->nome = "Dono da Marmoraria";
        $user12->email = "dono@marmoraria.art.pedras";
        $user12->senha = Hash::make("marmoraria123");
        $user12->tipo = 2;
        $user12->foto = "dono-da-marmoraria2018-11-09.jpeg";
        $user12->save();

        $user13 = new User;
        $user13->nome = "Administrador da Droga Rede";
        $user13->email = "florestal@drogarede.net";
        $user13->senha = Hash::make("drogarede123");
        $user13->tipo = 2;
        $user13->foto = "administrado-da-droga-rede2018-11-09.jpeg";
        $user13->save();

        $user14 = new User;
        $user14->nome = "Bete da Paper Clips";
        $user14->email = "bete@paper.clips";
        $user14->senha = Hash::make("paperclips123");
        $user14->tipo = 2;
        $user14->foto = "bete-da-paper-clips2018-11-09.jpeg";
        $user14->save();



    }
}
