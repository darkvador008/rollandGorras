<!--
Page des joueurs ADMINISTRATION
-->
<?php 	require "$racine/vue/header.php"; ?>  
<?php //var_dump($item); ?>


<!-- Tableau de rajout de joueur-->
<div class="container">
  <h2>Ajouter Joueur</h2>
  <form class="form-horizontal" role="form" method="post" action=<?php print("$nom_projet/index.php");?>>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nom">Nom :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Nationalite">Nationalité :</label>
      <div class="col-sm-10">          
         <input type="text" class="form-control" name="nationality"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="naissance">Date de naissance :</label>
      <div class="col-sm-10">          
         <input type="date" class="form-control" name="bornDate"/>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" value="Ajouter" name="_adminJoueur_btcCreer">Ajouter</button>

      </div>
    </div>
  </form>



<!-- Affiche la liste des joueurs -->
<table class="table table-striped">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Nationalite</th>
        <th>Date de naissance</th>
      </tr>
    </thead>
<tbody>
	<?php 
	for ($i=0;$i<count($item);$i++){
		echo'<tr>';
		foreach ($item[$i] as $data){
			echo'<td>';
			echo $data . ' ';
			echo '</td>';	
		};
		echo ' <br>';
		echo'</tr>';	
	};	
	?>
	</tbody>
</table>

</div>
<?php 	require "$racine/vue/footer.php"; ?>  