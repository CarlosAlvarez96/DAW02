<?php

class PedidoRepository{
    public static function getPedidoActual(){
        $bd=Conectar::conexion();
        $q='SELECT * FROM pedido WHERE state=0 AND idUser='.$_SESSION['user']->getId();
        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
            return new Pedido($datos);
        }
    }

    public static function confirmarCompra(){
        $bd=Conectar::conexion();
        $total = 0;
        foreach($_SESSION['user']->getPedidoActual()->getLines() as $line){
            $product = ProductRepository::getProductById($line->getIdProduct());
            $nuevoStock = $product->getStock()-$line->getLot();
            $q3 = "";
            if($nuevoStock<0){
                $q3=$q3.'UPDATE product SET stock=0 WHERE id='.$product->getId();
                $total += $product->getStock()*$product->getPrice();
            }else{
                $q3=$q3.'UPDATE product SET stock='.$nuevoStock.' WHERE id='.$product->getId();
                $total += $line->getLot()*$product->getPrice();
            }
            $bd->query($q3);
        }
        $q='UPDATE line
            SET state=1
            WHERE idPedido='.$_SESSION['user']->getPedidoActual()->getId();
        $q2='UPDATE pedido
             SET state=1,
                 datetime=NOW(),
                 total="'.$total.'"
             WHERE id='.$_SESSION['user']->getPedidoActual()->getId();
        $bd->query($q);
        $bd->query($q2);
    }

    public static function newPedido(){
        if(!empty($_SESSION['user'])){
            $bd=Conectar::conexion();
            $q="INSERT INTO pedido VALUES (NULL,".$_SESSION['user']->getId().",0,'0',0)";
            $result=$bd->query($q);
        }
        return PedidoRepository::getPedidoActual();
    }

    public static function getPedidoById($id){
        $bd=Conectar::conexion();
        $q='SELECT * FROM pedido WHERE id='.$id;
        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
            return new Pedido($datos);
        }
    }
    public static function getPedidosByUserId($id){
        $bd=Conectar::conexion();
        $pedidos = [];
        $q='SELECT * FROM pedido WHERE idUser='.$id;
        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
            $pedidos[] = (array)new Pedido($datos);
        }
        return $pedidos;
    }
}

?>