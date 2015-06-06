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

		


	if(isset($_POST['PlayerID1'], $_POST['PlayerID2'], $_POST['terrainID'])){

		$p1 = $_POST['PlayerID1'];
		$p2 = $_POST['PlayerID2'];
		$tid = $_POST['terrainID'];
		//echo '<br> nom joueur '.$nomJoueur. '<br> nationalit&eacute; : '.$nationaliteJoueur. '<br> date de naissance : '.$dateJoueur;
		$id1=getIDPlayer($PlayerID1);
		echo 'tet';
		addPartie($PlayerID1,$PlayerID2,$terrainID);
		

	}
	


}











?>