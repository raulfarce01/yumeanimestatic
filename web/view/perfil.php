<?php

    session_start();

    require_once "../controller/UserController.php";
    require_once "../controller/ListaController.php";

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
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Mulish&display=swap" rel="stylesheet">
</head>
<body>

<?php 
    if(isset($_GET['closeSesion'])){
        unset($_SESSION['idUser']);
    } 
    if(isset($_POST['submitLogin'])){
        UserController::iniciarUser($_POST['inputLoginUser'], $_POST['inputLoginPasswd']);
    }
    ?>
    <!-- CONTENEDORES OCULTOS QUE SE MOSTRARÁN CON JAVASCRIPT -->

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
            
            if(isset($_POST['submitLogin'])){
                UserController::iniciarUser($_POST['inputLoginUser'], $_POST['inputLoginPasswd']);
            }else if(isset($_SESSION['idUser'])){
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

        <?php 
        
        $datos = UserController::montaUsuario($_SESSION['idUser']); 
        
        ?>

        <div class='contenedorPropio' id='contenedorPropio'>
        <div class='fotoPerfil'>

                <div class='contenedorFotoPerfil'>
                    
                    <?php

                        echo $datos['foto'];

                    ?>
                
                </div>
                
            
            <form action='../model/subeImagenUser.php' method='post' enctype='multipart/form-data'>
                <input type='file' name='image' style='color: transparent' class='cambiaFoto'>
                <input type='submit' name='cambiaFoto' value='Subir Imagen' class='cambiaFotoSubmit contenedorAzul texto'>
                </form>
            </div>
        
            <div class='inputs'>
                
                <label for='nombre' class='titulo colorHeaderLetra'>Nombre</label>
                <input type='text' name='nombre' id='nombre' class='nombre texto input contenedorAzul' value='<?php echo $datos['nombre'] ?>' required>

                <label for='correo' class='titulo colorHeaderLetra'>Correo</label>
                <input type='text' name='alias 'class='alias texto input contenedorAzul' id='correo' value='<?php echo $datos['correo'] ?>' required>

                <label for='alias' class='titulo colorHeaderLetra'>Alias</label>
                <input type='text' name='alias' class='alias texto input contenedorAzul' id='alias' value='<?php echo $datos['alias'] ?>' required>

                
                <div id='saveButton' class='saveButton texto' name='saveButton'><p>Guardar</p></div>
                <p id='errorR'></p>
                <p id='paR'></p>
            </div>
        </div>

        <div class="misListas">
            <p class="titulo">Mis listas</p>
            <?php
            //echo $_SESSION['idUser'];
            ListaController::montaListasPerfil($_SESSION['idUser']); 
            ?>
            <a href='./listasGeneral.php?idUser=<?php echo $_SESSION['idUser'] ?>'><p class="todasListas">Todas las listas</p></a>
        </div>

        <script src="../js/recogeElementos.js"></script>
        <script src="../js/cambiaCredencialesAjax.js"></script>
        <script src="../js/expresionRegularPerfil.js"></script>
        <script src="../js/abreContenedoresPerfil.js"></script>
        <script src="../js/abreContenedores.js"></script>

    </main>
</body>
</html>