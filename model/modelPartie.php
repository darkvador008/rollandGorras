<?php
 

function addPartie($PlayerID1,$PlayerID2,$terrainID){
	include_once 'daoPartie.php';
	 daoPartie::addPartie($PlayerID1,$PlayerID2,$terrainID);
	

}
?>
