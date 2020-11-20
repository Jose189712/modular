$(document).ready(function(){
  $('.sidenav').sidenav();
  $(".dropdown-trigger").dropdown();

  $(function ()
  {
      var $counter = $('#counter'),
          startVal = $counter.text(),
          currentVal,
          endVal = 15,
          fontSize = $counter.css('font-size');
      
  
          currentVal = startVal;
          var i = setInterval(function ()
          {
              if (currentVal === endVal)
              {
                  clearInterval(i);
                  $counter.animate({fontSize: fontSize});
              }
              else
              {
                  $counter.text(currentVal);
                currentVal++;
              }
          }, 100);
  
  });

  $(function ()
  {
      var $counter = $('#counter2'),
          startVal = $counter.text(),
          currentVal,
          endVal = 10,
          fontSize = $counter.css('font-size');
      
  
          currentVal = startVal;
          var i = setInterval(function ()
          {
              if (currentVal === endVal)
              {
                  clearInterval(i);
                  $counter.animate({fontSize: fontSize});
              }
              else
              {
                  $counter.text(currentVal);
                currentVal++;
              }
          }, 100);
  
  });

  $(function ()
  {
      var $counter = $('#counter3'),
          startVal = $counter.text(),
          currentVal,
          endVal = 18,
          fontSize = $counter.css('font-size');
      
  
          currentVal = startVal;
          var i = setInterval(function ()
          {
              if (currentVal === endVal)
              {
                  clearInterval(i);
                  $counter.animate({fontSize: fontSize});
              }
              else
              {
                  $counter.text(currentVal);
                currentVal++;
              }
          }, 100);
  
  });

  /**Variables inicialización del modal  */
  var elems = document.querySelector('#modalMessages');
    var instance = M.Modal.init(elems,{});

  var registrarAlumnoInside = document.querySelector('#registrarAlumnoInterno');
  registrarAlumnoInside.addEventListener("click", ()=>{
      $('#containerAlumnosP').slideDown('1000');      
  })
  var closeRegistroA = document.querySelector('#cerrarRegistroAlumnos');  
  closeRegistroA.addEventListener("click", () => {
      $('#containerAlumnosP').slideUp('1000');
  })
  var enviarInformacionAlumnos = document.querySelector('#formAP');
  /**Añadir evento submit al formulario llamado enviarInformacionAlumnos que permite registrar a un alumno */
  enviarInformacionAlumnos.addEventListener("submit", (event) => {
    event.preventDefault();
    var registrarAlumnos = new FormData(enviarInformacionAlumnos);

    fetch('./registroPA.php', {
        method: 'POST',
        body: registrarAlumnos
    })
        .then(response => {
            return response.text();
        })
        .then(respuesta => {
            console.log("Hola jose " + respuesta);
            if (respuesta == 1) {
                document.querySelector('#textoModal').innerHTML = "El alumno se ha registrado exitosamente";
                instance.open();
                //alert("Exitoso");
            }
            else {
                instance.open();
            }
        })
  })
});//Fin de la función document ready


