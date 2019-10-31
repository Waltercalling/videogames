<?php
class Version {
	private $id_version;
	private $id_game;
	private $id_device;
	private $date;
	private $version;


	public function __construct(array $data) {
		foreach ($data as $key => $value){
		$method = 'set'.ucfirst($key);
			if(method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	// Get and Set ID Version
	public function getId_version(){ 
		return $this->id_version;
	}
	private function setId_version($id_version){
		$this->id_version = $id_version;
	}


	// get et set id_game
    public function getId_game(){
        return $this->id_game;
    }
    private function setId_game($id_game){
        $this->id_game = $id_game;
        return $this; // pour pouvoir chainer les méthodes
    }


    // get et set id_device
    public function getId_device(){
        return $this->id_device;
    }
    private function setId_device($id_device){
        $this->id_device = $id_device;
        return $this; // pour pouvoir chainer les méthodes
    }


	// Get and Set Date
	public function getDate(){ 
		return $this->date;
	}
	public function setDate($date){
		$this->date = $date;
		return $this;
	}



	// Get and Set Name
	public function getVersion(){ 
		return $this->version;
	}
	public function setVersion($version){
		if(is_string($version) && strlen($version)>=1 && strlen($version)<=10){
			$this->version = $version;
		}else{
			echo'Version invalide';
		}
		return $this;  // pour pouvoir chainer les méthodes
	}
}