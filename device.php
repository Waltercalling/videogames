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
<table class="w-50 m-auto">
		<thead class="bg-dark text-white">
			<th class="p-3">Id</th>
			<th class="p-3 w-100">Support</th>
			<th class="p-3 text-center"></th>


		</thead>

		<tbody>
			<?php foreach ($devices as $key => $value): ?>
			<tr>
				<td class="p-3"><?= $value->getId_device(); ?></td>
				<td class="p-3"><?= $value->getName(); ?></td>
				<td class="text-right align-middle">
					<div class="d-flex flex-lg-row justify-content-lg-around">
						<div><a href="deviceUpdate.php?id=<?= $value->getId_device() ;?>"><i class="fas fa-edit pr-2" title="Modifier"></i></a></div>
						<div><a class="delete" href="deviceDelete.php?id=<?= $value->getId_device();?>"><i class="fas fa-trash-alt" title="Supprimer"></i></a></div>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<!-- Footer -->
	<?php include("inc/footer.php"); ?>



