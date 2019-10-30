<?php 
class Studio{
    private $id_studio;
    public $name;
    public $link;



/***********CREATION DE LA FONCTION HYDRATE *****************************/

            public function hydrate(array $donnes){
                foreach($donnes as $key => $value){
                    $method = 'set'.ucfirst($key);
                    if(method_exists($this, $method)){
                        $this->$method($value);
                    }
                }
            }



    /******************CREATION DES SETTERS *******************/
    public function setName($name){
        if(is_string($name) && strlen($name)>=1 && strlen($name)<=100){
            $this->name = $name;   
        }else{
            echo "Le nom du studio n'existe pas";
        }
        return $this;
    }


    public function setLink($link){
        if(preg_match('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', $link)){
            $this->link = $link;
        }else{
            echo "Le lien est invalide";
        }
        return $this;
    }
    private setId_studio($id_studio){
        $this->id_studio = $id_studio;
    }



    /*******************CREATION DES GETTERS *****************/
    public function getName(){
        return $this->name;
    }

    public function getId_studio(){
        return $this->id_studio;
    }

    public function getLink(){
        return $this->link;
    }



    /***************CREATION DU CONSTRUCT ***************************************************/
    public function __construct(array $donnes){
        $this->hydrate($donnes);
        
    }
}





?>