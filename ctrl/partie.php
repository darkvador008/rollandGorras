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
elseif(isset($_POST['scorej1']) && isset($_POST['scorej2'])){
	//click sur boutton + ou -
	echo "click click";
	$sj1 = $_POST['scorej1'];
	$sj2 = $_POST['scorej2'];

}

else{ //POST
    if (isset($_POST['tour'])) {
    	include_once"$racine/model/modelJoueur.php";
 		include_once"$racine/model/modelPartie.php";

    	$tour = $_POST['tour'];
    	$parties=getParties($tour);
    	echo $parties;
    	
	}
}


?>