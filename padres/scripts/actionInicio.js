(function (){
    var form = document.querySelector("#initPadre");

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        var initPadre = new FormData(form);

        fetch('./login.php',{
            method: 'POST',
            body: initPadre
        })
        .then(response => {
            return response.text();
        })
        .then(respuesta => {
            console.log("Hola jose "+respuesta);
            if(respuesta == 'true'){
                alert("Si eres padre");
                location.href = './Main.php';
            }                
            else {
                alert("No eres Padre");
            }                
        })
    })

})()