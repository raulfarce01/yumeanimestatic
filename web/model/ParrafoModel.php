<?php

class Parrafo{

    private $contenido;
    private $idNoticia;

    public function __construct($contenido = "", $idNoticia = 0){

        $this->contenido = $contenido;
        $this->idNoticia = $idNoticia;

    }

    /*
        
        Función para subir un párrafo de una noticia en la base de datos
        @param $parrafos es un array que contiene todos los párrafos de la noticia
        @param $idNoticia es la clave de la noticia
    
    */

    function subeParrafoNoticia($parrafos, $idNoticia){

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo $ex->getMessage(), "<br>";

        }

        foreach($parrafos as $contenido){

            $db->query("INSERT INTO parrafo(contenido, idNoticia) VALUES ('$contenido', $idNoticia)");

        }
    }

    /*
        
        Función para obtener los párrafos que se han asignado a una noticia de la base de datos
        @param $idNoticia es la clave de la noticia de la que vamos a extraer los párrafos

        @return almacenParrafos devuelve un array con todos los párrafos
    
    */

    function sacaParrafosNoticia($idNoticia){

        $almacenParrafos = [];
        $cont = 0;

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $sacaParrafos = $db->query("SELECT contenido FROM parrafo WHERE idNoticia = $idNoticia");

        while($parrafo = $sacaParrafos->fetch_object()){

            //echo $cont . "<br>";
            $almacenParrafos[$cont] = $parrafo->contenido;
            //echo $almacenParrafos[$cont];
            $cont++;

        }

        $db->close();

        return $almacenParrafos;

    }

}

?>