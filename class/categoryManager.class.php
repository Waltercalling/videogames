<?php
class categoryManager{
	private $db; // Instance de PDO.

	public function __construct($db) {
    $this->setDb($db);
  }
	public function setDb(PDO $db) {
    $this->db = $db;
  }

public function addCategory(Category $category) {
	  // Prepare category insert
	  $add_category = $this->db->prepare('INSERT INTO category(type) VALUES(:type)');
	  $add_category->bindValue(':type', $category->getType(), PDO::PARAM_STR);
	  // Execute insert category
	  $add_category->execute();
	  // Close cursor of the insert category
	  $add_category->closeCursor();
	  echo '<p><strong><u> Catégorie bien ajoutée !!</u></strong></p>';
	  return $this;
	}

public function listCategory(){
	return $this->db->query('SELECT category.type FROM category')->fetchAll(PDO::FETCH_ASSOC);
}

}