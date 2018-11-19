<?php

use Illuminate\Database\Seeder;
use App\Parceiro;

class ParceirosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $parceiro1 = new Parceiro;
        $parceiro1->razao_social = 'i9action LTDA';
        $parceiro1->email = 'i9@action.com';
        $parceiro1->nome_fantasia = 'i9action Tecnologia';
        $parceiro1->CNPJ = '00.000.000/0001-23';
        $parceiro1->website = NULL;
        $parceiro1->endereco_completo = 'Rua Moscatel 13';
        $parceiro1->telefone = '(31) 997 895 812';
        $parceiro1->descricao = 'Melhor empresa para se fazer parceria na região.';
        $parceiro1->categoria = 3;
        $parceiro1->pertencente = 1;
        $parceiro1->foto = 'i9action-tecnologia2018-11-09.jpeg';
        $parceiro1->save();

        $parceiro2 = new Parceiro;
        $parceiro2->razao_social = 'Donos do Mangais S.A.';
        $parceiro2->email = 'sitio@mangais.net';
        $parceiro2->nome_fantasia = 'Sítio dos Mangais - Pousada e Restaurante';
        $parceiro2->CNPJ = '00.000.000/0002-23';
        $parceiro2->website = 'http://mangais.net';
        $parceiro2->endereco_completo = 'Rua da ponte, depois da mesma 335';
        $parceiro2->telefone = '(31) 997 895 812';
        $parceiro2->descricao = 'Melhor Hospedagem da região.';
        $parceiro2->categoria = 2;
        $parceiro2->pertencente = 3;
        $parceiro2->foto = 'sítio-dos-mangais--pousada-e-restaurante2018-11-09.jpeg';
        $parceiro2->save();

        $parceiro3 = new Parceiro;
        $parceiro3->razao_social = 'Charles Lacerda Empreendimentos';
        $parceiro3->email = 'copiadora@cidadeflorestal.com.br';
        $parceiro3->nome_fantasia = 'Copiadora Florestal';
        $parceiro3->CNPJ = '00.000.000/0003-23';
        $parceiro3->website = 'http://copiadoraflorestal.cidadeflorestal.com.br';
        $parceiro3->endereco_completo = 'Rua central 10';
        $parceiro3->telefone = '(31) 997 895 812';
        $parceiro3->descricao = 'Melhora copiadora de florestal. E também a única...';
        $parceiro3->categoria = 3;
        $parceiro3->pertencente = 1;
        $parceiro3->foto = 'copiadora-florestal2018-11-09.jpeg';
        $parceiro3->save();

        $parceiro4 = new Parceiro;
        $parceiro4->razao_social = 'Saulo MEI';
        $parceiro4->email = 'borracharia@saulo.com';
        $parceiro4->nome_fantasia = 'Borracharia do Saulo';
        $parceiro4->CNPJ = '00.000.000/0004-24';
        $parceiro4->website = NULL;
        $parceiro4->endereco_completo = 'Rua da Esquerda, depois da casa velha';
        $parceiro4->telefone = '(31) 997 895 812';
        $parceiro4->descricao = 'Borracharia com mais de 30 tradição no mercado de troca de pneus. Empresa séria e comprometida com resultado. Aqui tem competência!!!';
        $parceiro4->categoria = 5;
        $parceiro4->pertencente = 4;
        $parceiro4->foto = 'borracharia-do-saulo2018-11-09.jpeg';
        $parceiro4->save();

        $parceiro5 = new Parceiro;
        $parceiro5->razao_social = 'Rádio Florestal S.F.';
        $parceiro5->email = 'radio@florestal.com.br';
        $parceiro5->nome_fantasia = 'Rádio Florestal 87,9 FM';
        $parceiro5->CNPJ = '10.000.000/0004-24';
        $parceiro5->website = NULL;
        $parceiro5->endereco_completo = 'Ato do morro, onde não mais se vê';
        $parceiro5->telefone = '(31) 997 895 812';
        $parceiro5->descricao = 'A rádio da comunidade de Florestal e região. Sempre lhe mantendo a par das melhores notícias e dos hits mais tocados';
        $parceiro5->categoria = 5;
        $parceiro5->pertencente = 5;
        $parceiro5->foto = 'rádio-florestal87,9-f-m2018-11-09.jpeg';
        $parceiro5->save();

        $parceiro6 = new Parceiro;
        $parceiro6->razao_social = 'Projetaar S.A.';
        $parceiro6->email = 'projetar@s.a';
        $parceiro6->nome_fantasia = 'Projetaar - Soluções Empreserariais';
        $parceiro6->CNPJ = '00.000.000/0005-25';
        $parceiro6->website = NULL;
        $parceiro6->endereco_completo = 'Pertinho do centro, quase do lado do terreiro';
        $parceiro6->telefone = '(31) 997 895 812';
        $parceiro6->descricao = 'Misericórida, isso é coach, é? Deus que me livre. Aqui a gente faz!!!';
        $parceiro6->categoria = 5;
        $parceiro6->pertencente = 6;
        $parceiro6->foto = 'projetaar--soluções-empreserariais2018-11-09.jpeg';
        $parceiro6->save();

        $parceiro7 = new Parceiro;
        $parceiro7->razao_social = 'Ottoni MEI';
        $parceiro7->email = 'ottoni@pre.vest';
        $parceiro7->nome_fantasia = 'Ottoni Pre Vestibular';
        $parceiro7->CNPJ = '00.000.000/0006-26';
        $parceiro7->website = 'http://ottoni.pre.vest';
        $parceiro7->endereco_completo = 'Escola Estadual Dercy Ribeiro';
        $parceiro7->telefone = '(31) 997 895 812';
        $parceiro7->descricao = 'Prepare-se para o maior saldão de vagas do cursinho pré-cedaf que mais aprovou candidatos!!!';
        $parceiro7->categoria = 5;
        $parceiro7->pertencente = 7;
        $parceiro7->foto = 'ottoni-pre-vestibular2018-11-09.jpeg';
        $parceiro7->save();

        $parceiro8 = new Parceiro;
        $parceiro8->razao_social = 'Maria Ester MEI';
        $parceiro8->email = 'maria@ester.com';
        $parceiro8->nome_fantasia = 'Maria Ester Congelados';
        $parceiro8->CNPJ = '00.000.000/0004-29';
        $parceiro8->website = NULL;
        $parceiro8->endereco_completo = 'Rua Das Ameixas 115o';
        $parceiro8->telefone = '(31) 997 895 812';
        $parceiro8->descricao = 'Melhores congelados para vocês...';
        $parceiro8->categoria = 1;
        $parceiro8->pertencente = 8;
        $parceiro8->foto = 'maria-ester-congelados2018-11-09.jpeg';
        $parceiro8->save();

        $parceiro9 = new Parceiro;
        $parceiro9->razao_social = 'N. Sra. Aparecida LTDA';
        $parceiro9->email = 'deposito@nossa.senhora';
        $parceiro9->nome_fantasia = 'Depósito Nossa Sra Aparecida';
        $parceiro9->CNPJ = '00.000.000/0004-30';
        $parceiro9->website = NULL;
        $parceiro9->endereco_completo = 'Rua Benedito Valadares, 105';
        $parceiro9->telefone = '(31) 997 895 812';
        $parceiro9->descricao = 'Os melhores materiais de construção para a sua obra você só encontra aqui.';
        $parceiro9->categoria = 5;
        $parceiro9->pertencente = 9;
        $parceiro9->foto = 'maria-ester-congelados2018-11-09.jpeg';
        $parceiro9->save();

        $parceiro10 = new Parceiro;
        $parceiro10->razao_social = 'Tia Lucinha MEI';
        $parceiro10->email = 'tia@lucinha.com';
        $parceiro10->nome_fantasia = 'Comercial Costa - Distribuidora de Bebidas';
        $parceiro10->CNPJ = '00.000.000/0003-32';
        $parceiro10->website = 'http://tia.lucinha';
        $parceiro10->endereco_completo = 'Rua do Correio, depois do Boteco do Sr. Alguma coisa';
        $parceiro10->telefone = '(31) 997 895 812';
        $parceiro10->descricao = 'Melhor distribuidora de bebidas de florestal e região!!!';
        $parceiro10->categoria = 3;
        $parceiro10->pertencente = 10;
        $parceiro10->foto = 'comercial-costa--distribuidora-de-bebidas2018-11-09.jpeg';
        $parceiro10->save();

        $parceiro11 = new Parceiro;
        $parceiro11->razao_social = 'Empresários do Googls';
        $parceiro11->email = 'google@googls.com';
        $parceiro11->nome_fantasia = 'Googls';
        $parceiro11->CNPJ = '00.000.000/0002-33';
        $parceiro11->website = 'http://googls.google.com';
        $parceiro11->endereco_completo = 'Alameda das ruas. 130';
        $parceiro11->telefone = '(31) 997 895 812';
        $parceiro11->descricao = 'Melhor hamburgueria da região!!!1';
        $parceiro11->categoria = 1;
        $parceiro11->pertencente = 11;
        $parceiro11->foto = 'googls2018-11-09.jpeg';
        $parceiro11->save();

        $parceiro12 = new Parceiro;
        $parceiro12->razao_social = 'Ótica Melgaço LTDA';
        $parceiro12->email = 'otica@redemelgaco.com.br';
        $parceiro12->nome_fantasia = 'Ótica Melgaço';
        $parceiro12->CNPJ = '00.000.000/0004-34';
        $parceiro12->website = NULL;
        $parceiro12->endereco_completo = 'Rua Benedito Valadares 1435';
        $parceiro12->telefone = '(31) 997 895 812';
        $parceiro12->descricao = 'Melhor ótica da região, agora conta com oftalmologista in loco.';
        $parceiro12->categoria = 3;
        $parceiro12->pertencente = 12;
        $parceiro12->foto = 'ótica-melgaço2018-11-09.jpeg';
        $parceiro12->save();

        $parceiro13 = new Parceiro;
        $parceiro13->razao_social = 'Marmoraria Art Pedras LTDA';
        $parceiro13->email = 'marmoraria@art.pedras';
        $parceiro13->nome_fantasia = 'Marmoraria Art Pedras LTDA';
        $parceiro13->CNPJ = '00.000.000/0002-52';
        $parceiro13->website = NULL;
        $parceiro13->endereco_completo = 'Rua de trás da escola, 75';
        $parceiro13->telefone = '(31) 997 895 812';
        $parceiro13->descricao = 'Marmoraria de excelência e qualidade.';
        $parceiro13->categoria = 3;
        $parceiro13->pertencente = 13;
        $parceiro13->foto = 'marmoraria-art-pedras-l-t-d-a2018-11-09.jpeg';
        $parceiro13->save();

        $parceiro14 = new Parceiro;
        $parceiro14->razao_social = 'Droga Rede S.A.';
        $parceiro14->email = 'florestal@drogarede.net';
        $parceiro14->nome_fantasia = 'Droga Rede Florestal';
        $parceiro14->CNPJ = '00.000.000/0004-35';
        $parceiro14->website = NULL;
        $parceiro14->endereco_completo = 'Praça, 175';
        $parceiro14->telefone = '(31) 997 895 812';
        $parceiro14->descricao = 'Droga Rede é mais saúde para a sua família!!!';
        $parceiro14->categoria = 3;
        $parceiro14->pertencente = 14;
        $parceiro14->foto = 'droga-rede-florestal2018-11-09.jpeg';
        $parceiro14->save();

        $parceiro15 = new Parceiro;
        $parceiro15->razao_social = 'Papelaria Paper Clips LTDA';
        $parceiro15->email = 'bete@paper.clips';
        $parceiro15->nome_fantasia = 'Paper.Clips';
        $parceiro15->CNPJ = '00.000.000/0004-35';
        $parceiro15->website = 'http://paper.clips';
        $parceiro15->endereco_completo = 'Rua do posto 150';
        $parceiro15->telefone = '(31) 997 895 812';
        $parceiro15->descricao = 'Artigos Escolares da melhor qualidade você só encontra aqui.';
        $parceiro15->categoria = 3;
        $parceiro15->pertencente = 15;
        $parceiro15->foto = 'paper.-clips2018-11-09.jpeg';
        $parceiro15->save();
    }
}
