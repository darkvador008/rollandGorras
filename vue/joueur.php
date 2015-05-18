<!--
Page des joueurs CLIENT
-->
<?php 	require "$racine/vue/header.php"; ?>  

<!-- Affiche la liste des joueurs -->
<div class="container">
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
			echo '<br>';
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