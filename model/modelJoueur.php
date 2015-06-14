<?php

/**
 * 
 */
class joueur {

    private $item = array();

    function __construct() {
        # code...
    }

}

function joueurLoad() {
    include_once 'daoJoueur.php';
    $items_panier = daoJoueur::getListeJoueur();
    if (is_null($items_panier)) {
        $this->items = array();
    } else {
        
    }
}

function addJoueur($nom, $nationalite) {
    include_once 'daoJoueur.php';
    daoJoueur::addJoueur($nom, $nationalite);
}

function delJoueur($idj) {
    include_once 'daoJoueur.php';
    daoJoueur::delJoueur($idj);
}

function getIDPlayer($name) {
    include_once 'daoJoueur.php';
    daoJoueur::getIDPlayer($name);
}

class item {

    public $nom = "haha";
    public $nationalite;

    static function getJoueurs() {
        include_once 'daoJoueur.php';
        //$items= daoJoueur::getListeJoueur();
        $items = daoJoueur::getListeJoueur();
        return $items;
    }

    static function getTest() {

        return "haha";
    }

    // renvoie les joueurs de demi finale
    static function getJoueurDemiFinale() {
        include_once 'daoJoueur.php';
       // include_once 'daoPartie.php';
        //$items= daoJoueur::getListeJoueur();
        $items = daoJoueur::getListeJoueur();
        return $items;
    }

}

?>