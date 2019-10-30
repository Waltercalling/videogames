<?php 
        spl_autoload_register(function($classe){
            require_once 'class/'.$classe.'.class.php';
    
        });

        $bdd = new PDO('mysql:host=localhost;dbname=jvcom', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]);

        $studio1 = new Studio([
            'name' => 'Bethesda',
            'link' => 'https://bethesda.net/en/dashboard'
        ]);


        $manager = new StudioManager($bdd);

        $manager->addStudio($studio1);
?>