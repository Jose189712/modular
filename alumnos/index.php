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
<body>
    <img src="../imagenes/comienzo.png" alt="fondo-matematicas" class="fondo">
    <div class="row">               
        <div id="dialogo" class="col s12">
            <p>¡Hola! Vamos elige una opción para que puedas continuar</p>
        </div>         
    </div>
    <div class="row" style="margin-left:14vw;margin-top:5vh">
        <div class="section"></div>        
        <div class="section"></div>
        <div class="section"></div>
        <div class="section"></div>
        <div class="section"></div>
        
        <div class="col s4 offset-s1">
            <div id="registro">  
                <p>Haz Click
                <br>y Registrate</p>
            </div>
            <div id="ocultarRegistro">
                <p>Cerrar</p>
            </div>
        </div>
        <div id="contenedorInicio" class="col s4 offset-s3">
            <div id="inicio"> 
                <p>Haz Click</p>
                <p>para Iniciar</p>
            </div>
            <div id="ocultarInicio">
                <p>Cerrar</p>
            </div>
        </div>
    </div>


    <div class="row formularios" id="formularioR-alumnos">
        <form class="col s12" method="post">
            <div class="row">
                <div class="col s12">
                    <h5 id="form-titulo" style="text-align:center"></h5>
                </div>
                <div id="" class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_nombre" type="text" class="validate" name="nombreA">
                    <label for="icon_nombre">Escribe tu nombre</label>
                </div>   
                <div class="input-field col s12" >
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_p" type="text" class="validate" name="apellidoP">
                    <label for="icon_p">Escribe tu primer apellido</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_m" type="text" class="validate" name="apellidoM">
                    <label for="icon_m">Escribe tu segundo apellido</label>
                </div>             
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" name="name_user">
                    <label for="icon_prefix">Escribe tu nombre de usuario</label>
                </div>
                <div class="input-field col s12">
                    <p>
                        <label>
                            <input class="with-gap" name="group3" type="radio" value="nino" checked />
                            <span>Niño</span>
                        </label>
                        <label>
                            <input class="with-gap" name="group3" type="radio" value="nina" checked />
                            <span>Niña</span>
                        </label>
                    </p>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_lock" type="password" class="validate" name="password">
                    <label for="icon_lock">Escribe tu palabra secreta</label>
                </div>                                          
                <div class="input-field col s12">
                    <div id="click" class="boton-submit"><p>Registrar</p></div>
                </div>                           
            </div>
        </form>    
    </div>
    <div class="row formularios" id="formularioL-alumnos">
        <form class="col s12" method="post">
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
                <div class="col s12 subregistro">
                    <p>Si no te has registrado da click aqui</p>
                </div>
                <div class="input-field col s12">
                    <div id="clickL" class="boton-submit"><p>Iniciar</p></div>
                </div>                           
            </div>
        </form>    
    </div>
    <script src="../materialize/js/jquery-3.3.1.min.js"></script>
    <script src="../materialize/js/materialize.min.js"></script>  
    <script src="../animacion/anime-master/lib/anime.min.js"></script>
    <script src="js/alumnos.js"></script>  
</body>
</html>