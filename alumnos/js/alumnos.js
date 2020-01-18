(function(){    
    $(document).ready(function(){    
//ANIMACIÓN AL INICIAR EL DOCUMENTO
    anime.timeline({
        targets: '#dialogo',            
        scale: 1.5,        
        direction: 'alternate',
        easing: 'cubicBezier(.5, .05, .1, .3)',     
        complete: function(e){
            $('#inicio').slideDown('1000');
            $('#registro').slideDown('1000');
        }               
    })
    .add({targets: '#dialogo', color: '#ce0018'},0);
//  ACCIONES PARA REALIZAR EL REGISTRO            
        $("#registro").click(function(){
                $("#ocultarInicio").slideUp('1000');
                $("#inicio").slideDown('1000');                                                    
                enviarMensaje("#dialogo > p", "Hiciste click para registrarte. Ingresa un nombre de usuario y una palabra secreta");  
                animarDialogo();                           
                $("#formularioL-alumnos").slideUp('1000');   
                $("#formularioR-alumnos").slideDown('1000');                               
                $("#form-titulo").text("Registrate en esta sección");
                document.querySelector("#icon_nombre").focus();                
                $("#registro").slideUp('1000');
                $("#ocultarRegistro").slideDown('1000');     
                setTimeout(function(){
                    botonesDeshabilitados("#inicio","block");
                },2000);                                                          
        });//Evento de click para desplegar formulario
//FIN DE LAS ACCIONES PARA REALIZAR EL REGISTRO

        // EVENTOS DE CLICK PARA EL BOTON OCULTAR PARA VOLVER COMO AL INICIO
        $("#ocultarRegistro").click(function(){
            $("#formularioR-alumnos").slideUp('1000');
            $(this).slideUp('1000');
            $("#registro").slideDown('1000');
            enviarMensaje("#dialogo > p","¡Hola! Vamos elige una opción para que puedas continuar");
        });
        // FIN DEL EVENTO PARA EL BOTON OCULTAR

//  ACCIONES PARA EL INICIO DE SESIÓN        
        $("#inicio").click(function(){                 
                $("#ocultarRegistro").slideUp('1000');
                $("#registro").slideDown('1000');                                           
                enviarMensaje("#dialogo > p","¿Quieres ingresar? Ingresa tu nombre de usuario y la palabra secreta que elegiste");    
                animarDialogo();                          
                $("#formularioR-alumnos").slideUp('1000');
                $("#formularioL-alumnos").slideDown('1000');                
                $("#formL-titulo").text("Ingresa tus datos de usuario");               
                $(this).slideUp('1000');        
                $("#ocultarInicio").slideDown('1000');
                setTimeout(function(){
                    botonesDeshabilitados("#registro","block");
                },2000);
        });//Evento de click para desplegar formulario
//  FIN DE LAS ACCIONES PARA EL INICIO DE SESION

        // EVENTOS DE CLICK PARA EL BOTON OCULTAR PARA VOLVER COMO AL INICIO
        $("#ocultarInicio").click(function(){
            $("#formularioL-alumnos").slideUp('1000');
            $(this).slideUp('1000');
            $("#inicio").slideDown('1000');
            enviarMensaje("#dialogo > p","¡Hola! Vamos elige una opción para que puedas continuar");
        });
        // FIN DEL EVENTO PARA EL BOTON OCULTAR


// MÓDULO PARA REGISTRAR LOS ALUMNOS EN EL SISTEMA
        $("#click").click(function(){
            $.ajax({
                url: './registro.php',
                type: 'POST',
                data: $("#registerForm").serialize(),
                success: function(response) {
                    if(response)
                        alert("Registro exitoso"+response);                        
                        location.href = './test_vak';
                }
            });
        });
// FIN DEL MÓDULO PARA REGISTRAR LOS ALUMNOS EN EL SISTEMA

// VARIABLES PARA MOSTRAR DATOS EN ORDEN DE UNO POR UNO
var botonSiguiente = document.querySelector("#siguiente");
var botonAnterior = document.querySelector("#anterior");
var arregloComponents = document.querySelectorAll(".arreglo");
var contador = 0;
    
botonSiguiente.addEventListener('click',function(e){
    if(contador < arregloComponents.length-1){
        arregloComponents[contador].setAttribute('style','display:none');
        contador++;
        arregloComponents[contador].setAttribute('style','display:block');        
        if(arregloComponents[contador].children.length > 1) arregloComponents[contador].children[1].focus();              
        if(contador==arregloComponents.length-1) this.setAttribute('style','display:none')
    }else{
        this.setAttribute('style','display:none');
    }
})

botonAnterior.addEventListener('click',function(e){
    if(contador != 0){
        arregloComponents[contador].setAttribute('style','display:none');
        contador--;
        arregloComponents[contador].setAttribute('style','display:block');
        if(arregloComponents[contador].children.length > 1) arregloComponents[contador].children[1].focus();
        if(contador<=arregloComponents.length-1) botonSiguiente.setAttribute('style','display:block')
    }
})

var iniciarYa = document.querySelector("#clickL");
var prueba = document.querySelector("#loginForm");


iniciarYa.addEventListener('click', function(){      
    var formulario = new FormData(prueba);
    fetch('./login.php',{
        method: 'POST',
        body: formulario
    })
    .then(response => {
        return response.text();
    })    
    .then(respuesta => {
        console.log(respuesta);
        if(respuesta == 'true')                        
        location.href = './tablero.php';
    })
})
// FIN DE ACCIONES PARA PRESENTAR LOS DATOS CONSECUTIVOS
        


        //FUNCIONES
        /**Función para animar cuadro de dialogo */
        function animarDialogo(){
            anime.timeline({
                targets: '#dialogo',            
                scale: 1.5,        
                direction: 'alternate',
                easing: 'cubicBezier(.5, .05, .1, .3)',                             
            })
            .add({targets: '#dialogo', color: '#ce0018'},0);
        }//fin de la función para animar el cuadro de dialogo
        /**Función para escribir mensaje en algun elemento de texto */
        function enviarMensaje(selector,mensaje){            
            $(selector).text(mensaje);
        }//fin de la función enviarMensaje
        function botonesDeshabilitados(accion,estado){            
            $(accion).css('display',estado);
        }//fin de la funcion botones deshabilitados             
    });//Fin de la función para leer cuando ya se ha terminado de cargar el archivo            
})();//Fin de la función autoinvocada