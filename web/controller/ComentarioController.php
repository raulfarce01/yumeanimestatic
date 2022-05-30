<?php

require_once "../model/UserComentaNoticiaModel.php";
require_once "../model/UserModel.php";

class ComentarioController{

    /*
        
        Función que accede al modelo de comentarios para subir uno
        @see UserComentaNoticia/creaComentario
    
    */
    public static function creaComentarioController($idUser, $idNoticia, $texto){

        $comentario = new UserComentaNoticia($idUser, $idNoticia, $texto);

        $comentario->creaComentario($idUser, $idNoticia, $texto);

    }

    /*
        
        Función que accede al modelo de comentarios para traer los comentarios de una noticia
        @see UserComentaNoticia/traeComentarios
    
    */
    public static function traeComentariosController($idNoticia){

        $comentario = new UserComentaNoticia();

        $comentarios = $comentario->traeComentarios($idNoticia);

        for($i = 0; $i < count($comentarios); $i++){

            echo "<div class='comentario'>
        
                <div class='fotoPerfil'>";
                    
                    if(empty($comentarios[$i]["imgPerfil"])){
                    
                        echo "<div class='noFoto colorHeader'></div>";

                    }else{

                        echo "<img src='data:image/png;base64, ".base64_encode($comentarios[$i]["imgPerfil"])."' class='imgPerfil'>";

                    }
                    
                echo "</div>
                
                <div class='autorComenta'>
                
                    <div class='autorComent'>
                    
                        <p class='letraNegra titulo autorComentario'>".$comentarios[$i]["autor"]."</p>

                    </div>
                    <div class='coment'>
                    
                        <p class='letraNegra comenta'>";

                        //echo strlen($comentarios[$i]["texto"]);

                        if(strlen($comentarios[$i]["texto"]) > 25){

                            for($j = 0; $j < strlen($comentarios[$i]["texto"]); $j++){
            
                                if($j % 125 == 0){
            
                                    echo "<br>";
                                    echo $comentarios[$i]["texto"][$j];
            
                                }else{

                                    echo $comentarios[$i]["texto"][$j];

                                }
            
                            }
            
                        }else{

                            echo $comentarios[$i]["texto"];

                        }
                        
                    echo "</p>

                    </div>
                
                </div>
        
            </div>";
        
        }

    }

    /**
     * 
     * Función para crear el cuadro de comentario del usuario al tener la sesión iniciada
     * @param idUser contiene el id del usuario que ha iniciado sesión y quiere comentar
     * @param idNoticia contiene el id de la noticia en la que se va a realizar el comentario
     * 
     */

    public static function userComenta($idUser, $idNoticia){

        $user = new User();

        $datos = $user->muestraDatosUsuario($idUser);

        echo "<div class='comentarioUser'>
        
                <div class='fotoPerfil'>";
                if(!is_null($datos["foto"])){
                    echo "<img src='data:image/png;base64, ".base64_encode($datos["foto"])."' class='imgPerfilUser'>";
                }else{
                    echo "<i class='fa-solid fa-user personajeComent colorHeaderLetra'></i>";
                }
                    
        echo    "</div>
                
                <div class='autorComenta'>
                
                    <div class='autorComent'>
                    
                        <p class='titulo'>".$datos["nombre"]."</p>

                    </div>
                    <div class='coment'>
                    
                        <form action='#' method='get'> 
                        <input type='hidden' name='idNoticia' value='$idNoticia'>   
                            <input type='text' placeholder='Escribe aquí tu comentario...' name='comentario' class='inputComenta contenedorAzul'>
                            <div class='botonSubmitComenta'>
                            <input name='submitComenta' type='submit' value='Enviar' class='botonComenta colorHeader colorFondo texto'>
                            </div>
                        </form>

                    </div>
                
                </div>
        
            </div>";
    }

}

?>