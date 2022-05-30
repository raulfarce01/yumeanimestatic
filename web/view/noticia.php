<?php

session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    //if (!isset($_SERVER['DOCUMENT_ROOT']) || empty($_SERVER['DOCUMENT_ROOT']))
    //$_SERVER['DOCUMENT_ROOT'] = __DIR__;

    require_once "../controller/NoticiaDedicadaController.php";
    require_once "../controller/UserController.php";
    require_once "../controller/ComentarioController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/339ad83339.js" crossorigin="anonymous"></script>
    <title>Yumeanime</title>
    <link rel="icon" type="image/png" size="32x32" href="../img/logo.png">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/noticia.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Mulish&display=swap" rel="stylesheet">
</head>
<body>

<?php 

    $idNoticia = $_GET['idNoticia'];

    if(isset($_GET['closeSesion'])){
        unset($_SESSION['idUser']);
    } 
    if(isset($_POST['submitLogin'])){
        UserController::iniciarUser($_POST['inputLoginUser'], $_POST['inputLoginPasswd']);
    }
    if(isset($_GET['submitComenta'])){
        ComentarioController::creaComentarioController($_SESSION['idUser'], $idNoticia, $_GET['comentario']);
    }
    ?>
    <!-- CONTENEDORES OCULTOS QUE SE MOSTRARÁN CON JAVASCRIPT -->

    <!-- --------------------------LOGIN-------------------------------- -->
    <form action="#" method='post'>
    <div class="contenedorLogin" id="contenedorLogin">
            <div class="contenedorCampos">
                <div class="campo">
                    <label for="inputLogin" class="cabezaLogin">Correo</p>
                    <input type="text" class="inputLogin" id="inputLoginUser" name='inputLoginUser'>
                </div>
                
                <div class="campo">
                    <label for="inputLogin" class="cabezaLogin">Contraseña</p>
                    <input type="password" class="inputLogin" id="inputLoginPasswd" name='inputLoginPasswd'>
                </div>
            </div>

            <div class="contenedorOtros">
                <div class="botonOlvidaPasswd"><p>¿Has olvidado tu contraseña?</p></div>

                <div class="botonesLogin">
                    <div class="botonRegistro" id="botonRegistro"><p>Registrarse</p></div>
                    <input type="submit" value="Iniciar" class="submit" id="submit" name='submitLogin'>
                </div>
            </div>
        </div>
    </form>

    <!-- --------------------------REGISTRO-------------------------------- -->
        <form action='../controller/registroAjax.php' method='get'>
        <div class="contenedorRegistro" id="contenedorRegistro">
            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Usuario</p>
                <input type="text" class="inputLogin" id="inputRegistroUser" name='inputRegistroUser'>
            </div>

            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Contraseña</p>
                <input type="password" class="inputLogin" id="inputRegistroPasswd" name='inputRegistroPasswd'>
            </div>

            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Confirmar Contraseña</p>
                <input type="password" class="inputLogin" id="inputLoginConfirmaPasswd" name='inputLoginConfirmaPasswd'>
            </div>
            
            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Correo</p>
                <input type="text" class="inputLogin" id="inputLoginCorreo" name='inputLoginCorreo'>
            </div>

            <div class="campo">
                <label for="inputLogin" class="cabezaLogin">Alias</p>
                <input type="text" class="inputLogin" id="inputLoginAlias" name='inputLoginAlias'>
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

    <div class="contenedorPerfil colorHeader colorFondo" id="contenedorPerfil">

        <p class="miPerfil titulo">Mi Perfil</p>

        <a href='./perfil.php?idUser=<?php echo $_SESSION['idUser']; ?>'>
        <div class="botonMiperfil">
           
            <div class="textoBotonMiperfil"> Editar<i class="fa-solid fa-pencil"></i></div>   

        </div>
        </a>

        <a href='./listasGeneral.php?idUser=<?php echo $_SESSION['idUser']; ?>'>
        <div class="botonMiperfil">

            <div class="textoBotonMiperfil">Mis listas<i class="fa-solid fa-list"></i></div>

        </div>
        </a>

        <form action='../index.php'><button class="cierraSesion colorFondo" name='closeSesion'>Cerrar sesión</button></form>

    </div>

    <!-- FIN CONTENEDORES OCULTOS QUE SE MOSTRARÁN CON JAVASCRIPT -->

    <div class="topPage">

        <header>

            <a href="../index.php">

                <img src="../img/logo.png" alt="Logo" class="logo">
                <p>Yumeanime</p>

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

            <?php
            
            if(isset($_SESSION['idUser'])){
                UserController::userIniciado($_SESSION['idUser']);
            }else{
                echo"
                <div class='botonesNav'>
                    <div id='botonLoginNav' class='botonLoginNav'>
                        <p>Login</p>
                    </div>
                    <div id='botonRegistroNav' class='botonRegistroNav'>
                        <p>Registro</p>
                    </div>
                </div>
                ";
            }
        
        ?>

                <form id='formBusqueda' action="./busqueda.php">

                    <input type="text" name="buscador" id="buscador" class="buscador" placeholder="Buscar...">
                    <i class="fa-solid fa-magnifying-glass" id="lupaBuscar"></i>

                </form>

                <div class="botonNav listasNav"><a href="./listasGeneral.php"><i class="fa-solid fa-list"></i>Listas</a></div>

                <div class="botonNav directorioNav"><a href="./directorio.php"><i class="fa-solid fa-folder"></i>Directorio Anime</a></div>

                <div class="editarPerfilMovil botonNav">

                    <a href="./perfil.php">
                        <i class="fa-solid fa-square-pen"></i>
                        <p>Editar Perfil</p>
                    </a>

                </div>

                <div class="listasPerfilMovil botonNav">

                    <a href="./lista.php">
                        <i class="fa-solid fa-rectangle-list"></i>
                        <p>Mis listas</p>
                    </a>

                </div>
            </div>
        </nav>

    </div>


    <!-- --------------------COPIAR HASTA AQUÍ EN TODOS------------------------- -->

    <main>
        <div class="contenedorDedicado">
        <?php
        echo "<script>console.log($idNoticia)</script>";
        require_once "../controller/NoticiaDedicadaController.php";
        NoticiaDedicadaController::noticiaDedicada($idNoticia);
        ?>
        
        <div class="noticiasPopu" id="noticiasPopu">
            
            <h3>Noticias Populares</h3>
            <?php
            NoticiaDedicadaController::noticiasPopusController();
            ?>

        </div>
        </div>
    
        <div class="contieneComentarios">
        <hr>
            <div class="comentarios">
                <h3 class='colorHeaderLetra'>Cajita de Comentarios</h3>
                <?php
                    if(isset($_SESSION['idUser'])){
                        ComentarioController::userComenta($_SESSION['idUser'], $idNoticia);
                    }
                    ComentarioController::traeComentariosController($idNoticia);
                ?>
            </div>
        </div>

        <script src="../js/recogeElementos.js"></script>
        <script src="./js/expresionRegular.js"></script>
        <script src="../js/abreContenedoresPerfil.js"></script>
        <script src="../js/abreContenedores.js"></script>
        
    </main>

    <footer>

        <p>Creador: Raúl Fernández Arce</p>

    </footer>

</body>
</html>