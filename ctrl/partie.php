<?php

/* 
*
*			CONTROLEUR DES PARTIES
*
*/

// Premier appel à la page méthode GET
if($_SERVER['REQUEST_METHOD']=="GET"){
	$msg="";
	include_once"$racine/model/modelPartie.php";
	include_once"$racine/model/modelJoueur.php";

	$item = item::getJoueurs();
	include_once"$racine/vue/admin/partie.php";
		$_SESSION['players'] = $item;




}
else{ // méthode POST


	}


}











?>