<?php

/*
 *
 * 			CREATION PARTIES ADMIN
 *
 */

// Premier appel à la page méthode GET
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    include_once"$racine/model/modelPartie.php";
    include_once"$racine/model/modelJoueur.php";


    $item = item::getJoueurs();
    $_SESSION['players'] = $item;
    include_once"$racine/vue/creerParties.php";
} else { // méthode POST
    //echo("<script>console.log('post ctrl creer partie : " . $_POST['PlayerID1'] . " ');</script>");
    // Rentre ici
    if (isset($_POST['playerID1'], $_POST['playerID2'], $_POST['terrainID'])) {
        echo("<script>console.log('blablabla ');</script>");
        // ne rentre pas
        include_once"$racine/model/modelPartie.php";
        //echo("<script>console.log('post ok');</script>");
        $p1 = $_POST['playerID1'];
        $p2 = $_POST['playerID2'];
        $tid = $_POST['terrainID'];
        //echo '<br> nom joueur '.$nomJoueur. '<br> nationalit&eacute; : '.$nationaliteJoueur. '<br> date de naissance : '.$dateJoueur;
        //$id1 = getIDPlayer($PlayerID1);
        echo 'tet';

        addPartie($p1, $p2, $tid);
    }
}
?>