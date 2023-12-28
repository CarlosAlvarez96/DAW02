<?php

class User {
    private $id, $name, $rol, $pedidoActual, $orders;

    public function __construct($datos){
        $this -> id = $datos['id'];
        $this -> name = $datos['name'];
        $this -> rol = $datos['rol'];
        $this -> pedidoActual = 0;
        $this -> orders = [];
    }

    public function getId(){
        return $this -> id;
    }

    public function getRol(){
        return $this->rol;
    }

    public function getUsername(){
        return $this->name;
    }

    public function getPedidoActual(){
        return $this -> pedidoActual;
    }
    
    public function setPedidoActual($pedido){
        $this -> pedidoActual = $pedido;
    }
    
    public function getOrders(){
        return $this->orders;
    }

    public function deleteOrders(){
        $this->orders = [];
    }

    public function setOrders($newOrders){
        $this->orders = $newOrders;
    }

    public function __toString(){
        return "Bienvenido, ".$this->name;
    }
}
?>