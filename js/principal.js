(function (){    
    $("#alumnos").css('background','#00CC3A');
    $("#alumnosA").click(asignar_redireccion("./alumnos/index.php","#alumnosA"));
    $("#alumnos").click(function(){
        actualizar_botones("#padres");
        actualizar_botones("#instituciones");
        $(this).css('background','#00CC3A');
        $("#descripcion").html("¡Alumnos! Vamos comencemos la aventura con las Matemáticas");
        $(".borrado").remove();
        $(".contenedor").append("<div id=\"alumnosA\" class=\"borrado\"><p>Vamos</p></div>");
        asignar_redireccion("./alumnos/index.php","#alumnosA");
    });     
    $("#padres").click(function(){
        actualizar_botones("#alumnos");
        actualizar_botones("#instituciones");
        $(this).css('background','#00CC3A');
        $("#descripcion").text("Tiene un hijo y quiere que mejore sus habilidades en Matemáticas y aparte darle seguimiento");
        $(".borrado").remove();
        $(".contenedor").append("<div id=\"padresA\" class=\"borrado\"><p>De click y registrelo</p></div>");
        asignar_redireccion("./padres/index.html","#padresA");
    }); 
    $("#instituciones").click(function(){
        actualizar_botones("#padres");
        actualizar_botones("#alumnos");
        $(this).css('background','#00CC3A');
        $("#descripcion").text("Es profesor y quiere registrar a sus alumnos para que mejoren en matemáticas");
        $(".borrado").remove();
        $(".contenedor").append("<div id=\"profesoresA\" class=\"borrado\"><p>De click y registrelos</p></div>");
    }); 
    
    

//FUNCIONES
function actualizar_botones(boton){
    $(boton).css('background','#3BFF38');
}
function asignar_redireccion(direccion,quien){
    $(quien).click(function(){
        location.href=direccion;
    });
}
})();