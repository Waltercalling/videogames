<?php spl_autoload_register(function($class){require_once'class/'.$class.'.class.php'; }); ?>

<!DOCTYPE html>
<html lang="fr">
<!-- Head load -->
<?php include("inc/head.php"); ?>
<title>Ajouter une catégorie</title>
</head>
<!-- Database connexion -->
<?php include_once("inc/connect.php");?>

<body>
	<!-- Header -->
	<?php include("inc/header.php"); ?>
	<main>

	<h1 class="text-center my-3">Ajouter une catégorie</h1>

<section class="w-50 m-auto">
	<?php
	if (isset($_POST['catName']) && !empty($_POST['catName'])){
		$manager = new categoryManager($bdd);
		$category = new Category (['type' => $_POST['catName']]);
		$manager->addCategory($category);
	}else{
		echo'formulaire vide';
	}

	?>
	<form class="border border-dark rounded bg-light p-5" action="" method="POST">
		
		<label for="catName">Nom de la catégorie</label>
		<input type="text" name="catName" class="form-control" />

		<div class="row">
			<!-- Cancel Button -->
			<div class="col-12 col-lg-4 mb-2 my-2">
				<a title="Annuler" href="index.php" type="button" name="back" class="btn btn-danger shadow-sm border border-dark w-100"/>Annuler</a>
			</div>
			<!-- Validate Button -->
			<div class="col-12 col-lg-6 offset-lg-2 my-2">
				<input type="submit" name="sendCat" value="Enregistrer la catégorie" class="btn btn-success shadow-sm border border-dark w-100" title="Enregistrer la catégorie"/>
			</div>	
		</div>

	</form>
</section>
	<!-- Footer -->
	<?php include("inc/footer.php"); ?>

</body>
</html>