<?php

    /**
     * 
     * La funcionalidad de las listas aún no está disponible, pero esta página recibía una llamada de AJAX para crear la lista (funcionaba, pero no sirve de nada hasta que no se creen otras páginas específicamente para la creación y adición de listas, algo que a mi parecer es antiestético; o se use nodeJS para poder interactuar con elementos en el servidor creados con PHP)
     * 
     */

    require_once "../model/ListaModel.php";

    $nombre = $_GET['nombreLista'];
    $idUser = $_GET['idUser'];

    $lista = new Lista();

    $lista->creaLista($idUser, $nombre);

?>