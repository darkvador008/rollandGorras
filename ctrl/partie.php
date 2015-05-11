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

}
else{ // méthode POST
	if(isset($_POST['_adminJoueur_btcCreer'])){
		include_once"$racine/model/daoJoueur.php";
		$nomJoueur = $_POST['name'];
		$nationaliteJoueur = $_POST['nationality'];
		$dateJoueur = $_POST['bornDate'];
		echo '<br> nom joueur '.$nomJoueur. '<br> nationalit&eacute; : '.$nationaliteJoueur. '<br> date de naissance : '.$dateJoueur;

		daoJoueur::addJoueur($nomJoueur,$nationaliteJoueur,$dateJoueur);
		

	}


}











?>