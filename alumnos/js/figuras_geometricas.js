var levelClass = 0;
var storageLevel = {};
levels = {
  1: {
    'cuadrado': '<svg width=200 height=200><rect x=10 y=30 width=180 height=180 stroke=\"green\" stroke-width=0 fill=\"lime"\ /></svg>',
    'rectangulo': '<svg width=300 height=300><rect x=10 y=40 width=300 height=150 fill=\"orange\" stroke=\"purple\" stroke-width=0 /></svg>',
    'triangulo': '<svg height="200" width="200"><polygon points="100,10 190,190 10,190" stroke="purple" stroke-width=0 fill="aqua" /></svg>'
  },
  2: {
    'circulo': '<svg width=200 height=200><circle cx=100 cy=100 r=90 stroke="blue" stroke-width=0 fill="orange"></svg>',
    'elipse': '<svg height="200" width="200"><ellipse cx=100 cy=100 rx=100 ry=70 stroke="red" stroke-width=0 fill="yellow" /></svg>',
    'rombo': '<img src="../imagenes/rombo.webp" alt="">'
  },
  3: {
    'romboide': '<img src="../imagenes/romboide.webp" alt="" style="height: 200px; width: 200px">',
    'pentagono': '<img src="../imagenes/pentagono.jpg" alt="" style="height: 200px; width: 200px">',
    'hexagono': '<img src="../imagenes/hexagono.png" alt="" style="height: 200px; width: 200px">'
  },
  4: {
    'heptagono': '<img src="../imagenes/heptagono.jpg" alt="" style="height: 200px; width: 200px">',
    'octagono': '<img src="../imagenes/octagono.jpg" alt="" style="height: 200px; width: 200px">',
    'decagono': '<img src="../imagenes/decagono.png" alt="" style="height: 200px; width: 200px">'
  },
  5: {
    'estrella': '<img src="../imagenes/estrella.png" alt="" style="height: 200px; width: 200px">',
    'esfera': '<img src="../imagenes/esfera.png" alt="" style="height: 200px; width: 200px">',
    'cubo': '<img src="../imagenes/cubo.jpg" alt="" style="height: 200px; width: 200px">'
  },
  6: {
    'cilindro': '<img src="../imagenes/cilindro.jpg" alt="" style="height: 200px; width: 200px">',
    'prisma_rectangular': '<img src="../imagenes/prisma_rectagular.jpg" alt="" style="height: 200px; width: 200px">',
    'cono': '<img src="../imagenes/cono.png" alt="" style="height: 200px; width: 200px">'
  },
  7: {
    'piramide': '<img src="../imagenes/piramide.jpg" alt="" style="height: 200px; width: 200px">',
    'trapezio': '<img src="../imagenes/trapezio.jpg" alt="" style="height: 200px; width: 200px">',
    'trapezoide': '<img src="../imagenes/trapezoide.jpg" alt="" style="height: 200px; width: 200px">'
  }
}
var good = [];
var answer = [];
var URLactual = window.location.href;
var sesion = URLactual.split('?')[1].split('=')[1];

fetch('getLevel.php', {
  method: 'POST',
})
  .then(response => {
    return response.json();
  })
  .then(level => {
    levelClass = level;
    storageLevel = levels[levelClass];

    let figures = document.querySelectorAll(".fieldF");
    let claves = Object.keys(storageLevel);
    let opciones = document.querySelectorAll(".opciones");
    console.log(opciones);
    let opcionesValue = [document.querySelectorAll('[name=primerFigura]'), document.querySelectorAll('[name=segundaFigura]'), document.querySelectorAll('[name=tercerFigura]')];
    let count = 0;

    for (i = 0; i < opcionesValue.length; i++) {
      for (j = 0; j < opcionesValue[i].length; j++) {
        opciones[count].innerHTML = "<strong>"+claves[j]+"</strong>";
        opcionesValue[i][j].setAttribute("value", claves[i]);
        count += 1;
      }
    }    
    for (i = 0; i < claves.length; i++) {
      figures[i].innerHTML = storageLevel[claves[i]];
    }
  })


document.getElementById("finish").addEventListener('click', (ev) => {
  let respuestas = [document.querySelectorAll('[name=primerFigura]'), document.querySelectorAll('[name=segundaFigura]'), document.querySelectorAll('[name=tercerFigura]')];;
  let checks = document.getElementsByClassName("chk");
  let objeto = {}
  let claves = Object.keys(storageLevel);
  for (i = 0; i < respuestas.length; i++) {
    for (j = 0; j < respuestas[i].length; j++) {      
      if (respuestas[i][j].checked) {        
        if (respuestas[i][j].getAttribute("value") == claves[j]) {
          objeto[respuestas[i][j].getAttribute("value")] = claves[j];
          objeto['status'] = true;
        } else {
          objeto[respuestas[i][j].getAttribute("value")] = claves[j];
          objeto['status'] = false;
        }
      }
    }
    answer.push(objeto);
    objeto = {}
  }
  console.log(JSON.stringify(answer));
  
    for (i = 0; i < checks.length; i++) {
      if (answer[i]['status']) {      
        checks[i].innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" /></svg>';
      } else {      
        checks[i].innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="red" class="bi bi-x-octagon-fill" viewBox="0 0 16 16"><path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg>';
      }
    }
    let puntos = 0;
  
    for (i = 0; i < answer.length; i++) {
      if (answer[i]['status']) {
        puntos += 1;
      }
    }
  
    document.getElementById("puntuacion").innerHTML = String(puntos) + '/3';
  
    // Bloque de codigo para guardar resultados en la base de datos
  
    const data = new URLSearchParams("respuesta=" + JSON.stringify(claves) + "&respondido=" + JSON.stringify(answer) + "&area=geometria&puntaje=" + ((puntos * 100) / 3) + "&nivel=" + levelClass +"&sesion="+sesion);
  
    fetch('saveexercise.php', {
      method: 'POST',
      body: data
    })
      .then(response => {
        return response.text();
      })
      .then(respuesta => {
        console.log(respuesta);
        sesion = respuesta.split(")")[1];
      })
  
  // Fin del bloque de código para guardar los datos en la base de datos
})// Fin de la funcion para checar los resultados

document.getElementById("nextExercise").addEventListener('click', () => {
  location.href = 'series_numericas.php?id=' + sesion;
})

var campos = document.querySelectorAll(".response");

document.getElementById("inputF1").addEventListener('change', checkFieldsInput);
document.getElementById("inputF2").addEventListener('change', checkFieldsInput);
document.getElementById("inputF3").addEventListener('change', checkFieldsInput);

/**Funcion para checar que no haya campos vacios */
function checkFieldsInput(ev) {
  console.log("escribiendo...")
  let bool = false;
  for (i = 0; i < campos.length; i++) {
    if (campos[i].value == '') {
      bool = false;
      continue;
    } else {
      bool = true;
    }
  }
  if (bool) {
    document.getElementById("finish").removeAttribute("disabled")
  } else {
    document.getElementById("finish").setAttribute("disabled", "");
  }
}//fin de la funcion 
