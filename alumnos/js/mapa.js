window.onload = function () {
    fetch('./getLevel.php', {
        method: 'POST',
    })
        .then(response => {
            return response.json();
        })
        .then(level => {
            var myModal = new bootstrap.Modal(document.getElementById("informationUser"), {});            
            if (level == 7) {
                document.getElementById("textFinal").innerHTML = "";
                document.getElementById("buttonComencemos").innerHTML = "TERMINASTE";
                document.getElementById("aquiLevel").innerHTML = "<strong>¡FELICIDADES HAS COMPLETADO LOS NIVELES!</strong>";
            } else {
                document.getElementById("aquiLevel").innerHTML += " <strong>"+level+"</strong>. Realiza las actividades dando click en <strong>Comenzar</strong> para pasar a los siguientes niveles";
            }            
            myModal.show();            
            levelsComplete(level);
        })

    // DATOS SOBRE LOS COLORES DE LOS NIVELES

    colores = { 1: "bg-light", 2: "bg-success", 3: "bg-danger", 4: "bg-info", 5: "bg-primary", 6: "bg-secondary" }

    // FUNCIONES 

    function levelsComplete(level) {
        // alert(level);
        for (i = 1; i < level; i++) {
            document.getElementById("level" + i).classList.remove(colores[i]);
            document.getElementById("level" + i).innerHTML = "<div class=\"row\" style=\"height: 33%;\"></div><div class=\"row\"><div class=\"col-4\"></div><div class=\"col-4\"><button type=\"button\" class=\"btn btn-success btn-lg\" style=\"color: rgb(54, 53, 53); font-weight: bold;\">¡COMPLETADO!</button></div><div class=\"col-4\"></div></div><div class=\"row\" style=\"height: 33%;\"></div>"
        }//Fin del for 
        if (level < 7) {
            document.getElementById("level" + level).classList.remove(colores[level]);
            document.getElementById("level" + level).innerHTML = "<div class=\"row\" style=\"height: 33%;\"></div><div class=\"row\"><div class=\"col-4\"></div><div class=\"col-4\"><button id=\"now\" type=\"button\" class=\"btn btn-warning btn-lg\" style=\"color: rgb(54, 53, 53); font-weight: bold;\">Comenzar</button></div><div class=\"col-4\"></div></div><div class=\"row\" style=\"height: 33%;\"></div>"
            document.getElementById("now").addEventListener('click', () => {
                fetch('checkSesion.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    return response.json();
                })
                .then(respuesta => {
                    console.log(respuesta['ejercicios']);
                    if(parseInt(respuesta['ejercicios']) == 1) {                        
                        location.href = 'figuras_geometricas.php?id='+respuesta['sesion'];
                    } else if(parseInt(respuesta['ejercicios']) == 2) {                        
                        location.href = 'series_numericas.php?id='+respuesta['sesion'];                       
                    } else {                        
                        location.href = 'suma_y_resta_decimal.php';
                    }
                })
                //location.href = "./suma_y_resta_decimal.php"
            });
        }
    }// Fin de función levelsComplete
}();//Función autoinvocado para esperar que se cargue la página
