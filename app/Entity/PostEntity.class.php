<?php

namespace app\Entity;

use core\Entity\Entity;

class PostEntity extends Entity{

	

	public function getUrl(){
		return 'index.php?page=posts.show&id='.$this->id;
	}

	public function getExtrait(){
		$html='<p>'.substr($this->description,0, 50).'</p>';
		$html.='<p><a class="next" href="'.$this->getUrl().'"><img src="../public/images/yellow_arrow.png">  Voir la suite</a></p>';

		return $html;
	}

	public function getImg(){
		$html = '<img class="img_posts" src="../public/images/img_posts/'.$this->image.'">';

		return $html;
	}
}