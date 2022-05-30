<?php

    class UserGustaAnime{

        private $idUser;
        private $idAnime;

        public function __construct($idUser, $idAnime){

            $this->idUser = $idUser;
            $this->idAnime = $idAnime;

        }

        function darLike($idUser, $idAnime){

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }



        }
        
    }

?>