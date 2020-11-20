<?php
  require '../config/functions.php';
  session_start();
  
  if(empty($_SESSION['idusuario'])){
    header('Location: index.html');
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
      <li><a href="#!">Editar Perfil</a></li>      
      <li class="divider"></li>
      <li><a id="registrarAlumnoInterno">Registrar alumno</a></li>
      <li class="divider"></li>
      <li><a href="close_sesion.php">Cerrar Sesion</a></li>
    </ul>

    <nav class="sidenav-trigger cyan">
      <div class="nav-wrapper" style="padding-left: 20px;">
        <a href="../../Proyecto" class="brand-logo">SEA</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Inicio</a></li>
          <li><a href="badges.html">Informacion</a></li>
          <li><a href="collapsible.html">Sesiones</a></li>
          <!-- Dropdown Trigger -->
          <li style="font-weight: bold;"><a class="dropdown-trigger valign-wrapper" href="#!" data-target="dropdown1">
              <img src="img/papa.jpg" alt="" class="circle responsive-img"
                style="width:50px; height:50px; margin-top:5px; margin-right:10px;">
              <?php echo $_SESSION['nombre']." ".$_SESSION['apellidoP']." ".$_SESSION['apellidoM']?><i class="material-icons right">arrow_drop_down</i> </a></li>
        </ul>
      </div>
    </nav>    

  </header>

  <main>
  <?php  
    $base = new Conexion();

    $idPadre = $_SESSION['idusuario'];

    $statement = $base->$db->prepare("SELECT alumnos.nombreAlumno,alumnos.apellido_p_Alumno,alumnos.apellido_m_Alumno FROM alumnos, alumnos_has_padre,
    padre WHERE padre.USUARIOS_E_idUSUARIOS_E=$idPadre AND padre.idPADRE=alumnos_has_padre.PADRE_idPADRE AND alumnos_has_padre.ALUMNOS_idALUMNOS=alumnos.idALUMNOS");
    $statement->execute();    
    
    $respuesta1 = $statement->fetch();          
  ?>
    <div class="row" style="margin-top: 5vh;">
      <div class="row" style="height:auto;background-color:#EEEFF0">
        <div class="col s4">
          <div class="chip z-depth-5">
            <img src="img/usuarioAlumno.jpg" alt="alumno-default">
            <?php echo $respuesta1['nombreAlumno']." ".$respuesta1['apellido_p_Alumno']." ".$respuesta1['apellido_m_Alumno'] ?>
          </div>
        </div>
        <div class="col s8">
          <a class='dropdown-trigger btn' href='#' data-target='listaAlumnos'>Ver alumnos</a>
          <ul id='listaAlumnos' class='dropdown-content'>
            <li><a href="" class="collection-item"></a></li>
            <li><a href="#!"></a></li>
            <li><a href="#!">two</a></li>
          </ul>
        </div>                          
      </div> <!-- Contenedor donde se presenta la informacion del alumno actual-->

      <div class="container cyan accent-2">
        <div class="col l4 m6 s12  center" style="margin-top: 5vh; color:#343537">
          <span id="counter" style="font-size: 150px;" ;>0</span>
          <h5>Ejercicios Resueltos</h5>
        </div>
        <div class="col l4 m6 s12  center" style="margin-top: 5vh;color:#343537">
          <span id="counter2" style="font-size: 150px;" ;>0</span>
          <h5>Sesiones Completadas</h5>
        </div>
        <div class="col l4 m6 s12  center" style="margin-top: 5vh;color:#343537">
          <span id="counter3" style="font-size: 150px;" ;>0</span>
          <h5>Puntaje</h5>
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
        <h4>Mensajes</h4>
        <p id="textoModal" class="center"></p>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
      </div>
    </div>
  </main>


  <script src="../materialize/js/jquery-3.3.1.min.js"></script>
  <script src="../materialize/js/materialize.min.js"></script>
  <script src="scripts/padres.js"></script>

</body>

</html>