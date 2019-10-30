<?php 
        spl_autoload_register(function($classe){
            require_once 'class/'.$classe.'.class.php';
      
    
        });
        require_once 'inc/head.php';
        require_once 'inc/header.php';

        $bdd = new PDO('mysql:host=localhost;dbname=jvcom', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]);

       

            if(isset($_POST['studio']) && isset($_POST['link'])){
                $manager = new StudioManager($bdd);
                $studio = new Studio(['name'=>$_POST['studio'], 'link'=>$_POST['link']]);
                $manager->addStudio($studio);
                echo "<h1>Studio bien ajouté</h1>";

            }else{
                echo "<h1>Erreur lors du formulaire</h1>";
            }
       
       
?>
    <body>
        
    
            <div class='container'>
                <form class='form-group' action="#" method="POST">
                    <label for="studio">Nom de studio : </label>
                    <input type="text" name="studio">
                    <label for="link">Lien du site web : </label>
                    <input type="text" name="link">
                    <button class="btn btn-success">Valider</button>
                    <button class="btn btn-warning">Revenir à la liste</button>
                
                
                
                </form>
            
            
            </div>
</body>
<?php require_once 'inc/footer.php'; ?>