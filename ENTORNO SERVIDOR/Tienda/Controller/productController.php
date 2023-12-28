<?php
    if(!empty($_POST['newProduct'])){
        ProductRepository::newProduct($_POST,$_FILES);
        include("View/mainView.phtml");
        die;
    }

    if(!empty($_POST['comprar'])){
        LineRepository::newLine($_POST);
        LineRepository::F5lines();
        include("View/mainView.phtml");
        die;
    }

    if(!empty($_GET['newProduct'])){
        include("View/newProductView.phtml");
        die;
    }

    if(!empty($_GET['product'])){
        include("View/productView.phtml");
        die;
    }
?>