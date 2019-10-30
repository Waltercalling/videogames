<?php
	
	spl_autoload_register(function($classe){
			require_once 'class/'.$classe.'.class.php';
			
		});

	include_once 'inc/connect.php';

	$device = new Device ([
		'name' => 'Playstation 4',
	]);


	$manager = new DeviceManager($bdd);

?>