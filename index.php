<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Lista de supermercado</title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="assets/img/brand/favicon.png" type="image/png"> -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/index.scss" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <!----Google Adsense ------>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script data-ad-client="ca-pub-7560554626989010" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script src="assets/js/market.js"> </script>
</head>

<body>
  <?php
  $json_data = json_decode(file_get_contents('src/path/mercados.json'));
  $mercados = $json_data->mercados;
  ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <h1 style="color:white">Encontre aqui - Promoções de supermercados</h1>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"> Quero adicionar um mercado</i>
              </a>
              <!--div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div-->
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->

    <!-- Header -->
    <div class="header">
      <div class="container-fluid">

        <!--- Espaço para Propaganda --->
        <div class="col-2">
          <h1>Propaganda aqui</h1>
        </div>
        <!--- Fim Espaço para Propaganda --->

        <div class="header-body">
          <div class="row align-items-center py-4">
            <h5 class="section-title h1">Ofertas de Supermercados - Indaiatuba</h5>

          </div>
          <!-- Card stats -->
          <div class="row">
            <?php
            foreach ($mercados as $mercado) {
            ?>
              <!-- Card Mercado -->
              <div class="grid-container col-xs-12 col-sm-6 col-md-4">
                <div class="mainflip">
                  <div class="frontside">
                    <div class="card">
                      <div class="card-body text-center">
                        <p><img class=" img-fluid" src="<?php echo $mercado->logo_mercado ?>" height="100px" width="100px" alt="card image"></p>
                        <div class="card-body text-center">
                          <button type="button" class="btn btn-primary" onClick="abreModal(<?php echo $mercado->id; ?>)" data-target="#exampleModal" data-toggle="modal">
                            Veja as Ofertas
                          </button>
                        </div>
                        <div class="card-body text-center">
                          <p class="card-text">Validade: <?php echo $mercado->data_ofertas ?> </p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ./Card Mercado-->
            <?php
            }
            ?>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="zoom" id="divZoom">
                      <div class="carousel-inner" id="pictures">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!--- Espaço para Propaganda --->
          <div class="col-2">
            <h1>Propaganda aqui</h1>
          </div>
          <!--- Fim Espaço para Propaganda --->
          <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
          <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
          <p>Promoção: No campo da publicidade, promoção (do inglês promotion) é qualquer ato que venha a elevar o status de um produto, indivíduo, situação, empresa etc.[1] Não precisa de envolver necessariamente remuneração prévia ou acordada. Promoção é um ramo direto da publicidade, do marketing, de relações públicas e do jornalismo, sendo que este último em um âmbito mais moderado e imparcial.
            No Brasil, promoção também pode significar o abaixamento de preço de um produto, deixando ele mais barato que nos outros dias convencionais.
            Em Portugal, promoção, também, é uma técnica de marketing comercial, a qual pode resultar em baixa de preços de produtos ou oferta de algo num prazo estipulado pelo vendedor.
            Promoção também é utilizado para denominar uma ação de marketing promocional.</p>
          <p>Promoção de vendas é um dos quatro aspectos do mix promocional. Refere-se ao conjunto de ferramentas usadas para desenvolver e acelerar as vendas de um produto ou serviço a curto prazo:
            -Amostras: São ofertas de uma quantidade de produtos para o experimento do cliente, que busca a aprovação do produto sem o vínculo de compra;
            -Cupões: Certificados que garantem aos compradores vantagens em relação a compra ou a sorteios definidos pelo empreendedor;
            -Brindes promocionais: são artigos úteis, com o nome do anunciante impresso neles, dado como presente aos consumidores;
            -Brindes: são mercadorias oferecidas gratuitamente ou a baixo custo como incentivo à compra de determinado produto;
            -Recompensas por preferência: São algumas bonificações para os clientes que tem uma certa regularidade de compra ou de uso dos serviços da empresa, nesta modalidade selos de trocas também são levados em consideração por esta ferramenta.
            -Promoção no ponto de venda: Uma das formas mais comuns de promoção de venda, onde são trabalhados os expositores e pontas de gondolas a fim de atrair a atenção dos consumidores.
            -Concursos e sorteios: São encontrados normalmente em grandes campanhas que possibilitam ao consumidor obter alguma coisa, normalmente um prémio,como carros, casas etc.
            -Pacotes ou descontos promocionais: oferece aos consumidores descontos sobre os preços normais do produto.
            As promoções podem ser dirigidas para o consumidor ou para os intervenientes no negócio. As promoções para os intervenientes no negócio podem ser dirigidas para os revendedores ou para a força de vendas. A audiência alvo dita os objectivos e as ferramentas a usar.</p>
          <p>Para elaborar os objectivos das promoções é preciso considerar dois factores: quem é a audiência e se a aproximação vai ser proactiva ou reactiva. Primeiro, os objectivos diferem conforme as audiências. As promoções pretendem estimular o ato de consumo, motivar a força de vendas e ganhar a cooperação dos revendedores. Segundo. As promoções tendem a ser proactivas ou reactivas. As proactivas tendem a responder aos seguintes objectivos (Burnett, 1998):
            Criar uma receita adicional ou aumentar a quota de mercado;
            Alargar o mercado alvo;
            Criar uma experiência positiva com o produto;
            Aumentar o valor do produto ou da marca.
            Os objectivos reactivos são respostas a situações negativas ou de curto prazo. Os seus objectivos são (Burnett, 1998):

            Igualar a concorrência;
            Mexer o inventário;
            Gerar liquidez / dinheiro;
            Sair do negócio.</p>
          <p>A indústria das promoções está em franco desenvolvimento porque oferece aos gestores soluções de curto prazo; o seu sucesso na resposta aos objectivos pode ser medido; é menos dispendiosa que a publicidade e responde às necessidades do consumidor em receber mais valor dos produtos.
            Há algumas razões para o rápido crescimento das promoções, especialmente no mercado dos consumidores. Primeiro, dentro das empresas, a promoção é agora mais rapidamente aceite pelos gestores de topo como ferramenta efectiva de vendas e mais gestores de produto estão qualificados a usar estas ferramentas. Há um aumento da aceitação da ideia de que as promoções de vendas criativas apoiam a marca. Além disso, os gestores de produto enfrentam grades desafios para aumentar as suas vendas. Em segundo lugar, externamente, as empresas enfrentam mais competição e as marcas estão menos diferenciadas. Em terceiro lugar, a publicidade eficiente está em declínio devido ao seu elevado custo e restrições legais. O desenvolvimento das tecnologias de informação, a redução no custo do armazenamento e edição de dados e aumento da sofisticação das técnicas de identificação da audiência alvo facilitaram a implementação e permitiram uma medida mais efectiva e um melhor controlo dos esforços promocionais.
            O passo mais difícil na gestão das vendas é decidir que ferramentas promocionais usar, como combiná-las e como as fazer chegar à audiência alvo. Cada ferramenta tem as suas vantagens e inconvenientes que podem mudar quando combinadas com outras ferramentas da comunicação de marketing.</p>
          <p>A promoções de vendas têm sido tradicionalmente regulamentadas em muitas nações industriais avançadas, com a notável excepção dos Estados Unidos. Por exemplo, o Reino Unido anteriormente operado sob um regime de preços de revenda, em que os fabricantes poderiam legalmente ditar o preço de revenda mínimos para praticamente todas as mercadorias; esta prática foi abolida em 1964.[1]
            A maioria dos países europeus também têm controlo sobre a programação e os tipos permitidos de promoções de vendas, pois eles são considerados naqueles países que fazem fronteira com as práticas comerciais desleais. Alemanha é notório por ter os regulamentos mais rigorosos. Exemplos famosos incluem a lavagem do carro que foi impedido de dar fichas grátis para clientes regulares e de um padeiro que não poderia dar um saco de pano para os clientes que compraram mais de dez unidades.[1]</p>
          <p>Oferta: Num sentido amplo, oferta é uma denominação genérica para indicar o que é disponibilizado ao mercado, independente da sua natureza, sendo utilizada para substituir a expressão "produto" ou "serviço" e também englobar os outros elementos que são objeto das ações de marketing.
            Define-se também como a quantidade de bens que os vendedores estão dispostos a comercializar em variados níveis de preço. De acordo com esta lei, toda a vez que o preço aumenta, a quantidade ofertada aumenta; e toda a vez que o preço diminui, a quantidade ofertada também diminui.
            Como parâmetro para o estabelecimento dos preços dos produtos pelo mercado, a oferta possui um peso inversamente proporcional (quanto maior a oferta, menor o preço). A oferta é influenciada diretamente pela demanda do produto.
            Num sentido popular, oferta indica uma condição de venda especial (promoção de vendas) na qual o valor percebido pelo cliente é maximizado.[1]</p>
        </div>
      </div>
    </div>
    <!-- Page content -->

  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>