<?php spl_autoload_register(function($class){
	require_once'class/'.$class.'.class.php'; }); ?>


<?php include_once("inc/connect.php");?>

	<!-- Header -->
	<?php include("inc/header.php"); ?>

	<h1 class="text-center my-3">Modifier une catégorie</h1>

<section class="w-50 m-auto">
	
	<form class="border border-dark rounded bg-light p-5" action="" method="POST">
		
		<label for="newCat">Nouveau Nom</label>
		<?php 		
		$manager = new categoryManager($bdd);
		$id = $_GET['id'];
		//$category = $manager->getObjCategory();
		$oldname = $manager->readObjById();


		foreach ($oldname as $key => $value) {
			
		
?>
		<input type="text" name="newCat" class="form-control" value="<?= $value->getType();?>" /> <?php } ?>

		<div class="row">
			<!-- Cancel Button -->
			<div class="col-12 col-lg-4 mb-2 my-2">
				<a title="Annuler" href="list-category.php" type="button" name="back" class="btn btn-danger shadow-sm border border-dark w-100"/>Annuler</a>
			</div>
			<!-- Validate Button -->
			<div class="col-12 col-lg-6 offset-lg-2 my-2">
				<input type="submit" name="test" value="Modifier la catégorie" class="btn btn-success shadow-sm border border-dark w-100" title="Enregistrer la nouvelle catégorie"/>
			</div>	
		</div>

	</form>

	<?php
	if (isset($_POST['newCat']) && !empty($_POST['newCat'])){
		$manager = new categoryManager($bdd);
		$categorys = new Category (['type' => $_POST['newCat']]);
		//var_dump($category);
		$manager->updateVersionById($categorys);
	}else{
		echo'formulaire vide';
	}

	?>

</section>
	<!-- Footer -->
	<?php include("inc/footer.php"); ?>
