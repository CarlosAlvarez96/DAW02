<?php
    class Playlist{
        private $id,$tittle,$songs,$id_user,$duration,$img;

        public function __construct($datos){
            $this->id = $datos['id'];
            $this->tittle = $datos['tittle'];
            $this->songs = PlaylistRepository::cancionesPlaylist($this->id);
            $this->id_user = $datos['id_user'];
            $this->duration = 0;
            $this->img = $datos['img'];
        }

        public function getAuthorName(){
            return  UsuarioRepository::getUserById($this->id_user);
        }

        public function getSongs(){
            return $this->songs;
        }

        public function getTittle(){
            return $this->tittle;
        }

        public function getImg(){
            return $this->img;
        }

        public function getId(){
            return $this->id;
        }

        public function getSongNum(){
            return count($this->songs);
        }


        
    }
?>