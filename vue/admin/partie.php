<?php require "$racine/vue/header.php"; ?>
<script src="vue/js/adminPartie.js"></script>
<script src="vue/js/js.cookie.js"></script>
<?php
$nbTour=4;
if (isset($_COOKIE['nbTour'])) {
    $nbTour = 0;
    $nbTour= intval($_COOKIE['nbTour']);
    unset($_COOKIE['nbTour']);
//    var_dump($nbPartieLive);
    setcookie("nbTour", "", time() - 3600);
}
?>


<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
//session_start ();
// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
    ?>
<div class="container">
    <center><p>Ajout des points aux partie</p>
        <button type="button" class="btn btn-success" onclick="location.reload();">Rafraichir</button></center><br/>
</div>
<div class="containerPartie">
    <?php for ($i = 0; $i < $nbTour; $i++) { ?>

        <div class="col-md-6" id="<?php echo $i ?>" >
            <!--panel-->
            <div class="panel panel-default panel-primary">
                <div class="panel-heading p1">Joueur1     VS      Joueur2</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 scrj1">Score Joueur 1</div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default scorebtntop plus1" aria-label="Left Align" name="bouton">
                                <span class="glyphicon glyphicon-plus " aria-hidden="true"  ></span>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default scorebtntop minus1" aria-label="Left Align" name="bouton2" >
                                <span class="glyphicon glyphicon-minus" aria-hidden="true" ></span>
                            </button>
                        </div>

                        <div class="col-md-4 scrj2" >Score Joueur 2</div><div class="col-md-4">
                            <button type="button" class="btn btn-default scorebtntop plus2" aria-label="Left Align" name="bouton">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-default scorebtntop minus2" aria-label="Left Align" name="bouton2">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true" ></span>
                            </button>
                        </div>
                        
<!--                        <div class="set">
                            Set
                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
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