<?php

require_once "./model/UserModel.php";
require_once "./controller/Sesiones.php";

class UserController{

    /*
        
        Función que accede al modelo de User para registrar uno SIN permisos de administrador.
        @see UserModel/registroUser
    
    */
    public static function creaUserController($nombre, $alias, $correo, $passwd){

        $usuario = new User();

        $respuesta = $usuario->registroUser($nombre, $alias, $correo, $passwd);

        return $respuesta;

    }

    /*
        
        Función que accede al modelo de User para registrar uno CON permisos de administrador.
        @see UserModel/registroUser
    
    */
    public static function creaAdminController($nombre, $alias, $correo, $passwd){

        $admin = new User();

        $admin->registroUser($nombre, $alias, $correo, $passwd, 1);

    }

    /*
        
        Función que accede al modelo de User para montar los divs necesarios para la página dedicada del usuario.
        @see UserModel/muestraDatosUsuario
    
    */
    public static function montaUsuario($idUser){

        $user = new User();

        $datos = $user->muestraDatosUsuario();

        echo "<div class='contenedorPropio' id='contenedorPropio'>

            <div class='fotoPerfil'>
                <img width='100' src='data:image/png;base64, ".base64_encode($datos['foto'])."'></img>
            </div>
            <form action='./model/subeImagenUser.php' method='post' enctype='multipart/form-data'>
                <input type='file' name='cambiaFoto'>
            </form>
        
            <div class='inputs'>
                <input type='text' name='nombre' id='nombre' class='nombre texto' value='".$datos['nombre']."'>
                <input type='text' name='alias 'class='alias texto' id='alias' value='".$datos['correo']."'>
                <!--<input type='text' name='desc' class='desc texto' id='desc'>-->

                <div class='saveButton texto' id='saveButton'><p>Guardar</p></div>
            </div>
        
        </div>";

    }

    /*
        
        Función que accede al modelo de User para subir una foto de perfil a la base de datos
        @see UserModel/fotoPerfil
    
    */
    public static function subeFotoPerfil($idUser, $image){

        $user = new User();

        $user->fotoPerfil($idUser, $image);

    }

    /*
        
        Función que accede al modelo de User para cambiar los datos del usuario en la base de datos
        @see UserModel/cambiarDatos
    
    */
    public static function cambiarDatos($nombreNew, $aliasNew, $correoNew, $idUser){

        $user = new User();

        $user->cambiaDatosUser($nombreNew, $aliasNew, $correoNew, $idUser);

    }
    
    /*
        
        Función que accede al modelo de User para iniciar sesión
        @see UserModel/inicioSesion
    
    */
    public static function iniciarUser($correo, $passwd){

        $user = new User();

        $idUser = $user->inicioSesion($correo, $passwd);

    }

    /**
     * 
     * Po lo mismos que el del UserController normal, pero para el index, porque es especialito
     * 
     */
    public static function userIniciado($idUser){

        montaHeaderPerfil($idUser);

    }

}

?>