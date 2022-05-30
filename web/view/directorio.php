<?php
    require_once "../controller/UserController.php";

    session_start();

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
    <link rel="stylesheet" href="../css/directorio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Mulish&display=swap" rel="stylesheet">
</head>
<body>

    <?php
        if(!isset($_GET['nextPage'])){
            $pagina = 1;
            //echo 'no pulsado';
        }else{
            $pagina = $_GET['nextPage'];
            //echo 'pulsado';
        }

        if(isset($_GET['closeSesion'])){
            unset($_SESSION['idUser']);
        } 
        if(isset($_POST['submitLogin'])){
            UserController::iniciarUser($_POST['inputLoginUser'], $_POST['inputLoginPasswd']);
        }

        //echo $pagina;

        echo "<script>console.log($pagina)</script>";
    ?>

    <!-- CONTENEDORES OCULTOS QUE SE MOSTRARÁN CON JAVASCRIPT -->

    <!-- ----------------------- Crear lista Inicio ---------------------- -->

    <div class="crearLista colorHeader">
            <div class="campo">
                <label for="nombreLista" class="cabezaLogin">Nombre de la lista</p>
                <input type="text" class="inputLogin" id="nombreLista">
            </div>
            <div class="botonRegistroLista botonCreaLista" id="botonRegistroLista"><p>Crear Lista</p></div>
        </div>

    <!-- ----------------------- Crear lista Fin ---------------------- -->

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

    <!-- --------------------------OLVIDA CONTRASEÑA-------------------------------- -->

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

    <!-- ----------------------------DETALLES LISTA----------------------------------- -->

    <div class="detallesLista">

        <div class="cabeceraLista">
            <div class="imagenLista" id="imagenLista"></div>
            <div class="titLista titulo textoCentro" id="titLista titulo">lkjDSFHLKSDHc lINWDXA</div>
        </div>

        <div class="animesLista">
            <p class="verTodo texto amarillo textoCentro">Ver todo</p>
        </div>

    </div>

    <!-- ----------------------------FIN DETALLES LISTA----------------------------------- -->

    <!-- FIN CONTENEDORES OCULTOS QUE SE MOSTRARÁN CON JAVASCRIPT -->

    <!-- -------------------------VENTANA "MORE" ANIME-------------------------------- -->

    <div class="opciones colorHeader texto">
        <div class="addList colorFondo pointer"><p>Añadir a lista</p></div>
        <div class="detalles colorFondo pointer">
            <p>Detalles</p>
        </div>
    </div>

    <!-- -------------------------FIN VENTANA "MORE" ANIME-------------------------------- -->

    <!-- ---------------------------LISTAS ANIME------------------------------------ -->

    <div class="misListasPopup colorHeader" id="misListasPopup">
        <p class="titulo colorFondo">Mis listas</p>
        <div class="contenedorMisListasPopup texto" id="contenedorMisListasPopup"></div>
        <div class="masButton colorFondo"><i class="fa-solid fa-circle-plus"></i></div>
    </div>

    <!-- --------------------------FIN LISTAS ANIME--------------------------------------- -->

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

            // if(isset($_SESSION['idUser'])){
            //     echo $_SESSION['idUser'];
            // }else{
            //     echo "hola";
            // }

            
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
    <div class='izquierda'>
    <div class="selects">
        <form action="./directorio.php" method="get" class='formSelect'>

        <select name="genre" class="selectCat contenedorAzul colorFondo texto" id="genre">

            <!-- <option value="valorX"> ValorX </option> -->
            <option disabled selected>Categoría</option>
            <?php
                require_once "../controller/ApiBusqueda.php";
                ApiBusqueda::listaGenerosAnime();
            ?>

        </select>

        <input type="submit" class='filtrar colorHeader colorFondo' value='Filtrar'>
        </form>
    </div>
    
        
        <div class="contenedorAnimes colorHeaderLetra">
            <div class="contenedorASecas">
            <?php
                if(isset($_GET['genre'])){
                    $genre = $_GET['genre'];
                    //ApiBusqueda::listaAnimes($genre, $pagina);
                }else{
                    //ApiBusqueda::listaAnimes();
                }
            ?>
            <div class='anime animeA'>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='imagen contenedorAzul contenedorImagen'>
                        <img src='../img/0.jpg' class='imgAnime'>
                    </div>
                </a>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='titAnime titulo'>
                        <p>
                            Zero no Tsukaima
                        </p>
                    </a>
                    <i class='fa-solid fa-ellipsis-vertical'></i>
                </div>
            </div>

            <div class='anime animeA'>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='imagen contenedorAzul contenedorImagen'>
                        <img src='../img/13.jpeg' class='imgAnime'>
                    </div>
                </a>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='titAnime titulo'>
                        <p>
                            Spy X Family
                        </p>
                    </a>
                    <i class='fa-solid fa-ellipsis-vertical'></i>
                </div>
            </div>

            <div class='anime animeA'>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='imagen contenedorAzul contenedorImagen'>
                        <img src='../img/1.jpg' class='imgAnime'>
                    </div>
                </a>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='titAnime titulo'>
                        <p>
                            Tomodachi Game
                        </p>
                    </a>
                    <i class='fa-solid fa-ellipsis-vertical'></i>
                </div>
            </div>

            <div class='anime animeA'>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='imagen contenedorAzul contenedorImagen'>
                        <img src='../img/12.png' class='imgAnime'>
                    </div>
                </a>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='titAnime titulo'>
                        <p>
                            Oregairu
                        </p>
                    </a>
                    <i class='fa-solid fa-ellipsis-vertical'></i>
                </div>
            </div>

            <div class='anime animeA'>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='imagen contenedorAzul contenedorImagen'>
                        <img src='../img/2.jpg' class='imgAnime'>
                    </div>
                </a>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='titAnime titulo'>
                        <p>
                            Danmachi
                        </p>
                    </a>
                    <i class='fa-solid fa-ellipsis-vertical'></i>
                </div>
            </div>

            <div class='anime animeA'>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='imagen contenedorAzul contenedorImagen'>
                        <img src='../img/11.jpg' class='imgAnime'>
                    </div>
                </a>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='titAnime titulo'>
                        <p>
                            Saekano
                        </p>
                    </a>
                    <i class='fa-solid fa-ellipsis-vertical'></i>
                </div>
            </div>

            <div class='anime animeA'>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='imagen contenedorAzul contenedorImagen'>
                        <img src='../img/3.jpg' class='imgAnime'>
                    </div>
                </a>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='titAnime titulo'>
                        <p>
                            Erased
                        </p>
                    </a>
                    <i class='fa-solid fa-ellipsis-vertical'></i>
                </div>
            </div>

            <div class='anime animeA'>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='imagen contenedorAzul contenedorImagen'>
                        <img src='../img/9.jpg' class='imgAnime'>
                    </div>
                </a>
                <a href='./anime.php?idAnime=increible' class=' colorHeaderLetra'>
                    <div class='titAnime titulo'>
                        <p>
                            Otome Game Sekai...
                        </p>
                    </a>
                    <i class='fa-solid fa-ellipsis-vertical'></i>
                </div>
            </div>

            </div>
            <form action='./directorio.php' method='get' class='formNextPage'>
                <input type='hidden' name='genre' value='<?php echo $genre; ?>'>
                <button name='nextPage' class=' colorFondo colorHeader nextPage' value='<?php echo ++$pagina; ++$pagina ?>'>Siguiente Página</button>
            </form>
        </div>
        </div>
        <div class="noticiasPopu" id="noticiasPopu">
            <h3>Noticias Populares</h3>
            <?php
            require_once "../controller/NoticiaDedicadaController.php";
            NoticiaDedicadaController::noticiasPopusController();
            ?>
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