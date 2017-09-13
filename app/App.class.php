<?php

//namespace app;

use core\Config;
use core\Database\MysqlDatabase;


class App{
	//private static $database;
	public $title = "Site web en orienté objet";
	private $db_instance;
	private static $_instance;
	

	/*const DB_NAME='blog';
	const DB_USER='root';
	const DB_PASS='';
	const DB_HOST='localhost';*/

	public static function load(){
		session_start();

		require ROOT.'/app/Autoloader.class.php';

		app\Autoloader::register();

		require ROOT.'/core/Autoloader.class.php';

		core\Autoloader::register();
	}

	

	public static function getInstance(){
		if(is_null(self::$_instance)){
			self::$_instance = new App();
		}
		return self::$_instance;
	}



	/*
	public  function getTitle(){
		return self::$title;
	}
	*/

	public static function setTitle($name_title){
		self::$title =  self::$title. ' | '. $name_title;
	}


	/*public static function getDb(){
		if((self::$database) == null){
			if(Config::getInstance() == null){
				self::$database = new Database();
			}
		}
		return self::$database;
	}
*/
	public function getDb(){
		$config = core\Config::getInstance(ROOT.'/config/config.php');
		if(is_null($this->db_instance))
		{
			$this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_host'), $config->get('db_user'), $config->get('db_pass'));
		}
		return $this->db_instance;
	}

	/*public static function getDb(){
		if((self::$database) == null){
				self::$database = new Database(self::DB_NAME,self::DB_HOST,self::DB_USER,self::DB_PASS);
		}
		return self::$database;
	}*/


	/**
	 * Utilisation
	 **/
	public function getTable($name){
		$class_name ='\\app\\Table\\'.ucfirst($name).'Table';
		return new $class_name($this->getDb());
	}
}