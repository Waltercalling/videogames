<?php spl_autoload_register(function($class){require_once'class/'.$class.'.class.php'; }); 

include_once("inc/connect.php");

	$manager = new categoryManager($bdd);
	$categorydel = $manager->getObjCategory();
	var_dump($categorydel);
	// $manager->deleteCategory($categorydel[$_GET['id']]);
	// var_dump($categorydel);