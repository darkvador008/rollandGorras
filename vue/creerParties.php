<?php require "$racine/vue/header.php"; ?>
<div class="container">
    <h1> Créez les parties du tournoi</h1>
    <div class="crtPrt row">
        <form>
            <select class="form-control sel col-md-4" id="j1" onchange="checkDuplicate()">
                <option value="player1">Joueur 1</option>
                <?php
                for ($i = 0; $i < count($item); $i++) {
                    echo"<option value=' $i '>";
                    //echo $item[$i]->nom;
                    echo $item[$i]->monID;
                    echo '</option>';
                };
                ?>
            </select>
            <label class="col-md-1 txtc"> VS</label>
            <select class="form-control sel col-md-4" id="j2" onchange="checkDuplicate()">
                <option value="player2">Joueur 2</option>
                <?php
                for ($i = 0; $i < count($item); $i++) {
                    echo"<option value=' $i '>";
                    //echo $item[$i]->nom;
                    echo $item[$i]->monID;
                    echo '</option>';
                };
                ?>
            </select>
            <label class="col-md-1 txtc"> ON </label>
            <select class="form-control sel col-md-2" id="ter" onchange="checkDuplicate()">
                <option value="t1">Terrain 1</option>
                <option value="t2">Terrain 2</option>
                <option value="t3">Terrain 3</option>
                <option value="t4">Terrain 4</option>
            </select>

    </div >
    <button type="button" class="btn btn-info " id="addPartie" name="valider" onclick="disableInputs(true)">Valider</button>
    <button type="button" class="btn btn-warning " name="modifier" onclick="disableInputs(false)">Modifier</button>
</div>
</form>
<?php require "$racine/vue/footer.php"; ?>