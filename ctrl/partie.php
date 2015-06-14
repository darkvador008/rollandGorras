<?php

/*
 *
 * 			CONTROLEUR DES PARTIES
 *
 */

// Premier appel à la page méthode GET
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if ($_GET['page'] == '_live') {
        echo 'get live';
        include_once"$racine/model/modelPartie.php";
        $parties = getLive();
        include_once"$racine/vue/live.php";
    } else {
        $msg = "";
        include_once"$racine/model/modelPartie.php";
        include_once"$racine/model/modelJoueur.php";

        $item = item::getJoueurs();
        include_once"$racine/vue/admin/partie.php";
        $_SESSION['players'] = $item;
    }
}

// Pour l'ajout d'un point dans la gestion admin partie
elseif (isset($_POST['scorej1']) && isset($_POST['scorej2']) && isset($_POST['partie_id']) && ($_POST['action'] == 'plus')) {
    include_once"$racine/model/modelPartie.php";
    echo "click sur boutton+";
    $sj1 = $_POST['scorej1'];
    $sj2 = $_POST['scorej2'];
    $partie_id = $_POST['partie_id'];
    $numb = $_POST['numButton'];
    scorePlus($sj1, $sj2, $partie_id, $numb);
}



// Pour la suppression d'un point dans la gestion admin partie
elseif (isset($_POST['scorej1']) && isset($_POST['scorej2']) && isset($_POST['partie_id']) && ($_POST['action'] == 'minus')) {
    include_once"$racine/model/modelPartie.php";
    echo "click sur boutton+";
    $sj1 = $_POST['scorej1'];
    $sj2 = $_POST['scorej2'];
    $partie_id = $_POST['partie_id'];
    $numb = $_POST['numButton'];
    scoreMinus($sj1, $sj2, $partie_id, $numb);
}

elseif (isset($_POST['terrain'])){
    include_once"$racine/model/modelPartie.php";
    $terrain=$_POST['terrain'];
    $partie_id=$_POST['partie_id'];
    updateTerrain($partie_id,$terrain);

}

//POST
else {
    if ($_GET['page'] == '_live') {
        include_once"$racine/model/modelPartie.php";
        $parties = getLive();
        echo $parties;
    } elseif (isset($_POST['tour'])) {
        include_once"$racine/model/modelJoueur.php";
        include_once"$racine/model/modelPartie.php";

        $tour = $_POST['tour'];
        //$tour=2;
        $tour = getTourMax();
        $parties = getParties($tour);
        echo $parties;
    }

}
?>