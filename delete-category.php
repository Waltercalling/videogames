<?php spl_autoload_register(function($class){require_once'class/'.$class.'.class.php'; }); 

include_once("inc/connect.php");

	$manager = new categoryManager($bdd);
	$categorydel = $manager->getObjCategory();
	// $idCat = ($categorydel[1]->getId_category());
// echo '<pre>';
	// var_dump($idCat);

	$manager->deleteCategory($categorydel[0]);
	header('Location:list-category.php');
