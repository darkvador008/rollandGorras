<?php

/**
* 
*/
class joueur{
	private $item = array();
	function __construct(argument)
	{
		# code...
	}
}


function joueurLoad(){
	include_once 'daoJoueur.php';
	$items_panier = daoJoueur::getListeJoueur();
	if (is_null($items_panier)){
		$this->items = array();
		$this
	}else{}


}



?>