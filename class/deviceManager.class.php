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


		public function read(){
			$read_device = $this->_db->query('SELECT * FROM device');
			return $read_device->fetchAll(PDO::FETCH_ASSOC);
		}

			public function readObj(){
					$devices = [];
					$read_object = $this->_db->query('SELECT * FROM device');
					while ($obj = $read_object->fetch(PDO::FETCH_ASSOC)) {
					    $devices[] = new Device($obj);

					}
					return $devices;
				}

		public function del(Device $device){
		$this->_db->exec('DELETE FROM device WHERE id_device='.$device->getId_device());
		}

/*		public function update(Device $device){
		$new_device = $this->_db->prepare('UPDATE device SET id_device = :id_device, name = :name, WHERE id_device ='.$device->getId_device());
		$new_device->bindValue(':id_device', $device->getId_device(), PDO::PARAM_INT);
		$new_device->bindValue(':name', $device->getName(), PDO::PARAM_STR);
	
		}*/

		public function delById($id){
		$this->_db->exec('DELETE FROM device WHERE id_device ='.$id); 
		}

			public function updateById(Device $device){
		$new_device = $this->_db->prepare('UPDATE device SET /*id_device = :id_device,*/ name = :name WHERE id_device ='.$_GET['id']);
		//var_dump($device->getId_device());
		var_dump($new_device);
/*		$new_device->bindValue(':id_device', $device->getId_device(), PDO::PARAM_INT);
*/		$new_device->bindValue(':name', $device->getName(), PDO::PARAM_STR);
		$new_device->execute();
	
		}
	}