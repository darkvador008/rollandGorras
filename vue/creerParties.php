<?php require "$racine/vue/header.php"; ?>
<div class="container">
    <h1> Créez les parties du tournoi</h1>
    <div class="crtPrt row">
        <form id="creer">
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
            <select class="form-control sel col-md-2" id="ter1">
                <option value="1">Terrain 1</option>
                <option value="2">Terrain 2</option>
                <option value="3">Terrain 3</option>
                <option value="4">Terrain 4</option>
            </select>
 <button type="button" class="btn btn-info " id="addPartie" name="valider" onclick="disableInputs(j1,j2,true), rm(j1,j2)">Valider</button>

    </div >
        <div class="crtPrt row">
       
            <select class="form-control sel col-md-4" id="j12" onchange="checkDuplicate()">
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
            <select class="form-control sel col-md-4" id="j22" onchange="checkDuplicate()">
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
            <select class="form-control sel col-md-2" id="ter2">
                <option value="1">Terrain 1</option>
                <option value="2">Terrain 2</option>
                <option value="3">Terrain 3</option>
                <option value="4">Terrain 4</option>
            </select>
 <button type="button" class="btn btn-info " id="addPartie2" name="valider" onclick="disableInputs(j12,j22,true), rm(j12,j22)">Valider</button>

    </div >
        <div class="crtPrt row">
    
            <select class="form-control sel col-md-4" id="j13" onchange="checkDuplicate()">
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
            <select class="form-control sel col-md-4" id="j23" onchange="checkDuplicate()">
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
            <select class="form-control sel col-md-2" id="ter3">
                <option value="1">Terrain 1</option>
                <option value="2">Terrain 2</option>
                <option value="3">Terrain 3</option>
                <option value="4">Terrain 4</option>
            </select>
 <button type="button" class="btn btn-info " id="addPartie3" name="valider" onclick="disableInputs(j13,j23,true), rm(j13,j23)">Valider</button>

    </div >
        <div class="crtPrt row">
        
            <select class="form-control sel col-md-4" id="j14" onchange="checkDuplicate()">
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
            <select class="form-control sel col-md-4" id="j24" onchange="checkDuplicate()">
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
            <select class="form-control sel col-md-2" id="ter4">
                <option value="1">Terrain 1</option>
                <option value="2">Terrain 2</option>
                <option value="3">Terrain 3</option>
                <option value="4">Terrain 4</option>
            </select>
 <button type="button" class="btn btn-info " id="addPartie4" name="valider" onclick="disableInputs(j14,j24,true), rm(j14,j24)">Valider</button>

    </div >
    <button type="button" class="btn btn-warning " name="reset" onclick="rez()">Reset</button>
    
</div>
</form>
<?php require "$racine/vue/footer.php"; ?>