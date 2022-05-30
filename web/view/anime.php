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
    <link rel="stylesheet" href="../css/anime.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Mulish&display=swap" rel="stylesheet">
</head>
<body>

    <?php 
    if(isset($_GET['closeSesion'])){
        unset($_SESSION['idUser']);
    } 
    // if(isset($_POST['submitLogin'])){
    //     UserController::iniciarUser($_POST['inputLoginUser'], $_POST['inputLoginPasswd']);
    // }
    ?>

    <!-- CONTENEDORES OCULTOS QUE SE MOSTRARÁN CON JAVASCRIPT -->

    <!-- ----------------------------DETALLES LISTA----------------------------------- -->

    <div class="detallesLista" id='detallesLista'>

        <div class="cabeceraLista">
            <div class="imagenLista" id="imagenLista"></div>
            <div class="titLista titulo textoCentro" id="titLista titulo">lkjDSFHLKSDHc lINWDXA</div>
        </div>

        <div class="animesLista">
            
        </div>

    </div>

    <!-- ----------------------------FIN DETALLES LISTA----------------------------------- -->
    
    <!-- ----------------------------LISTAS----------------------------------- -->

    <div class="detallesLista" id='detallesLista'>

    <div class="cabeceraLista">
    <div class="imagenLista" id="imagenLista"></div>
    <div class="titLista titulo textoCentro" id="titLista titulo">Mis Listas</div>
    </div>

    <div class="listasLista">
        
    </div>

    </div>

    <!-- ----------------------------FIN LISTAS----------------------------------- -->

    <!-- ----------------------- Crear lista Inicio ---------------------- -->

        <div class="crearLista colorHeader" id='crearLista'>
            <div class="campo">
                <label for="nombreLista" class="cabezaLogin">Nombre de la lista</p>
                <input type="text" class="inputLogin" id="nombreLista">
                <input type='hidden' id='idUserInput' value='<?php echo $_SESSION['idUser'] ?>'>
            </div>
            <div class="botonRegistroLista botonCreaLista amarillo" id="botonRegistroLista">
                <p>Crear Lista</p>
        </div>
        <p id='estadoL' class='colorFondo textoCentro texto'></p>
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

        <?php
            $idAnime = $_GET['idAnime'];
            //echo "<script>console.log($idAnime)</script>";
            require_once "../controller/ApiBusqueda.php";
            //ApiBusqueda::buscaAnimeDedicado($idAnime);
            ?>

        <div class='contenedor'>

        <div class='seccionIzq'>
            <div class='imagenAnime contenedorAzul' id='imagenAnime'><img src='../img/0.jpg'></div>
            <div class='contenedorCategorias' id='contenedorCategorias'>
                <div class='cat colorHeader colorFondo'>Lloros</div>
                <div class='cat colorHeader colorFondo'>Muchos Lloros</div>
                <div class='cat colorHeader colorFondo'>Quiero</div>
                <div class='cat colorHeader colorFondo'>Un</div>
                <div class='cat colorHeader colorFondo'>Aprobado</div>
                <div class='cat colorHeader colorFondo'>Os quiero</div>
                <div class='cat colorHeader colorFondo'>Mucho</div>
                <div class='cat colorHeader colorFondo'>corazoncito</div>
            </div>
        </div>
        <div class='textoAnime'>
            <div class='titAnime titulo' id='titAnime'>Zero no Tsukaima</div>
            <div class='descAnime texto'>Zero no Tsukaima (ゼロの使い魔 lit. El familiar de Zero?), conocida como La magia de Zero en Hispanoamérica y España, es una serie de novelas ligeras japonesas escritas por Noboru Yamaguchi e ilustradas por Eiji Usatsuka. La novela ha sido adaptada a una serie de anime por J.C.Staff en julio de 2006.1​2​

La primera temporada del anime tuvo un notable éxito en Japón, estrenándose una segunda temporada en julio de 2007 llamada Futatsuki no Kishi (双月の騎士?).3​ Una tercera temporada, Princesses no Rondo (ゼロの使い魔 ～三美姫プリンセッセの輪舞ロンド～ ～Sanbiki (Purinsesse) no Rinbu (Rondo)～?), fue estrenada el pasado 6 de julio de 2008; y una cuarta y última, Final (ゼロの使い魔 F～?).4​ La primera temporada de la serie fue licenciada en los Estados Unidos por Geneon Entertainment, mientras que en España por Yowu Entertainment bajo el nombre de La magia de Zero, misma que también licencio para Latinoamérica. En diciembre de 2008, fue lanzado un OVA, que no es más que un capítulo extra de género ecchi. Cabe decir que utiliza nombres de personajes históricos de la historia de Francia y sacados de la novela "El vizconde de Bragelonne" de Alejandro Dumas.</div>
            <div class='addButton pointer' id='addAnimeLista'>
                <div class='masButton'><i class='fa-solid fa-circle-plus colorHeaderLetra'></i></div>
                <p class='colorFondo'>Añadir a Lista</p>
            </div>
        </div>

        </div>

        <div class="noticiasPopu" id="noticiasPopu">
            <h3>Noticias Populares</h3>
            <?php
            require_once "../controller/NoticiaDedicadaController.php";
            NoticiaDedicadaController::noticiasPopusController();
            ?>
        </div>

        <div class="cajaComentarios"></div>
        
        <script src="../js/recogeElementos.js"></script>
        <script src="./js/expresionRegular.js"></script>
        <script src="../js/creaListaAjax.js"></script>
        <script src='../js/abreContenedoresAnime.js'></script>
        <script src='../js/recogeContAnime.js'></script>
        <script src="../js/abreContenedoresPerfil.js"></script>
        <script src="../js/abreContenedores.js"></script>

    </main>
    <footer>

        <p>Creador: Raúl Fernández Arce</p>

    </footer>
</body>
</html>