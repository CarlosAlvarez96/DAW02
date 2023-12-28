<?php

//Gestiona variables de entrada
//Usa el modelo y aplica cambios a la BD
//Carga la vista correcta

require_once("Model/Cancion.php");
require_once("Model/Usuario.php");
require_once("Model/CancionRepository.php");
require_once("Model/UsuarioRepository.php");
require_once("Model/PlaylistRepository.php");
require_once("Model/Playlist.php");
session_start();

$songs = CancionRepository::getCanciones();

if(!empty($_GET['p'])){
    $songs2 = PlaylistRepository::cancionesPlaylist($_GET["p"]);
}

if(!empty($_GET['c'])){
    if($_GET['c']=="user" || $_GET['c']== "logout"){
        require_once("Controller/userController.php");
    }
    if($_GET['c']=="createList" || $_GET['c']== "logout" || $_GET['c']=="modList"){
        require_once("Controller/playlistController.php");
    }
    if($_GET['c']=="song" || $_GET['c']=="addSong" || $_GET['c']=="modList"){
        require_once("Controller/songController.php");
    }
}

if(!empty($_GET['i'])){
    require_once("Controller/playlistController.php");
}

if(!empty($_SESSION['user'])){
    require_once("Controller/playlistController.php");
}

if(!empty($_GET['p'])){
    require_once("Controller/playlistController.php");
    require_once("Controller/songController.php");
}



include("View/mainView.phtml");

//include("View/newPubView.phtml");

?>