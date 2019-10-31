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
    <h1 class="text-center my-3">Liste des éditeurs</h1>
    <section class="border border-dark w-50 m-auto rounded shadow">
        <table class="m-auto table table-striped table-hover">
            <thead class="thead-dark text-white font-weight-bold">
                    <tr>
                        <th>Id</th>
                        <th scope="col" class="w-25">Nom</th>
                        <th scope="col" class="w-50">Lien</th>
                        <th scope="col" class="">Supprimer</th>
                        <th scope="col" class="">Modifier</th>
                    
                    </tr>       
            </thead>
             <tbody>
                    <?php foreach($tab_list as $key => $value): ?> 
                    <tr>
                        <td><?= $value->getId_studio(); ?></td>
                        <td><?= $value->getName(); ?></td>
                        <td><?= $value->getLink(); ?></td>
                        <td><a class="cancel" href="deleteStudio.php?id=<?= $value->getId_studio();?>"><i class="delete fas fa-trash-alt" title="Supprimer"></i></a></td>
                        <td><a class="" href="upgradeStudio.php?id=<?= $value->getId_studio();?>"><i class="fas fa-edit pr-2" title="Modifier"></i></a></td>
                    </tr>
                        <?php endforeach;?>
            </tbody>
        </table>  
    </section>   
</body>
<?php require_once 'inc/footer.php'; ?>