/**ARCHIVO PARA LA INTERACCIÓN CUANDO CADA ALUMNO REALICE EL TEST DE VAK */
(function(){
    $(document).ready(function(){
        var contador = 0;       
        //FUNCIONES PARA MOSTRAR LOS MENSAJES DE INICIO DEL TEST POR TIEMPO 
        $("#talking").fadeIn('1000');
        setTimeout(function(){
            $("#comencemos").slideDown('1000');
            setTimeout(function(){
                $("#talking").fadeOut('1000');
                setTimeout(function(){
                    $("#comencemos").slideUp('1000');
                    setTimeout(function(){
                        $("#talking > p").text("¿Qué te gusta mas en tu cumpleaños?");
                        $("#talking").css('font-size','1.6em');
                        $("#talking").slideDown('1000');
                        $("#uno").slideDown('1000'); 
                        contador++;                       
                    },1000);
                },0);
            },1000); 
        },4000);
        
        $("#uno > .col").click(function(){
            contador++;
            pregunta();
        });
        $("#dos > .col").click(function(){
            contador++;
            pregunta();
        });
        $("#tres > .col").click(function(){
            contador++;
            pregunta();
        });
        $("#cuatro > .col").click(function(){
            contador++;
            pregunta();
        });
        $("#cinco > .col").click(function(){
            contador++;
            pregunta();
        });
        $("#seis > .col").click(function(){
            contador++;
            pregunta();
        });
        $("#siete > .col").click(function(){
            contador++;
            pregunta();
        });
        $("#ocho > .col").click(function(){
            contador++;
            pregunta();
        });
        $("#btn-finalizar > .boton-finalizar").click(function(){
            location.href = "../ejercicios/circuito.html";
        });
        
        //FUNCIONES AL DAR CLICK EN UNA IMAGEN
        function pregunta(){
            switch(contador){
                case 2:
                    $("#talking > p").text("¿Qué actividades te gustan?");
                    $("#uno").slideUp('1000');
                    $("#dos").slideDown('1000');
                break;
                case 3:
                    $("#talking > p").text("¿Qué haces en tu tiempo libre?");
                    $("#dos").slideUp('1000');
                    $("#tres").slideDown('1000');
                break;
                case 4:
                    $("#talking > p").text("¿Qué es lo que más te gusta que te regalen?");
                    $("#tres").slideUp('1000');
                    $("#cuatro").slideDown('1000');
                break;
                case 5:
                    $("#talking > p").text("Si tuvieras dinero, ¿qué comprarías?");
                    $("#cuatro").slideUp('1000');
                    $("#cinco").slideDown('1000');
                break;
                case 6:
                    $("#talking > p").text("¿Qué recuerdas cuando vas a una fiesta?");
                    $("#cinco").slideUp('1000');
                    $("#seis").slideDown('1000');
                break;
                case 7:
                    $("#talking > p").text("¿Qué haces cuando te enojas?");
                    $("#seis").slideUp('1000');
                    $("#siete").slideDown('1000');
                break;
                case 8:
                    $("#talking > p").text("¿Qué te gusta hacer en vacaciones?");
                    $("#siete").slideUp('1000');
                    $("#ocho").slideDown('1000');                    
                break;
                case 9:
                    $("#talking").slideUp('1000');
                    $("#ocho").slideUp('1000');
                    $("#finalizar").slideDown('1000');
                    $("#btn-finalizar").slideDown('1000');                    
                break;
            }//fin del switch
        }//fin de la función pregunta        
    });
}());