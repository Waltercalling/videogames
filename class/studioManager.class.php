<?php 
/*****************CREATION DE LA CLASS MANAGER ******************/

class StudioManager{
    private $bdd;
/*****************CREATION DU CONSTRUCT ******************/
    public function __construct($bdd){
        $this->setBdd($bdd);
    }
    public function setBdd(PDO $bdd){
        $this->bdd = $bdd;
    }

/*****************CREATION DE LA FONCTION Afficher ******************/
    public function getShowItems(){
        $studios = [];
        $listStudio = $this->bdd->query('SELECT * FROM studio;');
        while($donnes = $listStudio->fetch(PDO::FETCH_ASSOC)){
            $studios[] = new Studio($donnes);
        };
        return $studios;
    }



/**********************************CREATION DE LA FONCTION AJOUTER***** *********/

    public function addStudio(Studio $studio){
        $addStudio = $this->bdd->prepare('INSERT INTO studio(name, link)
                                         VALUES (:name, :link)');
        $addStudio->bindValue(':name', $studio->getName(), PDO::PARAM_STR);
        $addStudio->bindValue(':link', $studio->getLink(), PDO::PARAM_STR);
        $addStudio->execute();
        $addStudio->closeCursor();
        header('location: list-studio.php');
    }

    /**********************************CREATION DE LA FONCTION SUPPRIMER***** *********/

    public function deleteStudio($studio){
        $this->bdd->exec("DELETE FROM studio WHERE id_studio = ".$studio);
    }


    public function updateStudio(Studio $studio){
         $updateStudio = $this->bdd->prepare("UPDATE studio SET name = :name,
                                            link = :link WHERE id_studio = ".$_GET['id']);
        $updateStudio->bindValue(':name', $studio->getName(), PDO::PARAM_STR);
        $updateStudio->bindValue(':link', $studio->getLink(), PDO::PARAM_STR);
        $updateStudio->execute();
        $updateStudio->closeCursor();
    }
    
    } 


?>