<!DOCTYPE html>
<html lang="fr">
<!-- Head load -->
<?php include("inc/head.php"); ?>
<title>Liste des jeux</title>
</head>
<!-- Database connexion -->
<?php include_once("inc/connect.php");?>

<body>
	<!-- Header -->
	<?php include("inc/header.php"); ?>
	<main>

	<h1>Liste des Jeux</h1>

    <?php 
    spl_autoload_register(function($classe){        
        require_once ('class/'.$classe.'.class.php');
    });
   
    

    $gm = new GameManager($bdd);
    
   




    
    $list = $gm->getListGame();
    // echo "<pre>";
    // print_r($list);
    // echo "</pre>";
 foreach ($list as $champ => $valeur)



 
    //$game->getTabListGame();
    ?>
<table style="width:100%">
    <tr> 
        <th style="position:sticky; top:0; background-color:yellow;">Id_game</th>
        <th style="position:sticky; top:0; background-color:yellow;">Titre</th>
        <th style="position:sticky; top:0; background-color:yellow;">Description</th>
        <th style="position:sticky; top:0; background-color:yellow;">Pegi</th>
        <th style="position:sticky; top:0; background-color:yellow;">Lien Jeu</th>
        <th style="position:sticky; top:0; background-color:yellow;">Id catégorie</th>
        <th style="position:sticky; top:0; background-color:yellow;">Type</th>
        <th style="position:sticky; top:0; background-color:yellow;">Id studio</th>
        <th style="position:sticky; top:0; background-color:yellow;">Nom studio</th>
        <th style="position:sticky; top:0; background-color:yellow;">Lien studio</th>
    </tr>

<?php 
    foreach ($list as $game){
        
        echo'<tr>';
            foreach($game as $champ => $valeur){

               // $method = 'get'.ucfirst($champ);
                
                echo '<td>'.$valeur.'</td>';
            }
    
        echo'</tr>';
}
    
    
?>    


</table>


	<!-- Footer -->
	<?php include("inc/footer.php"); ?>

</body>
</html>