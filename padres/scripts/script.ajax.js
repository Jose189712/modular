$(function ()
{
    var peticionHTTP;
    // se inicializa el objeto para hacer la petición dependiendo del navegador
    function inicializar_XHR(){
        if(window.XMLHttpRequest){
            //navegadores nuevos
            peticionHTTP = new XMLHttpRequest();
        }else{
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
    function funcActuadora () {
        if((peticionHTTP.readyState == 4 && peticionHTTP.status == 200) || (peticionHTTP.status >= 400)){
            // document.write(peticionHTTP.responseText);
            container.innerHTML = peticionHTTP.responseText;
        }
    }
    // Ajax Registrarse
    function descargarArchivo() {
        inicializar_XHR();
        Peticion("formRegistro.html","GET",funcActuadora);
    }
    var btnAJAX = document.getElementById("registar"),
            container = document.getElementById("containersillo");
        btnAJAX.addEventListener("click",descargarArchivo);


});


