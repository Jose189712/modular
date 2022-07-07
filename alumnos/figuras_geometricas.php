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

<body style="background-image: url(../imagenes/fondo3.jpg);background-color: teal;background-repeat: no-repeat;background-size: cover;background-attachment: fixed; background-position: center;">
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
                <div class="col-4 border border-5 border-dark text-center fieldF" style="height: 300px">

                </div>
                <div class="col-4 border border-5 border-dark text-center fieldF" style="height: 300px">

                </div>
                <div class="col-4 border border-5 border-dark text-center fieldF" style="height: 300px">

                </div>
            </div>
            <div class="row">
                <div id="figure1" class="col-4">
                    <br>
                    <label for="inputF1" class="form-label text-white bg-success rounded-3 p-1"><strong>Seleccione la opcion correcta</strong></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="primerFigura" id="flexRadioDefault1">
                        <label class="form-check-label opciones text-dark bg-info p-1 rounded-3" for="flexRadioDefault1">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="primerFigura" id="flexRadioDefault2">
                        <label class="form-check-label opciones text-dark bg-info p-1 rounded-3" for="flexRadioDefault2">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="primerFigura" id="flexRadioDefault3">
                        <label class="form-check-label opciones text-dark bg-info p-1 rounded-3" for="flexRadioDefault3">
                        </label>
                    </div>
                </div>
                <div id="figure2" class="col-4">
                    <br>
                    <label for="inputF2" class="form-label text-white bg-success rounded-3 p-1"><strong>Seleccione la opcion correcta</strong></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="segundaFigura" id="mitadFigura1">
                        <label class="form-check-label opciones text-dark bg-info p-1 rounded-3" for="mitadFigura1">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="segundaFigura" id="mitadFigura2">
                        <label class="form-check-label opciones text-dark bg-info p-1 rounded-3" for="mitadFigura2">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="segundaFigura" id="mitadFigura3">
                        <label class="form-check-label opciones text-dark bg-info p-1 rounded-3" for="mitadFigura3">
                        </label>
                    </div>
                </div>
                <div id="figure3" class="col-4">
                    <br>
                    <label for="inputF3" class="form-label text-white bg-success rounded-3 p-1"><strong>Seleccione la opcion correcta</strong></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tercerFigura" id="ultimaFigura1">
                        <label class="form-check-label opciones text-dark bg-info p-1 rounded-3" for="ultimaFigura1">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tercerFigura" id="ultimaFigura2">
                        <label class="form-check-label opciones text-dark bg-info p-1 rounded-3" for="ultimaFigura2">
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tercerFigura" id="ultimaFigura3">
                        <label class="form-check-label opciones text-dark bg-info p-1 rounded-3" for="ultimaFigura3">
                        </label>
                    </div>
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
                    <button id="finish" type="button" class="btn btn-danger text-center" data-bs-toggle="modal" data-bs-target="#modalPuntaje">
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