<?php
class Device {
	private $id_device;
	private $name;

		//Un tableau de données doit être passé à la fonction (d'où le prefixe "array").
	public function __construct(array $donnees) {
		foreach ($donnees as $key => $value){
			//On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);
			//si le setter correspondant existe
			if(method_exists($this, $method)){
				//On appelle le setter.
				$this->$method($value);
			}
		}
	}



	public function getId_device(){ return $this->id_device;}
	public function getName(){ return $this->name;}

	private function setId_device($id){
		$this->id_device = $id;
		return $this;
	}
	public function setName($name){
		if (is_string($name) && strlen($name)>=1 && strlen($name)<=100){		
			$this->name = $name;

		}else{
			echo 'Nom incorrect';
		}
	return $this;
	}
}