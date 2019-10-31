<?php spl_autoload_register(function($class){
	require_once'class/'.$class.'.class.php'; }); ?>


<?php include_once("inc/connect.php");?>

	<!-- Header -->
	<?php include("inc/header.php"); ?>

	<h1 class="text-center my-3">Modifier un support</h1>

<section class="w-50 m-auto">
	
	<form class="border border-dark rounded bg-light p-5" action="" method="POST">
		
		<label for="updName">Nouveau Nom</label>
		<?php 		
		$manager = new DeviceManager($bdd);
		$id = $_GET['id'];
	//	$devices = $manager->readObj();

?>
		<input type="text" name="updName" class="form-control" placeholder="[attends l'encien nom]" />

		<div class="row">
			<!-- Cancel Button -->
			<div class="col-12 col-lg-4 mb-2 my-2">
				<a title="Annuler" href="device.php" type="button" name="back" class="btn btn-danger shadow-sm border border-dark w-100"/>Annuler</a>
			</div>
			<!-- Validate Button -->
			<div class="col-12 col-lg-6 offset-lg-2 my-2">
				<input type="submit" name="updSup" value="Modifier le support" class="btn btn-success shadow-sm border border-dark w-100" title="Enregistrer le support"/>
			</div>	
		</div>

	</form>

	<?php
	if (isset($_POST['updName']) && !empty($_POST['updName'])){
		$manager = new DeviceManager($bdd);
		$devices = new Device (['name' => $_POST['updName']]);
		$manager->updateById($devices);
	}else{
		echo'formulaire vide';
	}

	?>

</section>
	<!-- Footer -->
	<?php include("inc/footer.php"); ?>
