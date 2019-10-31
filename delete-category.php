<?php 
	spl_autoload_register(function($class){
		require_once'class/'.$class.'.class.php'; }); 
	include 'inc/connect.php';
	$id=$_GET['id'];
	
		$manager = new categoryManager($bdd);
//		$devices = new Device (['name' => $_POST['supName']]);
		$manager->deleteCategory($id);
	//	header('location:list-category.php');