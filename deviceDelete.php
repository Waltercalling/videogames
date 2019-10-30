<?php 
	spl_autoload_register(function($class){
		require_once'class/'.$class.'.class.php'; }); 
	include 'inc/connect.php';
	$id=$_GET['id'];
	
		$manager = new DeviceManager($bdd);
//		$devices = new Device (['name' => $_POST['supName']]);
		$manager->delById($id);
		header('location:device.php');
  