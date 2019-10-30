<?php
	
	spl_autoload_register(function($classe){
			require_once 'class/'.$classe.'.class.php';
			
		});

	include_once 'inc/connect.php';

	$device1 = new Device ([
		'name' => 'Playstation 5 (à venir)',
	]);


	$manager = new DeviceManager($bdd);

	//$manager->add($device1);

	$devices = $manager->readObj();



	//$devices = $manager->read();

	//$manager->del($devices[9]);





	echo "<table>";
	echo "<thead>";
	echo "<th> Type de support </th>";
	echo "<th> Modifier nom </th>";
	echo "<th> Supprimer support </th>";
	echo "<thead>";
	echo "<tbody>";

	foreach ($devices as $key => $value) {

		echo "<tr><td>".$value->getName()."</td><td>[...]</td><td>[...]</td></tr>";
	}
	
	echo "<tbody>";
	echo "</table>";
?>