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


else{ 
    if (isset($_POST['tour'])) {
    	include_once"$racine/model/modelJoueur.php";
 		include_once"$racine/model/modelPartie.php";

    	$tour = $_POST['tour'];
    	$parties=getParties($tour);
    	echo $parties;
    	
	}



}
?>