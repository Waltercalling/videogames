<?php
// Database connexion
$bdd = new PDO('mysql:host=localhost;dbname=DATABASENAME;charset=utf8', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]);
// host=server, dbname=database name, charset=encoding type, root'= user name, ''= password

// Check of the database connexion
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=DATABASENAME;charset=utf8', 'root', '');
	echo'Database is connected';
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>