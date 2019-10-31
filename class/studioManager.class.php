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
    }

    /**********************************CREATION DE LA FONCTION SUPPRIMER***** *********/

    public function deleteStudio($studio){
        $this->bdd->exec("DELETE FROM studio WHERE id_studio = ".$studio);
    }


    // public function getStudiobyId($id_studio){
    //     $donnes = $this->bdd->exec("SELECT * FROM studio WHERE id_studio =" .$id_studio);
        
    //         }
    }


?>