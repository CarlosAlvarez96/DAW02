   
<?php
    if(isset($_POST["add"])){
        CancionRepository::addSong($_POST,$_FILES);
    }


   if(!empty($_GET['c'])){
        if($_GET['c']=="song" && isset($_POST["buscar"])){
            $songs = CancionRepository::searchSong($_POST["tituloSong"],$_POST["order"]);
        }
        if($_GET['c']=="addSong"){
            include("View/addSong.phtml");
            die;
        }
    }




?>