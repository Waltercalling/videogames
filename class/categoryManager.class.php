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
	  // echo '<p><strong><u>Catégorie bien ajoutée !!</u></strong></p>';
	  header('Location:list-category.php');
	}

public function listCategory(){
	return $this->db->query('SELECT category.id_category, category.type FROM category')->fetchAll(PDO::FETCH_ASSOC);
}

// Delete function 
public function deleteCategory($id){
	$del_Category = $this->db->exec('DELETE FROM category WHERE id_category ='.$id);
	return $this;
}

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

public function getObjCategory(){
    $categoryObjet = [];
    $category = $this->db->query('SELECT category.id_category, category.type FROM category');
    while ($data = $category->fetch(PDO::FETCH_ASSOC)){
      $categoryObjet[] = new Category($data);
    }
    return $categoryObjet;
  }



  public function readObjById(){
					$category = [];
					$read_object = $this->db->query('SELECT * FROM category WHERE id_category='.$_GET['id']);
					while ($obj = $read_object->fetch(PDO::FETCH_ASSOC)) {
					    $category[] = new Category($obj);

					}
					return $category;
				}

public function updateById(Category $category){
		$new_category = $this->db->prepare('UPDATE category SET /*id_category = :id_category,*/ type = :type WHERE id_category ='.$_GET['id']);
		//var_dump($category->getId_category());


/*		$new_category->bindValue(':id_category', $category->getId_category(), PDO::PARAM_INT);
*/		$new_category->bindValue(':type', $category->getType(), PDO::PARAM_STR);
		$new_category->execute();
		header('Location:list-category.php');
	
		}

}