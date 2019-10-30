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

/*****************CREATION DE LA FONCTION AJOUT ******************/

    public function addStudio(Studio $studio){
        $addStudio = $this->bdd->prepare('INSERT INTO studio(name, link)
                                         VALUES (:name, :link)');
        $addStudio->bindValue(':name', $studio->getName(), PDO::PARAM_STR);
        $addStudio->bindValue(':link', $studio->getLink(), PDO::PARAM_STR);
        $addStudio->execute();
        $addStudio->closeCursor();
    }
}


?>