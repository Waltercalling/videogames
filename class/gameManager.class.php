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

    public function __construct($db){
        $this->setDb($db);
      
    }

    public function __construct($db){
        $db = $this->db; // récupération du connecteur à la base de données
        $db->closeCursor(); // fermeture de l'accès à la base de données
        unset ($this); // destruction de l'objet gameManager appelant
        
        
    }