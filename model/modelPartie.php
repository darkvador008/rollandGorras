<?php

function addPartie($PlayerID1, $PlayerID2, $terrainID) {
    include_once 'daoPartie.php';
    daoPartie::addPartie($PlayerID1, $PlayerID2, $terrainID);
}

function getParties($tour) {
    include_once 'daoPartie.php';
    $parties = daoPartie::getParties($tour);
    return $parties;
}

function scorePlus($scorej1, $scorej2, $partieID, $numButton) {
    include_once'daoPartie.php';
    daoPartie::scorePlus($scorej1, $scorej2, $partieID, $numButton);
}

function scoreMinus($scorej1, $scorej2, $partieID, $numButton) {
    include_once'daoPartie.php';
    daoPartie::scoreMinus($scorej1, $scorej2, $partieID, $numButton);
}

function revert($var1, $var2) {
    include_once'daoPartie.php';
    daoPartie::revert($var1, $var2);
}

?>
