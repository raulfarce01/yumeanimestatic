<?php

/**
 * 
 * Función para montar la parte derecha del header si el usuario ha iniciado sesión para mostrar su foto y su alias
 * @param idUser contiene el identificador del usuario a mostrar
 * 
 */
function montaHeaderPerfil($idUser){

    $user = new User();

    $datos = $user->muestraDatosUsuario($idUser);

    echo "<div class='headerMiPerfil'>
    <div class='fotoMiPerfil'>";
    
    if(!is_null($datos['foto'])){
        echo "<img src='data:image/png;base64, ".base64_encode($datos['foto'])."' class='personaje'>
        ";
    }else{
        echo "<i class='fa-solid fa-user personaje'></i>";
    }
    
    echo "</div>
    <div class='derecha'>

        <p class='titulo colorFondo'>".$datos['nombre']."</p>

        <div class='masMiPerfil'>

            <i class='fa-solid fa-caret-down flechita' id='flechita'></i>

        </div>

    </div></div>
    ";

}

/**
 * 
 * Función para mostrar el botón de login en caso de que no esté iniciada la sesión
 * 
 */
function montaLogin(){

    echo "<div class='botonesNav'>
    <div id='botonLoginNav' class='botonLoginNav'>
        <p class='texto colorFondo textoCentro'>Login incorrecto</p>
    </div>
    <div id='botonRegistroNav' class='botonRegistroNav'>
        <p>Registro</p>
    </div>
</div>";

}

?>