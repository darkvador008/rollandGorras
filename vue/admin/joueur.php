<!--
Page des joueurs ADMINISTRATION
-->
<?php 	require "$racine/vue/header.php"; ?>  
<?php //var_dump($item); ?>


<!-- Tableau de rajout de joueur-->
<div class="container">
  <h2>Ajouter Joueur</h2>
  <form class="form-horizontal" role="form" method="post" action=<?php print("$nom_projet/index.php");?>  enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="nom">Nom :</label>

      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="nom"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Nationalite">Nationalité :</label>
      <div class="col-sm-10">          
         <input type="text" class="form-control" name="nationality" id="nationality"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="naissance">Image profil :</label>
      <div class="col-sm-10">          
         <!--<input type="text" class="form-control" name="imgAvatar" id="imgAvatar"/>-->
		<input type="file" class="form-control" name="imgAvatar" id="imgAvatar" value="addPlayer" enctype="multipart/form-data">

			
					
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">

              <button type="submit" class="btn btn-default" value="Ajouter" id="addPlayer" >Ajouter</button>

      </div>
    </div>
  </form>



<!-- Affiche la liste des joueurs -->
<table class="table table-striped" >
    <thead>
      <tr>
        <th>Nom</th>
        <th>Nationalite</th>
        <th>Image</th>
      </tr>
    </thead>
<tbody id="tt">
	<?php 
	for ($i=0;$i<count($item);$i++){
		echo'<tr>';
		foreach ($item[$i] as $data){
			echo'<td>';
			echo $data . ' ';
			echo '</td>';	
		};
		
		echo'</tr>';	
	};	
	?>
	</tbody>
</table>

</div>
<?php 	require "$racine/vue/footer.php"; ?>  