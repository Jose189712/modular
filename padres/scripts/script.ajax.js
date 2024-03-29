$(function () {
    var peticionHTTP;
    // se inicializa el objeto para hacer la petición dependiendo del navegador
    function inicializar_XHR() {
        if (window.XMLHttpRequest) {
            //navegadores nuevos
            peticionHTTP = new XMLHttpRequest();
        } else {
            // navegadores viejos
            peticionHTTP = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }

    function Peticion(url, metodo, funcion) {
        //define una funcion de como actuar o que hacer
        peticionHTTP.onreadystatechange = funcion;
        // realiza la peticion
        peticionHTTP.open(metodo, url, true);
        peticionHTTP.send(null);
    }
    function funcActuadora() {
        if ((peticionHTTP.readyState == 4 && peticionHTTP.status == 200) || (peticionHTTP.status >= 400)) {
            // document.write(peticionHTTP.responseText);            
            container.innerHTML = peticionHTTP.responseText;
            container = document.getElementById("containersillo");
        }
    }
    // Ajax Registrarse
    function descargarArchivo() {
        container.innerHTML = "<form class=\"row col s12\" style=\"height:auto\" id=\"formRegister\" method=\"post\"></form>";
        container = document.querySelector("#formRegister");
        inicializar_XHR();
        Peticion("formRegistro.html", "GET", funcActuadora);
        accionesRegistro();
    }

    var mensajesA = document.getElementById("modalMessages");
    var instanceA = M.Modal.init(mensajesA, {});

    //CÓDIGO PARA QUE LOS PADRES INICIEN SESION 
    var form = document.querySelector("#initPadre");

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        var initPadre = new FormData(form);

        fetch('./login.php', {
            method: 'POST',
            body: initPadre
        })
            .then(response => {
                return response.text();
            })
            .then(respuesta => {
                console.log("Hola jose " + respuesta);
                if (respuesta == 'true') {
                    location.href = './Main.php';
                }
                else {
                    document.getElementById("tituloMA").innerHTML = "¡ERROR!";
                    document.getElementById("tituloMA").style.color = "red";
                    document.getElementById("textoModal").innerHTML = "El usuario y/o contraseña son incorrectos";
                    instanceA.open();
                }
            })
    })

    var btnAJAX = document.getElementById("registar"),
        container = document.getElementById("containersillo"), containAlumnos = document.querySelector("#containerAlumnosP"),
        formAlumnosR = document.querySelector("#formAP");
    btnAJAX.addEventListener("click", descargarArchivo);


    //FUNCIÓN PAR QUE LOS PADRES SE REGISTREN COMNO USUARIOS DEL SISTEMA
    function accionesRegistro() {
        var formularioRegistro = document.querySelector("#formRegister");

        formularioRegistro.addEventListener("submit", (event) => {
            event.preventDefault();

            var formSeriado = new FormData(formularioRegistro);

            fetch('./registro.php', {
                method: 'POST',
                body: formSeriado
            })
                .then(response => {
                    return response.text();
                })
                .then(respuesta => {
                    console.log(respuesta);
                    if (respuesta == 1) {
                        location.href = './Main.php';
                    } else if (respuesta == 'Ya existe') {
                        document.getElementById("tituloMA").innerHTML = "ATENCIÓN";
                        document.getElementById("tituloMA").style.color = "green";
                        document.getElementById("textoModal").innerHTML = "Ese correo ya esta registrado ingresa otro o inicia sesión";
                        instanceA.open();
                        formularioRegistro.reset();
                    }
                })
        })
    }//fin de la funcion para cargar las acciones del registro


    //FUNCIÓN PARA QUE EL PADRE PUEDA REGISTRAR A SU HIJO COMO ALUMNO
    formAlumnosR.addEventListener('submit', (event) => {
        event.preventDefault();

        let formSeriado = new FormData(formAlumnosR);

        fetch('./registroPA.php', {
            method: 'POST',
            body: formSeriado
        })
            .then(response => {
                return response.text();
            })
            .then(respuesta => {
                console.log(respuesta);
                if (respuesta == 1) {
                    alert("El registro ha sido exitoso");
                    location.href = './Main.php';
                } else {
                    alert(respuesta);
                }
            })
    })



});


