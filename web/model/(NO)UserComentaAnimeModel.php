<?php

    class UserComentaAnime{

        private $idUser;
        private $idAnime;
        private $comentarioAnime;

        public function __construct($idUser, $idAnime, $comentarioAnime){

            $this->idUser = $idUser;
            $this->idAnime = $idAnime;
            $this->comentarioAnime = $comentarioAnime;

        }

    }

?>