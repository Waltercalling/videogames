<?php
	spl_autoload_register(function($class){
		require_once'class/'.$class.'.class.php'; }); ?>
<!-- Database connexion -->
<?php include_once("inc/connect.php");?>


	<!-- Header -->
	<?php include("inc/header.php"); ?>


	<h1 class="text-center my-3">Liste des supports</h1>
	<?php $manager = new DeviceManager($bdd); 
         $devices = $manager->readObj();

	//$manager->add($device1);

	//$devices = $manager->read();

	//$manager->del($devices[9]);

	?>
<section class="border border-dark m-auto w-50 rounded shadow bg-light">
	<table class="table table-striped table-hover bg-light">
		<thead class="thead-dark text-white font-weight-bold">
			<th class="p-3">Id</th>
			<th class="p-3 w-100">Support</th>
			<th scope="col" class="text-right p-3">Modifier</th>
            <th scope="col" class="text-right p-3">Supprimer</th>


		</thead>

		<tbody>
			<?php foreach ($devices as $key => $value): ?>
			<tr>
				<td class="p-3"><?= $value->getId_device(); ?></td>
				<td class="p-3"><?= $value->getName(); ?></td>
				<td class="text-right align-middle"><a href="deviceUpdate.php?id=<?= $value->getId_device() ;?>"><i class="fas fa-edit pr-2" title="Modifier"></i></a></td>
				<td class="text-right align-middle"><a class="delete" href="deviceDelete.php?id=<?= $value->getId_device();?>"><i class="fas fa-trash-alt" title="Supprimer"></i></a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</section>
	<!-- Footer -->
	<?php include("inc/footer.php"); ?>



