$(document).ready(function () {
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown();
    /**Variables inicialización del modal  */
    var elems = document.querySelector('#modalMessages');
    var instance = M.Modal.init(elems, {});
    var userModal = document.querySelector("#usuarios");
    var instanceUser = M.Modal.init(userModal, {});   
    var infoClassmate = document.querySelector("#infoClassmate");
    var instanceClassmate = M.Modal.init(infoClassmate, {});
    

    fetch('./getAlumnos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => {
            return response.json();
        })
        .then(respuesta => {            
            if (respuesta == 0) {
                $("#containerAlumnosP").slideDown("1000");
            } else {
                clicksAlumnos(setAlumnos(respuesta));                
                document.querySelector('#textoModal').innerHTML = "Puede ver la información de sus hijos en el botón Alumnos Registrados";
                instance.open();
            }
        })

    function ejerciciosResueltos(numE) {
        var $counter = $('#counter'),
            startVal = $counter.text(),
            currentVal,
            endVal = (numE + 1),
            fontSize = $counter.css('font-size');


        currentVal = startVal;
        var i = setInterval(function () {
            if (currentVal === endVal) {
                clearInterval(i);
                $counter.animate({ fontSize: fontSize });
            }
            else {
                $counter.text(currentVal);
                currentVal++;
            }
        }, 100);

    }

    function sesionesCompletadas(numS) {
        var $counter = $('#counter2'),
            startVal = $counter.text(),
            currentVal,
            endVal = (numS + 1),
            fontSize = $counter.css('font-size');


        currentVal = startVal;
        var i = setInterval(function () {
            if (currentVal === endVal) {
                clearInterval(i);
                $counter.animate({ fontSize: fontSize });
            }
            else {
                $counter.text(currentVal);
                currentVal++;
            }
        }, 100);

    }

    function Puntaje(puntos) {
        var $counter = $('#counter3'),
            startVal = $counter.text(),
            currentVal,
            endVal = (puntos+1),
            fontSize = $counter.css('font-size');


        currentVal = startVal;
        var i = setInterval(function () {
            if (currentVal === endVal) {
                clearInterval(i);
                $counter.animate({ fontSize: fontSize });
            }
            else {
                $counter.text(currentVal);
                currentVal++;
            }
        }, 100);

    }

    document.getElementById("usersModal").addEventListener('click', (ev) => {
        instanceUser.open();
    })

    document.getElementById("cerrarContainerInfoA").addEventListener('click', (ev) => {
        instanceClassmate.close();
    })

    var registrarAlumnoInside = document.querySelector('#registrarAlumnoInterno');
    registrarAlumnoInside.addEventListener("click", () => {
        $('#containerAlumnosP').slideDown('1000');
    })
    var closeRegistroA = document.querySelector('#cerrarRegistroAlumnos');
    closeRegistroA.addEventListener("click", () => {
        $('#containerAlumnosP').slideUp('1000');
    })
    
    document.getElementById("editPerfil").addEventListener("click", () => {
        $('#containerInfoP').slideDown('1000');
    });

    document.getElementById("cerrarContainerInfoP").addEventListener("click", () => {
        $('#containerInfoP').slideUp('1000');
    });


    document.getElementById("formInfoP").addEventListener('submit', (ev) => {
        ev.preventDefault();
        let data = new FormData(document.getElementById("formInfoP"));
        
        fetch('modifyInfo.php', {
            method: 'POST',
            body: data
        })
        .then(response => {
            return response.text();
        })
        .then(respuesta => {
            location.reload();
        })
    })

    function setAlumnos(objeto){    
        let contenedor = document.getElementById("containerUsuarios");
        let id = [];
        for(const i in objeto) {            
            contenedor.innerHTML = contenedor.innerHTML + '<a id='+objeto[i]['idALUMNOS']+' class="collection-item"><div class="chip"><img src="img/usuarioAlumno.jpg" alt="alumno-default">'+objeto[i]['nombreAlumno']+' '+objeto[i]['apellido_p_Alumno']+' '+objeto[i]['apellido_m_Alumno']+'</div></a>';
            id.push(parseInt(objeto[i]['idALUMNOS']));                        
        }
        return id;
    }
    /**Funcion para asignar funciones a los botones de los alumnos */
    function clicksAlumnos(ids){ 
        for(const a in ids) {        
            document.getElementById(ids[a]).addEventListener('click', lookAlumnos);
        }
    }
    /**Funcion para obtener informacion de los alumnos */
    function lookAlumnos(ev){
        console.log(document.getElementById(ev.target.id).childNodes[0].innerHTML);
        document.getElementById("alumnoPrincipal").innerHTML = document.getElementById(ev.target.id).childNodes[0].innerHTML;

        let data = new URLSearchParams("idalumno="+ev.target.id);

        fetch('getInfoAlumno.php', {
            method: 'POST',
            body: data,
            headers : {
                'Conten-Type': 'application/json'
            }
        })
        .then(response => {
            return response.json();
        })
        .then(respuesta => {
            document.getElementById("counter").innerHTML = 0;
            document.getElementById("counter2").innerHTML = 0;
            document.getElementById("counter3").innerHTML = 0;
            let preloadPuntaje = document.getElementById("preloadPuntaje");
            let preloadEjercicios = document.getElementById("preloadEjercicios");
            let preloadSesiones = document.getElementById("preloadSesiones");
            instanceUser.close();
            if (respuesta['puntaje'] == null) {
                Puntaje(0);
                preloadPuntaje.setAttribute("style", "width:0%");
            } else {
                Puntaje(Math.round((parseInt(respuesta['puntaje'])*100)/(parseInt(respuesta['ejercicios'])*100)));
                preloadPuntaje.setAttribute("style", "width:"+(parseInt(respuesta['puntaje'])*100)/(parseInt(respuesta['ejercicios'])*100)+"%");
            }
            
            ejerciciosResueltos(parseInt(respuesta['ejercicios']));
            preloadEjercicios.setAttribute("style", "width:"+((parseInt(respuesta['ejercicios'])*100)/18)+"%");
            sesionesCompletadas(parseInt(respuesta['sesiones']));
            preloadSesiones.setAttribute("style", "width:"+((parseInt(respuesta['sesiones'])*100)/6)+"%");
            document.querySelector(".infoA").setAttribute("style", "inline-block");
            document.querySelector(".infoA").setAttribute("id", "d_"+ev.target.id);
            document.getElementById("d_"+ev.target.id).addEventListener('click', (ev) => {
                let data = new URLSearchParams("idAlumno="+ev.target.id.split("_")[1]);
                fetch('getInfoClassmate.php', {
                    method: 'POST',
                    body: data
                })
                .then(response => {
                    return response.json();
                })
                .then(respuesta => {
                    console.log(respuesta);
                    document.getElementById("icon_prefix2").setAttribute("value", respuesta['nombreAlumno']);
                    document.getElementById("icon_apellidopA").setAttribute("value", respuesta['apellido_p_Alumno']);
                    document.getElementById("icon_apellidomA").setAttribute("value", respuesta['apellido_m_Alumno']);
                    document.getElementById("icon_p1").setAttribute("value", respuesta['name_user']);
                    document.getElementById("icon_p2").setAttribute("value", respuesta['palabra_secreta']);
                })
                
                instanceClassmate.open();
            })
        })
    }
    

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
                    enviarInformacionAlumnos.reset();                                       
                   location.reload();
                }
                else if (respuesta == 2){
                    document.querySelector('#textoModal').innerHTML = "El usuario que ingreso ya existe";
                    instance.open();
                } else if (respuesta ==3) {
                    document.querySelector('#textoModal').innerHTML = "Ha ocurrido un error y el alumno no ha sido registrado";
                    instance.open();
                } else {
                    document.querySelector('#textoModal').innerHTML = "Ha ocurrido un error con el servidor intente de nuevo";
                    instance.open();
                }
            })
    })
});//Fin de la función document ready


