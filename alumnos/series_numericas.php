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
    <title>Series Númericas</title>
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
                                <strong>Completa la serie con los números que faltan</strong> </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted" style="font-size: 30px">
                                Hola! Para la siguiente actividad lo que debes hacer es rellenar los recuadros en blanco con los números que crees que completan la serie númerica
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-2 text-center" style="height: 150px">
                    <img src="../imagenes/inicio.jpg" alt="" style="height:150px; width: 150px">
                </div>
                <div class="col-1 border bg-info text-center" style="height: 150px">
                    <br><br>
                    <h1 class="serie"></h1>
                </div>
                <div class="col-1 border bg-info colorBox" style="height: 150px">
                    <br>
                    <input id="inputF1" type="email" class="form-control response" style="font-size:40px">
                </div>
                <div class="col-1 border bg-info text-center" style="height: 150px">
                    <br><br>
                    <h1 class="serie"></h1>
                </div>
                <div class="col-1 border bg-info colorBox" style="height: 150px">
                    <br>
                    <input id="inputF2" type="email" class="form-control response" style="font-size:40px">
                </div>
                <div class="col-1 border bg-info text-center" style="height: 150px">
                    <br><br>
                    <h1 class="serie"></h1>
                </div>
                <div class="col-1 border bg-info text-center" style="height: 150px">
                    <br><br>
                    <h1 class="serie"></h1>
                </div>
                <div class="col-1 border bg-info colorBox" style="height: 150px">
                    <br>
                    <input id="inputF3" type="email" class="form-control response" style="font-size:40px">
                </div>
                <div class="col-1 border bg-info text-center" style="height: 150px">
                    <br><br>
                    <h1 class="serie"></h1>
                </div>
                <div class="col-2  text-center" style="height: 150px">
                    <img src="../imagenes/finish.webp" alt="" style="height:180px; width: 180px">
                </div>
            </div>
            <div style="height:100px"></div>
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
                        <a id="finishLevel" type="button" class="btn btn-success" role="button">Terminar nivel</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="js/userInformation.js"></script>
        <script src="js/series_numericas.js"></script>
</body>

</html>