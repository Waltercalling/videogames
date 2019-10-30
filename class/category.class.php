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
	private function setId_category(){
		$this->id_category = $id_category;
	}
	// Get and Set ID Type
	public function getType(){ 
		return $this->type;
	}
	public function setType($type){
		if(is_string($type) && strlen($type)>=1 && strlen($type)<= 90){
			$this->type = $type;
		}else{
			echo'Type invalide';
			return die();
		}
		return $this;
	}
}