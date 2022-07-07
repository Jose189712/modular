<?php
session_start();

if (empty($_SESSION['nickName'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body style="background-image: url(../imagenes/mapa.jpeg);background-color: teal;background-repeat: no-repeat;background-size: auto;background-attachment: fixed; background-position: center;">
    <?php require "user_information.php"; ?>
    <div class="container" style="height: 650px;">
        <div class="row" style="height: 20%;">
            <div class="col">
            </div>
        </div>        
        <div class="row" style="height: 33%;">
            <div id="level1" class="col-5 bg-light shadow-lg rounded">
            </div>
            <div id="level2" class="col-3 bg-success shadow-lg rounded">
            </div>
            <div id="level3" class="col-4 bg-danger shadow-lg rounded">
            </div>
        </div>
        <div class="row " style="height: 25%;">
            <div id="level4" class="col bg-info shadow-lg rounded">
            </div>
            <div id="level5" class="col bg-primary shadow-lg rounded">
            </div>
        </div>
        <div class="row shadow-lg" style="height: 20%;">
            <div id="level6" class="col bg-secondary shadow-lg rounded">
            </div>
        </div>
    </div>


    <div id="informationUser" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 30px" id="exampleModalLabel">¿Cuál es la meta?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" style="font-size: 25px">
                    <p id="textFinal">Muy bien tu objetivo es descubrir todos los continentes del mapa</p>
                    <p id="aquiLevel">Te encuentras en el nivel</p>
                </div>
                <div class="modal-footer">
                    <button id="buttonComencemos" type="button" class="btn btn-success" data-bs-dismiss="modal">Comencemos</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/userInformation.js"></script>
    <script src="js/mapa.js"></script>
</body>

</html>