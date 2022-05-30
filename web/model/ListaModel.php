<?php

    class Lista{

        private $nombre;
        private $desc;
        private $idUser;
    
        public function __construct($nombre = '', $idUser = 0, $desc = ''){
    
            $this->nombre = $nombre;
            $this->idUser = $idUser;
            $this->desc = $desc;
            
        }

        /*
        
            Función para subir una lista nueva a la base de datos
            @param $idUser, que contiene la clave del usuario para asignarle la lista
            @param $nombre contiene el nombre que se va a dar a la lista
            @param $desc contiene la descripción de la lista
        
        */
        function creaLista($idUser, $nombre){

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }

            $db->query("INSERT INTO lista(nombreL, idUser) VALUES ('$nombre', $idUser)");

        }

        /*
        
            Función para crear las cabeceras de la lista para la página del perfil, en el apartado "Mis listas".
            @param $idUser contiene la clave del usuario

            @return $listas, que contiene toda la información de las listas para montar la cabecera
        
        */
        function montaCabecerasListaPerfil($idUser){

            $listas = [];
            $cont = 0;

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }

            $consulta = $db->query("SELECT u.nombre AS nombre, l.nombreL as nombreL, l.descL as descL, l.idUser as idUser, l.fechaCreacL as fechaCreac, l.idLista as idLista FROM lista l NATURAL JOIN user u WHERE l.idUser = $idUser");

            while($recorreConsulta = $consulta->fetch_object()){

                $lista = array(
                    "idLista" => $recorreConsulta->idLista,
                    "nombre" => $recorreConsulta->nombreL,
                    "desc" => $recorreConsulta->descL,
                    "autor" => $recorreConsulta->nombre,
                    "fecha" => $recorreConsulta->fechaCreac
                );

                $listas[$cont] = $lista;
                $cont++;

            }

            return $listas;

        }

        /*
        
            Función para crear las cabeceras de la lista para la página específica de la misma.
            @param $idLista contiene la clave de la lista

            @return $listas, que contiene toda la información de las listas para montar la cabecera
        
        */

        function montaCabecerasLista($idLista){

            $listas = [];
            $cont = 0;

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }

            $consulta = $db->query("SELECT u.nombre as autor, l.nombreL as nombreLista, l.descL as descL, l.idUser as idUser, l.fechaCreacL as fecha FROM lista l NATURAL JOIN user u WHERE l.idLista = $idLista");

            while($recorreConsulta = $consulta->fetch_object()){

                $lista = array(
                    "nombre" => $recorreConsulta->nombreLista,
                    "desc" => $recorreConsulta->descL,
                    "autor" => $recorreConsulta->autor,
                    "fecha" => $recorreConsulta->fecha
                );

                $listas[$cont] = $lista;
                $cont++;

            }

            return $listas;

        }

        /**
         * 
         * ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡IMPORTANTE!!!!!!!!!!!!!!!!!!!!!!!!!!
         * ESTA FUNCIÓN TARDE UN POCO EN CARGAR PORQUE LLAMA TANTO A LA BD COMO A LA API, NO USAR EN EXCESO, PAGINAR BIEN SI SE VA A USAR MUCHO
         * Función para recoger la imagen de portada de la lista (se selecciona la imagen del primer anime que haya en la lista)
         * @param idLista contiene el identificador de la lista del que vamos a recibir la imagen
         * 
         */
        function recogeImagenLista($idLista){

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
             }

            $consulta = $db->query("SELECT idAnime FROM animeLista WHERE idLista = $idLista LIMIT 1");

            $recorre = $consulta->fetch_object();

            $idAnime = $recorre->idAnime;

            //echo "<script>$idAnime</script>";

            $key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjE4MTIiLCJuYmYiOjE2NTIzNjA3MDYsImV4cCI6MTY1NDk1MjcwNiwiaWF0IjoxNjUyMzYwNzA2fQ.ApUPWyUu7VIUY1Sd5Hkr1fs3aJD1WI0PH4yReJ_Cpic";
            $query = $_GET['query'];
            $page = $_GET['page'];
            //$link =  "https://api.aniapi.com/v1/user_story"; 

            //echo "<script>console.log($idAnime)</script>";
        
            //$link =  "https://api.aniapi.com/v1/anime?anilist_id=$idAnime&nsfw=true&with_episodes=false"; 
            $link = "https://api.aniapi.com/v1/anime?anilist_id=$idAnime&nsfw=true&with_episodes=false";        

            //'Authorization: Bearer <' . $key . '>',
            $headers = array(
                'Authorization: Bearer ' . $key,
            );

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            $response = curl_exec($ch);

            $anime = json_decode($response, true);

            //echo "<script>llego</script>";

            $imagen = "<img src='".$anime["data"]["documents"][0]["cover_image"]."'>";

            return $imagen;

        }

        /**
         * 
         * ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡IMPORTANTE!!!!!!!!!!!!!!!!!!1
         * NO UTILIZAR EN EXCESO PORQUE REALIZA CONSULTAS MUY GRANDES, PAGINAR BIEN PARA EVITAR DEMASIADA LENTITUD
         * Po mira, esta función lo que hace es mostrar las listas que hay creadas para ponerlas en la página de listas
         * 
         */
        function recogeListas(){

            $contenedorListas = [];
            $cont = 0;

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }

            $consulta = $db->query("SELECT nombreL, idLista FROM lista");

            while($listas = $consulta->fetch_object()){

                $consulta2 = $db->query("SELECT idAnime FROM animeLista WHERE idLista = $listas->idLista LIMIT 1");

                $anime = $consulta2->fetch_object();

                $idAnime = $anime->idAnime;


                $key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjE4MTIiLCJuYmYiOjE2NTIzNjA3MDYsImV4cCI6MTY1NDk1MjcwNiwiaWF0IjoxNjUyMzYwNzA2fQ.ApUPWyUu7VIUY1Sd5Hkr1fs3aJD1WI0PH4yReJ_Cpic";
            $query = $_GET['query'];
            $page = $_GET['page'];
            //$link =  "https://api.aniapi.com/v1/user_story"; 

            //echo "<script>console.log($idAnime)</script>";
        
            //$link =  "https://api.aniapi.com/v1/anime?anilist_id=$idAnime&nsfw=true&with_episodes=false"; 
            $link = "https://api.aniapi.com/v1/anime?anilist_id=$idAnime&nsfw=true&with_episodes=false";
        
            //'Authorization: Bearer <' . $key . '>',
            $headers = array(
                'Authorization: Bearer ' . $key,
            );

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            $response = curl_exec($ch);

            $anime = json_decode($response, true);

            $imagen = "<img src='".$anime["data"]["documents"][0]["cover_image"]."'>";

                $contenedorListas[$cont] = array(
                    "nombre" => $listas->nombreL,
                    "imagen" => $imagen,
                    "idLista" => $listas->idLista,
                );

                $cont++;

            }

            $db->close();

            return $contenedorListas;

        }

        /**
         * 
         * Po esta función lo que hace es recoger los animes que hay dentro de una lista
         * @param idLista contiene la lista de la que queremos extraer los animes
         * 
         */
        function recogeAnimesLista($idLista){

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }
            
            $cont = 0;

            $key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjE4MTIiLCJuYmYiOjE2NTIzNjA3MDYsImV4cCI6MTY1NDk1MjcwNiwiaWF0IjoxNjUyMzYwNzA2fQ.ApUPWyUu7VIUY1Sd5Hkr1fs3aJD1WI0PH4yReJ_Cpic"
            ;
            $query = $_GET['query'];
            $page = $_GET['page'];
            //$link =  "https://api.aniapi.com/v1/user_story"; 

            $consulta = $db->query("SELECT idAnime FROM animeLista WHERE idLista = $idLista");

            while($recorre = $consulta->fetch_object()){

                $idAnime = $recorre->idAnime;

                $link =  "https://api.aniapi.com/v1/anime?anilist_id=$idAnime&nsfw=true&with_episodes=false"; 
                
            
    
            //'Authorization: Bearer <' . $key . '>',
            $headers = array(
                'Authorization: Bearer ' . $key,
            );
    
            $ch = curl_init();
    
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            $response = curl_exec($ch);
    
            $animesJSON = json_decode($response, true);
    
            //var_dump($response["data"]["documents"]);

            $animes[$cont] = array(
                "nombre" => $animesJSON["data"]["documents"][0]["titles"]["rj"],
                "imagen" => $animesJSON["data"]["documents"][0]["cover_image"],
                "idAnime" => $idAnime,
            );

            $cont++;

            }

            $db->close();

            return $animes;

        }

        function recogeListasUser($idUser){

            $contenedorListas = [];
            $cont = 0;

            try{
                $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");
    
                if($db->connect_errno){
    
                    throw new Exception("No se ha podido acceder a la base de datos");
    
                }
            }catch(Exception $ex){
    
                echo "Excepción $ex <br>";
    
            }

            $consulta = $db->query("SELECT nombreL, idLista FROM lista WHERE idUser = $idUser");

            while($listas = $consulta->fetch_object()){

                $consulta2 = $db->query("SELECT idAnime FROM animeLista WHERE idLista = $listas->idLista LIMIT 1");

                $anime = $consulta2->fetch_object();

                $idAnime = $anime->idAnime;


                $key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjE4MTIiLCJuYmYiOjE2NTIzNjA3MDYsImV4cCI6MTY1NDk1MjcwNiwiaWF0IjoxNjUyMzYwNzA2fQ.ApUPWyUu7VIUY1Sd5Hkr1fs3aJD1WI0PH4yReJ_Cpic";
            $query = $_GET['query'];
            $page = $_GET['page'];
            //$link =  "https://api.aniapi.com/v1/user_story"; 

            //echo "<script>console.log($idAnime)</script>";
        
            //$link =  "https://api.aniapi.com/v1/anime?anilist_id=$idAnime&nsfw=true&with_episodes=false"; 
            $link = "https://api.aniapi.com/v1/anime?anilist_id=$idAnime&nsfw=true&with_episodes=false";
        
            //'Authorization: Bearer <' . $key . '>',
            $headers = array(
                'Authorization: Bearer ' . $key,
            );

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            $response = curl_exec($ch);

            $anime = json_decode($response, true);

            $imagen = "<img src='".$anime["data"]["documents"][0]["cover_image"]."'>";

                $contenedorListas[$cont] = array(
                    "nombre" => $listas->nombreL,
                    "imagen" => $imagen,
                    "idLista" => $listas->idLista,
                );

                $cont++;

            }

            $db->close();

            return $contenedorListas;

        }

    }

?>