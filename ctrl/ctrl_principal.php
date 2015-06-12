<?php

/*
 *
 * 			CONTROLEUR PRINCIPAL
 *
 */

/* * ** Chemins de l'application ** */
$nom_projet = "/rollandGorras";
//$racine = "/opt/lampp/htdocs" . $nom_projet;
$racine = "c:/wamp/www" . $nom_projet;
/* * ********				** */

// début de la session
session_start();

//affichage du menu principal
function affMenuPrincipal() {
    global $racine, $nom_projet;

    // Configuration du cookies
    if (!isset($_COOKIE['nbvisite'])) {
        $msg = "Bienvenue sur notre site";
        setcookie("nbvisite", 1);
    } else {
        $nbvisit = $_COOKIE['nbvisite'] + 1;
        $msg = "$nbvisit ème passage sur notre page";
        setcookie("nbvisite", $nbvisit);
    }
    //require("header.php");
    //require("footer.php");
    include_once "$racine/vue/header.php";
    include_once "$racine/vue/footer.php";
}

// page d'administration
function ctrl_admin() {
    global $racine, $nom_projet;
    //on garde la page utilisé dans la session
    $_SESSION['page'] = "_admin";

    include_once "$racine/vue/admin/index.php";
    echo "Vous &ecirc;tes sur la page d'administration </br> ";
}

// page d'administration pour les joueurs
function ctrl_admin_joueur() {
    global $racine, $nom_projet;
    $_SESSION['page'] = "_admin_joueur";

    include_once "$racine/ctrl/joueur.php";
}

// page d'administration pour les partie
function ctrl_admin_partie() {
    global $racine, $nom_projet;
    $_SESSION['page'] = "_admin_partie";

    include_once "$racine/ctrl/partie.php";
}

function ctrl_admin_creer_partie() {
    global $racine, $nom_projet;
    $_SESSION['page'] = "_admin_creer_partie";
    //echo("<script>console.log('function ctrl admin creer partie ');</script>");

    include_once "$racine/ctrl/creerPartie.php";
}

// Page de login
function ctrl_login() {
    global $racine, $nom_projet;
    $_SESSION['page'] = "_login";
    include_once "$racine/vue/admin/login.php";
}

// Gestion du login
function ctrl_gestion_login() {
    global $racine, $nom_projet;
    $_SESSION['page'] = "_login";
    include_once "$racine/ctrl/login.php";
}

// Gestion du login
function ctrl_gestion_login_deco() {
    global $racine, $nom_projet;
    $_SESSION['page'] = "_login_deco";
    include_once "$racine/ctrl/login.php";
}

// Gestion de la page des joueurs  (client)
function ctrl_joueur() {
    global $racine, $nom_projet;
    $_SESSION['page'] = "_joueur";
    include_once "$racine/ctrl/joueur.php";
}

// Gestion de la page des joueurs  (client)
function ctrl_parties_client() {
    global $racine, $nom_projet;
    $_SESSION['page'] = "_parties_client";

    include_once "$racine/ctrl/partiesClient.php";
}

function ctrl_index() {
    global $racine, $nom_projet;
    $_SESSION['page'] = "_login";
    include_once "$racine/ctrl/login.php";
}

/*
 *
 * 		DEBUT CONTROLEUR
 *
 */
//  
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION['page'])) {
        if ($_SESSION['page'] == '_admin') {
            echo 'retour admin';
        } elseif ($_SESSION['page'] == '_admin_joueur') {
            echo 'retour admin joueur';
            ctrl_admin_joueur();
        } elseif ($_SESSION['page'] == '_admin_partie') {
            //echo 'retour admin partie'; je vire ça pour pas avoir de bruit dans mes response ajax
            ctrl_admin_partie();
        } elseif ($_SESSION['page'] == '_login') {
            echo 'retour';
            echo("<script>console.log('aaa');</script>");

            ctrl_gestion_login();
        } elseif ($_SESSION['page'] == '_admin_creer_partie') {
            //echo("<script>console.log('controleur post _admin_creer_partie');</script>");
            ctrl_admin_creer_partie();
        } elseif ($_SESSION['page'] == '_parties_client') {
            ctrl_parties_client();
        }
    } else {
        // echo("<script>console.log('aaa');</script>");
        echo 'ctrl principal else post';
        ctrl_index();
    }
} else {
    if (isset($_GET['page'])) {
        // page d'administration principale
        if ($_GET['page'] == "_admin") {
            ctrl_admin();
        }

        // page d'administration des joueurs
        if ($_GET['page'] == "_admin_joueur") {
            ctrl_admin_joueur();
        }
        if ($_GET['page'] == "_parties_client") {
            ctrl_parties_client();
        }

        // page d'administration des parties
        if ($_GET['page'] == "_admin_partie") {
            ctrl_admin_partie();
        }

        if ($_GET['page'] == "_admin_creer_partie") {
            //echo("<script>console.log('controleur get _admin_creer_partie');</script>");
            ctrl_admin_creer_partie();
        }

        if ($_GET['page'] == '_login') {

            ctrl_login();
        }

        if ($_GET['page'] == '+deconexion') {

            ctrl_gestion_login_deco();
        }

        if ($_GET['page'] == '_joueur') {

            ctrl_joueur();
        }
    } else {
        echo 'ctrl principal get';
        affMenuPrincipal();
    }
}
?>