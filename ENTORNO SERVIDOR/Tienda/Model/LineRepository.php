<?php
class LineRepository{
    public static function F5lines(){
        $_SESSION['user']->getPedidoActual()->deleteLines();
        $bd = Conectar::conexion();
        $q='SELECT * FROM line WHERE idPedido='.$_SESSION['user']->getPedidoActual()->getId();
        $result = $bd -> query($q);
        while($datos=$result->fetch_assoc()){
            $_SESSION['user']->getPedidoActual()->addLine(new Line($datos));
        }
    }

    public static function newLine($datos){
        $bd = Conectar::conexion();
        $q='INSERT INTO line VALUES ('.$datos['idProduct'].',
                                     '.$_SESSION['user']->getPedidoActual()->getId().',
                                     '.$datos['cantidad'].',
                                     0)';
        $bd->query($q);
    }

    public static function getLinesById($id){
        $lines = [];
        $bd=Conectar::conexion();
        $q='SELECT * FROM line WHERE state=1 AND idPedido='.$id;
        $result = $bd -> query($q);
        while($datos=$result->fetch_assoc()){
            $lines[] = new Line($datos);
        }
        return $lines;
    }
}
?>