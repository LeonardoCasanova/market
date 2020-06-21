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

      html += '  <img class="d-block w-100" src="' + fotos[k] + '"  alt="Second slide">' +
        '</div>';
    }

    document.getElementById("pictures").innerHTML = html;
    document.getElementById("exampleModalLabel").innerHTML = nome_mercado;

  });
}
