<?php
// Database connexion
// Check of the database connexion
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=jvcom;charset=utf8', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]);
	// echo'Database is connected';
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>