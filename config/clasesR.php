<?php
require('functions.php');

class General extends Conexion
{
    public function __construct()
    {
        parent::__construct(); //Toma el constructor de la clase que hereda
    } //fin del constructor de la clase Conexion

    /**Metodo para obtener un campo especificado */
    public function getValue($table, $usuario, $field, $searchField)
    {        
        if ($this->db != NULL) {
            $statement = $this->db->prepare("SELECT $field FROM $table WHERE $searchField='$usuario'");            
            $statement->execute();
            $response = $statement->fetchAll();            
            if (empty($response)) {
                return 'NOTFOUND';
            } else {
                return $response;
            }
        } //Fin del if para saber que se tiene activa la conexion con la base de datos
    } // Fin del método getValue
} //Fin de la clase para tener metodos generales para cualquier tipo de ususario

class AlumnoR extends Conexion
{
    public function __construct()
    {
        parent::__construct(); //Toma el constructor de la clase que hereda
    } //fin del constructor de la clase Conexion
    //Método para conocer si ya existe el nomnbre de usuario ingresado
    public function empty_Alumno($name_user)
    {
        if ($this->db != NULL) {
            $statement = $this->db->prepare("SELECT name_user FROM alumnos WHERE name_user='$name_user'");
            $statement->execute();
            $respuesta = $statement->fetchAll();
            if (empty($respuesta)) {
                return 'true';
            } else {
                return 'false';
            }
        } else {
            return "Error en la conexion";
        }
    } //fin del método empty_Alumno
    //Método para registrar a un alumno por el mismo
    public function set_alumnos($name_user, $nombre, $apellidoP, $apellidoM, $password, $sexo, $nivel)
    {
        $auxiliar_db = $this->db->prepare("INSERT INTO alumnos(nombreAlumno,apellido_p_Alumno,apellido_m_Alumno,name_user,palabra_secreta,sexo,nivel)
            VALUES('$nombre','$apellidoP','$apellidoM','$name_user','$password','$sexo','$nivel')");
        $h = $auxiliar_db->execute();
        return $h;
    } //método para registrar a los alumnos 

    public function update_alumnos($nick_name, $user_name, $apellidoP, $apellidoM, $genero)
    {
        $updateDB = $this->db->prepare("UPDATE alumnos SET nombreAlumno='$user_name',apellido_p_Alumno='$apellidoP',apellido_m_Alumno='$apellidoM',sexo='$genero' WHERE name_user='$nick_name'");
        $response = $updateDB->execute();
        return $response;
    } // Fin del método para actualizar informacion

    public function startSesion($nombre, $apellidoP, $apellidoM, $sexo, $username, $id)
    {
        session_start();
        $_SESSION['idAlumnos'] = $id;
        $_SESSION['nombreAlumno'] = $nombre;
        $_SESSION['apellidoPA'] = $apellidoP;
        $_SESSION['apellidoMA'] = $apellidoM;
        $_SESSION['nickName'] = $username;
        $_SESSION['genero'] = $sexo;
    } //Fin del método para que el padre inicie sesion


    /** Método para registrar la sesion del alumno */
    public function goSession($id)
    {
        $statement = $this->db->prepare("INSERT INTO sesiones(fechaInicio,estatus,ALUMNOS_idALUMNOS) VALUES(NOW(),0,$id)");
        $h = $statement->execute();
        if ($h) {
            $statement = $this->db->prepare("SELECT @@identity AS id");
            $statement->execute();
            $response = $statement->fetchAll();
        }
        return $response;
    } //Fin del metodo para registrar las sesiones

    /**Método para guardar los ejercicios */
    public function saveExercise($respuesta, $respondido, $area, $puntaje, $nivel)
    {
        $statement = $this->db->prepare("INSERT INTO ejercicios(respuesta,respondido,area,puntajeT,nivel) VALUES(:respuesta,:respondido,:area,:puntaje,:nivel)");
        $statement->bindParam(':respuesta', $respuesta);
        $statement->bindParam(':respondido', $respondido);
        $statement->bindParam(':area', $area);
        $statement->bindParam(':puntaje', $puntaje);
        $statement->bindParam(':nivel', $nivel);
        $h = $statement->execute();
        if ($h) {
            $statement = $this->db->prepare("SELECT @@identity AS id");
            $statement->execute();
            $response = $statement->fetch();
        }
        return $response;
    } //Fin del método para guardar los ejercicios
    /**Método para guardar la relacion entre las sesiones y los ejercicios */
    public function relationSE($idEjercicios, $idSesiones)
    {
        $statement = $this->db->prepare("INSERT INTO sesiones_has_ejercicios(SESIONES_idSESIONES,Ejercicios_idEjercicios) VALUES(:idSesiones,:idEjercicios)");
        $statement->bindParam('idEjercicios', $idEjercicios);
        $statement->bindParam('idSesiones', $idSesiones);
        $h = $statement->execute();
        if ($h) {
            return true;
        } else {
            return false;
        }
    }
    /**Método para actualizar el nivel del usuario */
    public function updateLevelUser($id, $nivel)
    {
        $statement = $this->db->prepare("UPDATE alumnos SET nivel=$nivel WHERE idALUMNOS=$id");
        $h = $statement->execute();
        if ($h) {
            return true;
        } else {
            return false;
        }
    }
    /**Método para actualizar el estado de la sesion */
    public function updateSesion($idSesion)
    {
        $statement = $this->db->prepare("UPDATE sesiones SET estatus=1,fechafin=NOW() WHERE idSESIONES=$idSesion");
        $h = $statement->execute();
        if ($h) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEjercicioOfSesion($id)
    {
        $statement = $this->db->prepare("SELECT COUNT(Ejercicios_idEjercicios) FROM sesiones_has_ejercicios WHERE (SELECT MAX(idSESIONES) FROM alumnos,sesiones WHERE $id=sesiones.ALUMNOS_idALUMNOS)=SESIONES_idSESIONES");
        $statement->execute();
        return $statement->fetch();
    }

    public function getSesion($id)
    {
        $statement = $this->db->prepare("SELECT MAX(idSESIONES) FROM alumnos,sesiones WHERE $id=sesiones.ALUMNOS_idALUMNOS");
        $statement->execute();
        return $statement->fetch();
    }
} //fin de la clase AlumnoR

class PadreR extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    } //Fin del constructor        

    //Método para concocer si ya esta registrado el usuario
    public function empty_Padre($correo)
    {
        if ($this->db != NULL) {
            $statement = $this->db->prepare("SELECT correo FROM usuarios_e WHERE correo='$correo'");
            $statement->execute();
            $respuesta = $statement->fetchAll();
            if (empty($respuesta)) return true;
            else return false;
        } else {
            return "Error en la conexion";
        } //fin del if else para verificar la conexion            
    } //fin de la funcion para verificar si el correo ya existe

    public function set_padre($nombre, $apellidoP, $apellidoM, $correo, $password)
    {
        $statement = $this->db->prepare("INSERT INTO usuarios_e(nombre,apellidoP,apellidoM,correo,password) VALUES('$nombre','$apellidoP','$apellidoM','$correo','$password')");
        $statement->execute();
        $statement1 = $this->db->prepare("SELECT idUSUARIOS_E FROM usuarios_e WHERE correo='$correo'");
        $h = $statement1->execute();
        $idPadre = $statement1->fetch();                        
        $this->startSesion($nombre, $apellidoP, $apellidoM, $correo, $idPadre['idUSUARIOS_E']);
        return $h;
    } //fin del método para registrar padres

    public function startSesion($nombre, $apellidoP, $apellidoM, $correo, $id)
    {
        session_start();
        $_SESSION['idusuario'] = $id;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellidoP'] = $apellidoP;
        $_SESSION['apellidoM'] = $apellidoM;
        $_SESSION['correo'] = $correo;
    } //Fin del método para que el padre inicie sesion

    public function registrarAlumnos($nombre, $apellidoP, $apellidoM, $username, $sexo, $passAp, $nivel,$id)
    {
        $alumno = new AlumnoR();

        $existeAlumno = $alumno->empty_Alumno($username);

        if ($existeAlumno == 'true') {
            if ($alumno->set_alumnos($username, $nombre, $apellidoP, $apellidoM, $passAp, $sexo, $nivel)) {                
                $idAlumno = $this->getIdAlumno($username)['idALUMNOS']; 
                //echo $id;                                               
                $statement = $this->db->prepare("INSERT INTO alumnos_has_padre(ALUMNOS_idALUMNOS,USUARIOS_idUSUARIOS_E) VALUES($idAlumno,$id)");
                //echo $this->db;
                $statement->execute();
                return 1;                
            } else {
                return 3;
            } //fin del if else
        } else if ($existeAlumno == 'false') {
            return 2;
        } else {
            return 'Error de conexión con el servidor';
        }
    } //fin del método para que el padre registre a los alumnos

    //Método para traer el id del alumno registrado
    protected function getIdAlumno($username)
    {
        $statement = $this->db->prepare("SELECT idALUMNOS FROM alumnos WHERE name_user='$username'");
        $statement->execute();
        return $statement->fetch();
    } //Fin del método para conseguir el id del alumno  
    
    public function getAlumnos($id) {
        $statement = $this->db->prepare("SELECT idALUMNOS,nombreAlumno,apellido_p_Alumno,apellido_m_Alumno FROM alumnos,alumnos_has_padre as ap,usuarios_e as u WHERE u.idUSUARIOS_E=$id AND u.idUSUARIOS_E=ap.USUARIOS_idUSUARIOS_E AND alumnos.idALUMNOS=ap.ALUMNOS_idALUMNOS");
        $statement->execute();
        return $statement->fetchAll();
    }
    /**Método para obtener el total de puntos de los ejercicios */
    public function getPuntaje($idAlumno){
        $statement = $this->db->prepare("SELECT SUM(puntajeT) FROM alumnos,sesiones,ejercicios,sesiones_has_ejercicios as se WHERE alumnos.idALUMNOS=$idAlumno and sesiones.ALUMNOS_idALUMNOS=alumnos.idALUMNOS AND sesiones.idSESIONES=se.SESIONES_idSESIONES AND se.Ejercicios_idEjercicios=ejercicios.idEjercicios");
        $statement->execute();
        return $statement->fetch();
    }
    /**Método para obtener el total de sesiones que tiene el usuario */
    public function getSesiones($idAlumno){
        $statement = $this->db->prepare("SELECT COUNT(idSESIONES) from alumnos,sesiones WHERE alumnos.idALUMNOS=$idAlumno AND alumnos.idALUMNOS=sesiones.ALUMNOS_idALUMNOS;");
        $statement->execute();
        return $statement->fetch();
    }
    /**Método para obtener el total de ejercicios */
    public function getEjercicios($idAlumno){
        $statement = $this->db->prepare("SELECT COUNT(idEjercicios) FROM alumnos,sesiones,ejercicios,sesiones_has_ejercicios as se WHERE alumnos.idALUMNOS=$idAlumno AND alumnos.idALUMNOS=sesiones.ALUMNOS_idALUMNOS AND se.SESIONES_idSESIONES=sesiones.idSESIONES AND se.Ejercicios_idEjercicios=ejercicios.idEjercicios");
        $statement->execute();
        return $statement->fetch();
    }
    /**Método para modificar los datos del usuario padre */
    public function modifyInfo($id,$nombre,$apellidoP,$apellidoM) {
        $statement = $this->db->prepare("UPDATE usuarios_e SET nombre='$nombre',apellidoP='$apellidoP',apellidoM='$apellidoM' WHERE idUSUARIOS_E=$id");
        $h = $statement->execute();        
        return $h;
    }
    /**Método para obtener la información del usuario para actualizarla en la aplicacion */
    public function getInfoSelf($id) {
        $statement = $this->db->prepare("SELECT nombre,apellidoP,apellidoM FROM usuarios_e WHERE idUSUARIOS_E=$id");
        $statement->execute();
        return $statement->fetch();
    }
    /**Método para conocer la información del alumno */
    public function getInfoAlumnos($id) {
        $statement = $this->db->prepare("SELECT name_user,palabra_secreta,nombreAlumno,apellido_p_Alumno,apellido_m_Alumno FROM alumnos WHERE idALUMNOS=$id");
        $statement->execute();
        return $statement->fetch();
    }
}//Fin de la clase PadreR    
