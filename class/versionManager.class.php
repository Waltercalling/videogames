<?php
class VersionManager{
	private $db;
	public function __construct($db) {
    $this->setDb($db);
  }
	public function setDb(PDO $db) {
    $this->db = $db;
  }

public function addVersion(Version $version) {
	 $add_version = $this->db->prepare('INSERT INTO version(version.id_game, version.id_device, version.date, version.version) VALUES(:id_game, :id_device, :date, :version)');
	 $add_version->bindValue(':id_game', $version->getId_game(), PDO::PARAM_INT);
	 $add_version->bindValue(':id_device', $version->getId_device(), PDO::PARAM_INT);
	 $add_version->bindValue(':date', $version->getDate(), PDO::PARAM_STR);
	 $add_version->bindValue(':version', $version->getVersion(), PDO::PARAM_STR);
	 $add_version->execute();
	  // Close cursor after category insert
	 $add_version->closeCursor();
	 header('Location:list-version.php');
	}

public function listVersion(){
	return $this->db->query('SELECT * FROM version')->fetchAll(PDO::FETCH_ASSOC);
}

// Delete function 
public function deleteVersion($idVersion){
	$del_Version = $this->db->exec('DELETE FROM version WHERE id_version ='.$idVersion);
	return $this;
}

public function updateListVersion(){
	return $this->db->query('SELECT version.date, version.version FROM version WHERE id_version ='.$_GET['id'])->fetch(PDO::FETCH_ASSOC);
}

// Update version function
public function updateVersionById(Version $version){
		$new_version = $this->db->prepare('UPDATE version SET version.date = :date, version.version = :version WHERE id_version ='.$_GET['id']);

		$new_version->bindValue(':date', $version->getDate(), PDO::PARAM_STR);
		$new_version->bindValue(':version', $version->getVersion(), PDO::PARAM_STR);
		$new_version->execute();
	
		}

// Object version list
public function getObjVersion(){
    $versionObject = [];
    $version = $this->db->prepare('SELECT version.id_version, version.id_game, version.id_device, version.date, version.version, game.title, device.name FROM version
								INNER JOIN game ON version.id_game = game.id_game
								INNER JOIN device ON version.id_device = device.id_device');
    $version->execute();
    while ($data = $version->fetch(PDO::FETCH_ASSOC)){
      $versionObject[] = new Version($data);
    }
    return $versionObject;
  }

// Table version list
public function getListVersion(){
    return $this->db->query('SELECT version.id_version, version.id_game, version.id_device, version.date, version.version, game.title, device.name FROM version
								INNER JOIN game ON version.id_game = game.id_game
								INNER JOIN device ON version.id_device = device.id_device')->fetchAll(PDO::FETCH_ASSOC);
    }

public function getAllDetails() {
    $versions = $this->db->query('SELECT game.title AS titre, game.pegi, device.name AS plateforme, version.date, version.version, studio.name AS editeur, category.type AS style 
                      FROM game 
                      JOIN version ON game.id_game = version.id_game
                      JOIN device ON version.id_device = device.id_device
                      JOIN studio ON studio.id_studio = game.id_studio
                      JOIN category ON category.id_category =  game.id_category
                      ORDER BY title ASC;')->fetchAll(PDO::FETCH_ASSOC);
    return $versions;
  }   

}