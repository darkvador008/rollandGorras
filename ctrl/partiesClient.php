<?php

/*
 *
 * 			CONTROLEUR DES PARTIES DES CLIENTS
 *
 */

// Premier appel à la page méthode GET
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    include_once"$racine/model/modelPartie.php";
    include_once"$racine/model/modelJoueur.php";
    include_once"$racine/vue/partiesClient.php";
} else { // méthode POST
    
    
    include_once"$racine/model/modelJoueur.php";
    include_once"$racine/model/modelPartie.php";
    
//    echo 'getParties(1)';
    
    
        if (isset($_POST['tour'])) {
        include_once"$racine/model/modelJoueur.php";
        include_once"$racine/model/modelPartie.php";

        $tour = $_POST['tour'];
       //$tour=2;
       $tour=1;
        $parties = getAllParties();
        echo $parties;
        
       
    }
    
    
}

?>