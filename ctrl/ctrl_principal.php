<?php

/*
*
*			CONTROLEUR PRINCIPAL
*
*/

/**** Chemins de l'application ***/
$nom_projet = "/rollandGorras";
$racine="c:/wamp/www";
/*      *********				***/

// début de la session
session_start();

//affichage du menu principal
function affMenuPrincipal(){
	global $racine,$nom_projet;

	// Configuration du cookies
	if (!isset($_COOKIE['nbvisite'])) {
		$msg = "Bienvenue sur notre site";
		setcookie("nbvisite",1);
	}else{
		$nbvisit = $_COOKIE['nbvisite']+1;
		$msg="$nbvisit ème passage sur notre page";
		setcookie("nbvisite",$nbvisit);
	}
	include_once "$racine/vue/template.php";
}

// page d'administration
function ctrl_admin(){
	global $racine,$nom_projet;
	//on garde la page utilisé dans la session
	$_SESSION['page']="_admin";

	include_once "$racine/vue/admin/index.php";
	echo "Vous &ecirc;tes sur la page d'administration </br> ";
}

// page d'administration pour les joueurs
function ctrl_admin_joueur(){
	global $racine,$nom_projet;
	$_SESSION['page']="_admin_joueur";

	include_once "$racine/ctrl/joueur.php";
}

// page d'administration pour les partie
function ctrl_admin_partie(){
	global $racine,$nom_projet;
	$_SESSION['page']="_admin_partie";

	include_once "$racine/vue/admin/partie.php";
}

/*
*
*		DEBUT CONTROLEUR
*
*/
	//  
if ($_SERVER['REQUEST_METHOD']=="POST"){

	echo "string";
}else{
	if (isset($_GET['page'])) {
			// page d'administration principale
		if ($_GET['page']=="_admin") {
			ctrl_admin();
		}

			// page d'administration des joueurs
		if($_GET['page']=="_admin_joueur"){
			ctrl_admin_joueur();
		}

			// page d'administration des parties
		if ($_GET['page']=="_admin_partie") {
			ctrl_admin_partie();
		}
	}else{
		affMenuPrincipal();
	}

}


?>