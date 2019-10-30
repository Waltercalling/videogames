<?php
	class DeviceManager {
		private $_db; //Instance de PDO.

		public function __construct($db) {
			$this->setDb($db);
		}
		public function setDb(PDO $db){
			$this->_db = $db;
		}

	public function add(Device $device){
		//préparation de la requête d'insertion.
		$add_device = $this->_db->prepare('INSERT INTO device(name) VALUES (:name)');
		$add_device->bindValue(':name', $device->getName(), PDO::PARAM_STR);
		// Execution de la requête
		$add_device->execute();
		//closeCursor() libère la connexion au serveur, permettant aisni à d'autres requêtes SQL d'être exectuées
		$add_device->closeCursor();
		echo '<p>Device Added</p>';

	}






	}