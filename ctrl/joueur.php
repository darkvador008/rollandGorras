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

// le  bug
//$sourcePath = $_FILES['imgAvatar']['tmp_name'];       // Storing source path of the file in a variable
//$targetPath = "vue/img/".$_FILES['imgAvatar']['name']; // Target path where file is to be stored
//move_uploaded_file($sourcePath,$targetPath) ; 
 


	if(isset($_POST['name'], $_POST['nationality'], $_POST['imgAvatar'])){


		
		include_once"$racine/model/modelJoueur.php";
		$nomJoueur = $_POST['name'];
		$nationaliteJoueur = $_POST['nationality'];
		$avatar = $_POST['imgAvatar'];
		//echo '<br> nom joueur '.$nomJoueur. '<br> nationalit&eacute; : '.$nationaliteJoueur. '<br> date de naissance : '.$dateJoueur;
		echo '<tr><td></td><td>'.$nomJoueur. '</td><td>'.$nationaliteJoueur. '</td><td>'.$avatar.'</td></tr>';
		addJoueur($nomJoueur,$nationaliteJoueur,$avatar);
		

	}
	elseif(isset($_POST["recordToDelete"])){
		include_once"$racine/model/modelJoueur.php";
		$idj = $_POST['recordToDelete'];
		delJoueur($idj);
		echo $idj;
	}


}











?>