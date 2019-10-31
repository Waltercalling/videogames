
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
        $id_jeu = $_GET['id'];
        echo $id_jeu;
        


        // aller dans la base de données récupérer la ligne avec l'id correspondant, donc préparer un update:
        // pour ça :
        // créer un nouvel objet gamemanager lié à la base de donnée
        $gm = new gameManager($bdd);
        $objectId = $gm-> getObjectById($id_jeu);
        echo "<pre>";
        print_r($objectId);
        echo "</pre>";


        // faire update de l'id
        // dans la classe gamemanager, ajouter une méthode qui renvoie l'objet correspondant à l'id

        // puis l'unsetter 

    ?>
    <form class="border border-dark rounded bg-light p-5" action="" method="POST">
        <label for="title">TITRE :</label>
        <input id='title' name='title' type="text" class="form-control"/>
        <br/>

        <label for="description">DESCRIPTION</label>
        <textarea id='description' name='description' class="form-control"></textarea>
        <br/>

        <label for="pegi">PEGI</label>
        <input id='pegi' name='pegi' type="number" class="form-control"/>
        <br/>

        <label for="link">LIEN</label>
        <input id='link' name='link' type="text" class="form-control"/>
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

        <label for="category">Choisissez la catégorie</label>

        <select name="category" id="category" class="form-control">
            <option value="" selected>--Catégorie--</option>
            <?php
            foreach ($listCat as $idList => $catObj){
                echo '<option value="'.$catObj->getId_category().'">'.$catObj->getType().'</option>';
            }
            ?>
            
            
        </select>
        <br/>
        <label for="studio">Choisissez l'éditeur</label>

        <select name="studio" id="studio" class="form-control">
            <option value="" selected>--Editeur--</option>
            <?php
            foreach ($listEd as $idList => $EdObj){
                echo '<option value="'.$EdObj->getId_studio().'">'.$EdObj->getName().'</option>';
            }
            ?>
            
            
        </select>

        <div class="row">
			<!-- Cancel Button -->
			<div class="col-12 col-lg-4 mb-2 my-2">
				<a title="Annuler" href="index.php" type="button" name="back" class="cancel btn btn-danger shadow-sm border border-dark w-100">Annuler</a>
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
    $gm->addGame($game);
    header('Location:list-game.php');
    exit;
}
     





?>


	<!-- Footer -->
	<?php include("inc/footer.php"); ?>

