<?php
 

class daoPartie{
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


	public static function addPartie($PlayerID1,$PlayerID2,$terrainID){
		self::connectDB();
		$sql = "INSERT INTO partie VALUES ('', '$PlayerID1', '$PlayerID2','NULL', '1')";
		mysql_query($sql);
		self::deconnect();
	}	

	public static function getParties($tour){

		self::connectDB();
		$sql = "SELECT * FROM partie where tour=".$tour;

		$res=mysql_query($sql);
		$parties=array();
		while($ligne=mysql_fetch_assoc($res)){
			$parties[0]=$ligne['id'];
			
		}
		self::deconnect();
		return $parties;

		
	}

	public static function getTest(){
		return 'hello';
	}

}
?>