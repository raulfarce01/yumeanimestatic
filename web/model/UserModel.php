<?php

class User{

    private $nombre;
    private $alias;
    private $correo;
    private $passwd;
    private $imgPerfil;
    private $administrador;

    public function __construct($nombre = '', $alias = '', $correo = '', $passwd = '', $imgPerfil = '', $administrador = 0){

        $this->nombre = $nombre;
        $this->alias = $alias;
        $this->correo = $correo;
        $this->passwd = $passwd;
        $this->imgPerfil = $imgPerfil;
        $this->administrador = $administrador;

    }

    /*
        
        Función para registrar los usuarios en la base de datos
        @param $nombre contiene el nombre del usuario que se registra
        @param $alias contiene el alias con que el usuario iniciará sesión
        @param $correo contiene el correo del usuario
        @param $passwd contiene la contraseña que usará el usuario en el login
        @param $administrador es para dar permisos de administrador 
            [0 - Sin permisos]
            [1 - Con permisos]
    
    */

    function registroUser($nombre, $alias, $correo, $passwd, $administrador = 0){

        $existe = false;

        try{

            $db = new mysqli('localhost', 'yumeanime', '123456', 'yumeanimedb');

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }

        }catch(Exception $ex){

            echo $ex->getMessage(), "<br>";

        }

        try{

            $consulta = $db->query("SELECT alias, correo FROM user");

            while($recorre = $consulta->fetch_object()){

                if($alias == "$recorre->alias" || $correo == "$recorre->correo"){

                    $existe = true;

                }

            }

            if(!$existe){

                $passwd = password_hash($passwd, PASSWORD_DEFAULT);

                $db->query("INSERT INTO user(nombre, alias, correo, passwd, administrador) VALUES ('$nombre', '$alias', '$correo', '$passwd', $administrador)");

            }

        }catch(Exception $ex){

            echo $ex->getMessage(), "<br>";

        }

        $db->close();

        return $existe;

    }

    /*
        
        Función para el inicio de sesión del usuario
        @param $alias es el alias que usará el usuario para logarse
        @param $passwd es la contraseña
    
    */
    function inicioSesion($correo, $passwd){

        try{

            $db = new mysqli('localhost', 'yumeanime', '123456', 'yumeanimedb');

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }

        }catch(Exception $ex){

            echo $ex->getMessage(), "<br>";

        }

        if(session_id() == ""){
            session_start();
        }

        $consulta = $db->query("SELECT correo, passwd, idUser FROM user WHERE correo = '$correo'");

        if ($recorreConsulta = $consulta->fetch_object()){

            if(password_verify($passwd, $recorreConsulta->passwd)){
                
                if(!isset($_SESSION['idUser'])){

                    $_SESSION['idUser'] = '';

                }

                $_SESSION['idUser'] = $recorreConsulta->idUser;

                $db->close();

                return $recorreConsulta->idUser;


            }else{

                return false;

            }

        }else{

            return false;
    
        }

    }

    /*
        
        Función para cambiar los datos del usuario en su página dedicada del perfil
        @param $nombreNew contiene el nuevo nombre que utilizará
        @param $aliasNew contiene su nuevo alias
        @param $correoNew contiene el nuevo correo
        @param $idUser contiene la clave del usuario sobre el que realizar el cambio
    
    */

    function cambiaDatosUser($nombreNew, $aliasNew, $correoNew, $idUser){

        try{

            $db = new mysqli('localhost', 'yumeanime', '123456', 'yumeanimedb');

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }

        }catch(Exception $ex){

            echo $ex->getMessage(), "<br>";

        }

        $db->query("UPDATE user SET nombre = '$nombreNew', alias= '$aliasNew', correo = '$correoNew' WHERE idUser = $idUser");

        $db->close();

    }

    /*
        
        Función para subir una foto de perfil en el usuario desde su página dedicada
        @param $idUser contiene la clave sobre la que se realizará el cambio
        @param $image contiene el texto de la imagen que convertiremos en un formate accesible para la base de datos
    
    */

    function fotoPerfil($idUser, $image){

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $imgContent = addslashes(file_get_contents($image));

        //Usamos las siguientes líneas para saber si tenemos que añadir una imagen o simplemente cambiarla
        $recibeImagen = $db->query("SELECT imgPerfil FROM user WHERE idUser = $idUser");
        $comprueba = $recibeImagen->fetch_object();

        /*if($comprueba != NULL){

            $db->query("UPDATE user SET imgPerfil = '$imgContent' WHERE idUser = $idUser");

        }else{*/
            //echo $imgContent;
            $insert = $db->query("UPDATE user SET imgPerfil = '$imgContent' WHERE idUser = $idUser");
            if($insert){
                echo "<p>Archivo subido correctamente a la base de datos</p>";
            }else{
                echo "<p>Error al subir el archivo a la base de datos</p>";
            } 
        //}
    }

    /*
        
        Función que devuelve los datos del usuario para su página dedicada
        @param $idUser contiene la clave del usuario sobre el que queremos obtener la información.

        @return $muestra es un array con la información.
    
    */

    function muestraDatosUsuario($idUser){

        //Comprobamos que la conexión se realice con éxito
        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo $ex->getMessage(), "<br>";

        }

        //Seleccionamos los valores desde la base de datos para mostrarlos en la página
        $datos = $db->query("SELECT nombre, imgPerfil, correo, alias FROM user WHERE idUser = $idUser");
        
        if($res = $datos->fetch_object()){
            
            //Almacenamos todos los valores en un array asociativo para devolverlos a la página desde la que se llama a la función para mostrar los datos
            //Usar <img width='100' src='data:image/png;base64, ".base64_encode($res->fotoPerfil)."'></img> para visualizar la imagen+

            $muestra = array(
                "nombre" => $res->nombre,
                "correo" => $res->correo,
                "foto" => $res->imgPerfil,
                "alias" => $res->alias,
            );

            return $muestra;
        }
    }
}

?>