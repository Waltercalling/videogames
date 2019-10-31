<?php spl_autoload_register(function($class){require_once'class/'.$class.'.class.php'; }); ?>

<?php require_once("inc/header.php"); ?>
<!-- Database connexion -->
<?php require_once("inc/connect.php");?>


	<h1 class="text-center my-3">Liste des catégories</h1>
	<?php $manager = new VersionManager($bdd); 
          // $listCategory = $manager->listCategory();
          // $idCat = $manager->getId_category();
          $versionList = $manager->getObjVersion();
		  // $idcat = $manager->getId_category($listCategory);
          // echo'<pre>';
          // var_dump($versionList);
         ?>

<section class="border border-dark w-50 m-auto rounded shadow">
	<table class="m-auto table table-striped table-hover">
		<thead class="thead-dark text-white font-weight-bold">
			<th scope="col" class="p-3">Id</th>
			<th scope="col" class="p-3">Jeu</th>
			<th scope="col" class="p-3">Support</th>
			<th scope="col" class="p-3">Date</th>
			<th scope="col" class="p-3">Version</th>
			<th scope="col" class="p-3 text-center w-25">Editer</th>

		</thead>

		<tbody>
			<?php foreach ($versionList as $key => $value): ?>
			<tr>
				<td class="p-3 font-weight-bold" scope="row"><?= $value->getId_version(); ?></td>
				<td class="p-3"><?= $value->getId_game(); ?></td>
				<td class="p-3"><?= $value->getId_device(); ?></td>
				<td class="p-3"><?= $value->getDate(); ?></td>
				<td class="p-3"><?= $value->getVersion(); ?></td>

				<td class="text-right align-middle">
					<div class="d-flex flex-lg-row justify-content-lg-around">
						<div><a href="update-category.php?id=<?= $value->getId_version(); ?>"><i class="fas fa-edit pr-2" title="Modifier"></i></a></div>
						<div><a href="delete-category.php?id=<?= $value->getId_version(); ?>"><i class="delete fas fa-trash-alt" title="Supprimer"></i></a></div>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</section>



	<!-- Footer -->
	<?php require_once("inc/footer.php"); ?>
