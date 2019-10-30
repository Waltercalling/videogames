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
        $db = $this->db;
        unset ($this); // destruction de l'objet
        $this->setDb($db);
        
    }