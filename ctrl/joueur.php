<?php

/* 
*
*			CONTROLEUR DES JOUEURS
*
*/

// Premier appel à la page méthode GET
if($_SERVER['REQUEST_METHOD']=="GET"){
	$msg="";
	//include_once"$racine/vue/admin/joueur.php";
	include_once"$racine/model/modelJoueur.php";
	$item = item::getJoueurs();
	include_once"$racine/vue/admin/joueur.php";

}
else{ // méthode POST



}











?>