<?php

/* 
*
*			CONTROLEUR Du login
*
*/

// Premier appel à la page méthode GET
if($_SERVER['REQUEST_METHOD']=="GET"){
	$msg="";
	//include_once"$racine/vue/admin/joueur.php";
	include_once"$racine/model/modelLogin.php";
	
	include_once"$racine/vue/admin/login.php";

}
else{ // méthode POST
	if(isset($_POST['adminLogin_btcLogin'])){
		include_once"$racine/model/modelLogin.php";
		
		

	}


}











?>