<?php spl_autoload_register(function($class){require_once'class/'.$class.'.class.php'; }); ?>

<?php require_once("inc/header.php"); ?>
<!-- Database connexion -->
<?php require_once("inc/connect.php");?>


	<h1 class="text-center my-3">Liste des catégories</h1>
	<?php $manager = new categoryManager($bdd); 
          $listCategory = $manager->listCategory();
          // $idCat = $manager->getId_category();
          $categorylist = $manager->getObjCategory();
		  // $idcat = $manager->getId_category($listCategory);

	?>

<section class="border border-dark w-50 m-auto rounded shadow">
	<table class="m-auto table table-striped table-hover bg-light">
		<thead class="thead-dark text-white font-weight-bold">
			<th scope="col" class="p-3">Id</th>
			<th scope="col" class="p-3 w-100">Catégorie</th>
			<th scope="col" class="text-right p-3">Modifier</th>
            <th scope="col" class="text-right p-3">Supprimer</th>

		</thead>

		<tbody>
			<?php foreach ($categorylist as $key => $value): ?>
			<tr>
				<td class="p-3 font-weight-bold" scope="row"><?= $value->getId_category(); ?></td>
				<td class="p-3"><?= $value->getType(); ?></td>
				<td class="text-right align-middle"><a href="update-category.php?id=<?= $value->getId_category(); ?>"><i class="fas fa-edit pr-2" title="Modifier"></i></a></td>
				<td class="text-right align-middle"><a href="delete-category.php?id=<?= $value->getId_category(); ?>"><i class="delete fas fa-trash-alt" title="Supprimer"></i></a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</section>



	<!-- Footer -->
	<?php require_once("inc/footer.php"); ?>
