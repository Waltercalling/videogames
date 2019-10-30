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

    private function setId_game($new_id_game){
        
        $this->id_game = $new_id_game;
        
    }


    // get et set title
    public function getTitle(){
        return $this->title;
    }

    public function setTitle($new_title){
        
        $this->title = $new_title;
        return $this; // pour pouvoir chainer les méthodes
    }


    // get et set description
    public function getDescription(){
        return $this->description;
    }

    public function setDescription($new_description){
        
        $this->description = $new_description;
        return $this; // pour pouvoir chainer les méthodes
    }

    // get et set pegi
    public function getPegi(){
        return $this->pegi;
    }

    public function setPegi($new_pegi){
        
        $this->pegi = $new_pegi;
        return $this; // pour pouvoir chainer les méthodes
    }

    // get et set link
    public function getLink(){
        return $this->link;
    }

    public function setLink($new_link){
        
        $this->link = $new_link;
        return $this; // pour pouvoir chainer les méthodes
    }

    // get et set id_category
    public function getId_category(){
        return $this->id_category;
    }

    private function setId_category($new_id_category){
        
        $this->id_category = $new_id_category;
        return $this; // pour pouvoir chainer les méthodes
    }

    // get et set id_studio
    public function getId_studio(){
        return $this->id_studio;
    }

    private function setId_studio($new_id_studio){
        
        $this->id_studio = $new_id_studio;
        return $this; // pour pouvoir chainer les méthodes
    }


    // FIN DES GET ET SET




    // CONSTRUCTEUR DESTRUCTEUR ET AUTRES METHODES
    
    // Constructeur automatisé
    public function __construct(array $donnees){
        foreach($donnees as $key => $value){
            $method= 'set'.ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }
        return $this; // pour pouvoir chainer les méthodes
    }

    public function __destruct(){
        //Destruction de l'objet
        unset ($this);
    }

    // Pour renvoyer les données sous forme de tableau
    public function getTabListGame(){ 
        return get_object_vars($this);
    }

} // FIN DE CLASSE

