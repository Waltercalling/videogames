<?php
class Device {
	private $id_device;
	private $nom;

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

	

}