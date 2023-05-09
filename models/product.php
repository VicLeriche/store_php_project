<?php
class Product extends Objects {

	private $sTable;

	public function __construct()
	{
		$this->sTable = TABLE_PROD;
	}

	public function getOneProduct($id){
		global $db;
		
		$param = array("id"=>$id);
		return $db->sqlSingleResult("SELECT * FROM ".$this->sTable." WHERE id = :id", $param);
	}

	public function getAllProducts(){
		global $db;
		return $db->sqlManyResults("SELECT * FROM ".$this->sTable." ORDER BY price ASC");
	}
}
?>
