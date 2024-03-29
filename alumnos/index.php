<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de Alumnos</title>
    <link rel="stylesheet" href="../css/alumnos.css">
    <link rel="stylesheet" href="../materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style="background-image: url(../imagenes/comienzo.png);background-repeat: no-repeat;background-size: cover;background-attachment: fixed; background-position: center;">
    <!-- <img src="../imagenes/comienzo.png" alt="fondo-matematicas" class="fondo"> -->
    <div class="row">
        <div class="container">
            <div id="dialogo" class="col s12">
                <p>¡Hola! Vamos elige una opción para que puedas continuar</p>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:5vh">
        <div class="section"></div>
        <div class="section"></div>
        <div class="section"></div>        

        <div class="container">
            <div id="contenedorRegistro" class="col s4">
                <div id="registro">
                    <p>Haz Click
                        <br>y Registrate
                    </p>
                </div>
                <div id="ocultarRegistro">
                    <p>Cerrar</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="contenedorInicio" class="col s3 offset-s5">
                <div id="inicio">
                    <p>Haz Click</p>
                    <p>para Iniciar</p>
                </div>
                <div id="ocultarInicio">
                    <p>Cerrar</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row formularios" id="formularioR-alumnos">
        <form class="col s12" method="post" id="registerForm">
            <div class="row">
                <div class="col s12">
                    <h5 id="form-titulo" style="text-align:center;margin-bottom:5vh"></h5>
                </div>
                <div class="input-field col s12 arreglo" style="display:block">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_nombre" type="text" class="validate" name="nombreA" required>
                    <label for="icon_nombre">Escribe tu nombre</label>
                </div>
                <div class="input-field col s12 arreglo">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_p" type="text" class="validate" name="apellidoP" required>
                    <label for="icon_p">Escribe tu primer apellido</label>
                </div>
                <div class="input-field col s12 arreglo">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_m" type="text" class="validate" name="apellidoM" required>
                    <label for="icon_m">Escribe tu segundo apellido</label>
                </div>
                <div class="input-field col s12 arreglo">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" name="name_user" required>
                    <label for="icon_prefix">Escribe tu nombre de usuario</label>
                </div>
                <div class="input-field col s12 arreglo">
                    <p>
                        <label style="color:black; font-size:1.2rem">Elige tu genero de los de abajo</label>
                        <br>
                        <label>
                            <input class="with-gap" name="sexo" type="radio" value="nino" checked required />
                            <span style="color:black; font-size:1.2rem">Niño</span>
                        </label>
                        <label>
                            <input class="with-gap" name="sexo" type="radio" value="nina" checked required />
                            <span style="color:black; font-size:1.2rem">Niña</span>
                        </label>
                    </p>
                </div>
                <div class="input-field col s12 arreglo">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_lock" type="password" class="validate" name="password" required>
                    <label for="icon_lock">Escribe tu palabra secreta</label>
                </div>
                <div class="input-field col s12 arreglo">
                    <div id="click" class="boton-submit">
                        <p>Registrar</p>
                    </div>
                </div>
            </div>
            <a id="siguiente" class="btn-floating right btn-large waves-effect waves-light yellow boton-submit"><i class="material-icons black-text">arrow_forward</i></a>
            <a id="anterior" class="btn-floating left btn-large waves-effect waves-light yellow boton-submit"><i class="material-icons black-text">arrow_back</i></a>
        </form>
    </div>
    <div class="row formularios" id="formularioL-alumnos">
        <form class="col s12" id="loginForm">
            <div class="row">
                <div class="col s12">
                    <h5 id="formL-titulo" style="text-align:center"></h5>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefixL" type="text" class="validate" name="name_userL" required>
                    <label for="icon_prefixL">Escribe tu nombre de usuario</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_lockL" type="password" class="validate" name="passwordL" required>
                    <label for="icon_lockL">Escribe tu palabra secreta</label>
                </div>
                <div class="input-field col s12">
                    <div id="clickL" class="boton-submit">
                        <p>Iniciar</p>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="mensajesAplication" class="modal">
        <div class="modal-content">
            <h4><strong id="tituloAlumno"></strong></h4>
            <p id="textoModal" class="center" style="font-size:20px"></p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
        </div>
    </div>
    <script src="../materialize/js/jquery-3.3.1.min.js"></script>
    <script src="../materialize/js/materialize.min.js"></script>
    <script src="../animacion/anime.min.js"></script>
    <script src="js/alumnos.js"></script>
</body>

</html>