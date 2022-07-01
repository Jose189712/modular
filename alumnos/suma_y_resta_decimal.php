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
    <title>Suma y Resta con Decimales</title>
</head>

<body style="background-color:teal">
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
                                <strong>Arrastra los números segun corresponda</strong> </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted" style="font-size: 30px">
                                Hola! Aqui como puedes ver hay que arrastrar las tarjetas que contienen los números para poder completar la suma. Debes ser cuidadoso en que los números que coloques deben sumar el resultado de la izquierda
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
            <div class="col-10">
                <div class="row">
                    <div class="col-2 border-bottom border-danger border-5">
                        <h3 class="text-center text-white p-1">RESULTADOS</h3>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-6 border-bottom border-danger border-5">
                        <h3 class="text-center text-white m-2">Suelta los números en los recuadros</h3>
                    </div>
                </div>
                <div class="row earn">
                    <div class="col-2 border p-4 rounded-3" style="background-color: #ffda6a">
                        <h3 class="text-center text-muted result"></h3>
                    </div>
                    <div class="col-2">
                        <h3 class="text-center p-4 fs-2">=</h3>
                    </div>
                    <div class="col-2 border p-4 rounded-3 bg-light drop" ondrop="drop(event)" ondragover="allowDrop(event)" ondragenter="enter(event)" ondragleave="leave(event)">
                    </div>
                    <div class="col-2">
                        <h3 class="text-center p-4 fs-2">+</h3>
                    </div>
                    <div class="col-2 border p-4 rounded-3 bg-light drop" ondrop="drop(event)" ondragover="allowDrop(event)" ondragenter="enter(event)" ondragleave="leave(event)">
                    </div>
                </div>
                <div class="row earn">
                    <div class="col-2 border p-4 rounded-3" style="background-color: #ffda6a">
                        <h3 class="text-center text-muted result"></h3>
                    </div>
                    <div class="col-2">
                        <h3 class="text-center p-4 fs-2">=</h3>
                    </div>
                    <div class="col-2 border p-4 rounded-3 bg-light drop" ondrop="drop(event)" ondragover="allowDrop(event)" ondragenter="enter(event)" ondragleave="leave(event)">
                    </div>
                    <div class="col-2">
                        <h3 class="text-center p-4 fs-2">+</h3>
                    </div>
                    <div class="col-2 border p-4 rounded-3 bg-light drop" ondrop="drop(event)" ondragover="allowDrop(event)" ondragenter="enter(event)" ondragleave="leave(event)">
                    </div>
                </div>
                <div class="row earn">
                    <div class="col-2 border p-4 rounded-3" style="background-color: #ffda6a">
                        <h3 class="text-center text-muted result"></h3>
                    </div>
                    <div class="col-2">
                        <h3 class="text-center p-4 fs-2">=</h3>
                    </div>
                    <div class="col-2 border p-4 rounded-3 bg-light drop" ondrop="drop(event)" ondragover="allowDrop(event)" ondragenter="enter(event)" ondragleave="leave(event)">
                    </div>
                    <div class="col-2">
                        <h3 class="text-center p-4 fs-2">+</h3>
                    </div>
                    <div class="col-2 border p-4 rounded-3 bg-light drop" ondrop="drop(event)" ondragover="allowDrop(event)" ondragenter="enter(event)" ondragleave="leave(event)">
                    </div>
                </div>
                <div class="row earn">
                    <div class="col-2 border p-4 rounded-3" style="background-color: #ffda6a">
                        <h3 class="text-center text-muted result"></h3>
                    </div>
                    <div class="col-2">
                        <h3 class="text-center p-4 fs-2">=</h3>
                    </div>
                    <div class="col-2 border p-4 rounded-3 bg-light drop" ondrop="drop(event)" ondragover="allowDrop(event)" ondragenter="enter(event)" ondragleave="leave(event)">
                    </div>
                    <div class="col-2">
                        <h3 class="text-center p-4 fs-2">+</h3>
                    </div>
                    <div class="col-2 border p-4 rounded-3 bg-light drop" ondrop="drop(event)" ondragover="allowDrop(event)" ondragenter="enter(event)" ondragleave="leave(event)">
                    </div>
                </div>
            </div>
            <div id="numbers" class="col-2">
                <div class="row">
                    <div class="col-12 border-bottom border-primary border-5">
                        <h3 class="text-center text-white m-2">Arrastra los números</h3>
                    </div>
                </div>
                <div style="height: 200px; overflow-y:scroll">
                    <div class="row">
                        <div id="1" class="col-12 border p-4 rounded-3" style="background-color: #0d6efd" draggable="true" ondragstart="drag(event)">
                            <h3 class="text-center text-white option"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div id="2" class="col-12 border p-4 rounded-3" style="background-color: #8540f5" draggable="true" ondragstart="drag(event)">
                            <h3 class="text-center text-white option"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div id="3" class="col-12 border p-4 rounded-3" style="background-color: #6f42c1" draggable="true" ondragstart="drag(event)">
                            <h3 class="text-center text-white option"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div id="4" class="col-12 border p-4 rounded-3" style="background-color: #d63384" draggable="true" ondragstart="drag(event)">
                            <h3 class="text-center text-white option"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div id="5" class="col-12 border p-4 rounded-3" style="background-color: #dc3545" draggable="true" ondragstart="drag(event)">
                            <h3 class="text-center text-white option"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div id="6" class="col-12 border p-4 rounded-3" style="background-color: #984c0c" draggable="true" ondragstart="drag(event)">
                            <h3 class="text-center text-white option"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div id="7" class="col-12 border p-4 rounded-3" style="background-color: #664d03" draggable="true" ondragstart="drag(event)">
                            <h3 class="text-center text-white option"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div id="8" class="col-12 border p-4 rounded-3" style="background-color: #198754" draggable="true" ondragstart="drag(event)">
                            <h3 class="text-center text-white option"></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10"></div>
                <div class="col-2">
                    <button id="finish" type="button" class="btn btn-danger text-center" data-bs-toggle="modal" data-bs-target="#modalPuntaje" disabled>
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
        <script src="js/suma_y_resta_decimal.js"></script>
</body>

</html>