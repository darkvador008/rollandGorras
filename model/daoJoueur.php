<?php

/*
* A changer connexion sql etc car deprecié
*/
class daoJoueur{
	private static $link;
	private static $db;
	private static function connectDB(){
		// connexion au serveur mysql
		self::$link = @mysql_connect("localhost","root","");
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
			$item->monID=$ligne['id'];
			$item->nom=$ligne['nom'];
			$item->nationalite=$ligne['nationalite'];
			$item->image=$ligne['image'];
			$items[]=$item;
		}
		self::deconnect();
		return $items;
	}

	public static function addJoueur($nom,$nationalite,$image){
		self::connectDB();
		$nomJoueur = mysql_real_escape_string($nom);
		$nationaliteJoueur = mysql_real_escape_string($nationalite);
		$sql = "INSERT INTO player VALUES (NULL, '$nomJoueur', '$nationaliteJoueur', '$image')";
		mysql_query($sql);
		self::deconnect();
	}	
	public static function delJoueur($idj){
		self::connectDB();
		$id = mysql_real_escape_string($idj);
		$sql = "DELETE FROM player WHERE id=".$idj;
		mysql_query($sql);
		self::deconnect();
	}

	public static function getTest(){
		return 'hello';
	}

}
?>