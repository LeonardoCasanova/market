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

function abreModal(id) {
  readTextFile("src/path/mercados.json", function (text) {
    var data = JSON.parse(text);
    var fotos = data['mercados'][id - 1]['path'];
    var nome_mercado = data['mercados'][id - 1]['nome_mercado'];
    var html = '';

    var i = 0;
    for (var k in fotos) {
      if (i == 0) {
        html += '<div class="carousel-item active">';
        i++;
      } else {
        html += '<div class="carousel-item">';
      }

      // html += '  <img class="d-block w-100" figure.zoom style="background - image: url(//res.cloudinary.com/active-bridge/image/upload/slide1.jpg)" ' +
      //            'onmousemove="zoom(event)" src="' + fotos[k] + '"  alt="Second slide">' +
      //            '</div>';
    }

    document.getElementById("pictures").innerHTML = html;
    document.getElementById("exampleModalLabel").innerHTML = nome_mercado;

  });
}

function zoom(e) {
  var zoomer = e.currentTarget;
  e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
  e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
  x = offsetX / zoomer.offsetWidth * 100
  y = offsetY / zoomer.offsetHeight * 100
  zoomer.style.backgroundPosition = x + '% ' + y + '%';
}
