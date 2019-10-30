<?php

Class gameManager{

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

    public function __construct($db){
        $db = $this->db; // récupération du connecteur à la base de données
        $db->closeCursor(); // fermeture de l'accès à la base de données
        unset ($this); // destruction de l'objet gameManager appelant
        
        
    }

    // METHODES



    public function addGame($game){
    // on récupère le connecteur à la base de donnée
        $db = $this->db;
        $tabvar = $game->tabVars();
         $title = $game->getTitle();
         $description = $game->getDescription();
         $pegi = $game->getPegi();
         $link = $game->getLink();
         $id_category = $game->getId_category();
         $id_studio = $game->getId_studio();



    }

    public function getGame($game){
        // on récupère le connecteur à la base de donnée
        $db = $this->db;
    
        }

    public function updateGame($game){
        // on récupère le connecteur à la base de donnée
        $db = $this->db;
    
        }



    public function getListGame($game){
        
        return $game->getTabListGame();
        

    }

    public function deleteGame($game){
        // on récupère le connecteur à la base de donnée
        $db = $this->db;
        

    }

    