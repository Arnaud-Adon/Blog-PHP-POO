<?php
namespace app\Table;

use core\Table\Table;


class PostTable extends Table{

	protected $table = 'articles';

	/**
	 * Récupère l'article en prametre avec sa categorie
	 * @param $id int
	 * @return \app\Entity\PostEntity
	 * */
	public function findWithCategory($id){
		return $this->query("SELECT articles.id, articles.titre, articles.description, articles.contenu, articles.image, DATE_FORMAT(articles.date,'%d/%m/%Y') AS date, categories.titre as categorie
							FROM articles 
							LEFT JOIN categories ON categorie_id = categories.id  
							WHERE articles.id = ?", [$id], true);
	}


	public function nbPost(){
		return $this->count("SELECT COUNT(*) FROM articles");
	}

	/**
	 * Récupère les dernier articles
	 * @return array
	 * */
	public  function last($page,$nbByPage){
		return $this->query("SELECT articles.id, articles.titre,articles.description, articles.contenu, articles.image, articles.date, categories.titre as categorie 
							FROM articles 
							LEFT JOIN categories ON categorie_id = categories.id 
							ORDER BY articles.date DESC LIMIT ".(($page-1) * $nbByPage).",".$nbByPage);
	}

	/**
	 * Récupère les dernier articles de la categorie
	 * @param $category_id int
	 * @return array
	 * */
	public function lastByCategory($category_id){
		return $this->query('SELECT articles.id, articles.titre,articles.description, articles.contenu, articles.image, categories.titre as categorie 
							FROM articles 
							LEFT JOIN categories ON categorie_id = categories.id  
							WHERE categorie_id = ? 
							ORDER BY articles.date DESC ',[$category_id]);
	}


}