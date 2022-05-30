<?php

    class userGustaNoticia{

        private $idUser;
        private $idNoticia;

        public function __construct($idUser, $idNoticia){

            $this->idUser = $idUser;
            $this->idNoticia = $idNoticia;

        }
        
        /*
        
            Función para dar y quitar el like de una noticia
            @param $idUser contiene la clave del usuario que da o quita el like.
            @param $idNoticia contiene la noticia donde se realiza esta acción.
        
        */

        function darLikeNoticia($idUser, $idNoticia){

            $tieneLike = false;

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }

            $consulta = $db->query("SELECT idUser FROM userGustaNoticia WHERE idNoticia = $idNoticia");

            while($recorre = $consulta->fetch_object()){

                if($recorre->idUser == $idUser){

                    $tieneLike = true;

                }

            }

            if($tieneLike){

                $db->query("DELETE FROM userGustaNoticia WHERE idUser = $idUser AND idNoticia = $idNoticia");

            }else{

                $db->query("INSERT INTO userGustaNoticia(idUser, idNoticia) VALUES ($idUser, $idNoticia)");

            }

            $db->close();
        }

        function cuentaLike($idNoticia){

            $nLikes = 0;

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }

            $consulta = $db->query("SELECT COUNT(idUser) FROM userGustaNoticia WHERE idNoticia = $idNoticia");

            if($nLikes = $consulta->fetch_object()){

                return $nLikes;

            }else{

                return 0;

            }

            $db->close();

        }

    }

?>