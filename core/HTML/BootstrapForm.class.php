<?php
namespace core\HTML;

class BootstrapForm extends Form{
	/**
	 * @param $html string  Code HTML à entourer
	 * @return string
	 * */

	protected function surround($html){
		return "<div class=\"form-group\">{$html}</div>";
	}

	/**
	 * @param $name string
	 * @return string
	 * */


	public function input($name, $label, $options = [], $on = true){

		$type = isset($options['type']) ? $options['type'] : 'text';

		$label = '<label>'.$label.'</label><br><br>';

		if($on){
			$value = $this->getValue($name);
		}else{
			$value ='';
		}
		

		if($type === 'textarea'){
			$input ='<textarea class="form-control textarea-form" name="'.$name.'" placeholder="'.$name.'">' .$value. '</textarea>';	
		}else{	
			$input = '<input  type="'.$type.'" name="'.$name.'" placeholder="'.$name.'" value="'.$value.'" class="form-control input-form" >';
		}	

		return  $this->surround($label . $input);
	}

	public function select($name, $label, $options){
		
		$label = '<label>'.$label.'</label>';

		$input = '<select class="form-control select-form" name="'.$name.'">';
						foreach($options as $k => $v){
							$attributes='';

							if($k == $this->getValue($name)){
								$attributes=' selected';
							}

							$input.='<option value="'.$k.'"'.$attributes.'>'.$v.'</option>';
						}	
				  $input .='</select>';

		return $this->surround($label . $input);
	}



	/**
	 * @return string
	 * */

	public function submit($text){
		return $this->surround('<button class="btn btn-primary btn-form">'.$text.'</button>');
	}

}