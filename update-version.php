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
	if (isset($_POST['version']) && !empty($_POST['version'])){
		$manager = new VersionManager($bdd);
		$addVersion = new Version(['date' => $_POST['versDate'], 'version' => $_POST['versNum']]);
		$listVersion = $manager->updateListVersion();
		var_dump($listVersion);
		// $manager->updateVersionById($addVersion);
	}
	// else{
	// 	echo'formulaire vide';
	// }

	?>
	<form class="border border-dark rounded bg-light p-5" action="" method="POST">


		<label for="versDate">Date</label>
		<input type="date" name="versDate" min="1900" id="versDate" value="<?= $listVersion['date']; ?>" class="form-control text-center"/>
		
		<label for="versNum">Numéro de version</label>
		<input type="text" name="versNum" class="form-control" id="versNum"  value="<?= $listVersion['version']; ?>"/>

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
