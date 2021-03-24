<?php
  require_once('header.php');
?>

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
                    <div class="row">
                        <div class="col-3">
                            <img src="assets/icons/icon_market.png" width="90px" height="90px" alt="">
                        </div>
                        <div class="col-9">
                            <h3 style="color:white">Encontre aqui - Promoções de supermercados</h3>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Header -->

        <!-- Header -->
        <div class="header">
            <div class="container">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <h5>Ofertas de Supermercados - Indaiatuba</h5>
                    </div>
                    <!-- Card stats -->
                    <div class="row row-cols-3">
                        <?php
            foreach ($mercados as $mercado) {
            ?>
                        <div class="col mb-4">
                            <!-- Card Mercado -->
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="<?php echo $mercado->logo_mercado ?>"
                                                height="100px" width="100px" alt="card image"></p>

                                        <div class="card-body text-center">
                                            <button type="button" class="btn btn-primary"
                                                onClick="abrirModal(<?php echo $mercado->id; ?>)"
                                                data-target="#exampleModal" data-toggle="modal">
                                                Veja as Ofertas
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <p class="card-text">Validade: <?php echo $mercado->data_ofertas ?> </p>
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
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="zoom" id="divZoom">
                                            <div class="carousel-inner" id="pictures">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->

    </div>
    <?php
   require_once('footer.php');
 ?>