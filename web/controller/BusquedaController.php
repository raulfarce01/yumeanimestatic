<?php

require_once "../model/BusquedaModel.php";

class BusquedaController{

    /*

        Función para buscar e imprimir las noticias con los caracteres introducidos
        @see realizaBusquedaNoticia

    */
    public function buscaNoticia($busca){

        $busqueda = new Busqueda();

        $noticias = $busqueda->realizaBusquedaNoticia($busca);

        for($i = 0; $i < count($noticias); $i++){

            /*$numNoticias = 0;
            $numNoticias = ceil(count($noticias)/3);

            //echo $numNoticias;
            if($i == $numNoticias || $i == $numNoticias * 2){
                echo "</div>";
            }

            if($i == 0 || $i == $numNoticias || $i == $numNoticias * 2){
                echo "<div class='col'>";
            }*/

            echo "
        <a href='./noticia.php?idNoticia=".$noticias[$i]['idNoticia']."' class='busquedaDedicada colorFondo titulo'>
            <div class='noticia contenedorAzul'>
            
                <div class='imagen'>
                
                    <img src='data:image/png;base64, ".base64_encode($noticias[$i]['imagen'])."'></img>

                </div>

                <div class='titulo tituloBusqueda'>
                
                    <p>".$noticias[$i]['titulo']."</p>
                
                </div>
            
            </div>
        </a>
        
        ";
        }

    }

    /**
     * 
     * Función para buscar las 6 primeras noticias que coincidan con la cadena introducida por el usuario para introducirla en el cuadro de búsqueda
     * 
     */
    public function buscaNoticiaGeneral($busca){

        $cont = 0;
        
        $busqueda = new Busqueda();

        $noticias = $busqueda->realizaBusquedaNoticia($busca);

            for($i = 0; $i < 6; $i++){

                if(!empty($noticias[$i]['imagen'])){

                    echo "
                    <a href='./noticia.php?idNoticia=".$noticias[$i]['idNoticia']."' class='colorFondo noticiaA'>
                        <div class='noticia'>
                        
                            <div class='imagen'>
                            
                                <img src='data:image/png;base64, ".base64_encode($noticias[$i]['imagen'])."'></img>
            
                            </div>
            
                            <div class='titulo tituloBusqueda'>
                            
                                <p>".$noticias[$i]['titulo']."</p>
                            
                            </div>
                        
                        </div>
                    </a>
                    
                    ";        

                }else{

                    echo "<a class='noticiaA'><div class='noticia'></div></a>";

                }
                        
        }

    }

}

?>