<?php

class userGuardaLista{

    private $idLista;
    private $idAnime;
    
    public function __construct($idLista, $idAnime){
    
        $this->idLista = $idLista;
        $this->idAnime = $idAnime;
            
    }

    /*
        
        Función para subir los animes que contiene una lista a la base de datos
        @param $idLista contiene la clave de la lista en la que vamos a insertar el anime
        @param $idAnime contiene el anime que vamos a insertar
    
    */

    function insertaAnimesLista($idLista, $idAnime){

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $comprueba = $db->query("SELECT idAnime FROM userGuardaLista WHERE idLista = $idLista");
        while($recorre = $comprueba->fetch_object()){

            if($recorre->idAnime == $idAnime){

                echo "<p>El anime ya está en la lista</p>";

            }else{

                $db->query("INSERT INTO userGuardaLista(idLista, idAnime) VALUES ($idLista, $idAnime)");

            }

        }

        $db->close();

    }

    //
    //  Función para sacar el id de los animes
    //

    /*function sacaAnimesLista($idLista){

        $cont = 0;
        $animesLista = [];

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $consulta = $db->query("SELECT idAnime FROM userGuardaLista WHERE idLista = $idLista");

        while($recorre = $consulta->fetch_object()){

            $animesLista[$cont] = $recorre->idAnime;
            $cont++;

        }

        return $animesLista;

    }*/

    /*
        
        Función para obtener los animes de una lista para montarlo en la página dedicada a la lista
        @param $idLista contiene la clave de la lista de la que queremos obtener sus animes.

        @return $animes, un array que contiene la información de los animes
    
    */

    function montaLista($idLista){

        $animes = [];
        $cont = 0;

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $consulta = $db->query("SELECT idAnime FROM lista WHERE idLista = $idLista");

        while($recorre = $consulta->fetch_object()){

            //Aquí va la api para sacar los animes que tienen ese ID
            //$animes[$cont] = API

        }

        return $animes;

    }

}

?>