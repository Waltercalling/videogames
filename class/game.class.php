<?php
class GAME{

    private $id_game;
    private $title;         // le titre du jeu
    private $description;   // la description du jeu
    private $pegi;
    private $link;
    private $id_category;
    private $id_studio;

    // get et set id_game
    public function getId_game(){
        return $this->id_game;
    }

    public function setId_game($new_id_game){
        
        $this->id_game = $new_id_game;
        return $this;
    }


    // get et set title
    public function getTitle(){
        return $this->title;
    }

    public function setTitle($new_title){
        
        $this->title = $new_title;
        return $this;
    }


    // get et set description
    public function getDescription(){
        return $this->description;
    }

    public function setDescription($new_description){
        
        $this->description = $new_description;
        return $this;
    }

    // get et set pegi
    public function getPegi(){
        return $this->pegi;
    }

    public function setPegi($new_pegi){
        
        $this->pegi = $new_pegi;
        return $this;
    }

    // get et set link
    public function getLink(){
        return $this->link;
    }

    public function setLink($new_link){
        
        $this->link = $new_link;
        return $this;
    }

    // get et set id_categoy
    public function getId_categoy(){
        return $this->id_categoy;
    }

    public function setId_categoy($new_id_categoy){
        
        $this->id_categoy = $new_id_categoy;
        return $this;
    }

    // get et set id_studio
    public function getId_studio(){
        return $this->id_studio;
    }

    public function setId_studio($new_id_studio){
        
        $this->id_studio = $new_id_studio;
        return $this;
    }


    // FIN DES GET ET SET

}

