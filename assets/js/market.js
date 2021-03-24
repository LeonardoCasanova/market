function readTextFile(file, callback) {

  var rawFile = new XMLHttpRequest();
  rawFile.overrideMimeType("application/json");
  rawFile.open("GET", file, true);
  rawFile.onreadystatechange = function () {
    if (rawFile.readyState === 4 && rawFile.status == "200") {
      callback(rawFile.responseText);
    }
  }
  rawFile.send(null);
}

function abrirModal(id) {
  readTextFile("src/path/mercados.json", function (text) {
    var data = JSON.parse(text);
    var fotos = data['mercados'][id - 1]['path'];
    var nome_mercado = data['mercados'][id - 1]['nome_mercado'];
    var html = '';
    var divZoom = '';

    var i = 0;
    for (var k in fotos) {
      if (i == 0) {
      
        html += '<div class="carousel-item active">';
        html += '<div class="zoom" onmousemove="zoom(event)" style="background-image: url(' + fotos[k] + ')">';
        i++;
      } else {
        html += '<div class="carousel-item">';
        html += '<div class="zoom" onmousemove="zoom(event)" style="background-image: url(' + fotos[k] + ')">';
        
      }

        html += ' <img class="d-block w-100" src="' + fotos[k] + '"  alt="Second slide">' +
                  '</div></div>';

    }    
    $("#pictures").html(html);
    $("#exampleModalLabel").html(nome_mercado);

  });
}

function zoom(e) {
  var zoomer = e.currentTarget;
  e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX;
  e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX;
  x = offsetX / zoomer.offsetWidth * 100;
  y = offsetY / zoomer.offsetHeight * 100;
  zoomer.style.backgroundPosition = x + '% ' + y + '%';
}
