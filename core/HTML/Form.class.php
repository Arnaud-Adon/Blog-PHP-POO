<?php

namespace core\HTML;

/**
*Class Form
*Permet de generer un formulaire rapidemement et simplement
*/

class Form{
	/**
	* @var  Données utilisés par le formulaire
	**/
	protected $data;

	/**
	*@var string Tag utilisé pour entourer les champs
	**/
	public $surround = 'p';

	/**
	* @param array $data Données utilisés par le formulaire
	**/
	public function __construct($data = array()){
			$this->data = $data;
	}

	/**
	* @param $html Code HTML à retourner
	* @return string
	**/
	protected function surround($html){
		//mettre des {} pour que la variable soit interpreter par des ""
		return "<{$this->surround}>{$html}</{$this->surround}>";
	}

	/**
	* @param $index string 
	* @return string 
	**/
     protected function getValue($index){
        if($this->data){
			 return $this->data[0]->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

	/**
	* @param $name string 
	* @param $label string
	* @param $options array 
	* @return string 
	**/
	public function input($name, $label, $options = [], $on = true){

		$type = isset($options['type']) ? $options['type'] : 'text';

		if($on){
			$value = $this->getValue($name);
		}else{
			$value = '';
		}

		return	$this->surround('<input type="'.$type.'" name="'.$name.'" value="'.$value.'" >');
		
	}

	public function select($name, $label, $options){
		
		$label = '<label>'.$label.'</label>';

		$value = $this->getValue($name); 

		$input = '<select name="'.$name.'">';
						foreach($options as $k => $v){
							$input.='<option value="'.$k.'">'.$v.'</option>';
						}	
				  $input .='</select>';

		return $this->surround($label . $input);
	}


	/*public function file($name, $label, ){
		return $this->surround('<input type="file" name="'.$name.'">');
	}*/


	/** 
	* @param $textButton string texte du bouton
	* @return string 
	**/
	public function submit($textButton){
		return $this->surround('<button class="btn btn-primary">'.$textButton.'</button>');
	}

	

}