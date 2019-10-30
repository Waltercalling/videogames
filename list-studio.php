<?php 
        spl_autoload_register(function($classe){
            require_once 'class/'.$classe.'.class.php';
           
    
        });
        require_once 'inc/head.php';
        require_once 'inc/header.php';

        $bdd = new PDO('mysql:host=localhost;dbname=jvcom', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]);

        


        $manager = new StudioManager($bdd);
        $tab_list = $manager->getShowItems();
?>

<body>
    <table class="table">
        <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Lien</th>
                    <th scope="col">Supprimer</th>
                    <th scope="col">Modifier</th>
                
                </tr>       
        </thead>
        <tbody>
            
            <?php 
                foreach($tab_list as $key => $value):
            ?> 
            <tr>
                    <td><?= $value->getName(); ?></td>
                    <td><?= $value->getId_studio(); ?></td>
                    <td><?= $value->getLink(); ?></td>
                    <td><a class="btn btn-danger" href="deleteStudio.php?id=<?= $value->getId_studio();?>">Supprimer</a></td>
                    <td><a class="btn btn-warning" href="upgradeStudio.php?id=<?= $value->getId_studio();?>">Modifier</a></td>
            </tr>
                <?php endforeach;?>
            
           
        </tbody>
    </table>
</body>
<?php require_once 'inc/footer.php'; ?>