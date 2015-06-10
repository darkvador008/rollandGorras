<?php

class daoPartie {

    private static $link;
    private static $db;

    private static function connectDB() {
        // connexion au serveur mysql
        self::$link = @mysql_connect("localhost", "root", "");
        // connexion à la DB garrosdb
        self::$db = mysql_select_db("garrosdb");
    }

    public static function getParties($tour) {

        self::connectDB();
        //$sql = "SELECT * FROM partie where tour=".$tour;
        $sql = "SELECT a.id as id,a.playerID1 as playerID1, a.playerID2 as playerID2, a.scorej1 as scorej1, a.scorej2 as scorej2, b.nom as nom1, c.nom as nom2
				FROM `partie` a
				JOIN player b ON b.id = a.playerID1 
				JOIN player c ON c.id = a.playerID2 
				WHERE tour=" . $tour;


        $res = mysql_query($sql);
        $parties = array();
        $partie = array();
        $cpt = 0;
        $rez = array();
        while ($ligne = mysql_fetch_assoc($res)) {
            $partie[0] = $ligne['id'];
            $partie[1] = $ligne['nom1'];
            //$parties[2]=$ligne['playerID1'];
            //$parties[3]=$ligne['playerID2'];
            $partie[2] = $ligne['nom2'];
            $partie[3] = $ligne['scorej1'];
            $partie[4] = $ligne['scorej2'];

            $rez[$cpt] = $partie;
            $cpt++;
        }
        self::deconnect();

        return json_encode($rez);
    }

    private static function deconnect() {
        mysql_close(self::$link);
    }

    public static function addPartie($PlayerID1, $PlayerID2, $terrainID) {
        $date = date_default_timezone_get();
        $date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
        self::connectDB();

        $sql = "INSERT INTO partie VALUES ('', '$PlayerID1', '$PlayerID2','$date', '$terrainID', 1,0,0)";
        mysql_query($sql);
        self::deconnect();
    }

    public static function getTest() {
        return 'hello';
    }

    public function revert($var1, $var2) {
        $tmp = $var1;
        $var1 = $var2;
        $var2 = $tmp;
    }

    public static function scorePlus($scorej1, $scorej2, $partie_id, $numButton) {
        $scorej1TMP = $scorej1;
        $scorej2TMP = $scorej2;

        //pour insérer sur le bon joueur
        if ($numButton == 2) {
            $tmp = $scorej1;
            $scorej1 = $scorej2;
            $scorej2 = $tmp;
        }

        self::connectDB();
        //si numButton=1 on update scorej1 et inversement

        switch ($scorej1) {
            case 0:
            case 15:
                $scorej1+=15;
                break;
            case 30:
                $scorej1+=10;
                break;
            case 40:
                //j1 bouge pas et j2 perd l'avantage
                if ($scorej2 == 45) {
                    $scorej2-=5;
                }
                $scorej1+=5;
                break;

            case 45: //avantage
                $partID = $partie_id;
                echo'scorej1[' . $scorej1TMP . '] scorej2[' . $scorej2TMP . ']';
                daoPartie::addSet($partID, $scorej1TMP, $scorej2TMP);
                $scorej1 = 0;
                $scorej2 = 0;
                //j1 a gagné un set
                $sq2 = "";

                break;
                if ($numButton == 2) {
                    $tmp = $scorej1;
                    $scorej1 = $scorej2;
                    $scorej2 = $tmp;
                }
        }
        if ($numButton == 2) {
            $sql = "UPDATE partie SET scorej2='" . $scorej1 . "',scorej1='" . $scorej2 . "' where id=" . $partie_id;
        } else {
            $sql = "UPDATE partie SET scorej1='" . $scorej1 . "',scorej2='" . $scorej2 . "' where id=" . $partie_id;
        }
        echo $sql;
        @mysql_query($sql);
        self::deconnect();
    }

    // pour retirer les points
    public static function scoreMinus($scorej1, $scorej2, $partie_id, $numButton) {

        //pour insérer sur le bon joueur
        if ($numButton == 2) {
            $tmp = $scorej1;
            $scorej1 = $scorej2;
            $scorej2 = $tmp;
        }

        self::connectDB();
        //si numButton=1 on update scorej1 et inversement

        switch ($scorej1) {
            case 0:
                break;
            case 15:
                $scorej1-=15;
                break;
            case 30:
                $scorej1-=15;
                break;
            case 40:
                $scorej1-=10;
                break;

            case 45:
                $scorej1 -= 5;
                //$scorej2 = 0;
                //j1 a gagné un set
                break;
        }
        if ($numButton == 2) {
            $sql = "UPDATE partie SET scorej2='" . $scorej1 . "',scorej1='" . $scorej2 . "' where id=" . $partie_id;
        } else {
            $sql = "UPDATE partie SET scorej1='" . $scorej1 . "',scorej2='" . $scorej2 . "' where id=" . $partie_id;
        }
        echo $sql;
        mysql_query($sql);
        self::deconnect();
    }

    
    // Ajout ou met à jour un set
    public static function addSet($partieID, $joueur1, $joueur2) {
        // Pas besoin d'ouvrir ou fermer la connexion DB car déjà ouverte
        $sql = "";
        if (daoPartie::getSetExist($partieID) == 0) {
            // on crée le set
            if ($joueur1 == 45) {
                $sql = "INSERT INTO `garrosdb`.`set` (`idSet`, `partie_id`, `j1`, `j2`) VALUES (NULL, '" . $partieID . "', '1', '0')";
            } else {
                $sql = "INSERT INTO `garrosdb`.`set` (`idSet`, `partie_id`, `j1`, `j2`) VALUES (NULL, '" . $partieID . "', '0', '1')";
            }
        } else {
            // on met à jour le set
            if ($joueur1 == 45) {
                $sql = "UPDATE `set` SET `j1`=`j1`+1 WHERE `partie_id`=" . $partieID;
            } elseif ($joueur2 == 45) {
                $sql = "UPDATE `set` SET `j2`=`j2`+1 WHERE `partie_id`=" . $partieID;
            }
        }
        mysql_query($sql);
    }

    // retourne si la partie existe ou non
    public static function getSetExist($partieID) {

        self::connectDB();
        $sql = "SELECT Count(distinct idSet) AS valeur FROM `set` where `partie_id`=" . $partieID;
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);
        if ($row[0] == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
        self::deconnect();
    }

}

?>