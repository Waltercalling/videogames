<?php 
        spl_autoload_register(function($classe){
            require_once 'class/'.$classe.'.class.php';
      
    
        });
        require_once 'inc/header.php';

        $bdd = new PDO('mysql:host=localhost;dbname=jvcom', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]);

       

            if(isset($_POST['studio']) && isset($_POST['link'])){
                $manager = new StudioManager($bdd);
                $studio = new Studio(['name'=>$_POST['studio'], 'link'=>$_POST['link']]);
                $manager->addStudio($studio);
                echo "Studio bien ajouté";

            }else{
                echo "Erreur lors du formulaire";
            }
       
       
?>
    <body>
            <h1 class="text-center my-3">Ajouter un éditeur</h1>
        
            <div class='container'>
                <form class="border border-dark rounded bg-light p-5" action="#" method="POST">
                    <label for="studio">Nom de studio : </label>
                    <input type="text" name="studio" id="link" class="form-control">
                    <label for="link">Lien du site web : </label>
                    <input type="text" name="link" id="link" class="form-control">
                    <div class="row">
                        <!-- Cancel Button -->
                        <div class="col-12 col-lg-4 mb-2 my-2">
                            <a title="Annuler" href="index.php" type="button" name="back" class="btn btn-danger shadow-sm border border-dark w-100"/>Annuler</a>
                        </div>
                        <!-- Validate Button -->
                        <div class="col-12 col-lg-6 offset-lg-2 my-2">
                            <input type="submit" name="sendCat" value="Enregistrer éditeur" class="btn btn-success shadow-sm border border-dark w-100" title="Enregistrer éditeur"/>
                        </div>  
                    </div>
                </form>
            </div>
</body>

<?php require_once 'inc/footer.php'; ?>