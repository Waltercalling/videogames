<?php

Class GameManager{

    private $db;

    // get et set db

    // public function getDb(){  // inutile
    //     return $this->db;
    // }
    private function setDb(PDO $db){
            $this->db = $db;
         
    }  


    //CONSTRUCTEUR ET DESTRUCTEUR
    public function __construct($db){
        $this->setDb($db);
      
    }

    // public function __destruct($db){
    //     $db = $this->db; // récupération du connecteur à la base de données
    //     $db->closeCursor(); // fermeture de l'accès à la base de données
    //     unset ($this); // destruction de l'objet gameManager appelant
        
        
    // }

    // METHODES



    public function addGame(Game $game){
    // on récupère le connecteur à la base de donnée
        $db = $this->db;
        //VAR_DUMP($db);
        //$tabvar = $game->getTabListGame();
        // echo '<pre>';
        // print_r ($tabvar);
        // echo '</pre>';

        
         $title = $game->getTitle();
         $description = $game->getDescription();
         $pegi = $game->getPegi();
         $link = $game->getLink();
         $id_category = $game->getId_category();
         $id_studio = $game->getId_studio();

         $sql = "INSERT INTO game (game.title, game.description, game.pegi, game.link, game.id_category, game.id_studio) VALUES ('".$title."','".$description."','".$pegi."','".$link."',".$id_category.",".$id_studio.")  
         
         ";
         //echo $sql;
        //  $sql = "INSERT INTO jvcom (title, description, pegi, link, id_category, id_studio) VALUES (:title,:description,:pegi,:link,:id_category,:id_studio)  ";
         
         
        //  $sql->bindValue(':title', $title);
        //  $sql->bindValue(':description', $description);
        //  $sql->bindValue(':pegi', $pegi);
        //  $sql->bindValue(':link', $link);
        //  $sql->bindValue(':id_category', $id_category);
        //  $sql->bindValue(':id_studio', $id_studio);
        //  echo $sql;

   
          if (!empty($db)){
            $req = $db->prepare($sql);
            $req->execute(); 
          }

    }

    public function getGame($game){
        // on récupère le connecteur à la base de donnée
        $db = $this->db;
    
        }

    public function updateGame($game, $id_jeu){
         // on récupère le connecteur à la base de données
         $db = $this->db;
         $sql = "UPDATE game
                  SET game.title ='".$game->getTitle()."' , game.description ='".$game->getDescription()."' , game.pegi =".$game->getPegi()." , game.link ='".$game->getLink()."' , game.id_category =".$game->getId_category()." , game.id_studio = ".$game->getId_studio()." WHERE id_game=".$id_jeu;
             
             echo $sql;
             if (!empty($db)){
             $req = $db->prepare($sql);
             $req->execute();
    
        }
    }



    public function getListGame(){
        $db = $this->db;
        //sauvegarde temporaire :
        // $sql = "SELECT game.id_game,game.title, game.description, game.pegi, game.link AS gamelink, game.id_category, category.type, game.id_studio,  studio.name, studio.link AS studiolink FROM game
        //         INNER JOIN category ON game.id_category = category.id_category
        //         INNER JOIN studio ON game.id_studio = studio.id_studio";


        $sql = "SELECT game.id_game,game.title, game.description, game.pegi, game.link AS gamelink,  category.type, studio.name, studio.link AS studiolink FROM game
                INNER JOIN category ON game.id_category = category.id_category
                INNER JOIN studio ON game.id_studio = studio.id_studio";
        // echo "<br/>".$sql;

        if (!empty($db)){
            $req = $db->prepare($sql);
            $req->execute();
                      
            $games = $req->fetchAll(PDO::FETCH_ASSOC); 
            return $games;
        }
    }

    public function getObjectGame(){
        // on récupère le connecteur à la base de données
        $db = $this->db;
        $sql = "SELECT game.id_game,game.title, game.description, game.pegi, game.link AS gamelink, game.id_category, category.type, game.id_studio,  studio.name, studio.link AS studiolink 
                FROM game
                INNER JOIN category ON game.id_category = category.id_category
                INNER JOIN studio ON game.id_studio = studio.id_studio";
        // echo "<br/>".$sql;
        
        if (!empty($db)){
            $req = $db->prepare($sql);
            $req->execute();
            $gameObject =[];
            while ($data = $req->fetch(PDO::FETCH_ASSOC)){
                $gameObject[] = new Game($data);
                }
            return $gameObject;
        }

        
        

    }


    public function getTabById($id){
        // on récupère le connecteur à la base de données
        $db = $this->db;
        $sql = "SELECT game.id_game,game.title, game.description, game.pegi, game.link, game.id_category, game.id_studio
                FROM game
                WHERE id_game=".$id;;
        if (!empty($db)){
            $req = $db->prepare($sql);
            $req->execute();

            $gameWithId = $req->fetch(PDO::FETCH_ASSOC);
            return $gameWithId;
        }
    }


    public function getObjectById($id){
        // on récupère le connecteur à la base de données
        $db = $this->db;
        $sql = "SELECT game.id_game,game.title, game.description, game.pegi, game.link, game.id_category, game.id_studio
                FROM game
                WHERE id_game=".$id;;
        if (!empty($db)){
            $req = $db->prepare($sql);
            $req->execute();

            $gameWithId = [];
            while ($data = $req->fetch(PDO::FETCH_ASSOC)){
                $gameWithId[] = new Game($data);
            }
            return $gameWithId;
        }
    }

    // Delete function 
    public function deleteGame($idGame){
	$del_Game = $this->db->exec('DELETE FROM game WHERE id_game ='.$idGame);
	return $this;
}

}
    