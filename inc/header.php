<?php ob_start() ?>

<!DOCTYPE html>
<html lang="fr">
<!-- Head load -->
	<head>
		<meta charset="utf-8" />
		<!-- <meta name="viewport" content="width=device-width" /> -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Warning => write meta description --> 
		<meta name="description" content="text-description" />
		
		<!-- Favicon must be create -->
		<link rel="icon" href="media/favicon.ico" />
		
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" href="css/bootstrap.css">
			
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<!-- User CSS -->
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title>jeux Vidéo</title>
	</head>
<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-black font-weight-bold p-3">
	  <a class="navbar-brand" href="index.php" title="Retour à l'accueil"><i class="fas fa-headset pr-4"></i>Jeux Vidéo</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
			<li class="nav-item active px-5">
				<a class="nav-link" href="index.php" title="Retour à l'accueil"><i class="fas fa-home pr-3"></i>Accueil</a>
			</li>

			<!-- Menu Game -->
			<li class="nav-item dropdown px-4">
				<a class="nav-link dropdown-toggle" title="Menu des jeux" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Jeux
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="add-game.php"><i class="fas fa-caret-right pr-3"></i>Ajouter</a>
				<a class="dropdown-item" href="list-game.php"><i class="fas fa-caret-right pr-3"></i>Liste</a>
				</div>
			</li>
	      <!-- Menu Category -->
	      <li class="nav-item dropdown px-4">
	        <a class="nav-link dropdown-toggle" title="Menu des catégories" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Catégorie
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="add-category.php" title="Ajouter une catégorie"><i class="fas fa-caret-right pr-3"></i>Ajouter</a>
	          <a class="dropdown-item" href="list-category.php" title="Liste des catégories"><i class="fas fa-caret-right pr-3"></i>Liste</a>
	        </div>

	        <!-- Menu Device -->
	       <li class="nav-item dropdown px-4">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" title="Menu des versions" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Support
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="deviceAdd.php" title="Ajouter une version"><i class="fas fa-caret-right pr-3"></i>Ajouter</a>
				<a class="dropdown-item" href="device.php" title="Liste des versions"><i class="fas fa-caret-right pr-3"></i>Liste</a>
				</div>  
	      </li>
	      	<!-- Menu Studio -->
			<li class="nav-item dropdown px-4">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" title="Menu des éditeurs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Editeur
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="add-studio.php" title="Ajouter un éditeur"><i class="fas fa-caret-right pr-3"></i>Ajouter</a>
				<a class="dropdown-item" href="list-studio.php" title="Liste des éditeurs"><i class="fas fa-caret-right pr-3"></i>Liste</a>
				</div>
			</li>
	    </ul>
	  </div>
	</nav>

</header>

	<main>