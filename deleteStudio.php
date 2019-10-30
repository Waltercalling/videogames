<?php 
        spl_autoload_register(function($classe){
            require_once 'class/'.$classe.'.class.php';});

            $bdd = new PDO('mysql:host=localhost;dbname=jvcom', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]);
            $manager = new StudioManager($bdd);
            $manager->deleteStudio($manager->getStudiobyId($_GET['id']));
            
            