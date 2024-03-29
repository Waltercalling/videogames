
<?php 
    spl_autoload_register(function($classe){        
        require_once ('class/'.$classe.'.class.php');
    });
   
    ?>

<!-- Database connexion -->
<?php include_once("inc/connect.php");?>


	<!-- Header -->
	<?php include("inc/header.php"); ?>


	<h1 class="text-center my-3">Modifier les données d'un jeu</h1>

    <!-- ici il faut récupérer les infos étendues du jeu, et mettre en value etc... chaque champ -->

    <?php 
        
        // récupération du connecteur à la base de donnée (dans $bdd)
        include_once("inc/connect.php");
        // autochargement des classes
        spl_autoload_register(function($classe){        
            require_once ('class/'.$classe.'.class.php');
        });
        // récupération de l'id du jeu passé en get
        $id_game = $_GET['id'];
        // echo $id_game;
        


        // aller dans la base de données récupérer la ligne avec l'id correspondant, donc préparer un update:
        // pour ça :
        // créer un nouvel objet gamemanager lié à la base de donnée
        $gm = new gameManager($bdd);
        
        


        
        // dans la classe gamemanager, ajouter une méthode qui renvoie le tableau correspondant à l'id
        $tabById = $gm-> getTabById($id_game);
        // echo $tabById['pegi'];
        // echo "<pre>";
        // print_r($tabById);
        // echo "</pre>";

        //$ObjectById = $gm-> getObjectById($id_game);
        // echo "<pre>";
        // print_r($ObjectById);
        // echo "</pre>";
        
        //echo $tabById['title'];
        

    ?>
    <form class="border border-dark rounded bg-light p-5" action="" method="POST">
        <label for="title">TITRE :</label>
        <?php echo"<input id='title' name='title' type='text' class='form-control' value= '".$tabById['title']."' />";?>
        <br/>

        <label for="description">DESCRIPTION</label>
        <textarea id='description' name='description' class="form-control" ><?=$tabById['description']?></textarea>
        <br/>

        <label for="pegi">PEGI</label>
        <?php echo"<input id='pegi' name='pegi' type='number' class='form-control' value=".$tabById['pegi'];?>
        <br/>

        <label for="link">LIEN</label>
        <?php echo"<input id='link' name='link' type='text' class='form-control' value= ".$tabById['link']?>
        <br/>

        <!-- ajouter les clés étrangères -->
        <?php
        // récupérer la liste des catégories et la liste des editeurs, et les mettre dans un select
        
        // je rapatrie ici un TABLEAU ASSOCIATIF D'OBJETS (méthode getObjCategory())
        $cm = new categoryManager($bdd);
        $listCat = $cm->getObjCategory();
        // echo"<pre>";
        // print_r($listCat);
        // echo"</pre>";

        
        // je rapatrie ici un TABLEAU ASSOCIATIF D'OBJETS(méthode getShowItems())
        $em = new studioManager($bdd);
        $listEd = $em->getShowItems();
        // echo"<pre>";
        // print_r($listEd);
        // echo"</pre>";
        
        ?>
        <!-- category en mode update -->
        <!-- il faut mettre en selected true l'option qui correspond à l'id_category -->
        <label for="category">Choisissez la catégorie</label>

        <select name="category" id="category" class="form-control">
            <?php
            foreach ($listCat as $idList => $catObj){

                if ($catObj->getId_category() == $tabById['id_category']){  // si égalité entre l'id de la catégorie dans la liste, et la clé étrangère id_category du jeu , option en selected
                    echo '<option selected value="'.$catObj->getId_category().'">'.$catObj->getType().'</option>';
                }
                else{ // sinon option normale

                    echo '<option value="'.$catObj->getId_category().'">'.$catObj->getType().'</option>';
                }
                
            }
            ?>
            
            
        </select>
        <br/>

        <!-- studio en mode update -->
        <!-- il faut mettre en selected true l'option qui correspond à l'id_studio -->
        <label for="studio">Choisissez l'éditeur</label>
            <!-- <?php print_r($listEd);?> -->
        <select name="studio" id="studio" class="form-control">
            
            <?php

            foreach ($listEd as $idList => $EdObj){
                if ($EdObj->getId_studio() == $tabById['id_studio']){  // si correspondance entre l'id du studio dans la liste, et la clé étrangère id_studio du jeu , option en selected
                    echo '<option selected value="'.$EdObj->getId_studio().'">'.$EdObj->getName().'</option>';
                }
                else{ // sinon option normale
                    echo '<option value="'.$EdObj->getId_studio().'">'.$EdObj->getName().'</option>';
                }
            }
            ?>
            
            
        </select>

        <div class="row">
			<!-- Cancel Button -->
			<div class="col-12 col-lg-4 mb-2 my-2">
				<a title="Annuler" href="list-game.php" type="button" name="back" class="btn btn-danger shadow-sm border border-dark w-100">Annuler</a>
			</div>
			<!-- Validate Button -->
			<div class="col-12 col-lg-6 offset-lg-2 my-2">
				<input type="submit" name="sendCat" value="Mettre à jour" class="btn btn-success shadow-sm border border-dark w-100" title="Mettre à jour les données du jeu"/>
			</div>	
		</div>



    </form>
<?php
// traitement
if (isset($_POST['title']) && !empty($_POST['title'])){


    $gm = new GameManager($bdd);
    $gameIn = ['title'=>$_POST['title'],'description'=>$_POST['description'],'pegi'=>$_POST['pegi'],'link'=>$_POST['link'],'id_category'=>$_POST['category'],'id_studio'=>$_POST['studio']];
    // echo"<pre>";
    // print_r($gameIn);
    // echo"</pre>";

    $game= New Game($gameIn); 
    echo "<pre>";
    print_r($game);
    echo "</pre>";
    $gm->updateGame($game, $id_game);
    header('Location:list-game.php');
    exit;
}
     





?>


	<!-- Footer -->
	<?php include("inc/footer.php"); ?>

