<?php
session_start();

if (empty($_SESSION['nickName'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Figuras Geométricas</title>
</head>

<body class="bg-light bg-gradient">
    <!-- Instrucciones -->
    <?php require "user_information.php" ?>
    <div class="container mb-4">
        <div class="row" style="height:auto;">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="accordion m-2" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button text-muted fs-4 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <strong>Escriba el nombre de las figuras que se presentan a continuación</strong> </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted" style="font-size: 30px">
                                Hola! En esta parte deberás color el nombre de las figuras que se te presentan en los siguientes 3 recuadros
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-4 border text-center fieldF" style="height: 300px">

                </div>
                <div class="col-4 border text-center fieldF" style="height: 300px">

                </div>
                <div class="col-4 border text-center fieldF" style="height: 300px">

                </div>
            </div>
            <div class="row">
                <div id="figure1" class="col-4">
                    <br>
                    <label for="inputF1" class="form-label text-muted"><strong>Escribe el nombre aquí</strong></label>
                    <input id="inputF1" type="email" class="form-control response">
                </div>
                <div id="figure2" class="col-4">
                    <br>
                    <label for="inputF2" class="form-label text-muted"><strong>Escribe el nombre aquí</strong></label>
                    <input id="inputF2" type="email" class="form-control response">
                </div>
                <div id="figure3" class="col-4">
                    <br>
                    <label for="inputF3" class="form-label text-muted"><strong>Escribe el nombre aquí</strong></label>
                    <input id="inputF3" type="email" class="form-control response">
                </div>
            </div>
            <div class="row">
                <div class="col-4 text-center chk"><br></div>
                <div class="col-4 text-center chk"><br></div>
                <div class="col-4 text-center chk"><br></div>
            </div>
            <div class="row">
                <div class="col-10"></div>
                <div class="col-2">
                    <button id="finish" type="button" class="btn btn-success text-center" data-bs-toggle="modal" data-bs-target="#modalPuntaje" disabled>
                        <spam>Checar ejercicios</spam>
                    </button>
                </div>
            </div>

        </div>

        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalPuntaje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title m-3">PUNTUACIÓN</h5>
                    </div>
                    <div class="modal-body text-center te">
                        <h1 id="puntuacion" class="text-muted" style="font-size:3.0rem"></h1>
                    </div>
                    <div class="modal-footer">
                        <a id="nextExercise" type="button" class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-dismiss="modal">Siguiente ejercicio</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="js/userInformation.js"></script>
        <script src="js/figuras_geometricas.js"></script>
</body>

</html>