<?php

if(!empty($_POST['confirmarCompra'])){
    PedidoRepository::confirmarCompra();
    include("View/mainView.phtml");
    die;
}

if(!empty($_GET['compra'])){
    include("View/compraView.phtml");
    die;
}

if(!empty($_GET['registro'])){
    include("View/registroView.phtml");
    die;
}

?>