<?php 
        spl_autoload_register(function($classe){
            require_once 'class/'.$classe.'.class.php';});

            $bdd = new PDO('mysql:host=localhost;dbname=jvcom', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]);
            $studio = $_GET['id'];
            $manager = new StudioManager($bdd);
            $manager->deleteStudio($studio);
            
            header('location: list-studio.php');