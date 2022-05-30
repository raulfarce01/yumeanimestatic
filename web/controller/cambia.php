<?php

/**
 * 
 * Página donde se recibirá el AJAX para cambiar los credenciales del usuario en la base de datos desde su página de Perfil
 * 
 */

session_start();

?>

    Usuario cambiado correctamente

    <?php


        require_once "../model/UserModel.php";

        $nombre = $_GET['nombre'];
        $alias = $_GET['alias'];
        $correo = $_GET['correo'];
        $idUser = $_SESSION['idUser'];

        $usuario = new User();

        $usuario->cambiaDatosUser($nombre, $alias, $correo, $idUser);


    ?>
