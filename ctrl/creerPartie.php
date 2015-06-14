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
    $itemJoueurDemi = item::getJoueurDemiFinale();
    $_SESSION['players'] = $item;
    include_once"$racine/vue/admin/creerParties.php";
} else { // méthode POST


    if (isset($_POST['playerID1'], $_POST['playerID2'], $_POST['terrainID'])) {
        //echo("<script>console.log('blablabla ');</script>");
        // ne rentre pas
        include_once"$racine/model/modelPartie.php";
        //echo("<script>console.log('post ok');</script>");
        $p1 = $_POST['playerID1'];
        $p2 = $_POST['playerID2'];
        $tid = $_POST['terrainID'];
       // echo("<script>console.log('post ctrl creer partie : " . $tid . " ');</script>");

        addPartie($p1, $p2, $tid);
    }
}
?>