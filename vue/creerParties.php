<?php require "$racine/vue/header.php"; ?>
<div class="container">
    <h1> Créez les parties du tournoi</h1>
    <div class="crtPrt row">
        <form>
            <select class="form-control sel col-md-4" id="j1" onchange="checkDuplicate()">
                <option value="player1">Joueur 1</option>
                <?php
                for ($i = 0; $i < count($item); $i++) {
                    echo"<option value='".$item[$i]->monID."'>";
                    //echo $item[$i]->nom;
                    echo $item[$i]->nom ;
                    echo '</option>';
                };
                ?>
            </select>
            <label class="col-md-1 txtc"> VS</label>
            <select class="form-control sel col-md-4" id="j2" onchange="checkDuplicate()">
                <option value="player2">Joueur 2</option>
                <?php
                for ($i = 0; $i < count($item); $i++) {
                    echo"<option value='".$item[$i]->monID."'>";
                    echo $item[$i]->nom;
                    echo '</option>';
                };
                ?>
            </select>
            <label class="col-md-1 txtc"> ON </label>
            <select class="form-control sel col-md-2" id="ter" onchange="checkDuplicate()">
                <option value="1">Terrain 1</option>
                <option value="2">Terrain 2</option>
                <option value="3">Terrain 3</option>
                <option value="4">Terrain 4</option>
            </select>

    </div >
    <button type="button" class="btn btn-info " id="addPartie" name="valider" onclick="disableInputs(true)">Valider</button>
    <button type="button" class="btn btn-warning " name="modifier" onclick="disableInputs(false)">Modifier</button>
</div>
</form>
<?php require "$racine/vue/footer.php"; ?>