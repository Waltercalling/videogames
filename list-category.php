<?php spl_autoload_register(function($class){require_once'class/'.$class.'.class.php'; }); ?>
<!DOCTYPE html>
<html lang="fr">
<!-- Head load -->
<?php include("inc/head.php"); ?>
<title>Liste des catégories de jeux Vidéo</title>
</head>
<!-- Database connexion -->
<?php include_once("inc/connect.php");?>

<body>
	<!-- Header -->
	<?php include("inc/header.php"); ?>
	<main>

	<h1 class="text-center my-3">Liste des catégories</h1>
	<?php $manager = new categoryManager($bdd); 
          $listCategory = $manager->listCategory();
          // $idCat = $manager->getId_category();
          $categorylist = $manager->getObjCategory();
		  // $idcat = $manager->getId_category($listCategory);
         //  echo'<pre>';
         // var_dump($categorylist);
	?>

<section class="border border-dark w-50 m-auto rounded shadow">
	<table class="m-auto table table-striped table-hover">
		<thead class="thead-dark text-white font-weight-bold">
			<th scope="col" class="p-3">Id</th>
			<th scope="col" class="p-3 w-100">Catégorie</th>
			<th scope="col" class="p-3 text-center w-25">Editer</th>

		</thead>

		<tbody>
			<?php foreach ($categorylist as $key => $value): ?>
			<tr>
				<td class="p-3 font-weight-bold" scope="row"><?= $value->getId_category(); ?></td>
				<td class="p-3"><?= $value->getType(); ?></td>
				<td class="text-right align-middle">
					<div class="d-flex flex-lg-row justify-content-lg-around">
						<div><a class="cancel" href="update-category.php?id=<?= $value->getId_category(); ?>"><i class="fas fa-edit pr-2" title="Modifier"></i></a></div>
						<div><a href="delete-category.php?id=<?= $value->getId_category(); ?>"><i class="delete fas fa-trash-alt" title="Supprimer"></i></a></div>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<section>



	<!-- Footer -->
	<?php include("inc/footer.php"); ?>

</body>
</html>