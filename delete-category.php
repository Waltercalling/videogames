<?php spl_autoload_register(function($class){require_once'class/'.$class.'.class.php'; }); 

include_once("inc/connect.php");

	$manager = new categoryManager($bdd);
	$idCat = $_GET['id'];

	$manager->deleteCategory($idCat);
	header('Location:list-category.php');
