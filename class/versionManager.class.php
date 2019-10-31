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

//Fonction Getid
// public function getId_category(){
// 	return $this->db->query('SELECT category.id_category FROM category WHERE id ='.$category->getId_category())->fetch(PDO::FETCH_ASSOC);

// }

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
}