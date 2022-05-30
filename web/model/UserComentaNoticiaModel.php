<?php

    class UserComentaNoticia{

        private $idUser;
        private $idNoticia;
        private $textoN;

        public function __construct($idUser = 0, $idNoticia = 0, $textoN = ''){

            $this->idUser = $idUser;
            $this->idNoticia = $idNoticia;
            $this->textoN = $textoN;

        }

        /*
        
            Función subir los comentarios de la noticia en la base de datos
            @param $idUser contiene la clave del usuario que ha escrito la noticia
            @param $idNoticia contiene la clave de la noticia de la que se realiza el comentario
            @param $texto es la cadena de caracteres que se ha escrito como comentario
        
        */
        function creaComentario($idUser, $idNoticia, $texto){

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }

            $db->query("INSERT INTO userComentaNoticia(idUser, idNoticia, textoN) VALUES($idUser, $idNoticia, '$texto')");

            $db->close();

        }

        /*
        
            Función para obtener los comentarios realizados de una noticia de la base de datos
            @param $idNoticia contiene la clave de la que vamos a extraer los comentarios

            @return $comentarios contiene un array de comentarios que , a su vez, contiene al autor y el comentario
        
        */

        function traeComentarios($idNoticia){

            $comentarios = [];
            $cont = 0;

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }

            $consulta = $db->query("SELECT c.textoN AS comentario, u.alias AS autor, u.imgPerfil AS fotoPerfil FROM userComentaNoticia c NATURAL JOIN user u WHERE idNoticia = $idNoticia
            ");

            while($recorre = $consulta->fetch_object()){

                $comentarios[$cont] = array(
                    "autor" => $recorre->autor,
                    "texto" => $recorre->comentario,
                    "imgPerfil" => $recorre->fotoPerfil,
                );

                $cont++;

            }

            $db->close();

            return $comentarios;

        }

    }

?>