<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Mulish&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/339ad83339.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" size="32x32" href="../img/logo.png">
</head>
<body>

    <!-- CONTENEDORES OCULTOS QUE SE MOSTRARÁN CON JAVASCRIPT -->

    <!-- --------------------------LOGIN-------------------------------- -->
    <form action="../index.php" method='post'>
    <div class="contenedorLogin" id="contenedorLogin">
            <div class="contenedorCampos">
                <div class="campo">
                    <label for="inputLogin" class="cabezaLogin">Correo</p>
                    <input type="text" class="inputLogin" id="inputLoginUser">
                </div>
                
                <div class="campo">
                    <label for="inputLogin" class="cabezaLogin">Contraseña</p>
                    <input type="text" class="inputLogin" id="inputLoginPasswd">
                </div>
            </div>

            <div class="contenedorOtros">
                <div class="botonOlvidaPasswd"><p>¿Has olvidado tu contraseña?</p></div>

                <div class="botonesLogin">
                    <div class="botonRegistro" id="botonRegistro"><p>Registrarse</p></div>
                    <input type="submit" value="Iniciar" class="submit" id="submit">
                </div>
            </div>
        </div>
    </form>

    <!-- --------------------------REGISTRO-------------------------------- -->
        <form action='./registroAjax.php' method='get'>
        <div class="contenedorRegistro" id="contenedorRegistro">
            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Usuario</p>
                <input type="text" class="inputLogin" id="inputRegistroUser" name='inputRegistroUser' required>
            </div>

            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Contraseña</p>
                <input type="text" class="inputLogin" id="inputRegistroPasswd" name='inputRegistroPasswd' required>
            </div>

            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Confirmar Contraseña</p>
                <input type="text" class="inputLogin" id="inputLoginConfirmaPasswd" name='inputLoginConfirmaPasswd' required>
            </div>
            
            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Correo</p>
                <input type="text" class="inputLogin" id="inputLoginCorreo" name='inputLoginCorreo' required>
            </div>

            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Alias</p>
                <input type="text" class="inputLogin" id="inputLoginAlias" name='inputLoginAlias' required>
            </div>
            
            <div class="botonesRegistro">
                <div class="botonLoginRegistro" id="botonLoginRegistro"><p>Login</p></div>
                <input type="submit" value="Registrarse" class="submit" id="submitRegistro">
            </div>
            <p id="errorR"></p>
        </div>
        </form>


    <!-- --------------------------OLVIDA CONTRASEÑA NO HACER POR EL MOMENTO -------------------------------- -->

    <div class="olvidaPasswd">

        <form action="#" method="post">

            <label for="inputLogin" class="cabezaLogin">Correo</p>
            <input type="text" class="inputLogin" id="inputLoginCorreoOlvida">

            <div class="botonLoginRegistro" id="botonLoginRegistro"><p>Login</p></div>
            <input type="submit" value="Enviar" class="submit" id="submit">

        </form>

    </div>

    <!-- --------------------------CUADRO DE PERFIL-------------------------------- -->

    <div class="contenedorPerfil">

        <p class="miPerfil">Mi Perfil</p>

        <div class="botonMiperfil">

            <p class="textoBotonMiperfil">Editar</p>
            <i class="fa-regular fa-pencil"></i>

        </div>

        <div class="botonMiperfil">

            <p class="textoBotonMiperfil">Mis listas</p>
            <i class="fa-solid fa-list"></i>

        </div>

        <p class="cierraSesion">Cerrar sesión</p>

    </div>

    <!-- FIN CONTENEDORES OCULTOS QUE SE MOSTRARÁN CON JAVASCRIPT -->

    <div class="topPage">

        <header>

            <a href="../index.php">

                <img src="../img/logo.png" alt="Logo" class="logo">
                <p class='titulo'>Yumeanime</p>

            </a>

        </header>

        <!-- --------------------------MENÚ HAMBURGUESA-------------------------------- -->
        
        <input type="checkbox" name="hamburg" id="hamburg" class="checkHamb">
        <div class="contenedorContenedor">
            <div class="contenedorMenuHamburguesa">
            <div class="menuHamburguesa">

                <div class="linea1 lineaHamb"></div>
                <div class="linea2 lineaHamb"></div>
                <div class="linea3 lineaHamb"></div>

            </div>
            </div>
        </div>

        <!-- --------------------------FIN MENÚ HAMBURGUESA-------------------------------- -->

        <nav class="nav">

            <div class="textoNav">

                <div class="botonesNav">
                    <div id="botonLoginNav" class="botonLoginNav">
                        <p>Login</p>
                    </div>
                    <div id="botonRegistroNav" class="botonRegistroNav">
                        <p>Registro</p>
                    </div>
                </div>

                <form id='formBusqueda' action="../view/busqueda.php">

                    <input type="text" name="buscador" id="buscador" class="buscador" placeholder="Buscar...">
                    <i class="fa-solid fa-magnifying-glass" id="lupaBuscar"></i>

                </form>

                <div class="botonNav listasNav"><a href="../view/listasGeneral.php"><i class="fa-solid fa-list"></i>Listas</a></div>

                <div class="botonNav directorioNav"><a href="../view/directorio.php"><i class="fa-solid fa-folder"></i>Directorio Anime</a></div>

                <div class="editarPerfilMovil botonNav">

                    <a href="../view.perfil.php">
                        <i class="fa-solid fa-square-pen"></i>
                        <p>Editar Perfil</p>
                    </a>

                </div>

                <div class="listasPerfilMovil botonNav">

                    <a href="../view/lista.php">
                        <i class="fa-solid fa-rectangle-list"></i>
                        <p>Mis listas</p>
                    </a>

                </div>
            </div>
        </nav>

    </div>
    <main>
    <?php

/**
 * 
 * Esta página en principio iba a recibir una llamada de AJAX para registrar el usuario, pero daba problemas y también he creído conveniente mostrar una respuesta al usuario, así que he decidido crear otra página para que el usuario pueda ver una respuesta y pueda seguir trabajando
 * 
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "../model/UserModel.php";

$nombre = $_GET['inputRegistroUser'];
$alias = $_GET['inputLoginAlias'];
$correo = $_GET['inputLoginCorreo'];
$passwd = $_GET['inputRegistroPasswd'];
$confirmaPasswd = $_GET['inputLoginConfirmaPasswd'];

if($passwd != $confirmaPasswd){

    echo "<script>alert('Las contraseñas no coinciden')</script>";

}else{

    $usuario = new User();

    $respuesta = $usuario->registroUser($nombre, $alias, $correo, $passwd);
    
    if($respuesta){
        echo "<div class='alerta texto fondoRojo'>El usuario ya existe</div>";
    }else{
        echo "<div class='alerta colorHeader texto colorFondo registroExito'>El usuario se ha creado con éxito</div>";
    }

}

?>

<form id='regreso' action="../index.php" method='post'>
    <input type="submit" value="Volver al Inicio" class='colorHeader titulo colorFondo volver'>
</form>

<script>

function submitAuto(){
    window.onload = function ()
        {

		    document.getElementById("regreso").submit();

        }
}

tiempo = setTimeout(submitAuto(), 1000);

<script src="../js/recogeElementos.js"></script>
<script src="../js/expresionRegular.js"></script>
        <script src="../js/abreContenedores.js"></script>
</script>
</main>
    
</body>
</html>