<?php

    class Imagen{

        private $contenido;
        private $idNoticia;

        public function __construct($contenido = '', $idNoticia = 0){

            $this->idNoticia = $idNoticia;
            $this->contenido = $contenido;

        }

        /*
        
            Función para subir las imágenes una a una de las noticas a la base de datos.
            @param $codigo recibe la cadena de caracteres que convertiremos en un tipo de dato que podremos subir a la base de datos
            @param $idNoticia recibe la clave de la noticia a la que pertenece la imagen
        
        */
        function subeImagenNoticia($codigo, $idNoticia){

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo $ex->getMessage(), "<br>";
    
            }
    
            $imgContent = addslashes(file_get_contents($codigo));    
    
            $db->query("INSERT INTO imagen(codigo, idNoticia) VALUES ('$imgContent', $idNoticia)");    
        }

        /* 
        
            Función para obtener las imágenes de una noticia de la base de datos
            @param $idNoticia es la clave de la noticia
            
            @return $almacenImagenes, un array que contiene todas las imágenes
        
        */

        function sacaImagenesNoticia($idNoticia){

            $cont = 0;
            $almacenImagenes = [];
    
            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }
    
            $sacaImagenes = $db->query("SELECT codigo FROM imagen WHERE idNoticia = $idNoticia");
    
            while($imagen = $sacaImagenes->fetch_object()){
    
                $almacenImagenes[$cont] = $imagen->codigo;
                $cont++;
    
            }
    
            $db->close();
    
            return $almacenImagenes;
    
        }

    }

?>