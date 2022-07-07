var levelClass = 0;
var storageLevel = 0;
levels = { 1: 10, 2: 50, 3: 100, 4: 500, 5: 1000, 6: 5000, 7: 10000 }
var good = [];
var answer = [];
var sesion = '';

imagenes = ['lion.png', 'person.png', 'unknow.png', 'pato.png', 'oso.png', 'cabra.png', 'oso2.png', 'koala.png', 'pelicano.png', 'zorro.png', 'cocodrilo.png', 'serpiente.png', 'gato.png', 'raton.png', 'jaguar.png', 'caballo.png', 'panda.png', 'perrito.png', 'pajarillo.png', 'tucan.png', 'tortuga.png', 'cerdo.png', 'castor.png'];

fetch('getLevel.php', {
  method: 'POST',
})
  .then(response => {
    return response.json();
  })
  .then(level => {
    levelClass = level;
    storageLevel = levels[levelClass];
    good = [generateResult(), generateResult(), generateResult(), generateResult()];

    answers = document.getElementsByClassName("result");
    options = document.getElementsByClassName("option");

    for (i = 0; i < answers.length; i++) {
      answers[i].innerHTML = good[i]['result'];
    }
    var numbers = [];
    var name = 'uno';    
    let aleatorio = ~~(Math.random()*(imagenes.length));
    
    document.getElementById("animalito").setAttribute("src", "../imagenes/"+imagenes[aleatorio]);
    imagenes = imagenes.filter((item) => item !== imagenes[aleatorio]);
    
    for (i = 0; i < good.length; i++) {
      numbers.push(good[i][name]);
      if (i == good.length - 1 && name != 'dos') {
        i = -1;
        name = 'dos';
      }
    }
    for (i = 0; i < options.length; i++) {
      options[i].innerHTML = numbers[i];
    }
  })

/**Funcion para generar los numeros aleatorios para los ejeercicios */
function generateResult() {
  let numberOne = (Math.round(Math.random() * storageLevel) + 1);
  let numberTwo = (Math.round(Math.random() * storageLevel) + 1);
  return { 'result': (numberOne + numberTwo), 'uno': numberOne, 'dos': numberTwo }
}

/**Funcion para checar que no haya campos vacios */
function checkFieldsDrop(campos) {
  let proseguir = false;
  for (i = 0; i < campos.length; i++) {
    if (campos[i].children.length == 0) {
      proseguir = false;
      continue;
    } else {
      proseguir = true;
    }
  }
  return proseguir;
}//fin de la funcion 

document.getElementById("finish").addEventListener('click', (ev) => {  
    let row = document.getElementsByClassName("result");
    let respuestas = document.getElementsByClassName("option");
    let config = 0;
    for (i = 0; i < row.length; i++) {
      let objeto = {};
      let name = 'uno';
      objeto.result = row[i].innerHTML;
      for (j = config; j < (config + 2); j++) {
        objeto[name] = respuestas[j].innerHTML;
        name = 'dos';
      }
      config = j;
      objeto['status'] = checkSum(parseInt(objeto['result']), parseInt(objeto['uno']), parseInt(objeto['dos']));
      answer.push(objeto);
    }
    console.log(JSON.stringify(answer));

    for (i = 0; i < row.length; i++) {
      if (answer[i]['status']) {
        row[i].parentNode.classList.add("bg-success");
        row[i].classList.remove('text-muted');
        row[i].classList.add('text-light');
        row[i].innerHTML = row[i].innerHTML + "  " + "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"40\" height=\"40\" fill=\"currentColor\" class=\"bi bi-check-lg\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg>"
      } else {
        row[i].parentNode.classList.add("bg-danger");
        row[i].classList.remove('text-muted');
        row[i].classList.add('text-light');
        row[i].innerHTML = row[i].innerHTML + "  " + "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"40\" height=\"40\"fill=\"currentColor\" class=\"bi bi-x\" viewBox=\"0 0 16 16\"><path d=\"M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z\"/></svg>"
      }
    }
    let puntos = 0;

    for(i = 0; i < answer.length; i++){      
      if(answer[i]['status']) {
        puntos += 1;
      }
    }

    document.getElementById("puntuacion").innerHTML = String(puntos)+'/4';

    // Bloque de codigo para guardar resultados en la base de datos

    const data = new URLSearchParams("respuesta="+JSON.stringify(good)+"&respondido="+JSON.stringify(answer)+"&area=aritmetica&puntaje="+((puntos*100)/4)+"&nivel="+levelClass);

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
  location.href = 'figuras_geometricas.php?id='+sesion; 
})

function checkSum(respuesta, one, two) {
  if ((one + two) == respuesta) {
    return true;
  } else {
    return false;
  }
}

function allowDrop(ev) {
  ev.preventDefault();
  return false;
}

function drag(ev) {
  child = ev.target;
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  if (ev.target.classList.contains("drop")) {
    ev.target.classList.remove("p-4");
    ev.target.classList.remove();
    ev.target.innerHTML = "";
    ev.target.appendChild(document.getElementById(data));    
  }
  if (checkFieldsDrop(document.querySelectorAll('.drop'))) {
    document.getElementById("finish").removeAttribute("disabled");
  }

}

function enter(ev) {
  if (ev.target.classList.contains("drop")) {
    ev.target.classList.remove("bg-light");
    ev.target.classList.add("bg-info");
  }
}

function leave(ev) {
  if (ev.target.classList.contains("drop")) {
    ev.target.classList.remove("bg-info");
    ev.target.classList.add("bg-light");
  }
}
