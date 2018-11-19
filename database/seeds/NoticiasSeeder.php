<?php

use Illuminate\Database\Seeder;
use App\Noticia;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$noticia = new Noticia;
        $noticia->titulo = 'Segundo desafio de downhill em Florestal';
        $noticia->texto_noticia = 'O segundo desafio de down hill de Florestal será realizado nos dias 28/29 de abril .
O evento será realizado na pista de UFV - campos Florestal (na entrada da cidade)
O evento iniciará no Sábado as 08:00hs e encerrará às 17:00hs ( com intervalo para almoço )
No domingo iniciara as 08:00hs e encerrará os treinos às 10:30hs .
As largadas oficiais começarão às 11:00hs.
O evento contará com apoio de ambulância e no minimo dois caminhões para resgate.
Categorias:
-Elite
-Junior
-Open
-Juvenil 
-Sub-30
-Master A1
-Master A2
-Master B
-Rígida 
-Open feminina 
As inscrições serão realizadas antecipadamente no site ( www.fmc.org.br) no valor de R$100,00. 
Também sera realizadas inscrições no local do evento no valor de R$150,00. 

Mais informações 031 995400338 (Joliver)

Anúncio Patrocinado pela Pousada e Restaurante Sítio do Mangais';
        $noticia->autor = 3;
        $noticia->pasta = 5;
        $noticia->f_ou_v = 0;
        $noticia->endereco = 'segundo-desafio-de-downhill-em-florestal2018-11-14.jpeg';
        $noticia->save();


        $noticia = new Noticia;
        $noticia->titulo = 'Lei 966 - “Dispõe sobre a proibição de queimadas.”';
        $noticia->texto_noticia = 'Confira a lei na íntegra:

LEI Nº 966

“Dispõe sobre a proibição de queimadas nas vias públicas e nos imóveis urbanos do Município de Florestal e dá outras providências.”

Os cidadãos DO MUNICÍPIO DE FLORESTAL, Estado de Minas Gerais, abaixo-assinados, no uso de seus direitos legais, apresenta a câmara municipal de Florestal o presente projeto de lei de iniciativa popular:

Art. 1º. Esta lei, respeitadas as competências da União e do Estado de Minas Gerais, dispõe sobre a proibição de queimadas nas vias públicas e no interior de imóveis localizados na zona urbana do Município de Florestal, com o objetivo de preservar a saúde e segurança pública, bem como manter o meio ambiente local ecologicamente equilibrado.

Art. 2º. Fica proibida, sob qualquer forma, a realização de queimada nas vias públicas e no interior de imóveis, públicos ou particulares, localizados na zona urbana do Município de Florestal.

§ 1º. Para os fins desta lei entende-se por queimada:

I - A queima de mato ou vegetação, seca ou verde, para fins de limpeza de terrenos em aberto ou de áreas livres localizadas em imóveis edificados;

II - A queima ao ar livre, como forma de descarte, de papel, papelão, madeiras, mobílias, galhos, folhas, lixo, entulhos e outros resíduos sólidos assemelhados;

III - A queima ao ar livre, como forma de descarte, de pneus, borrachas, plásticos, resíduos industriais ou outros materiais combustíveis assemelhados, sólidos ou líquidos.

§ 2º. Incluem-se na vedação deste artigo a queimada em terrenos marginais de rodovias, de rios, de lagos ou de matas de quaisquer espécies.

§ 3º. Quando na queimada descrita no inciso I forem encontrados os materiais ou substâncias mencionadas nos incisos II e III, todos deste artigo, será aplicada a pena mais gravosa para a infração.

Art. 3º. Ficam os proprietários de lotes vagos do Município obrigados a mantê-los limpos, evitando a ocorrência de queimadas criminosas e a aglomeração de animais peçonhentos.

Art. 4º. Toda pessoa, física ou jurídica, que, de qualquer forma, infringir o disposto nesta lei, ou não prevenir ou impedir o cometimento da infração por terceiros em sua propriedade, ficará sujeito às seguintes penalidades:

I - Infração ao art. 2º, § 1º, inciso I: multa de 100 UFEMG’s, (Unidade Fiscal do Estado de Minas Gerais) para cada 120,00m2 (cento e vinte metros quadrados) de terreno, ou fração;

II - Infração ao art. 2º, § 1º, inciso II: multa de 150 UFEMG’s, (Unidade Fiscal do Estado de Minas Gerais) para cada 120,00m2 (cento e vinte metros quadrados) de terreno, ou fração;

III - Infração ao art. 2º, § 1º, inciso III: multa 200 UFEMG’s, (Unidade Fiscal do Estado de Minas Gerais) para cada 120,00m2 (cento e vinte metros quadrados) de terreno, ou fração;

IV - Infração ao art. 3º: multa 200 UFEMG’s, (Unidade Fiscal do Estado de Minas Gerais) para cada 120,00m2 (cento e vinte metros quadrados) de terreno, ou fração;

§ 1º. As infrações cometidas no horário compreendido entre as 18h00m (dezoito horas) de um dia e as 06h00m (seis horas) do dia seguinte, bem como as cometidas aos sábados, domingos e feriados, serão apenadas com o valor da multa aplicado em dobro.

§ 2º. Havendo concorrência de infrações, será aplicada a multa mais gravosa para cada infração.

§ 3º. Reincidindo o infrator no cometimento de qualquer infração prevista nesta lei, no período de 3 (três) anos contados da última autuação, será aplicada a multa em dobro, a cada nova infração, sobre o valor da última multa.

§ 4º. Em casos de incêndio criminoso, praticado por pessoa distinta do proprietário do imóvel, este somente se eximirá do pagamento da multa com a apresentação de requerimento/defesa e Boletim de Ocorrência Policial que relate o fato.

§ 5º. A aplicação das multas previstas nesta lei não exonera o infrator das demais cominações civis ou penais cabíveis.

§ 6º. As multas deverão ser recolhidas pelo infrator no prazo de 30 (trinta) dias, contados da lavratura do auto de infração.

Art. 5º. Será considerado infrator, na forma desta lei, o executor da queimada.

Parágrafo único. Respondem solidariamente com o infrator, na seguinte ordem, conforme o caso:

I - O mandante;

II - quem estiver na posse direta do imóvel;

III - o proprietário do imóvel;

IV - quem, por qualquer forma, concorrer para o cometimento da infração.

Art. 6º. A defesa do autuado far-se-á por requerimento dirigido a Coordenadoria de Meio Ambiente.

Art. 7º. Caberá ao Executivo a fiscalização e a realização de ampla campanha educativa acerca dos efeitos desta lei.

Art. 8º. Aplica-se subsidiariamente na execução desta lei, naquilo que couber, notadamente quanto à autuação, defesa do autuado e prazos, as disposições contidas na LEI FEDERAL Nº 9.605, DE 12 DE FEVEREIRO DE 1998.

Art. 9º. As despesas com a execução desta lei correrão por conta das dotações próprias do orçamento vigente.

Art. 10 . Esta lei entra em vigor na data de sua publicação.

Florestal, 28 de junho de 2016.



Informativo Patrocinado pela Copiadora Florestal
R. Benedito Valadares, 602 - Centro - Florestal';
        $noticia->autor = 1;
        $noticia->pasta = 1;
        $noticia->f_ou_v = 0;
        $noticia->endereco = 'aaa.jpeg';
        $noticia->save();
        

        

        $noticia = new Noticia;
        $noticia->titulo = '- Curso gratuito de corte e costura com parceria do SENAR';
        $noticia->texto_noticia = 'Incrições abertas 

Com certificado

Vagas limitadas

O curso será ofertado do dia 12/03 ao dia 19/03 em período integral.

Inscrições no CRAS Florestal.

Horário: 08:30hs às 11:00hs e de 13:30 às 16:00hs



É necessário ter a máquina de costura

Informações: (31)3536-3089


Informativo Patrocinado pela Papelaria Clips.com';
        $noticia->autor = 15;
        $noticia->pasta = 2;
        $noticia->f_ou_v = 0;
        $noticia->endereco = '--curso-gratuito-de-corte-e-costura-com-parceria-do-s-e-n-a-r2018-11-14.jpeg';
        $noticia->save();

        
        $noticia = new Noticia;
        $noticia->titulo = 'Ottoni Solidário';
        $noticia->texto_noticia = 'Nosso evento Ottoni Solidário não possui fins lucrativos. 

Todo dinheiro doado Será 100% convertido em gastos com comunidade de Florestal.

O objetivo é levar às pessoas carentes conhecimento, cultura e lazer com qualidade e de forma gratuita.

Toda contribuição é bem vinda.

Vocês podem contribuir com trabalho voluntário.

Material ou dinheiro para investirmos na estrutura.

Com a valorosa presença e o prestígio de vocês para garantir o sucesso do evento e nos incentivar a continuar.

Os empresários que desejarem ajudar serão divulgados em nossas mídias sociais e durante o evento.

Vamos juntos por uma Florestal mais humana e solidária!';
        $noticia->autor = 7;
        $noticia->pasta = 5;
        $noticia->f_ou_v = 0;
        $noticia->endereco = 'ottoni-solidário2018-11-14.jpeg';
        $noticia->save();

        $noticia = new Noticia;
        $noticia->titulo = 'Petrobras anuncia reajuste nos preços do GLP industrial';
        $noticia->texto_noticia = 'A Petrobras decidiu reajustar os preços de comercialização às distribuidoras do GLP destinado aos usos industrial e comercial, no percentual médio de 5,3% e vigência a partir de amanhã (2/12).

A alteração se faz necessária devido ao aumento das cotações internacionais do produto, que acompanharam a alta do Brent.

A Petrobras esclarece que este reajuste não se aplica aos preços de GLP destinado ao uso residencial, comercializado pelas distribuidoras em botijões de até 13kg (conhecido como P13 ou gás de cozinha).

A Petrobras informa ainda que as futuras mudanças nos preços do GLP voltado aos segmentos industrial e comercial nas refinarias estão sendo informadas também por meio do site da companhia.



Fonte: http://agenciapetrobras.com.br/Materia/ExibirMateria?p_materia=979843





Informativo patrocinado pela empresa:
Gás Florestal ( gás do Paulo)';
        $noticia->autor = 1;
        $noticia->pasta = 1;
        $noticia->f_ou_v = 0;
        $noticia->endereco = 'petrobras-anuncia-reajuste-nos-preços-do-g-l-p-industrial2018-11-14.jpeg';
        $noticia->save();

    }
}
