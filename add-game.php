<!DOCTYPE html>
<html lang="fr">
<!-- Head load -->
<?php include("inc/head.php"); ?>
<title>Ajout de jeu video</title>
</head>
<!-- Database connexion -->
<?php include_once("inc/connect.php");?>

<body>
	<!-- Header -->
	<?php include("inc/header.php"); ?>
	<main>

	<h1>Ajouter un Jeu</h1>

    <?php 
    spl_autoload_register(function($classe){        
        require_once ('class/'.$classe.'.class.php');
    });
   
    $gameIn = ['title'=>'titre du jeu','description'=>'un super jeu','pegi'=>18,'link'=>'http://www.jeuxvideo.com','id_category'=>1,'id_studio'=>1];
    $game= New Game($gameIn); 
    $gm = new GameManager($bdd);
    
    $gm->addGame($game);





?>


	<!-- Footer -->
	<?php include("inc/footer.php"); ?>

</body>
</html>