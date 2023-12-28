<?php
    class Cancion{
        private $id, $tittle, $author,$duration,$img,$user_id,$file;

        public function __construct($datos){
            $this->id = $datos['id'];
            $this->tittle = $datos['tittle'];
            $this->author = $datos['author']; 
            $this->duration = $datos['duration'];
            $this->img = $datos['img'];
            $this->user_id= $datos['id_user'];
            $this->file = $datos['file'];
        }

        public function getId(){
            return $this->id;
        }

        public function getfile(){
            return $this->file;
        }

        public function getTittle(){
            return $this->tittle;
        }

        public function getImg(){
            return $this->img;
        }

        public function getDuration(){
            return $this->duration;
        }
    }
?>