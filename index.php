<?php spl_autoload_register(function($class){require_once'class/'.$class.'.class.php'; }); ?>
	<!-- database connexion  -->
	<?php include_once("inc/connect.php");?>
	<!-- Header -->
	<?php include("inc/header.php"); ?>


	<h1 class="text-center">Liste des jeux</h1>
	<?php 
	$manager = new versionManager($bdd);
	$megaList = $manager->getAllDetails();
	?>

<section class="border border-dark w-50 m-auto rounded shadow">
        <table class="m-auto table table-striped table-hover bg-light">
            <thead class="thead-dark text-white font-weight-bold">
                    <tr>
                    	<th scope="col">Éditeur</th>
                    	<th scope="col">Plateforme</th>
                        <th scope="col" class="w-25">Jeu</th>
                        <th scope="col" class="w-25">Catégorie</th>
                        <th scope="col" class="w-50">Date de sortie</th>
                        <th scope="col" class="w-50">Version</th>
                        <th scope="col">Pegi</th>
                    </tr>       
            </thead>
             <tbody>
                    <?php foreach($megaList as $key => $game): ?> 
                    <tr>
                    	<td><?= $game['editeur']; ?></td>
                    	<td><?= $game['plateforme']; ?></td>
                        <td><?= $game['titre']; ?></td>
                        <td><?= $game['style']; ?></td>
                        <td><?= $game['date']; ?></td>
                        <td><?= $game['version']; ?></td>
                        <td><?= $game['pegi']; ?></td>
                    </tr>
                        <?php endforeach;?>
            </tbody>
        </table>  
    </section>   
	<!-- Footer -->
	<?php include("inc/footer.php"); ?>

