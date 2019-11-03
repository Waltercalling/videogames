
<?php include_once("inc/connect.php");?>


	<!-- Header -->
	<?php include("inc/header.php"); ?>
	

	<h1 class="text-center my-3">Liste des Jeux</h1>

    <?php 
    spl_autoload_register(function($classe){        
        require_once ('class/'.$classe.'.class.php');
    });
   
    $gm = new GameManager($bdd);
    
    $list = $gm->getListGame();

    ?>
    <section class="border border-dark w-75 m-auto rounded shadow">
        <table class="m-auto table table-striped table-hover bg-light">
            <thead class="thead-dark text-white font-weight-bold">
                <th scope="col" class="p-3">Id_game</th>
                <th scope="col" class="p-3 ">Titre</th>
                <th scope="col" class="p-3 ">Description</th>
                <th scope="col" class="p-3 ">Pegi</th>
                <th scope="col" class="p-3 ">Lien Jeu</th>
                <th scope="col" class="p-3 ">Type</th>
                <th scope="col" class="p-3 ">Nom studio</th>
                <th scope="col" class="p-3 ">Lien studio</th>
                <th scope="col" class="text-right p-3">Modifier</th>
                <th scope="col" class="text-right p-3">Supprimer</th>
            </thead>

        <?php 
            foreach ($list as $key => $game){
                echo'<tr>';
                foreach($game as $champ => $valeur){
                        ?> <!-- les champs -->
                            <td class="p-3"><?=$valeur?></td>
                        <?php
                }
                ?><!--  modifier et supprimer -->
                        <td class="text-right align-middle"><a href="update-game.php?id=<?=$game['id_game']?>"><i class="fas fa-edit pr-2" title="Modifier"></i></a></td>
                        <td class="text-right align-middle"><a href="delete-game.php?id=<?=$game['id_game']?>"><i class="delete fas fa-trash-alt" title="Supprimer"></i></a></td>
                <?php
                echo'</tr>';
                }?>    

        </table>
    </section>


	<!-- Footer -->
	<?php include("inc/footer.php"); ?>
