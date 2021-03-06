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
            $partie[20] = $tour;
//$tmp = array();
            $tmp = self::getAllSetPartie($partie[0]);
            for ($i = 0; $i <= count($tmp) - 1; $i++) {
                $partie[$i + 5] = $tmp[$i];
            }

            $rez[$cpt] = $partie;
            $partie = array();
            $cpt++;
        }
        self::deconnect();

        return json_encode($rez);
    }

    public static function getAllParties() {

        self::connectDB();
//$sql = "SELECT * FROM partie where tour=".$tour;
        $sql = "SELECT a.id as id,a.playerID1 as playerID1, a.playerID2 as playerID2,a.`finish` as finish, a.scorej1 as scorej1, a.scorej2 as scorej2, b.nom as nom1, c.nom as nom2 "
                . "FROM `partie` a"
                . " JOIN player b ON b.id = a.playerID1 "
                . "JOIN player c ON c.id = a.playerID2 "
                . "WHERE 1 ";
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
            $partie[3] = $ligne['finish'];
            $partie[4] = $ligne['scorej1'];
            $partie[5] = $ligne['scorej2'];

//$tmp = array();
            $tmp = self::getAllSetPartie($partie[0]);
            for ($i = 0; $i <= count($tmp) - 1; $i++) {
                $partie[$i + 6] = $tmp[$i];
            }

            $rez[$cpt] = $partie;
            $partie = array();
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

        $sql = "INSERT INTO partie VALUES ('', '$PlayerID1', '$PlayerID2','$date', '$terrainID', 1,0,0,0,1)";
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
        $numSet = self::getNumSet($partie_id);
        $tour = self::getTour($partie_id);

//pour insérer sur le bon joueur
        if ($numButton == 2) {
            $tmp = $scorej1;
            $scorej1 = $scorej2;
            $scorej2 = $tmp;
        }
//si numButton=1 on update scorej1 et inversement
//        if (self::isTieBreak($partie_id)) {
//            $scorej1 = 99;
//        }
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

//////////////////////////
                if ($scorej2 < 40) {
                    if ($numSet == 2 && self::isGagnantMacthSet2($partie_id) == 11 && self::isMinimumSetForWin($partie_id)) {
                        self::setPartieFinish($partie_id);
                        self::setJ1Gagnant($partie_id);
                    } elseif ($numSet == 2 && self::isGagnantMacthSet2($partie_id) == 12 && self::isMinimumSetForWin($partie_id)) {
                        self::setPartieFinish($partie_id);
                        self::setJ2Gagnant($partie_id);
                    } else {
                        if ($numButton == 2) {
                            self::addSet($partie_id, $scorej2, 45, $numSet, $tour, $numButton);
                        } else {
                            self::addSet($partie_id, 45, $scorej2, $numSet, $tour, $numButton);
                        }
                    }
                    if (self::checkPartieFinish($partie_id) == 1) { // vérifie si la partie est terminée
                        if (self::getGagnantAllSet($partie_id) == 1) { // on met 1 pour le point du gagnant
                            if ($numButton == 2) {
                                $scorej1 = 0;
                                $scorej2 = 1;
                            } else {
                                $scorej1 = 1;
                                $scorej2 = 0;
                            }
                        } else {
                            if ($numButton == 2) {
                                $scorej1 = 1;
                                $scorej2 = 0;
                            } else {
                                $scorej1 = 0;
                                $scorej2 = 1;
                            }
                        }
                    } else { // la partie est pas fini donc on remet à zéro pour continuer
                        $scorej1 = 0;
                        $scorej2 = 0;
                    }
                }


                break;

            case 45: //avantage
                if ($numSet == 2 && self::isGagnantMacthSet2($partie_id) == 11 && self::isMinimumSetForWin($partie_id)) {
                    self::setPartieFinish($partie_id);
                    self::setJ1Gagnant($partie_id);
                } elseif ($numSet == 2 && self::isGagnantMacthSet2($partie_id) == 12 && self::isMinimumSetForWin($partie_id)) {
                    self::setPartieFinish($partie_id);
                    self::setJ2Gagnant($partie_id);
                } else {
                    if ($numButton == 2) {
                        self::addSet($partie_id, $scorej2, $scorej1, $numSet, $tour, $numButton);
                    } else {
                        self::addSet($partie_id, $scorej1, $scorej2, $numSet, $tour, $numButton);
                    }
                }
                if (self::checkPartieFinish($partie_id) == 1) { // vérifie si la partie est terminée
                    if (self::getGagnantAllSet($partie_id) == 1) { //Si joueur 1 gagne
                        if ($numButton == 2) {
                            $scorej1 = 0;
                            $scorej2 = 1;
                        } else {
                            $scorej1 = 1;
                            $scorej2 = 0;
                        }
                    } else { // si joueur 2 gagne
                        if ($numButton == 2) {
                            $scorej1 = 1;
                            $scorej2 = 0;
                        } else {
                            $scorej1 = 0;
                            $scorej2 = 1;
                        }
                    }
                } else { // la partie est pas fini donc on remet à zéro pour continuer
                    $scorej1 = 0;
                    $scorej2 = 0;
                }
//j1 a gagné un set

                break;
//                if ($numButton == 2) {
//                    $tmp = $scorej1;
//                    $scorej1 = $scorej2;
//                    $scorej2 = $tmp;
//                }
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
    public static function addSet($partieID, $joueur1, $joueur2, $numSet, $tour, $numButton) {
        echo '(score j1[' . $joueur1 . '] score J2[' . $joueur2 . ']  )';
        echo 'touuuuuuuuuuuuuuuuuur =' . $tour;
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
                if ($tour == 1) {
                    if (self::checkDemiFinaleAvaible() == true) { // on vérifie si c'est possible
                        if (self::getGagnantAllSet($partieID) == 1) {
                            self::setJ1Gagnant($partieID);
                        } else {
                            self::setJ2Gagnant($partieID);
                        }

                        self :: createDemiFinale();
                    }
                } else if ($tour == 2) {
                    if (self::checkFinaleAvaible() == 1) {
                        if (self::getGagnantAllSet($partieID) == 1) {
                            self::setJ1Gagnant($partieID);
                        } else {
                            self::setJ2Gagnant($partieID);
                        }

                        self::createFinale();
                    }
                } else if ($tour == 3) {
                    if (self::checkGagnantFinaleAvaible() == 1) {
                        echo 'ET VOILAAAAAAAAAAAAAA LE TOURNOI EST FINI !!!!!!!!!! '; //je sais pas quoi mettre pour la fin 
                    }
                }
                echo ' / PARTIE FINIE / ';
            } else {
// Si il y a un gagnant dans le set
                self::setIncrementSetPartie($partieID);
                $nbSetTMP = self::getNumSet($partieID);
                echo ' /GAGNANT NOUVEAU SET / ';
                if ($joueur1 == 45) {
                    $sql = "INSERT INTO `garrosdb`.`set` (`idSet`, `partie_id`, `j1`, `j2`, `numSet` ) VALUES (NULL, '" . $partieID . "', '1', '0','" . $nbSetTMP . "')";
                } else {
                    $sql = "INSERT INTO `garrosdb`.`set` (`idSet`, `partie_id`, `j1`, `j2`, `numSet`) VALUES (NULL, '" . $partieID . "', '0', '1','" . $nbSetTMP . "')";
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

// retourne à quel set on est
    public static function getNumSet($partieID) {
//        self::connectDB();
        $sql = "SELECT `numSet` FROM `partie` WHERE `id`=" . $partieID;
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);

//        self::deconnect();
        return $row[0];
    }

// renvoie le tour de la partie
    public static function getTour($partieID) {
//        self::connectDB();
        $sql = "SELECT `tour` FROM `partie` WHERE `id`=" . $partieID;
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);

//        self::deconnect();
        return $row[0];
    }

// vérifie le gagnant d'un set, pour un nouveau set
    public static function getGagnantSetExist($partieID, $numSet) {
//        self::connectDB();
        $sql = "SELECT COUNT(DISTINCT idSet) AS valeur FROM `set` 
                WHERE (`partie_id`=" . $partieID . " and `numSet`=" . $numSet . ")
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

//augmente d'un set la partie
    public static function setIncrementSetPartie($partieID) {
//        self::connectDB();
        $sql = "UPDATE `partie` SET `numSet`=`numSet`+1 WHERE `id`=" . $partieID;
        mysql_query($sql);

//        self::deconnect();
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

// vérifie que les 4 parties sont terminée, et crée les deux nouvelles partie avec les gagnant
    public static function createDemiFinale() {

        $sql = " SELECT `playerID1` as GAGNANT FROM `partie` WHERE `scorej1`=1 and `tour`=1
               UNION SELECT `playerID2` as GAGNANT FROM `partie` WHERE `scorej2`=1 and `tour`=1";
        $res = mysql_query($sql);

        $items = array();
        while ($ligne = mysql_fetch_assoc($res)) {
            $items[] = $ligne['GAGNANT'];
        }
        $idJ1 = $items[0];
        $idJ2 = $items[1];
        $idJ3 = $items[2];
        $idJ4 = $items[3];
        echo 'LISTE DEMI FINALE ' . $idJ1 . ' ' . $idJ2 . ' ' . $idJ3 . ' ' . $idJ4;


        $date = date_default_timezone_get();
        $date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));

        $sql = "INSERT INTO partie VALUES ('', '$idJ1', '$idJ2','$date', 1, 1,0,0,0,2)";
        mysql_query($sql);
        $sql = "INSERT INTO partie VALUES ('', '$idJ3', '$idJ4','$date', 1, 1,0,0,0,2)";
        mysql_query($sql);
    }

// crée la partie finale
    public static function createFinale() {
        $sql = "SELECT `playerID1` as GAGNANT FROM `partie` WHERE `scorej1`=1 and `tour`=2
               UNION SELECT `playerID2` as GAGNANT FROM `partie` WHERE `scorej2`=1 and `tour`=2";
        $res = mysql_query($sql);

        $items = array();
        while ($ligne = mysql_fetch_assoc($res)) {
            $items[] = $ligne['GAGNANT'];
        }
        $idJ1 = $items[0];
        $idJ2 = $items[1];
        echo 'LISTE FINALE ' . $idJ1 . ' ' . $idJ2;
        $date = date_default_timezone_get();
        $date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));

        $sql = "INSERT INTO partie VALUES ('', '$idJ1', '$idJ2','$date', 1, 1,0,0,0,3)";
        mysql_query($sql);
    }

// vérifie si on peut créer les demi finales
    public static function checkDemiFinaleAvaible() {
        $sql = "SELECT count(`id`) FROM `partie` WHERE `tour` =1 and `finish` =1";
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);
        echo'rrrrrrrrrrrrrrrrrrrrrroooooow' . $row[0];
        if ($row[0] == 4) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

// vérifie si on peut créer les demi finales
    public static function checkFinaleAvaible() {
        $sql = "SELECT count(`id`) FROM `partie` WHERE `tour` =2 and `finish` =1";
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);
        if ($row[0] == 2) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

// vérifie si il y a un gagnant pour la finale
    public static function checkGagnantFinaleAvaible() {
        $sql = "SELECT count(`id`) FROM `partie` WHERE `tour` =3 and `finish` =1";
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);
        if ($row[0] == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

// met à jour le terrain de la partie 
    public static function updateTerrain($partie, $terrainID) {
        self::connectDB();
        $sql = "UPDATE partie SET `terrainID`=" . $terrainID . " where id=" . $partie;
        mysql_query($sql);
        self::deconnect();
    }

    public static function getAllSetPartie($partie) {
        $sql = "SELECT * FROM `set` WHERE `partie_id`='" . $partie . "'";
        $res = mysql_query($sql);
        $setTMP = array();
        while ($ligne = mysql_fetch_assoc($res)) {
            array_push($setTMP, $ligne['j1']);
            array_push($setTMP, $ligne['j2']);
        }

        return $setTMP;
    }

// envoie les info pour le live
    public static function getLive() {

        self::connectDB();
//$sql = "SELECT * FROM partie where tour=".$tour;
        $sql = "SELECT a.id as id,
                a.playerID1 as playerID1,
                b.nom as nom1, 
                a.playerID2 as playerID2,
                c.nom as nom2, 
                a.`finish` as finish, 
                a.scorej1 as scorej1, 
                a.scorej2 as scorej2 

                FROM `partie` a
                JOIN player b ON b.id = a.playerID1 
                JOIN player c ON c.id = a.playerID2 
                WHERE a.finish=0";

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
            $partie[3] = $ligne['finish'];
            $partie[4] = $ligne['scorej1'];
            $partie[5] = $ligne['scorej2'];

            $tmp = array();
            $tmp = self::getAllSetPartie($partie[0]);
            for ($i = 0; $i <= count($tmp) - 1; $i++) {
                $partie[$i + 6] = $tmp[$i];
            }

            $rez[$cpt] = $partie;
            $partie = array();
            $cpt++;
        }
        self::deconnect();

        return json_encode($rez);
    }

    public static function getTourMax() {
        self::connectDB();
        $sql = "SELECT max(`tour`) as TOUR FROM `partie`";
        $res = mysql_query($sql);
        $row = mysql_fetch_row($res);
        $result = 10;
        $result = $row[0];
        return $result;
        self::deconnect();
    }

// si gagnant j1 gagnant renvoie vrais sinon c'est j2 le gagnant 
    public static function getGagnantAllSet($partie) {
        $sql = "SELECT sum(`j1`) as j1,sum(`j2`) as j2 FROM `set` WHERE `partie_id`=" . $partie;
        $res = mysql_query($sql);

        $j1 = 50;
        $j2 = 51;
        echo($j1 . "  888888888      " . $j2);
        echo($j1 . "  888888888      " . $j2 . "                  ");

        while ($ligne = mysql_fetch_assoc($res)) {
            $j1 = intval($ligne['j1']);
            $j2 = intval($ligne['j2']);
        }
        echo($j1 . "  888888888      " . $j2 . "       /");
        echo ($j1 > $j2);
        echo('   ' . $j2 > $j1);

        if ($j1 > $j2) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function isTieBreak($partie_id) {
        $numset = self::getNumSet($partie_id);

        $sql = "SELECT j1,j2 FROM `set` WHERE `partie_id`=" . $partie_id . " AND `numSet`=" . $numset;
        $res = mysql_query($sql);
        $j1set = 50;
        $j2set = 52;


        while ($ligne = mysql_fetch_assoc($res)) {
            $j1set = $ligne['j1'];
            $j2set = $ligne['j2'];
        }

        if ($j1set + $j2set == 12) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

// Quand on est au 2 ieme set
// Joueur 1 gagne = 11
//joueur  2 gagne = 12
// il faut faire un troisième set 10
    public static function isGagnantMacthSet2($partie_id) {
        $numset = self::getNumSet($partie_id);

        $sql = "SELECT sum(`j1`) as j1,  sum(`j2`) as j2 FROM `set` WHERE`partie_id`=" . $partie_id;
        $res = mysql_query($sql);
        $j1set = 50;
        $j2set = 52;


        while ($ligne = mysql_fetch_assoc($res)) {
            $j1set = $ligne['j1'];
            $j2set = $ligne['j2'];
        }

        if ($j1set >= 12 && $j2set >= 12) {
            if ($j1set > $j2set) {
                return 11;
            } else {
                return 12;
            }
        } elseif ($j1set >= 12 && $j2set < 12) {
            return 11;
        } elseif ($j2set >= 12 && $j1set < 12) {
            return 12;
        } else {
            return 10;
        }
    }

    public static function isMinimumSetForWin($partie_id) {

        $sql = "select j1,j2
            FROM `set`
            WHERE `partie_id`=275 and `numSet`=(select max(`numSet`) as val
            FROM `set`
            WHERE `partie_id`=275)";

        $res = mysql_query($sql);
        $j1set = 50;
        $j2set = 52;

        while ($ligne = mysql_fetch_assoc($res)) {
            $j1set = $ligne['j1'];
            $j2set = $ligne['j2'];
        }

        if ($j1set > 5 || $j2set > 5) {
            return true;
        } else {
            return FALSE;
        }
    }

    // vérifie si on peut créer les demi finales
    public static function getTournoiBegin() {
        self::connectDB();
        $sql = "SELECT count(`id`) as id FROM `partie` WHERE `tour` =1";
        $res = mysql_query($sql);
        $result=10;
        while ($ligne = mysql_fetch_assoc($res)) {
            $result = $ligne['id'];
        }
        return intval($result);
        self::deconnect();
    }

}

?>