<?php
 

function addPartie($PlayerID1,$PlayerID2,$terrainID){
	include_once 'daoPartie.php';
	 daoPartie::addPartie($PlayerID1,$PlayerID2,$terrainID);
}

function getParties($tour){
	include_once 'daoPartie.php';
	 $parties=daoPartie::getParties($tour);
	 return $parties;
}
?>
