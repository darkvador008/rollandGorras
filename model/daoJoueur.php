<?php

/*
* A changer connexion sql etc car deprecié
*/
class daoJoueur{
	private static $link;
	private static $db;
	private static function connectDB(){
		// connexion au serveur mysql
		self::$link = mysql_connect("localhost","root","");
		// connexion à la DB garrosdb
		self::$db=mysql_select_db("garrosdb");
	}
	private static function deconnect(){
		mysql_close(self::$link);
	}
	public static function getListeJoueur(){
		self::connectDB();
		$query = "SELECT * FROM player LIMIT 0 , 30";
		$res=mysql_query($query);
		$items=array();
		while($ligne=mysql_fetch_assoc($res)){
			$item=new item();
			$item->nom=$ligne['nom'];
			$item->nationalite=$ligne['nationalite'];
			$item->annif=$ligne['naissance'];
			$items[]=$item;
		}
		self::deconnect();
		return $items;
	}
	public static function getTest(){
		return 'hello';
	}
}
?>