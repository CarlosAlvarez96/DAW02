<?php
    if(!empty($_GET['ban'])){
        UserRepository::banear($_GET['admin']);
    }
    if(!empty($_GET['pardon'])){
        UserRepository::desbanear($_GET['admin']);
    }

    if(!empty($_GET['admin'])){
        include("View/adminView.phtml");
        die;
    }
?>