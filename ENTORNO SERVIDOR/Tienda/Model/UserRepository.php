<?php

class UserRepository{
    public static function checkLogin($u,$p){
        $bd=Conectar::conexion();
        $q="SELECT * FROM user WHERE name='".$u."'";
        $result=$bd->query($q);
        if($datos=$result->fetch_assoc()){
            if($datos['password']==md5($p)){
                return new User($datos);
            }
        }else return NULL;
    }

    public static function F5orders(){
        $_SESSION['user']->deleteOrders();
        $pedidos = [];
        $bd=Conectar::conexion();
        $q='SELECT * FROM pedido WHERE state=1 AND idUser='.$_SESSION['user']->getId();
        $result = $bd -> query($q);
        while($datos=$result->fetch_assoc()){
            $pedidos[] = new Pedido($datos);
        }
        $_SESSION['user']->setOrders($pedidos);
    }

    public static function getUsers(){
        $users=[];
        $bd=Conectar::conexion();
        $q="SELECT * FROM user";
        $result=$bd->query($q);
        while($datos=$result -> fetch_assoc()){
            $users[] = new User($datos);
        }
        return $users;
    }

    public static function banear($id){
        $bd=Conectar::conexion();
        $q="UPDATE user SET rol=0 WHERE id=".$id;
        $bd->query($q);
    }
    public static function desbanear($id){
        $bd=Conectar::conexion();
        $q="UPDATE user SET rol=1 WHERE id=".$id;
        $bd->query($q);
    }
}
?>