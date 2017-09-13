<?php

namespace core\Auth;

use \core\Database\Database;

class DBAuth{

	private $db;

	//private $crypt[]=[''];

	public function __construct(Database $db)
	{
		$this->db=$db;
	}

	/**
	 * @param $username string
	 * @param $password string
	 * @return boolean
	 * */

	public function login($username, $password){
			$user = $this->db->prepare('SELECT * FROM users WHERE username = ?',[$username],null,true);

			if($user){
				if($user->password === sha1($password)){
					$_SESSION['auth'] = $user->id;
					return true;
				}				
			} 
				return false;
			 
	}

	public function logged(){
			return isset($_SESSION['auth']);
	}

	public function getUserId(){
		if($this->logged()){
			return $_SESSION['auth'];
		}
		return false;
	}
}