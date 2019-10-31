<?php spl_autoload_register(function($class){require_once'class/'.$class.'.class.php'; }); ?>

<!-- Database connexion -->
<?php include_once("inc/connect.php");?>

<body>
	<!-- Header -->
	<?php include_once("inc/header.php"); ?>
	<main>

	<h1 class="text-center my-3">Ajouter une version</h1>

<section class="w-50 m-auto">
	<?php
	if (isset($_POST['catName']) && !empty($_POST['catName'])){
		$manager = new versionManager($bdd);
		$category = new Version (['date' => $_POST['versDate']]);
		$manager->addCategory($category);
	}
	// else{
	// 	echo'formulaire vide';
	// }

	?>
	<form class="border border-dark rounded bg-light p-5" action="" method="POST">


		 <?php

        $dm = new DeviceManager($bdd);
        $listDevice = $dm->readObj();


        $gm = new GameManager($bdd);
        $listGame = $gm->getObjectGame();

        
        ?>

		<label for="version">Choisissez le support</label>
        <select name="version" id="version" class="form-control">
            <option value="" selected>--Support--</option>
            <?php
            foreach ($listDevice as $idList => $device){
                echo '<option value="'.$device->getId_device().'">'.$device->getName().'</option>';
            }
            ?>
        </select>

        <label for="game">Choisissez le jeu</label>
        <select name="game" id="game" class="form-control">
            <option value="" selected>--Jeu--</option>
            <?php
            foreach ($listGame as $idList => $game){
                echo '<option value="'.$game->getId_game().'">'.$game->getTitle().'</option>';
            }
            ?>
        </select>

		
		<label for="versName">Numéro de version</label>
		<input type="text" name="versName" class="form-control" id="versName"/>

		<label for="versDate">Date</label>
		<input type="date" name="versDate" min="1900" id="versDate" class="form-control text-center"/>

		<div class="row">
			<!-- Cancel Button -->
			<div class="col-12 col-lg-4 mb-2 my-2">
				<a title="Annuler" href="index.php" type="button" name="back" class="cancel btn btn-danger shadow-sm border border-dark w-100"/>Annuler</a>
			</div>
			<!-- Validate Button -->
			<div class="col-12 col-lg-6 offset-lg-2 my-2">
				<input type="submit" name="sendCat" value="Enregistrer la version" class="btn btn-success shadow-sm border border-dark w-100" title="Enregistrer la version"/>
			</div>	
		</div>

	</form>
</section>

	<!-- Footer -->
	<?php include_once("inc/footer.php"); ?>
