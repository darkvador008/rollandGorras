<?php require "$racine/vue/header.php"; ?>

<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
//session_start ();
// On récupère nos variables de session



if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
    if ($tournoiCommence !=4) {
        ?>


        <div class="container creer">
            <h1> Créez les parties du tournoi</h1>
            <div class="crtPrt row">
                <form id="creer">
                    <select class="form-control sel col-md-4" id="j1" onchange="checkDuplicate()">
                        <option value="player1">Joueur 1</option>
                        <?php
                        for ($i = 0; $i < count($item); $i++) {
                            echo"<option value='" . $item[$i]->monID . "'>";
                            //echo $item[$i]->nom;
                            echo $item[$i]->nom;
                            echo '</option>';
                        };
                        ?>
                    </select>
                    <label class="col-md-1 txtc"> VS</label>
                    <select class="form-control sel col-md-4" id="j2" onchange="checkDuplicate()">
                        <option value="player2">Joueur 2</option>
                        <?php
                        for ($i = 0; $i < count($item); $i++) {
                            echo"<option value='" . $item[$i]->monID . "'>";
                            echo $item[$i]->nom;
                            echo '</option>';
                        };
                        ?>
                    </select>
                    <label class="col-md-1 txtc"> ON </label>
                    <select class="form-control sel col-md-2" id="ter1">
                        <option value="1">Terrain 1</option>
                        <option value="2">Terrain 2</option>
                        <option value="3">Terrain 3</option>
                        <option value="4">Terrain 4</option>
                    </select>
                    <button type="button" class="btn btn-info btnCreer" id="addPartie" name="valider" onclick="disableInputs(j1, j2, ter1, true), rm(j1, j2)">Valider</button>
            </div >
            <div class="crtPrt row">

                <select class="form-control sel col-md-4" id="j12" onchange="checkDuplicate()">
                    <option value="player1">Joueur 1</option>
                    <?php
                    for ($i = 0; $i < count($item); $i++) {
                        echo"<option value='" . $item[$i]->monID . "'>";
                        //echo $item[$i]->nom;
                        echo $item[$i]->nom;
                        echo '</option>';
                    };
                    ?>
                </select>
                <label class="col-md-1 txtc"> VS</label>
                <select class="form-control sel col-md-4" id="j22" onchange="checkDuplicate()">
                    <option value="player2">Joueur 2</option>
                    <?php
                    for ($i = 0; $i < count($item); $i++) {
                        echo"<option value='" . $item[$i]->monID . "'>";
                        echo $item[$i]->nom;
                        echo '</option>';
                    };
                    ?>
                </select>
                <label class="col-md-1 txtc"> ON </label>
                <select class="form-control sel col-md-2" id="ter2">
                    <option value="1">Terrain 1</option>
                    <option value="2">Terrain 2</option>
                    <option value="3">Terrain 3</option>
                    <option value="4">Terrain 4</option>
                </select>
                <button type="button" class="btn btn-info btnCreer" id="addPartie2" name="valider" onclick="disableInputs(j12, j22, ter2, true), rm(j12, j22)">Valider</button>
            </div >
            <div class="crtPrt row">

                <select class="form-control sel col-md-4" id="j13" onchange="checkDuplicate()">
                    <option value="player1">Joueur 1</option>
                    <?php
                    for ($i = 0; $i < count($item); $i++) {
                        echo"<option value='" . $item[$i]->monID . "'>";
                        //echo $item[$i]->nom;
                        echo $item[$i]->nom;
                        echo '</option>';
                    };
                    ?>
                </select>
                <label class="col-md-1 txtc"> VS</label>
                <select class="form-control sel col-md-4" id="j23" onchange="checkDuplicate()">
                    <option value="player2">Joueur 2</option>
                    <?php
                    for ($i = 0; $i < count($item); $i++) {
                        echo"<option value='" . $item[$i]->monID . "'>";
                        echo $item[$i]->nom;
                        echo '</option>';
                    };
                    ?>
                </select>
                <label class="col-md-1 txtc"> ON </label>
                <select class="form-control sel col-md-2" id="ter3">
                    <option value="1">Terrain 1</option>
                    <option value="2">Terrain 2</option>
                    <option value="3">Terrain 3</option>
                    <option value="4">Terrain 4</option>
                </select>
                <button type="button" class="btn btn-info btnCreer" id="addPartie3" name="valider" onclick="disableInputs(j13, j23, ter3, true), rm(j13, j23)">Valider</button>
            </div >
            <div class="crtPrt row">

                <select class="form-control sel col-md-3" id="j14" onchange="checkDuplicate()">
                    <option value="player1">Joueur 1</option>
                    <?php
                    for ($i = 0; $i < count($item); $i++) {
                        echo"<option value='" . $item[$i]->monID . "'>";
                        //echo $item[$i]->nom;
                        echo $item[$i]->nom;
                        echo '</option>';
                    };
                    ?>
                </select>
                <label class="col-md-1 txtc"> VS</label>
                <select class="form-control sel col-md-4" id="j24" onchange="checkDuplicate()">
                    <option value="player2">Joueur 2</option>
                    <?php
                    for ($i = 0; $i < count($item); $i++) {
                        echo"<option value='" . $item[$i]->monID . "'>";
                        echo $item[$i]->nom;
                        echo '</option>';
                    };
                    ?>
                </select>
                <label class="col-md-1 txtc"> ON </label>
                <select class="form-control sel col-md-2" id="ter4">
                    <option value="1">Terrain 1</option>
                    <option value="2">Terrain 2</option>
                    <option value="3">Terrain 3</option>
                    <option value="4">Terrain 4</option>
                </select>
                <button type="button" class="btn btn-info btnCreer" id="addPartie4" name="valider" onclick="disableInputs(j14, j24, ter4, true), rm(j14, j24)">Valider</button>
            </div >













            <br><br><br><br><br>

            </form>
        </div>


        <?php
    } else { // match déjà commencé
        
    echo '
        <div class = "alert alert-danger fade in"> <a href = "#" class = "close" data-dismiss = "alert">&times;
        </a>
        <strong><center>Attention! </strong> le tournoi a déjà commencé</center>
        </div>
        <br><br><br><br>';
        
    }
} else {
    echo '
        <div class = "alert alert-danger fade in"> <a href = "index.php?page=_login" class = "close" data-dismiss = "alert">&times;
        </a>
        <strong><center>Erreur!</strong> Veuillez vous loguer!Vous pouvez fermer ce message.</center>
        </div>
        <br><br><br><br>';
}
?>     <!--Fin du if de session-->
<?php require "$racine/vue/footer.php"; ?>