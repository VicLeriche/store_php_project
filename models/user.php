<?php
class User extends Objects {

	private $sTable;
	private $sTablePur;
	private $sTableProd;

	public function __construct()
	{
		$this->sTable = TABLE_USR;
		$this->sTablePur = TABLE_PUR;
		$this->sTableProd = TABLE_PROD;
	}

	public function infoUser($id){
		global $db;
		
		$param = array("id"=>$id);
		return $db->sqlSingleResult("SELECT * FROM ".$this->sTable." WHERE id = ?", $param);
	}
	
	public function loginUser($login, $pwd){
		global $db;
		global $cmn;
		
		$pass= $cmn->cryptPass($pwd);
		
		$param = array(
			"password"=>$pass,
			"email"=>$login,
		);

		$user= $db->sqlSingleResult(
			"SELECT * FROM ".$this->sTable.
			" WHERE password = ? AND email = ?", 
			$param
		);
		
		if(!$user){
			return false;
		}
		else{
			$_SESSION["usr_id"] = $user->id;
			return true;
		}
	}
	
	public function createUser($dataForm)
	{
		global $db;
		global $cmn;
		
		$password = $cmn->cryptPass($dataForm["password"]);
		$lastname = strtoupper(trim($dataForm["lastname"]));
		$firstname = ucwords(trim($dataForm["firstname"]));
		$email = strtolower(trim($dataForm["email"]));
		$phone = trim($dataForm["phone"]);
		$address = trim($dataForm["address"]);
		$city = trim($dataForm["city"]);
		$postal_code = intval($dataForm["postal_code"]);
				
		$tabParamsVerif = array('email'=> $email, 'phone'=>$phone);
		$verif=$db->sqlSingleResult(
			"SELECT COUNT(id) AS nb FROM ".
			$this->sTable." WHERE email=? OR phone=? ",
			$tabParamsVerif
		);
		
		if($verif->nb!=0){
			return false;
		}
		else{
			$tabParams = array(
				'password' => $password,
				'lastname' => $lastname,
				'firstname' => $firstname,
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'city' => $city,
				'postal_code' => $postal_code,
			);
			$db->sqlSimpleQuery(
				'INSERT INTO '.$this->sTable.
				'(password,lastname,firstname,email,phone,address,city,postal_code,created_at) 
				VALUES(?,?,?,?,?,?,?,?,CURDATE())',
				$tabParams
			);
			return true;
		}
	}

	public function userPurchases($id){
		global $db;
		
		$param = array("id"=>$id);
		return $db->sqlManyResults(
			"SELECT * FROM ".$this->sTablePur." pur 
 			INNER JOIN ".$this->sTable." usr ON usr.id=pur.use_id 
			INNER JOIN ".$this->sTableProd." prod ON prod.id=pur.prod_id 
			WHERE pur.use_id = :id 
			ORDER BY pur.created_at DESC", 
			$param
		);
	}
}
?>
