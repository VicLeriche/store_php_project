<?php
class Common {

	public function __construct()
	{

	}

	public function logout()
	{
		unset($_SESSION);
		session_destroy();
		session_start();

		return true;
	}

	public function verifMail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	public function cryptPass($password) {
		return hash('sha512',$password);
	}
		
	//Genere un mot de passe automatiquement
	public function uniqidReal($lenght = 10) {
		
		if (function_exists("random_bytes")) {
			$bytes = random_bytes(ceil($lenght / 2));
		} elseif (function_exists("openssl_random_pseudo_bytes")) {
			$bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
		} else {
			throw new Exception("no cryptographically secure random function available");
		}
		return substr(bin2hex($bytes), 0, $lenght);
	}
}
?>