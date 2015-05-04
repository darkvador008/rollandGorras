<?php

/*
*
*			CONTROLEUR PRINCIPAL
*
*/

/**** Chemins de l'application ***/
$nom_projet = "/rollandGorras";
$racine="c:/wamp/www".$nom_projet;
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
	//require("header.php");
	//require("footer.php");
	include_once "$racine/vue/header.php";
	include_once "$racine/vue/footer.php";
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

// Page de login
function ctrl_login(){
	global $racine,$nom_projet;
	$_SESSION['page']="_login";
	include_once "$racine/vue/admin/login.php";
}

// Gestion du login
function ctrl_gestion_login(){
	global $racine,$nom_projet;
	$_SESSION['page']="_login";
	include_once "$racine/ctrl/login.php";
}

/*
*
*		DEBUT CONTROLEUR
*
*/
	//  
if ($_SERVER['REQUEST_METHOD']=="POST"){
	if (isset($_SESSION['page'])){
		if ($_SESSION['page']=='_admin'){
			echo 'retour admin';
		}elseif ($_SESSION['page']=='_admin_joueur') {
			echo 'retour admin joueur';
			ctrl_admin_joueur();
		}elseif ($_SESSION['page']=='_admin_partie') {
			echo 'retour admin partie';
		}elseif ($_SESSION['page']=='_login'){
			echo 'retour';
			ctrl_gestion_login();
		}

	}

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
		
		if ($_GET['page']=='_login'){
			
			ctrl_login();
		}
	}else{
		affMenuPrincipal();
	}

}


?>