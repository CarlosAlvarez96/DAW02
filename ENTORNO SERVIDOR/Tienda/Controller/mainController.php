<?php
    require_once("Model/User.php");
    require_once("Model/UserRepository.php");
    require_once("Model/Product.php");
    require_once("Model/ProductRepository.php");
    require_once("Model/Pedido.php");
    require_once("Model/PedidoRepository.php");
    require_once("Model/Line.php");
    require_once("Model/LineRepository.php");
    session_start();

    
    if(!empty($_GET['c']) && $_GET['c']=="user"){
        require_once("Controller/userController.php");
    }

    $products = ProductRepository::getProducts();

    $pedido = 0;
    if(!empty($_SESSION['user'])){
        $pedido = PedidoRepository::getPedidoActual();
        if(empty($pedido)){
            $pedido = PedidoRepository::newPedido();
        }
        $_SESSION['user']->setPedidoActual($pedido);
        LineRepository::F5lines();
        UserRepository::F5orders();
    }

    if(!empty($_GET['c']) && $_GET['c']=="product"){
        require_once("Controller/productController.php");
    }else if(!empty($_GET['c']) && $_GET['c']=="pedido"){
        require_once("Controller/compraController.php");
    }else if(!empty($_GET['c']) && $_GET['c']=="admin"){
        require_once("Controller/adminController.php");
    }else if(!empty($_GET['c']) && $_GET['c']=="api"){
        require_once("Controller/apiController.php");
    }

    include("View/mainView.phtml");
?>