<?php

/* 
*
*			CONTROLEUR DES JOUEURS
*
*/

// Premier appel à la page méthode GET
if($_SERVER['REQUEST_METHOD']=="GET"){

	if ($_GET['page']=='_admin_joueur'){
		$msg="";
		//include_once"$racine/vue/admin/joueur.php";
		include_once"$racine/model/modelJoueur.php";
		$item = item::getJoueurs();
		include_once"$racine/vue/admin/joueur.php";
	} else if ($_GET['page']=='_joueur'){
		include_once"$racine/model/modelJoueur.php";
		$item = item::getJoueurs();
		include_once "$racine/vue/joueur.php";	
	}


}
else{ // méthode POST

	if(isset($_POST['name'], $_POST['nationality'], $_POST['bornDate'])){

		include_once"$racine/model/modelJoueur.php";
		$nomJoueur = $_POST['name'];
		$nationaliteJoueur = $_POST['nationality'];
		$dateJoueur = $_POST['bornDate'];
		echo '<br> nom joueur '.$nomJoueur. '<br> nationalit&eacute; : '.$nationaliteJoueur. '<br> date de naissance : '.$dateJoueur;

		addJoueur($nomJoueur,$nationaliteJoueur,$dateJoueur);
		

	}


}











?>