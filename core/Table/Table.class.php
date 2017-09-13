<?php
namespace core\Table;


use core\Database\Database;

/**
 * Class Table
 **/

class Table{

	protected  $table;
	protected	$db;

	/*private static function getTable(){
		if(static::$table === null){
				$class_name = explode('\\',get_called_class());
				static::$table = strtolower(end($class_name)).'s';
				//die(static::$table);
		}
		return static::$table;
	}*/

	/*public static function find($id){
		return static::query("SELECT * FROM ".static::$table." WHERE id = ?",[$id],true);
	}

	public static function all(){
		return App::getDb()->query("SELECT * FROM ".static::$table,get_called_class());
	}

	public function __get($key){
		//var_dump('methode magique');
		$method='get'.ucfirst($key);

		//stocke une seul fois sinon aurait retourne à chaque fois une instanciation
		$this->$key = $this->$method();
		return $this->$key;

		//var_dump($get);
	}

	public static function query($statement,$attribut=null,$one=false){

			if($attribut){
				return App::getDb()->prepare($statement,$attribut,get_called_class(),$one);
			}else{
				return App::getDb()->query($statement,get_called_class(),$one);
			}

		
	} */

	

	public function __construct(Database $db){
		$this->db=$db;
		//var_dump(get_class($this));
			if(is_null($this->table)){
				$parts = explode('\\', get_class($this));
				$class_name = end($parts);
				$this->table = strtolower(str_replace('Table', '', $class_name)); 
			}
		
	}


	/**
	 * il y aune difference entre get_class et get_called_class qui renvoie le namespace de la classe
	 * */
	public function query($statement,$attribut=null,$one=false){
		if($attribut){
			return $this->db->prepare($statement,$attribut,str_replace('Table','Entity',get_class($this)));
		}else{
			return $this->db->query($statement,str_replace('Table','Entity',get_class($this)));
		}
	}

	public function find($id){
		return $this->query("SELECT * FROM ".$this->table." WHERE id = ?",[$id],true);
	}

	public function all(){
		return $this->query('SELECT * FROM '. $this->table);
	}

	public function update($id,$fields){

		$sql_parts = [];
		$attributes = [];
		foreach ($fields as $k => $v) {
			$sql_parts[] = $k.' = ?';
			$attributes[] = $v;
		}
		$attributes[] = $id;
		$sql_part = implode(', ',$sql_parts);
		return $this->query("UPDATE {$this->table}
					  SET $sql_part , date = NOW() 
					  WHERE id = ?", $attributes, true);
	}

	public function extract($key, $value){
		$records = $this->all();

		$return = [];

		foreach($records as $v){
			$return[$v->$key] = $v->$value;
		}

		return $return;

	}

	public function create($fields){

		$sql_parts = [];
		$attributes = [];
		foreach ($fields as $k => $v) {
			$sql_parts[] = $k.' = ?';
			$attributes[] = $v;
		}
		$sql_part = implode(', ',$sql_parts);
		return $this->query("INSERT INTO {$this->table}
					  SET $sql_part , date = NOW()", $attributes, true);
	}

	public function delete($id){
		return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
	}

	public function lastInsertId(){
		$this->table->lastInsertId();
	}

	public function count($statement){
		return $this->db->count($statement);
	}


}