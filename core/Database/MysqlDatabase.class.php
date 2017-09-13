<?php

namespace core\Database;

use \PDO;

class MysqlDatabase extends Database {

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;

	public function __construct($db_name='test',$db_host='localhost',$db_user='root',$db_pass=''){
		$this->db_name = $db_name;
		$this->db_host = $db_host;
		$this->db_pass = $db_pass;
		$this->db_user = $db_user;


	}
	

	public function getPDO(){
		if($this->pdo === null){
			$pdo = new PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host,$this->db_user,$this->db_pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
			//var_dump('getPDO callled');
		}
		//var_dump('getPDO callled');
		return $this->pdo;
	}

	public function query($statement,$class_name = null, $one = false){
		$req=$this->getPDO()->query($statement);
		if(
			strpos($statement,'UPDATE') === 0 ||
			strpos($statement,'INSERT') === 0 ||
			strpos($statement,'DELETE') === 0
			){
				return $req;
		}

		if($class_name === null){
			$req->setFetchMode(PDO::FETCH_OBJ);
		}else{
			$req->setFetchMode(PDO::FETCH_CLASS,$class_name);
		}

		if($one){
			$datas = $req->fetch();	
		}else{
			$datas = $req->fetchAll();
		}

		return $datas;
	}

	public function prepare($statement, $attribut, $class_name = null, $one =false){

		$req = $this->getPDO()->prepare($statement);
		$res = $req->execute($attribut);

		if(
			strpos($statement,'UPDATE') === 0 ||
			strpos($statement,'INSERT') === 0 ||
			strpos($statement,'DELETE') === 0
			){
				return $res;
		}
		if($class_name === null){
			$req->setFetchMode(PDO::FETCH_OBJ);
		}else{
			$req->setFetchMode(PDO::FETCH_CLASS,$class_name);
		}

		if($one){
			$datas = $req->fetch();	
		}else{
			$datas = $req->fetchAll();
		}
		return $datas;
	}

	/**
	* retourne le dernier element qui aurait été afffecte par pdo
	* @return string
	**/
	public function lastInsertId(){
		return $this->getPDO()->lastInsertId();
	}

	public function count($statement){
		return $this->getPDO()->query($statement)->fetchColumn();
	}

}