<?php
class Category {
	private $id_category;
	private $type;

	public function __construct(array $data) {
		foreach ($data as $key => $value){
		$method = 'set'.ucfirst($key);
			if(method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	// Get and Set ID Category
	public function getId_category(){ 
		return $this->id_category;
	}
	public function setId_category(){
		$this->id_category = $id_category;
	}

	// Get and Set ID Type
	public function getType(){ 
		return $this->type;
	}
	public function setType($type){
		if(is_string($manufacturer) && strlen($manufacturer)>=1 && strlen($manufacturer)<= 90){
			$this->type = $type;
		}else{
			echo'Type invalide';
			return die();
		}
		return $this;
	}
}