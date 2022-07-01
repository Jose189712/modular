var levelClass = 0;
var storageLevel = [];
levels = {
  1: [[2, 6, 10, 12, 16], [4, 8, 14]],
  2: [[12, 14, 16, 17, 19], [13, 15, 18]],
  3: [[3, 9, 15, 18, 24], [6, 12, 21]],
  4: [[4, 12, 20, 24, 32], [8, 16, 28]],
  5: [[5, 15, 25, 30, 40], [10, 20, 35]],
  6: [[6, 18, 30, 36, 48], [12, 24, 42]],
  7: [[3, 23, 43, 53, 73], [13, 33, 63]]
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

    let series = document.querySelectorAll(".serie");
    console.log(storageLevel[0])
    for (i = 0; i < storageLevel[0].length; i++) {
      series[i].innerHTML = storageLevel[0][i];
    }
  })


document.getElementById("finish").addEventListener('click', (ev) => {
  let respuestas = document.getElementsByClassName("response");
  let checks = document.getElementsByClassName("colorBox");
  let objeto = []
  let puntos = 0;
  for (i = 0; i < respuestas.length; i++) {
    if (respuestas[i].value == storageLevel[1][i]) {
      checks[i].classList.remove("bg-info");
      checks[i].classList.add("bg-success");
      puntos += 1;      
    } else {
      checks[i].classList.add("bg-danger");
    }
    objeto.push(respuestas[i].value);
  }  
  answer.push(storageLevel[0]);
  answer.push(objeto);  
  console.log(JSON.stringify(answer));

  document.getElementById("puntuacion").innerHTML = String(puntos) + '/3';

  // Bloque de codigo para guardar resultados en la base de datos

  const data = new URLSearchParams("respuesta=" + JSON.stringify(storageLevel) + "&respondido=" + JSON.stringify(answer) + "&area=algebra&puntaje=" + ((puntos * 100) / 3) + "&nivel=" + levelClass + "&sesion=" + sesion);

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


document.getElementById("finishLevel").addEventListener('click', () => {
  const data = new URLSearchParams("level="+(levelClass+1)+"&sesion="+sesion);
  fetch('stateSesion.php', {
    method: 'POST',
    body: data
  })
  .then(respuesta => {
    return respuesta.text();
  })
  .then(response => {
    console.log(response);    
  })
  location.href = 'mapa.php';
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
