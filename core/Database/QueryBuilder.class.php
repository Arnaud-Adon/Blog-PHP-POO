<?php

/**
* Classe QueryBuilder cree avec le design pattern(Fluent)
**/

namespace core\Database;

class QueryBuilder {

    private $fields = [];

    private $conditions = [];

    private $from = [];

    public static function __callStatic($method, $arguments){

       $query =  new \core\Database\QueryBuilder();
       return call_user_func_array([$query, $method], $arguments);
        //var_dump($name, $argument);
    }
    
    public function select(){
        //var_dump(func_get_args());
        $this->fields = func_get_args();
        return $this;
    }

    public function where(){
        //var_dump(func_get_args());
        foreach(func_get_args() as $arg){
            $this->conditions[] = $arg;
        }
        
        return $this;
    }

    public function from($table, $alias = null){
        //var_dump(func_get_args());
        if(is_null($alias)){
            $this->from[] = $table; 
        }else{
             $this->from[] ="$table AS $alias";
        }
        return $this;
    }

    public function __toString(){
        return 'SELECT'. implode(', ', $this->fields)
                .' FROM '. implode(', ', $this->from)
                .' WHERE '. implode(' AND ', $this->conditions);
                
    }

    

}