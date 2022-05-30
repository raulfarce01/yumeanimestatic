<?php

class Noticia{

    private $titulo;
    private $idUser;

    public function __construct($titulo = "", $idUser = 0){

        $this->titulo = $titulo;
        $this->idUser = $idUser;

    }

    /*
        
        Función para subir las noticias a la base de datos
        @param $titulo contiene el título de la noticia.
        @param $idUser contiene la clave del usuario al que se le asigna la noticia (autor)
    
    */

    public function subeNoticia($titulo, $idUser){

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $db->query("INSERT INTO noticia(titulo, idUser) VALUES ('$titulo', $idUser)");

        $db->close();

    }

    /*
        
        Función para obtener la información de la cabecera de la noticia
        @param $idNoticia contiene la clave de la noticia

        @return $montaNoticia es un array que contiene el título, la fecha de creación y el autor de la noticia
    
    */
    function sacaTitularNoticia($idNoticia){

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $sacaAutor = $db->query("SELECT idUser FROM noticia WHERE idNoticia = $idNoticia");
        $idUser = $sacaAutor->fetch_object();
        $consulta = $db->query("SELECT n.titulo as titulo, n.fechaCreacN as fecha, u.nombre as nombre FROM noticia n NATURAL JOIN user u WHERE n.idNoticia = $idNoticia");

        if($recorreConsulta = $consulta->fetch_object()){

            $montaNoticia = array(
                "titulo" => $recorreConsulta->titulo,
                "fecha" => $recorreConsulta->fecha,
                "autor" => $recorreConsulta->nombre,
            );

            //echo "<script>console.log(".$montaNoticia["fecha"].")</script>";

        }

        return $montaNoticia;

    }

    /**
     * 
     * Esta función recoge todo el contenido de las noticias para mostrarlas en el index
     * 
     * @return montaNoticiaIndex contiene un array con las noticias
     * 
     */
    function sacaTitularNoticiaIndex(){

        $cont = 0;

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $consulta = $db->query("SELECT titulo, fechaCreacN, idNoticia FROM noticia ORDER BY fechaCreacN DESC");

        while($recorreConsulta = $consulta->fetch_array()){

            //echo $recorreConsulta[0] . "<br>";

            //echo $recorreConsulta[2]. "<br>";

            $consultaImg = $db->query("SELECT codigo FROM imagen WHERE idNoticia = $recorreConsulta[2]");

            if($imagen = $consultaImg->fetch_object()){      
                
                $consultaPar = $db->query("SELECT contenido FROM parrafo WHERE idNoticia = $recorreConsulta[2] LIMIT 1");

                $parrafo = $consultaPar->fetch_object();          
                
                //var_dump($parrafo->contenido);

                $montaNoticiaIndex[$cont] = array(
                    "titulo" => $recorreConsulta[0],
                    "imagen" => $imagen->codigo,
                    "parrafo" => $parrafo->contenido,
                    "idNoticia" => $recorreConsulta[2],
                );

            }else if($parrafo = $consultaPar->fetch_object() && !($imagen == $consultaImg->fetch_object())){

                //echo "$parrafo->contenido";

                $montaNoticiaIndex[$cont] = array(
                    "titulo" => $recorreConsulta[0],
                    "parrafo" => $parrafo->contenido
                );

            }

            $cont++;

        }

        return $montaNoticiaIndex;

    }

    /*
    
        Función para sacar las noticias con más "me gusta"

        @return $almacenNoticias, un array con el título y la imagen de las 5 noticias más populares
    
    */
    public static function noticiasPopu(){

        $cont = 0;
        $masGustado = [];
        $almacenNoticias = [];

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $consultaNoticia = $db->query("SELECT COUNT(idNoticia), idNoticia FROM userGustaNoticia GROUP BY idNoticia ORDER BY COUNT(idNoticia) DESC");

        $likes = $consultaNoticia->fetch_object();

        while($cont < 5){

            $masGustado = $likes->idNoticia;

            $noticiasGustadas = $db->query("SELECT n.titulo as titulo, i.codigo as codigo, n.idNoticia as idNoticia FROM noticia n NATURAL JOIN imagen i WHERE idNoticia = $masGustado");

            $correNoticias = $noticiasGustadas->fetch_object();

            $almacenNoticias[$cont] = array(
                "titulo" => $correNoticias->titulo,
                "imagen" => $correNoticias->codigo,
                "idNoticia" => $correNoticias->idNoticia,
            );
            
            $cont++;

            $likes = $consultaNoticia->fetch_object();

        }

        return $almacenNoticias;        

    }

}

?>