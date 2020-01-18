<?php
    session_start();

    if(empty($_SESSION['nickName'])){
        header('Location: index.php');
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../materialize/css/materialize.min.css">
    <title>Tablero Alumnos</title>
</head>

<body style="background-color:aqua;">
    <nav style="background-color:white">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center black-text"><?php echo $_SESSION['nombreAlumno']." ".$_SESSION['apellidoPA']." ".$_SESSION['apellidoMA'] ?></a>
        </div>
    </nav>
      <div style="position:fixed;top:12vh;left:2vh;background-color:yellow;border-radius:20px;padding:2vh">
        <a href="close_sesion.php"><h5>SALIR</h5></a>
      </div>
    <div class="container" style="margin-top: 5vh;box-shadow: 2px 2px 2px black;border-radius: 5px;">
        <div class="card-panel" style="background-color: green;">
            <div class="row">
                <div class="col s4">
                    <div class="card" style="border: 5px solid black;border-radius: 7px;">
                        <div class="card-image">
                            <span class="card-title"></span>
                        </div>
                        <div class="card-content center-align">
                            <p>Diviertete aprendiendo esas dificiles sumas y restas decimales con esta actividad</p>
                        </div>
                        <div class="card-action blue-text center-align">
                            <a class="blue-text" href="./ejercicios/suma_y_resta_decimal.html">DA CLICK PARA IR A LA ACTIVIDAD</a>
                        </div>
                    </div>
                </div>
                <div class="col s4">
                    <div class="card" style="border: 5px solid black;border-radius: 7px;">
                        <div class="card-image">
                            <span class="card-title"></span>
                        </div>
                        <div class="card-content center-align">
                            <p>Descubre en donde puedes encontrar las fracciones, que tanto nos cuesta aprender y resolver. SUERTE</p>
                        </div>
                        <div class="card-action center-align">
                            <a class="blue-text" href="./ejercicios/circuito.html">DA CLICK PARA IR A LA ACTIVIDAD</a>
                        </div>
                    </div>
                </div>
                <div class="col s4">
                    <div class="card" style="border: 5px solid black;border-radius: 7px;">
                        <div class="card-image">
                            <span class="card-title"></span>
                        </div>
                        <div class="card-content center-align">
                            <p>¿Sabes el nombre de las figuras tridimensionales? Pues haz esta actividad y veras cuanto es lo que sabes de figuras</p>
                        </div>
                        <div class="card-action center-align">
                            <a class="blue-text" href="./ejercicios/prismas_y_piramides.html">DA CLICK PARA IR A LA ACTIVIDAD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../materialize/js/jquery-3.3.1.min.js"></script>
    <script src="../materialize/js/materialize.min.js"></script>
</body>

</html>