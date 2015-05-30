<?php

/* 
*
*			CREATION PARTIES ADMIN
*
*/

// Premier appel à la page méthode GET
if($_SERVER['REQUEST_METHOD']=="GET"){

	include_once"$racine/model/modelPartie.php";
	include_once"$racine/model/modelJoueur.php";


	$item = item::getJoueurs();
		$_SESSION['players'] = $item;
	include_once"$racine/vue/creerParties.php";


}
else{ // méthode POST

		

	


}











?>