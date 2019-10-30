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
	  // Close cursor after category insert
	  $add_category->closeCursor();
	  echo '<p><strong><u>Catégorie bien ajoutée !!</u></strong></p>';
	}

public function listCategory(){
	return $this->db->query('SELECT category.id_category, category.type FROM category')->fetchAll(PDO::FETCH_ASSOC);
}

// Delete function 
public function deleteCategory(Category $category){
	$del_Category = $this->db->query('DELETE FROM category WHERE id_category ='.$category->getId_category());
	return $this;
}

// //Fonction Getid
// public function getId_category(){
// 	return $this->db->query('SELECT category.id_category FROM category WHERE id ='.$category->getId_category())->fetch(PDO::FETCH_ASSOC);

// }

// public function getId($id){
//     $id = (int) $id;
//     $q = $this->db->query('SELECT id_category FROM category WHERE id = '. $id);
//     $catId = $q->fetch(PDO::FETCH_ASSOC);
//     return ($catId); 
//     }

public function getObjCategory(){
    $categoryObjet = [];
    $category = $this->db->query('SELECT category.id_category, category.type FROM category');
    while ($data = $category->fetch(PDO::FETCH_ASSOC)){
      $categoryObjet[] = new Category($data);
    }
    return $categoryObjet;
  }

}