<?php
if (!empty($_POST['login'])) {
    //Llamar a un método que valide
    $_SESSION['user'] = UsuarioRepository::checkLogin($_POST['name'], $_POST['password']);
    if (!empty($_SESSION['user'])) {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['id'] = $_SESSION['user']->getId(); // Asegúrate de tener un método getId() en tu clase Usuario
        $_SESSION['img'] = UsuarioRepository::getImgByUserId($_SESSION['id']);
    } else {
        $_SESSION['name'] = NULL;
    }
}

if ($_GET['c'] == "logout") {
    session_destroy();
    include("View/mainView.phtml");
    die;
}
if (!empty($_POST['signUp'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $rol = 1;
    $img = "./public/" . $_POST['profileImg'];
    UsuarioRepository::registrarUsuario($pass, $name, $img, $rol);
}
