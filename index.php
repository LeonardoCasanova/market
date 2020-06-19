<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bootstrap 4 Card Columns</title>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="src/css/index.css">
</head>
<?php

$json_data = json_decode(file_get_contents('src/path/mercados.json'));
$mercados = $json_data->mercados;

?>

<body>
<script type="text/javascript">
        function readTextFile(file, callback) {
            var rawFile = new XMLHttpRequest();
            rawFile.overrideMimeType("application/json");
            rawFile.open("GET", file, true);
            rawFile.onreadystatechange = function() {
                if (rawFile.readyState === 4 && rawFile.status == "200") {
                    callback(rawFile.responseText);
                }
            }
            rawFile.send(null);
        }

        function abreModal(id) {
            readTextFile("src/path/mercados.json", function(text){
              var data = JSON.parse(text);
              var fotos = data['mercados'][id-1]['path'];
              var html =  '';

              var i = 0;
              for (var k in fotos) {
                if(i == 0){
                  html += '<div class="carousel-item active">';
                  i++;
                }else{
                  html += '<div class="carousel-item">';
                }

                html += '  <img class="d-block w-100" src="'+fotos[k]+'"  alt="Second slide">'+
                        '</div>';
              }



              document.getElementById("pictures").innerHTML = html;

            });
        }

    </script>

  <div class="bs-example">
    <div class="container">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <br>
      <!-- Mercados -->
      <section id="team" class="pb-5">
        <div class="container">
          <h5 class="section-title h1">Ofertas de Supermercados - Indaiatuba</h5>
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
                        <p><img class=" img-fluid" src="<?php echo $mercado->logo_mercado ?>" alt="card image"></p>
                        <div class="card-body text-center">
                          <button type="button" class="btn btn-primary" onClick="abreModal(<?php echo $mercado->id; ?>)" data-target="#exampleModal" data-toggle="modal">
                            Veja as Ofertas
                          </button>
                        </div>
                        <div class="card-body text-center">
                          <p class="card-text"><?php echo $mercado->data_ofertas ?> </p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ./Card Mercado-->


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
                          <div class="carousel-inner" id="pictures">

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

            <?php
            }
            ?>


          </div>
        </div>
      </section>
      <!-- Mercados -->

      <!-- Footer -->
        <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
          <div class="container text-center">
            <small>Copyright &copy; Your Website</small>
          </div>
        </footer>
      <!-- Footer -->

</body>

</html>