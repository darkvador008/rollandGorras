<?php

/* 
*
*			CONTROLEUR Du login
*
*/

// Premier appel � la page m�thode GET
if($_SERVER['REQUEST_METHOD']=="GET"){
	$msg="";
	//include_once"$racine/vue/admin/joueur.php";
	include_once"$racine/model/modelLogin.php";
	
	include_once"$racine/vue/admin/login.php";
	
			if (isset($_POST['login']) && isset($_POST['password'])) 
			{
				echo 'Bonjour ' . $_SESSION['pseudo'];
			}

}
else{ // m�thode POST

	if(isset($_POST['adminLogin_btcLogin'])){
		include_once"$racine/model/modelLogin.php";
		
$login_valide = "a";
$pwd_valide = "a";	
if (isset($_POST['login']) && isset($_POST['password'])) {

	// on v�rifie les informations du formulaire, � savoir si le pseudo saisi est bien un pseudo autoris�, de m�me pour le mot de passe
	if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['password']) {
		// dans ce cas, tout est ok, on peut d�marrer notre session

		// on la d�marre :)
		session_start ();
		// on enregistre les param�tres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['password'] = $_POST['password'];

		// on redirige notre visiteur vers une page de notre section membre
		header ('location: index.php');
	}
	else {
		// Le visiteur n'a pas �t� reconnu comme �tant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=index.php?page=_login">';
	}
}
else {
	echo 'Les variables du formulaire ne sont pas d�clar�es.';
}



}
}










?>