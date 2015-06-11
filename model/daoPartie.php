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
				JOIN player c ON c.id = a.playerID2 ";
        //WHERE tour=" . $tour;
// il y a un bug ici avec le where tour pour l'instant comme il est pas incrémonté dans le POST
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
        self::connectDB();
        $tour = self::getTourPartie($partie_id);
        //pour insérer sur le bon joueur
        if ($numButton == 2) {
            $tmp = $scorej1;
            $scorej1 = $scorej2;
            $scorej2 = $tmp;
        }
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

                if ($numButton == 2) {
                    self::addSet($partie_id, $scorej2, $scorej1, $tour);
                } else {
                    self::addSet($partie_id, $scorej1, $scorej2, $tour);
                }


                if (self::checkPartieFinish($partie_id) == 1) { // vérifie si la partie est terminée
                    if ($scorej1 == 45) { // on met 1 pour le point du gagnant
                        $scorej1 = 1;
                        $scorej2 = 0;
                    } else {
                        $scorej1 = 1;
                        $scorej2 = 0;
                    }
                } else { // la partie est pas fini donc on remet à zéro pour continuer
                    $scorej1 = 0;
                    $scorej2 = 0;
                }
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
        //echo $sql;
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
    public static function addSet($partieID, $joueur1, $joueur2, $numSet) {
        echo '(score j1[' . $joueur1 . '] score J2[' . $joueur2 . ']  )';
        // Pas besoin d'ouvrir ou fermer la connexion DB car déjà ouverte
        $sql = "";
        if (daoPartie::getSetExist($partieID) == 0) {
            // on crée le set
            echo ' / NOUVEAU SET / ';
            if ($joueur1 == 45) {
                $sql = "INSERT INTO `garrosdb`.`set` (`idSet`, `partie_id`, `j1`, `j2`, `numSet` ) VALUES (NULL, '" . $partieID . "', '1', '0','1')";
            } else {
                $sql = "INSERT INTO `garrosdb`.`set` (`idSet`, `partie_id`, `j1`, `j2`, `numSet`) VALUES (NULL, '" . $partieID . "', '0', '1','1')";
            }
        } elseif (self::getGagnantSetExist($partieID, $numSet) == 1) {
            if ($numSet == 3) {
                self::setPartieFinish($partieID);
                //self::setJ1Gagnant($partieID);
                //echo 'JOUEUR 1:[' . $joueur2TMP . ']';
//                if ($joueur1 == 45) {
//                    self::setJ1Gagnant($partieID);
//                    echo ' +1J1 ';
//                } elseif ($joueur2 == 45) {
//                    self::setJ2Gagnant($partieID);
//                    echo ' +1J2 ';
//                }

                echo ' / PARTIE FINIE / ';
            } else {
                // Si il y a un gagnant dans le set
                self::setIncrementTourPartie($partieID);
                $tourTMP = self::getTourPartie($partieID);
                echo ' /GAGNANT NOUVEAU SET / ';
                if ($joueur1 == 45) {
                    $sql = "INSERT INTO `garrosdb`.`set` (`idSet`, `partie_id`, `j1`, `j2`, `numSet` ) VALUES (NULL, '" . $partieID . "', '1', '0','" . $tourTMP . "')";
                } else {
                    $sql = "INSERT INTO `garrosdb`.`set` (`idSet`, `partie_id`, `j1`, `j2`, `numSet`) VALUES (NULL, '" . $partieID . "', '0', '1','" . $tourTMP . "')";
                }
            }
        } else {
            // si il y a pas de gagnant dans le set
            // on met à jour le set
            echo ' /MISE A JOUR DU SET';
            if ($joueur1 == 45) {
                $sql = "UPDATE `set` SET `j1`=`j1`+1 WHERE `partie_id`=" . $partieID . " AND numSet=" . $numSet;
            } elseif ($joueur2 == 45) {
                $sql = "UPDATE `set` SET `j2`=`j2`+1 WHERE `partie_id`=" . $partieID . " AND numSet=" . $numSet;
            }
        }
        mysql_query($sql);
    }

    // retourne si la partie existe ou non
    public static function getSetExist($partieID) {

        self::connectDB();
        $sql = "SELECT Count(distinct partie_id) AS valeur FROM `set` where `partie_id`=" . $partieID;
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);
        if ($row[0] == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
        self::deconnect();
    }

    // retourne à quel tour on est
    public static function getTourPartie($partieID) {
//        self::connectDB();
        $sql = "SELECT `tour` FROM `partie` WHERE `id`=" . $partieID;
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);

//        self::deconnect();
        return $row[0];
    }

    // vérifie le gagnant d'un set, pour un nouveau set
    public static function getGagnantSetExist($partieID, $numTour) {
//        self::connectDB();
        $sql = "SELECT COUNT(DISTINCT idSet) AS valeur FROM `set` 
                WHERE (`partie_id`=" . $partieID . " and `numSet`=" . $numTour . ")
                AND (`j1`>=6 OR `j2` >=6) 
                AND (`j1`-2>=`j2` OR `j2`-2>=`j1`)";
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);
        if ($row[0] == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
//        self::deconnect();
    }

    //augmente d'un tour la partie
    public static function setIncrementTourPartie($partieID) {
//        self::connectDB();
        $sql = "UPDATE `partie` SET `tour`=`tour`+1 WHERE `id`=" . $partieID;
        mysql_query($sql);

//        self::deconnect();
    }

    // vérifie que les 4 parties sont terminée, et crée les deux nouvelles partie avec les gagnant
    public static function createDemiFinale() {
        
    }

    // retourne vrais si la partie complète est terminée
    public static function checkPartieFinish($partie) {
        //self::connectDB();
        $sql = "SELECT Count(distinct id) AS valeur FROM `partie` where `id`=" . $partie . " and `finish`=1";
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);
        if ($row[0] == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function checkFinSet($partie) {
        
    }

    // met que la partie est terminée
    public static function setPartieFinish($partie) {
        $sql = "UPDATE `partie` SET `finish`=1 WHERE `id`=" . $partie;
        mysql_query($sql);
    }

    // ne fonctionne pas car il est remis a zéro dans le bouton +
    public static function setJ1Gagnant($partie) {

        $sql2 = "UPDATE `partie` SET `scorej1`=1 WHERE `id`=" . $partie;
        mysql_query($sql2);
    }

    public static function setJ2Gagnant($partie) {
        $sql = "UPDATE `partie` SET `scorej2`=1 WHERE `id`=" . $partie;
        mysql_query($sql);
    }

}

?>