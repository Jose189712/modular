<?php
require '../config/clasesR.php';
session_start();

if (empty($_SESSION['idusuario'])) {
  header('Location: index.html');
} else {
  $padre = new PadreR();
  $resultado = $padre->getInfoSelf($_SESSION['idusuario']);
  $_SESSION['nombre'] = $resultado['nombre'];
  $_SESSION['apellidoP'] = $resultado['apellidoP'];
  $_SESSION['apellidoM'] = $resultado['apellidoM'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../materialize/css/materialize.min.css">
  <link rel="stylesheet" href="../css/padres.css">
  <title>Padres</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style="margin: 0; margin-bottom: 40px;background-color:#EEEFF0">
  <header>

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
      <li><a id="editPerfil">Editar Perfil</a></li>
      <li class="divider"></li>
      <li><a id="registrarAlumnoInterno">Registrar alumno</a></li>
      <li class="divider"></li>
      <li><a href="close_sesion.php">Cerrar Sesion</a></li>
    </ul>

    <nav class="sidenav-trigger cyan">
      <div class="nav-wrapper" style="padding-left: 20px;">
        <a href="../../modular" class="brand-logo">SEA</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Inicio</a></li>
          <!-- Dropdown Trigger -->
          <li id="perfil" style="font-weight: bold;"><a class="dropdown-trigger valign-wrapper" href="#!" data-target="dropdown1">
              <img src="img/usuarioAlumno.jpg" alt="" class="circle responsive-img" style="width:50px; height:50px; margin-top:5px; margin-right:10px;">
              <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellidoP'] . " " . $_SESSION['apellidoM'] ?><i class="material-icons right">arrow_drop_down</i> </a></li>
        </ul>
      </div>
    </nav>

  </header>

  <main>
    <div class="row" style="margin-top: 5vh;">
      <div class="row" style="height:auto;background-color:#EEEFF0">
        <div class="col s4">
          <div id="alumnoPrincipal" class="chip z-depth-5">
            <img src="img/usuarioAlumno.jpg" alt="alumno-default">
          </div>
        </div>
        <div class="col s8">
          <a id="usersModal" class="waves-effect waves-light btn modal-trigger" href="#usuarios">Alumnos registrados</a>
          <a class="waves-effect waves-light btn modal-trigger infoA" style="display:none" href="#infoClassmate">Información del Alumno</a>
        </div>        
      </div> <!-- Contenedor donde se presenta la informacion del alumno actual-->

      <div class="container cyan accent-2">
        <div class="col l4 m6 s12  center brown lighten-4 z-depth-2" style="margin-top: 5vh; color:#343537">
          <span id="counter" style="font-size: 150px;" class="orange-text text-lighten-2">0</span>
          <h5><strong>Ejercicios Resueltos</strong></h5>
          <br>
          <div class="progress blue lighten-4 tooltipped" data-position="top">
            <div id="preloadEjercicios" class="determinate green"></div>
          </div>
        </div>
        <div class="col l4 m6 s12  center brown lighten-4 z-depth-2" style="margin-top: 5vh;color:#343537">
          <span id="counter2" style="font-size: 150px;" class="orange-text text-lighten-2">0</span>
          <h5><strong>Sesiones Completadas</strong></h5>
          <br>
          <div class="progress blue lighten-4 tooltipped" data-position="top">
            <div id="preloadSesiones" class="determinate green"></div>
          </div>
        </div>
        <div class="col l4 m6 s12  center brown lighten-4 z-depth-2" style="margin-top: 5vh;color:#343537">
          <span id="counter3" style="font-size: 150px;" class="orange-text text-lighten-2">0</span>
          <h5><strong>Puntaje</strong></h5>
          <br>
          <div class="progress blue lighten-4 tooltipped" data-position="top">
            <div id="preloadPuntaje" class="determinate green"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- El siguiente contenedor es un formulario en donde el padre podra registrar a los alumnos que quiera cuando tenga 
    ya una cuenta creada-->
    <div id="containerAlumnosP" class="formAlumnos">
      <div style="margin: 0 auto;width: 50%;margin-top: 10vh;" class="row card-panel formInside">
        <form id="formAP" method="post" class="col s12">
          <div id="cerrarRegistroAlumnos" class="row custom-close"> <i class="material-icons right">close</i></div>
          <h4 class="center">Registra al Alumno</h4>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" name="nombreAp" class="validate" required>
              <label for="icon_prefix">Nombre</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_apellidoP" type="text" name="apellidoPAp" class="validate" required>
              <label for="icon_apellidoP">Apellido Paterno</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_apellidoM" type="text" name="apellidoMAp" class="validate" required>
              <label for="icon_apellidoM">Apellido Materno</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_username" type="text" class="validate" name="nombreUAp" required>
              <label for="icon_username">Nombre de Usuario</label>
            </div>
          </div>
          <div class="row">
            <div class="row input-field col s6">
              <p class="col s3">
                <label>
                  <input name="sexo" type="radio" value="nino" checked />
                  <span>Niño</span>
                </label>
              </p>
              <p class="col s3">
                <label>
                  <input name="sexo" type="radio" value="nina" />
                  <span>Niña</span>
                </label>
              </p>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">lock_outline</i>
              <input id="icon_pass" type="password" name="passAp" class="validate" required>
              <label for="icon_pass">Contraseña</label>
            </div>
          </div>
          <div class="row">
            <div class="col s6 offset-s4">
              <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal para mostra mensajes-->
    <div id="modalMessages" class="modal">
      <div class="modal-content">
        <h4><strong>Mensaje</strong></h4>
        <p id="textoModal" class="center" style="font-size:20px"></p>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
      </div>
    </div>

    <div id="usuarios" class="modal bottom-sheet">
      <div class="modal-content">
        <h4><strong>Alumnos Registrados</strong></h4>
        <div id="containerUsuarios" class="collection">
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

    <div id="containerInfoP" class="formAlumnos">
      <div style="margin: 0 auto;width: 50%;margin-top: 10vh;" class="row card-panel formInside">
        <form id="formInfoP" method="post" class="col s12">
          <div id="cerrarContainerInfoP" class="row custom-close"> <i class="material-icons right">close</i></div>
          <h4 class="center">Actualiza tu Información</h4>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix1" type="text" name="nombreP" value="<?php echo $_SESSION['nombre'] ?>" class="validate" required>
              <label for="icon_prefix1">Nombre</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_apellidop" type="text" name="apellidoP" value="<?php echo $_SESSION['apellidoP'] ?>" class="validate" required>
              <label for="icon_apellidop">Apellido Paterno</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_apellidom" type="text" name="apellidoMP" value="<?php echo $_SESSION['apellidoM'] ?>" class="validate" required>
              <label for="icon_apellidom">Apellido Materno</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_username1" type="email" class="validate" name="emailP" value="<?php echo $_SESSION['correo'] ?>" required disabled>
              <label for="icon_username1">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="col s6 offset-s4">
              <button class="btn waves-effect waves-light" type="submit" name="action">Modificar
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div id="infoClassmate" class="formAlumnos">
      <div style="margin: 0 auto;width: 50%;margin-top: 10vh;" class="row card-panel formInside">
        <form id="formInfoA" method="post" class="col s12">
          <div id="cerrarContainerInfoA" class="row custom-close"> <i class="material-icons right">close</i></div>
          <h4 class="center">Informacion del Alumno</h4>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix2" type="text" name="nombreP"  class="validate" required disabled>              
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_apellidopA" type="text" name="apellidoP" value="" class="validate" required disabled>              
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_apellidomA" type="text" name="apellidoMP" value="" class="validate" required disabled>              
            </div>          
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_p1" type="text" name="nombreP" value="" class="validate" required disabled>            
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_p2" type="text" name="nombreP" value="" class="validate" required disabled>              
            </div>
          </div>          
        </form>
      </div>
    </div>


  </main>


  <script src="../materialize/js/jquery-3.3.1.min.js"></script>
  <script src="../materialize/js/materialize.min.js"></script>
  <script src="scripts/padres.js"></script>

</body>

</html>