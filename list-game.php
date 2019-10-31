
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
    // echo "<pre>";
    // print_r($list);
    // echo "</pre>";
 //sforeach ($list as $champ => $valeur)



 
    //$game->getTabListGame();
    ?>
    <section class="border border-dark w-50 m-auto rounded shadow">
        <table class="m-auto table table-striped table-hover">
            <thead class="thead-dark text-white font-weight-bold">
                <th scope="col" class="p-3">Id_game</th>
                <th scope="col" class="p-3 w-100">Titre</th>
                <th scope="col" class="p-3 w-100">Description</th>
                <th scope="col" class="p-3 w-100">Pegi</th>
                <th scope="col" class="p-3 w-100">Lien Jeu</th>
                <th scope="col" class="p-3 w-100">Id catégorie</th>
                <th scope="col" class="p-3 w-100">Type</th>
                <th scope="col" class="p-3 w-100">Id studio</th>
                <th scope="col" class="p-3 w-100">Nom studio</th>
                <th scope="col" class="p-3 w-100">Lien studio</th>
                <th scope="col" class="p-3 text-center w-25">Editer</th>
            </thead>

        <?php 
            foreach ($list as $game){
                echo'<tr>';
                foreach($game as $champ => $valeur){
                    // $method = 'get'.ucfirst($champ);
                        ?> <!-- les champs -->
                        
                            <td class="p-3"><?=$valeur?></td>
                        
                        
                        <?php
                }
                ?><!--  modifier et supprimer -->
                        <td class="text-right align-middle">
                            <div class="d-flex flex-lg-row justify-content-lg-around">
                                <div><a class="cancel" href="update-game.php?id="><i class="fas fa-edit pr-2" title="Modifier"></i></a></div>
                                <div><a href="delete-game.php?id="><i class="delete fas fa-trash-alt" title="Supprimer"></i></a></div>
                            </div>
                            
                        </td>
                <?php
                echo'</tr>';
                }?>    


        </table>
    </section>


	<!-- Footer -->
	<?php include("inc/footer.php"); ?>
