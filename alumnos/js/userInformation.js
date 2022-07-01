window.onload = function () {
    closePartida = document.querySelector("#cerrarSession");
    closePartida.addEventListener("click", closeSession);

    fetch('./getLevel.php', {
        method: 'POST',
    })
        .then(response => {
            return response.json();
        })
        .then(level => {
            document.getElementById("progreso").setAttribute("style", "width: "+((parseInt(level)*100)/7)+"%");
        })

    document.querySelector("#formModify").addEventListener('click', function () {
        let form = new FormData(document.querySelector("#modifyData"));
        fetch('./modify.php', {
            method: 'POST',
            body: form
        })
            .then(response => {
                return response.text();
            })
            .then(respuesta => {
                if (respuesta.trim() == 'true') {
                    alert("Se han modificado los datos correctamente");
                    location.reload();
                } else {
                    alert("Ha ocurrido un error al modificar los datos.");
                } // Fin del fetch para modificar los datos
            })
    }); // Fin de la funcion para modificar los datos del usuario

}();

/** Funcion del para el archivo user_information.php para poder cerrar sesion*/
function closeSession() {
    location.href = './close_sesion.php';
}//Fin de la función closeSession