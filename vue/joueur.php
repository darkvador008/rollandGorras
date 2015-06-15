<!--
Page des joueurs CLIENT
-->
<?php require "$racine/vue/header.php"; ?>  

<!-- Affiche la liste des joueurs -->
<div class="container">
    <center><h2>La liste des joueurs</h2></center>
    
    
    <table class="table table-striped">
        <thead>
            <tr class="btn-primary">
                <th>Nom</th>
                <th>Nationalite</th>
            </tr>
        </thead>
        <tbody>


            <?php
            echo '<br>';
            for ($i = 0; $i < count($item); $i++) {
                echo'<tr>';
                echo '<td>' . $item[$i]->nom . '</td><td>' . $item[$i]->nationalite . '</td>';

//				foreach ($item[$i] as $data){
//					echo'<td>';
//					echo $data . ' ';
//					echo '</td>';	
//				};

                echo'</tr>';
            };
            ?>
        </tbody>
    </table>
    
    
    
</div>


<?php require "$racine/vue/footer.php"; ?>  