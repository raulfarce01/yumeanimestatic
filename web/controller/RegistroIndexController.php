<?php

require_once "./model/UserModel.php";

class RegistroIndexController{

    /**
     * 
     * Función para registrar usuarios desde el index (putas rutas relativas de PHP)
     * @see UserModel::registroUser
     * 
     */
    public static function registroUser($nombre, $alias, $correo, $passwd){

        $user = new User();

        $user->registroUser($nombre, $alias, $correo, $passwd);

    }

    /**
     * 
     * Función para iniciar la sesión de un usuario con su correo y contraseña
     * @see UserModel::inicioSesion
     * 
     */
    public static function iniciaSesion($alias, $passwd){

        $user = new User();

        $user->inicioSesion($alias, $passwd);

    }

}

?>