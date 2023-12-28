<?php
    if(!empty($_POST['login'])){
        $_SESSION['user']=UserRepository::checkLogin($_POST['name'],$_POST['password']);
    }else{
        $_SESSION['user']=NULL;
    }

    if(!empty($_GET['logout'])){
        $_SESSION['user']=NULL;
        session_destroy();
        session_start();
    }
?>