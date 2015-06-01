<?php   require "$racine/vue/header.php"; ?>
<div class="container">
<h1> Créez les parties du tournoi</h1>
	<div class="crtPrt row">
	<form>
	<select class="form-control sel col-md-4" id="sel1" onchange="checkDuplicate()">
		<option value="player1">Joueur 1</option>
		<?php
		for ($i=0;$i<count($item);$i++){
		echo"<option value=' $i '>";
				echo $item[$i]->nom;
		echo '</option>';
		};
		?>
	</select>
	<label class="col-md-1"> VS</label>
	<select class="form-control sel col-md-4" id="sel2" onchange="checkDuplicate()">
		<option value="player2">Joueur 2</option>
		<?php
		for ($i=0;$i<count($item);$i++){
		echo"<option value=' $i '>";
				echo $item[$i]->nom;
		echo '</option>';
		};
		?>
	</select>
	<label class="col-md-1"> ON </label>
	<select class="form-control sel col-md-2" id="sel3" onchange="checkDuplicate()">
		<option value="t1">Terrain 1</option>
		<option value="t2">Terrain 2</option>
		<option value="t3">Terrain 3</option>
		<option value="t4">Terrain 4</option>

	</select>
	
		<button  class="btn btn-info "  onclick="disableInputs(true)">Valider</button>
		<button type="submit" class="btn btn-warning " name="modifier" onclick="disableInputs(false)">Modifier</button>
</form>
</div>

	<button type="submit" class="btn btn-info " name="valider" onclick="disableInputs(true)">Valider2</button>
	<button type="submit" class="btn btn-warning " name="modifier" onclick="disableInputs(false)">Modifier</button>
</div>
<?php   require "$racine/vue/footer.php"; ?>