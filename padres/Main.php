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
  <title>Padres</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style="margin: 0; margin-bottom: 40px;">
  <header>

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!">Editar Perfil</a></li>      
      <li class="divider"></li>
      <li><a href="close_sesion.php">Cerrar Sesion</a></li>
    </ul>

    <ul id="dropdown2" class="dropdown-content">
      <li><a href="#!">Editar Perfil</a></li>      
      <li class="divider"></li>
      <li><a href="close_sesion.php">Cerrar Sesion</a></li>
    </ul>

    <nav class="sidenav-trigger cyan">
      <div class="nav-wrapper" style="padding-left: 20px;">
        <a href="http://localhost:8080/Proyecto" class="brand-logo">SEA</a>
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

    <ul class="sidenav cyan lighten-3 " id="mobile-demo">
      <!-- Dropdown Trigger -->
      <li><a style="height:auto; font-weight: bold; font-size:5vh;"
          class="dropdown-trigger center cyan  waves-effect waves-light" href="#!" data-target="dropdown2"> <img
            src="img/papa.jpg" alt="" class="circle responsive-img" style="width:250px; height:250px; margin-top:5px;">
            <?php echo $_SESSION['nombre']." ".$_SESSION['apellidoP']." ".$_SESSION['apellidoM']?> </a></li>
      <li><a href="sass.html">Inicio</a></li>
      <li><a href="badges.html">Informacion</a></li>
      <li><a href="collapsible.html">Sesiones</a></li>
    </ul>

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
      <div class="container cyan accent-2">
        <div class="center white" style="height:auto;">
          <a style="margin: 2vh; font-weight: bold;" class="waves-effect waves-light btn-large cyan lighten-3"><i
              class="material-icons right">arrow_drop_down</i><?php echo $respuesta1['nombreAlumno']." ".$respuesta1['apellido_p_Alumno']." ".$respuesta1['apellido_m_Alumno'] ?></a>
        </div>
        <div class="col l4 m6 s12  center" style="margin-top: 5vh;">
          <span id="counter" style="font-size: 150px;" ;>0</span>
          <h5>Ejercicios Resueltos</h5>
        </div>
        <div class="col l4 m6 s12  center" style="margin-top: 5vh;">
          <span id="counter2" style="font-size: 150px;" ;>0</span>
          <h5>Sesiones Completadas</h5>
        </div>
        <div class="col l4 m6 s12  center" style="margin-top: 5vh;">
          <span id="counter3" style="font-size: 150px;" ;>0</span>
          <h5>Puntaje</h5>
        </div>


      </div>

    </div>

  </main>


  <script src="../materialize/js/jquery-3.3.1.min.js"></script>
  <script src="../materialize/js/materialize.min.js"></script>
  <script src="scripts/padres.js"></script>

</body>

</html>