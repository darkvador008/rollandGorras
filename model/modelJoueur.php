<?php

/**
* 
*/
class joueur{
	private $item = array();
	function __construct()
	{
		# code...
	}
}


function joueurLoad(){
	include_once 'daoJoueur.php';
	$items_panier = daoJoueur::getListeJoueur();
	if (is_null($items_panier)){
		$this->items = array();
		
	}
	else
	{}


}


class item {
	
	public $nom="haha";
	public $nationalite;

	static function getJoueurs(){
		include_once 'daoJoueur.php';
		//$items= daoJoueur::getListeJoueur();
		$items=daoJoueur::getListeJoueur();
		return $items;
	}

	static function getTest(){

		return "haha";
	}




}



?>