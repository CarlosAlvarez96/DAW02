<?php
    class Product{
        private $id, $name, $description, $image, $price, $stock;
        public function __construct($datos){
            $this -> id = $datos['id'];
            $this -> name = $datos['name'];
            $this -> description = $datos['description'];
            $this -> image = $datos['image'];
            $this -> price = $datos['price'];
            $this -> stock = $datos['stock'];
        }

        public function getId(){
            return $this -> id;
        }

        public function getName(){
            return $this -> name;
        }

        public function getDescription(){
            return $this -> description;
        }

        public function getImage(){
            return $this -> image;
        }

        public function getPrice(){
            return $this -> price;
        }

        public function getStock(){
            return $this -> stock;
        }
    }
?>