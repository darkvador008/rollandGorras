<!--
Page des joueurs
-->
<?php 	require "$racine/vue/header.php"; ?>  
<?php //var_dump($item); ?>
<!-- Affiche la liste des joueurs -->
<table>
	<tr>
		<td> Nom</td>
		<td> Nationalite </td>
		<td> Date de naissance </td>
	</tr>	
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
</table>
<br/><br/><br/>
<!-- Tableau de rajout de joueur-->
<form method="post" action=<?php print("$nom_projet/index.php");?>>
	<table class="tb">
		<tr>	
			<td> Nom : </td>
			<td> <input type="text" name="name"/> </td>
		</tr>
		<tr>
			<td> Nationalit&eacute; : </td>
			<td> <input type="text" name="nationality"/> </td>
		</tr>
		<tr>
			<td> Date de naissance : </td>
			<td> <input type="date" name="bornDate"/></td>
		</tr>
		<tr>
			<td> <input type="submit" value="Ajouter" name="_adminJoueur_btcCreer"/></td>
		</tr>	


	</table>
</form>


<?php 	require "$racine/vue/footer.php"; ?>  