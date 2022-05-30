<?php

require_once "../model/NoticiaModel.php";
require_once "../model/ImagenModel.php";
require_once "../model/ParrafoModel.php";

//require_once(__DIR__."/model/NoticiaModel.php");

class NoticiaDedicadaController{

    /*
    
        Función para crear una página dedicada de la noticia
        @param $idNoticia contiene un entero con la clave identificadora de la noticia
    
    */
    public static function noticiaDedicada($idNoticia){

        $noticiaModel = new Noticia();
        $parrafoModel = new Parrafo();
        $imagenModel = new Imagen();

        $titular = $noticiaModel->sacaTitularNoticia($idNoticia);
        $parrafos = $parrafoModel->sacaParrafosNoticia($idNoticia);
        $imagenes = $imagenModel->sacaImagenesNoticia($idNoticia);

        //Separamos la fecha de la hora para mostrar solo la primera
        $titular["fecha"] = substr($titular["fecha"], 0, 10);

        //echo $titular["fecha"];

        echo "<div class='noticia'>

                <div class='tituloNoticia'>

                    <p class='titulo'>
                    
                        ".$titular["titulo"]."
                    
                    </p>
                
                    <div class='autorFecha'>
                        <div class='autorNoticia' id='autorNoticia'><i class='fa-solid fa-user colorHeaderLetra'></i><p class='letra negrita'>";
                
                        echo $titular["autor"];
                
        echo            "</p>
                        </div>
                        <div class='fechaNoticia' id='fechaNoticia'><i class='fa-solid fa-clock colorHeaderLetra'></i><p class='letra negrita'>";
                    
                            echo $titular["fecha"];
                    
        echo            "</p>
                        </div>
                    </div>
                </div>";

            if(count($parrafos) >= count($imagenes)){

        echo    "<div class='cuerpoNoticia'>";

        echo        "<p>
        
                        $parrafos[0]
        
                    </p>
                    <img width='100' src='data:image/png;base64, ".base64_encode($imagenes[0])."' class='imagenDedicada'>
                    
                    </img>";
        
        for($i = 1; $i < count($parrafos); $i++){

            echo "<p>$parrafos[$i]</p>";

        }
        
        echo    "</div>";

            }

        echo "</div>";
    }

    /**
     * 
     * @see NoticiaController::noticiasPopusController
     * 
     */
    public static function noticiasPopusController(){

        $noticia = new Noticia();

        $noticiasPopus = $noticia->noticiasPopu();

        for($i = 0; $i < 5; $i++){

            echo "<a href='../view/noticia.php?idNoticia=".$noticiasPopus[$i]["idNoticia"]."' class='colorFondo popuA'><div class='contenedorPopu'>
            
            <div class='imagenPopu'><img src='data:image/png;base64,".base64_encode($noticiasPopus[$i]["imagen"])."'></img>
            </div>
            <div class='tituloPopu titulo colorFondo'>".
            $noticiasPopus[$i]["titulo"]
            ."</div>
            
            </div></a>";

        }

    }

}

?>