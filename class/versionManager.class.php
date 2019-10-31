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
	}

public function listVersion(){
	return $this->db->query('SELECT * FROM version')->fetchAll(PDO::FETCH_ASSOC);
}

// // Delete function 
// public function deleteVersion($idCat){
// 	$del_Category = $this->db->exec('DELETE FROM category WHERE id_category ='.$idCat);
// 	return $this;
// }

//Fonction Getid
// public function getId_category(){
// 	return $this->db->query('SELECT category.id_category FROM category WHERE id ='.$category->getId_category())->fetch(PDO::FETCH_ASSOC);

// }

// public function getId($id){
//     $id = (int) $id;
//     $q = $this->db->query('SELECT id_category FROM category WHERE id = '. $id);
//     $catId = $q->fetch(PDO::FETCH_ASSOC);
//     return ($catId); 
//     }

public function getObjVersion(){
    $versionObjet = [];
    $version = $this->db->query('SELECT * FROM version');
    while ($data = $version->fetch(PDO::FETCH_ASSOC)){
      $versionObjet[] = new Version($data);
    }
    return $versionObjet;
  }

}