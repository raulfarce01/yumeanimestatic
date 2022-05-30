<?php

require_once "../model/ListaModel.php";
require_once "../model/UserGuardaLista.php";

/**
 * 
 * ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡IMPORTANTE!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * LA FUNCIONALIDAD DE LAS LISTAS NO ESTARÁ DISPONIBLE HASTA QUE NO SE UTILICE UN LENGUAJE ESTILO JAVASCRIPT A NIVEL DEL SERVIDOR PARA PODER INTERACTUAR CON LOS ELEMENTOS CREADOS POR PHP
 * 
 */

class ListaController{

    /**
     * 
     * Función para crear la página dedicada de una lista sobre la que ha clickado el usuario
     * @param idLista contiene el identificador de la lista a montar
     * 
     */

    public static function montaListaEspecifica($idLista){

        $listaUser = new Lista();

        $listas = $listaUser->montaCabecerasLista($idLista);

        //var_dump($listas);
        $listas[0]["fecha"] = substr($listas[0]["fecha"], 0, 10);

        echo "<div class='textoCabeceraLista'>
        <div class='titLista titulo' id='titLista'>";

        echo $listas[0]["nombre"];

        echo "</div>
        <div class='autorFecha'>
            <div class='autorLista texto' id='autorLista'><i class='fa-solid fa-user colorHeaderLetra'></i><p>";
            
            echo $listas[0]["autor"];
            
            echo "</p></div>
            <div class='fechaLista texto' id='fechaLista'><i class='fa-solid fa-clock colorHeaderLetra'></i><p>";
            
            echo $listas[0]["fecha"];
            
            echo "</p></div>
        </div>
        <div class='descLista texto' id='descLista'>";
        
        echo $listas[0]["desc"];
        
        echo "</div>
        <hr class='lineaPc'>
        </div>";

        //AÑADIR ANIMES AQUÍ

    }

    /**
     * 
     * Función para montar 4 listas dentro del cuadro "misListas" en el perfil del usuario
     * @param idUser contiene el identificador del usuario sobre el que se van a buscar las listas
     * 
     */
    public static function montaListasPerfil($idUser){

        $listaUser = new Lista();

        echo "<script>console.log('listaskekw')</script>";

        $listas = $listaUser->montaCabecerasListaPerfil($idUser);

        echo "<script>console.log('contenedorListas')</script>";

        echo "
        <div class='contenedorListas' id='contenedorListas'>";

            for($i = 0; $i < count($listas); $i++){
                if($i < 3){

                $imagen = $listaUser->recogeImagenLista($listas[$i]["idLista"]);

                echo "<a href='./lista.php?idLista=".$listas[$i]['idLista']."' class='contenedorTocho'><div class='fotoLista'>".$imagen."</div><p class='titulo pointer colorFondo tituloAnimeLista'>".$listas[$i]['nombre']."</p></a>";
                
                }

            }

        echo "<div class='masButton contenedorTocho' id='masButtonLista'><i class='fa-solid fa-circle-plus'></i></div>
    </div>
        ";

    }

    /**
     * 
     * Función para recoger la imagen de una lista (cabe decir que la imagen escogida es la del primer anime de la lista)
     * @param idLista contiene el identificador de la lista
     * 
     */
    public static function recogeImagenController($idLista){

        $lista = new Lista();

        $imagen = $lista->recogeImagenLista($idLista);

        return $imagen;

    }

    /**
     * 
     * Función para recoger las listas de la base de datos (IMPORTANTE: TODO LO REALIZADO CON ESTA FUNCIÓN VA A TOMAR UN TIEMPO EN CARGAR PORQUE REALIZA CONSULTAS A LA API Y A LA BASE DE DATOS AL MISMO TIEMPO VARIAS VECES, NO EXCEDER EL NÚMERO DE REQUESTS)
     * 
     */
    public static function recogeListasController(){

        $lista = new Lista();

        $datos = $lista->recogeListas();

        for($i = 0; $i < count($datos); $i++){

            //Cuando la API deje de estar caída: descomentar
            /*echo "<a href='./lista.php?idLista=".$datos[$i]['idLista']."' class='contenedorLista'><div class='miniContenedorLista'>
            
                    <div class='imagenLista contenedorAzul'>
                    
                        ".$datos[$i]["imagen"]."
                    
                    </div>

                    <div class='titulo colorHeaderLetra tituloLista'>
                    
                        ".$datos[$i]['nombre']."
                    
                    </div>
            
                </div></a>";*/

                echo "<a href='./lista.php?idLista=".$datos[$i]['idLista']."' class='contenedorLista'><div class='miniContenedorLista'>
            
                <div class='imagenLista contenedorAzul'>
                
                    <img src='../img/$i.jpg'>
                
                </div>

                <div class='titulo colorHeaderLetra tituloLista'>
                
                    ".$datos[$i]['nombre']."
                
                </div>
        
            </div></a>";

        }

    }

    /**
     * 
     * Función para recoger los animes que hay contenidos dentro de una lista
     * @param idLista contiene el identificador de la lista sobre la que vamos a buscar los animes
     * 
     */
    public static function recogeAnimesLista($idLista){

        $lista = new Lista();

        $animes = $lista->recogeAnimesLista($idLista);

        //var_dump($animes[0]);

        for($i = 0; $i < count($animes); $i++){
            
            //Descomentar si funciona la API
            /*echo "
            <div class='noticia busquedaDedicada'>
            <a href='./anime.php?idAnime=".$animes[$i]["idAnime"]."' class=' colorFondo titulo'>
                <div class='imagen contenedorAzul'>
                
                    <img src='".$animes[$i]["imagen"]."'></img>

                </div>
                </a>

                <div class='titulo tituloBusqueda'>
                <a href='./anime.php?idAnime=".$animes[$i]['idAnime']."' class=' colorFondo titulo'>
                    <p class='letraNegra'>".$animes[$i]['nombre']."</p>
                </a>
                    <i class='fa-solid fa-ellipsis-vertical letraNegra'></i>
                
                </div>
            
            </div>
        
        ";*/
        
        }

    }

    public static function recogeListasUserController($idUser){

        $lista = new Lista();

        //echo $idUser;

        $datos = $lista->recogeListasUser($idUser);

        for($i = 0; $i < count($datos); $i++){

            echo "<a href='./lista.php?idLista=".$datos[$i]['idLista']."' class='contenedorLista'><div class='miniContenedorLista'>
            
                    <div class='imagenLista contenedorAzul'>
                    
                        ".$datos[$i]["imagen"]."
                    
                    </div>

                    <div class='titulo colorHeaderLetra tituloLista'>
                    
                        ".$datos[$i]['nombre']."
                    
                    </div>
            
                </div></a>";

        }

    }

}

?>