<?php
class Purchase extends Objects {

	private $sTable;
	private $sTableUsr;
	private $sTableProd;

	public function __construct()
	{
		$this->sTable = TABLE_PUR;
		$this->sTableUsr = TABLE_USR;
		$this->sTableProd = TABLE_PROD;
	}
	
	public function createPurchases($dataForm)
	{
		global $db;
		global $cmn;
		
		$use_id = intval($dataForm["use_id"]);
		$prod_id = intval($dataForm["prod_id"]);
				
		$tabParams = array(
			'use_id' => $use_id,
			'prod_id' => $prod_id
		);
		$db->sqlSimpleQuery(
			'INSERT INTO '.$this->sTable.
			'(use_id,prod_id,created_at) 
			VALUES(?,?,NOW())',
			$tabParams
		);
		return true;
	}

	public function getOnePurchase($id){
		global $db;
		
		$param = array("id"=>$id);
		return $db->sqlSingleResult(
			"SELECT * FROM ".$this->sTable." pur 
 			INNER JOIN ".$this->sTableUsr." usr ON usr.id=pur.use_id 
			INNER JOIN ".$this->sTableProd." prod ON prod.id=pur.prod_id 
			WHERE pur.id = :id", 
			$param
		);
	}

	public function getAllPurchases(){
		global $db;
		
		return $db->sqlManyResults(
			"SELECT *, pur.created_at as order_date FROM ".$this->sTable." pur 
 			INNER JOIN ".$this->sTableUsr." usr ON usr.id=pur.use_id 
			INNER JOIN ".$this->sTableProd." prod ON prod.id=pur.prod_id 
			ORDER BY pur.created_at DESC"
		);
	}
}
?>