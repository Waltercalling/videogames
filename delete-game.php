<?php 
        spl_autoload_register(function($classe){
            require_once 'class/'.$classe.'.class.php';});

        include_once("inc/connect.php");

        $gm = new gameManager($bdd);
        $idGame = $_GET['id'];
        $gm->deleteGame($idGame);

        
        header('Location:list-game.php');