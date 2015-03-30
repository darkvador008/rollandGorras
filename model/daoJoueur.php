<?php
class daoJoueur{
	private static $link;
	private static $db;

	private static function connectDB(){
		// connexion au serveur mysql
		self::$link = mysql_connect("localhost","root","");

		// connexion à la DB garrosdb
		self::$db=mysql_select_db("garrosdb");
	}

	public static function getListeJoueur(){
		self::connectDB();


	}





}
?>