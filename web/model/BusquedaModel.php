<?php

class Busqueda{

    private $busca;

    public function __construct($busca = ''){

        $this->busca = $busca;

    }

    /*
    
        Función para buscar las noticias con el texto indicado en la búsqueda
        @param $busca contiene un String que se usa como condición para la búsqueda

        @return $almacenNoticia es un array bidimensional que contiene el título y las imágenes de la noticia con los caracteres que coinciden con la búsqueda
    
    */
    function realizaBusquedaNoticia($busca){

        $almacenNoticia = [];
        $cont = 0;

        try{
            $db = new mysqli('localhost', "yumeanime", "123456", "yumeanimedb");

            if($db->connect_errno){

                throw new Exception("No se ha podido acceder a la base de datos");

            }
        }catch(Exception $ex){

            echo "Excepción $ex <br>";

        }

        $consulta = $db->query("SELECT n.titulo AS titulo, i.codigo AS imagen, n.idNoticia AS idNoticia FROM noticia n NATURAL JOIN imagen i WHERE n.titulo LIKE '%".$busca."%' ORDER BY n.fechaCreacN DESC");

        //echo "<script>console.log('%$busca%')</script>";

        while($noticia = $consulta->fetch_object()){

            $almacenNoticia[$cont] = array(
                "titulo" => $noticia->titulo,
                "imagen" => $noticia->imagen,
                "idNoticia" => $noticia->idNoticia,
            );

            //echo $almacenNoticia[$cont]['titulo']."<br>";

            //echo "<script>console.log('".var_dump($almacenNoticia)."')</script>";

            $cont++;

        }

        $db->close();

        return $almacenNoticia;

    }

}

?>