<?php require_once("inc/header.php"); ?>
<!-- Database connexion -->
<?php require_once("inc/connect.php");?>

<?php spl_autoload_register(function($class){
	require_once'class/'.$class.'.class.php'; }); ?>

	<!-- Header -->
	
	
	<?php
	if (isset($_POST['supName']) && !empty($_POST['supName'])){
		$manager = new DeviceManager($bdd);
		$devices = new Device (['name' => $_POST['supName']]);
		$manager->add($devices);
		//$var = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
		header('location:device.php');
	}

	?>
	<h1 class="text-center my-3">Ajouter un support</h1>

<section class="w-50 m-auto">
	
	<form class="border border-dark rounded bg-light p-5" action="" method="POST">
		
		<label for="supName">Nom du support</label>
		<input type="text" name="supName" class="form-control" />

		<div class="row">
			<!-- Cancel Button -->
			<div class="col-12 col-lg-4 mb-2 my-2">
				<a title="Annuler" href="index.php" type="button" name="back" class="btn btn-danger shadow-sm border border-dark w-100"/>Annuler</a>
			</div>
			<!-- Validate Button -->
			<div class="col-12 col-lg-6 offset-lg-2 my-2">
				<input type="submit" name="sendSup" value="Enregistrer le support" class="btn btn-success shadow-sm border border-dark w-100" title="Enregistrer le support"/>
			</div>	
		</div>

	</form>



</section>
	<!-- Footer -->
	<?php include("inc/footer.php"); ?>

