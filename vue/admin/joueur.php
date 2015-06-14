<!--
Page des joueurs ADMINISTRATION

http://www.sanwebe.com/2012/04/ajax-add-delete-sql-records-jquery-php


-->
<?php require "$racine/vue/header.php"; ?>  

<?php // var_dump($item); ?>

<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
//session_start ();
// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
    ?>
    <!-- Tableau de rajout de joueur-->
    <div class="container">
        <h2>Ajouter Joueur</h2>
        <form class="form-horizontal" role="form" method="post" action=<?php print("$nom_projet/index.php"); ?>  enctype="multipart/form-data">
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
            <!--        <div class="form-group">
                        <label class="control-label col-sm-2" for="naissance">Image profil :</label>
                        <div class="col-sm-10">          
                           <input type="text" class="form-control" name="imgAvatar" id="imgAvatar"/>
                            <input type="file" class="form-control" name="imgAvatar" id="imgAvatar" value="addPlayer" enctype="multipart/form-data">
            
            
            
                        </div>-->
    </div>
    <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">

            <button type="submit" class="btn btn-default" value="Ajouter" id="addPlayer" >Ajouter</button>
            <br><br><br>
        </div>
    </div>
    </form>



    <!-- Affiche la liste des joueurs -->
    <table class="table table-striped" >
        <thead>
            <tr class="btn-primary">
                <th>ID</th>
                <th>Nom</th>
                <th>Nationalite</th>
                <!--<th>Image</th>-->
                <th>Suprimer utilisateur</th>
            </tr>
        </thead>
        <tbody id="tt">
            <?php
            for ($i = 0; $i < count($item); $i++) {
                echo'<tr id =responds_' . $item[$i]->monID . '>';
                echo '<td>' . $item[$i]->monID . ' </td>';
                echo '<td>' . $item[$i]->nom . ' </td>';
                echo '<td>' . $item[$i]->nationalite . ' </td>';
                // echo '<td>' . $item[$i]->image . ' </td>';
                /* foreach ($item[$i] as $data){

                  echo'<td>';
                  echo '['.$item[$i]->monID.' ]';
                  echo $data . ' ';
                  echo '</td>';
                  };
                 */

                echo '<td> 
				<div class="del_wrapper"><a href="#" class="del_button"  id="del-' . $item[$i]->monID . '">
				<img src="vue/img/icon_del.gif" border="0" />
				</a></div>
			</td>';

                echo'</tr>';
            };
            ?>
        </tbody>
    </table>

    </div>
<?php
} else {
    echo '
    <div class="alert alert-danger fade in"> <a href="index.php?page=_login" class="close" data-dismiss="alert">&times;</a>
        <strong><center>Erreur !</strong> Veuillez vous loguer ! Vous pouvez fermer ce message.</center>
    </div>
<br><br><br><br>';
}
?>     <!--Fin du if de session-->



<?php require "$racine/vue/footer.php"; ?>  