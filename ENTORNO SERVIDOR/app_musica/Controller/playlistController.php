<?php
    
    $playlists = PlaylistRepository::playlistUser($_SESSION['user']->getId());

    $playlists2 = PlaylistRepository::playlistNotUser($_SESSION['user']->getId());

    

    if(isset($_POST["create"])){
        PlaylistRepository::addplaylist($_POST,$_FILES);
    }

    if(isset($_GET["i"])){
        PlaylistRepository::addplaylistliked($_GET["i"]);
    }

    if(!empty($_GET['p'])){
        $playlist = PlaylistRepository::getPlayList($_GET['p']);
    }
    if(isset($_POST["modify"])){
        PlaylistRepository::addsongtoplaylist($_POST);
    }

    if(!empty($_GET['c'])){
        if($_GET['c']=="createList"){
            include("View/newList.phtml");
            die;
        }
    }

    if(!empty($_GET['p'])){
        include("View/playListView.phtml");
        die;
    }
