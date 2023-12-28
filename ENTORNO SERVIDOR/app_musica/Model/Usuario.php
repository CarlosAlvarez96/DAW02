<?php
class Usuario{
    private $id, $name, $rol, $img;

    public function __construct($datos){
        $this->id = $datos['id'];
        $this->name = $datos['name'];
        $this->rol = $datos['rol'];
        $this->img = $datos['img']; 

    }


    public function getRol(){
        return $this->rol;
    }

    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->id;
    }
    public function getImg()
    {
        return $this->img;
    }
}
