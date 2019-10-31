(function(){    
    $(document).ready(function(){    
//ANIMACIÓN AL INICIAR EL DOCUMENTO
        anime.timeline({
            targets: '#dialogo',            
            scale: 1.6,
            direction: 'alternate'            
        })
        .add({targets: '#dialogo', color: '#ce0018'},0);
//  ACCIONES PARA REALIZAR EL REGISTRO            
        $("#registro").click(function(){
                $("#ocultarInicio").slideUp('1000');
                $("#inicio").slideDown('1000');                                                    
                enviarMensaje("#dialogo > p", "Hiciste click para registrarte. Ingresa un nombre de usuario y una palabra secreta");  
                anime.timeline({
                    targets: '#dialogo',            
                    scale: 1.4,
                    direction: 'alternate'            
                })
                .add({targets: '#dialogo', color: '#ce0018'},0);
               // botonesDeshabilitados("#inicio","none");              
                $("#formularioL-alumnos").slideUp('1000');   
                $("#formularioR-alumnos").slideDown('1000');                               
                $("#form-titulo").text("Registrate en esta sección");
                //$(".subregistro").css('display','none'); 
                //$("#click > p").text("Registrar");
                //$("#click").attr('registro','sendRegistro');
                //envioDatos("#sendRegistro");
                //$("#nombreRegistro").show();
                //$("#cambioAccion").attr('value','registro');
                //$("#formulario-alumnos").slideDown('1000');
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
                anime.timeline({
                    targets: '#dialogo',            
                    scale: 1.4,
                    direction: 'alternate'            
                })
                .add({targets: '#dialogo', color: '#ce0018'},0);
                //botonesDeshabilitados("#registro","none");            
                $("#formularioR-alumnos").slideUp('1000');
                $("#formularioL-alumnos").slideDown('1000');                
                $("#formL-titulo").text("Ingresa tus datos de usuario");
               // $(".subregistro").css('display','block');
                //$("#click > p").text("Iniciar");
                //$("#click").attr('inicio','inicio');
                $("#clickL").click(function(){
                    location.href="./test_vak/";
                });
                //$("#nombreRegistro").hide();
                //$("#cambioAccion").attr('value','sesion');
               // $("#formularioL-alumnos").slideDown('1000');
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
                
            });
        });
// FIN DEL MÓDULO PARA REGISTRAR LOS ALUMNOS EN EL SISTEMA

        //FUNCIONES
        /**Función para modificar la propiedad display de un elemento */
        function modificarVista(selector){            
            $(selector).slideUp('1000');
        }//fin de la función modificarVista
        /**Función para escribir mensaje en algun elemento de texto */
        function enviarMensaje(selector,mensaje){            
            $(selector).text(mensaje);
        }//fin de la función enviarMensaje
        function botonesDeshabilitados(accion,estado){            
            $(accion).css('display',estado);
        }//fin de la funcion botones deshabilitados             
    });//Fin de la función para leer cuando ya se ha terminado de cargar el archivo       
})();//Fin de la función autoinvocada