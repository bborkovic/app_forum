<?php 

class Category extends DatabaseObject {

	// table the class is related
	protected static $table_name = "categories";
	protected static $db_fields = array('id','name','description');
	public static $primary_keys = array('id');

	
	public $children = array(
		'Ad' => array( // Class Name
			'table_name' => 'ads',
			'foreign_key' => 'user_id'
			),
		'children2' => array( // This is class Name
			'table_name' => 'table_name',
			'foreign_key' => 'key_name'
			)
		);


	// columns of table users
	public $id;
	public $name;
	public $description;

	public $validations = array(
		"name" => array(
			"label" => "Naziv",
			"rule" => "alphaNumeric",
			"required" => true,
			"allowEmpty" => false,
			"maxlength" => 20,
			"minlength" => 5,
			"message" => "Naziv nije ispravan"
			),
		"description" => array(
			"label" => "Opis",
			"rule" => "alphaNumeric",
			"required" => true,
			"allowEmpty" => true,
			"maxlength" => 100,
			"minlength" => 0,
			"message" => "Naziv nije ispravan"
			)
	);


	public static function find_all_parents($id="", $root_id="") {
		$array_of_parents = array();
		if( empty($id) || empty($root_id)) {
			return $array_of_parents;
		} else {
			while( true ) {
				$category = Category::find_by_id($id);
				$array_of_parents[] = $category;
				if ( $id == $root_id ) { break; }
				$id = $category->parent_cat_id;
			}
			return array_reverse($array_of_parents);
		}
	}

	public static function  find_root_id(){
		//
		return 4;
	}

	public static function get_subcategories($id) {
		$categories = Category::find_by_sql("select * from categories where parent_cat_id = :id and name <> 'root'", [":id"=>$id]);
		return $categories;
	}

	public function has_children_category() {
		$cnt = Category::count_by_sql("select count(*) from categories where parent_cat_id=:id", [":id"=>($this->id)]);
		return ( $cnt == 0 ) ? false : true;
	}

	public function create_cascade_common_fields(){
		global $database;
		if( !$this->create()) { return false; }
		$sql =  " insert into category_common_fields ";
		$sql .= " ( category_id,common_field_id,name,template_type,template_lov ) ";
  	$sql .= " select " . $this->id . ",common_field_id,name,template_type,template_lov ";
  	$sql .= " from category_common_fields where category_id = " . $this->parent_cat_id;

  	if ( $database->query_dml_prepared($sql) != false ) {
  		return true;
  	} else {
  		return false;
  	}

	}

	// public static function has_children_category($id) {
	// 	$cnt = self::count_by_sql("select count(*) from categories where parent_cat_id=:id", [":id"=>$id]);
	// 	return ( $cnt == 0 ) ? false : true;
	// }




}

?>