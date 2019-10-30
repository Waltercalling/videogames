<?php
	
	spl_autoload_register(function($classe){
			require_once 'classes/'.$classe.'.class.php';
			
		});

	include_once 'inc/connect.php';

	$device = new Device ([
		'name' => 'Playstation 4',
	]);


	$manager = new GuitareManager($bdd);

?>