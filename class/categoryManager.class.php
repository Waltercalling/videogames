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

	}

public function listCategory(){
	return $this->db->query('SELECT category.id_category, category.type FROM category')->fetchAll(PDO::FETCH_ASSOC);
}

// Delete function 
public function delete(Category $category){
	$del_Category = $this->db->query('DELETE FROM category WHERE id ='.$category->getId_category());
	return $this;
}

}