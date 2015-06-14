<?php require "$racine/vue/header.php"; ?>
<script src="vue/js/live.js"></script>
<script src="vue/js/js.cookie.js"></script>
<?php
if (isset($_COOKIE['nbPartieLive'])) {
    $nbPartieLive = 4;
    $nbPartieLive = intval($_COOKIE['nbPartieLive']);
    unset($_COOKIE['nbPartieLive']);
//    var_dump($nbPartieLive);
    setcookie("nbPartieLive", "", time() - 3600);
}
?>



<div class="container">
    <center><p>Liste des matches en cours en direct !</p>
        <button type="button" class="btn btn-success" onclick="location.reload();">Rafraichir</button></center><br/>
</div>
<?php
if ($nbPartieLive == 0) {
    echo'<p><center>Il n\'y a aucun match pour l\'instant</center><br/><br/><br/></p>';
}
?>



<?php
for ($i = 0; $i < $nbPartieLive; $i++) {
    ?>


    <div class="col-md-6" id="<?php echo $i ?>" >
        <!--panel-->
        <div class="panel panel-primary">

          <div class="panel-heading  p1">Quart de finale <!--  Joueur1     VS      Joueur2>--> </div>
            <div class="panel-body ">
          
                <div class="row">
                    <div class="col-md-4 "></div>
                    <div class="col-md-4 "></div>
                    <div class="col-md-4 "></div>
                   
                    <div><button id="<?php echo 'sub-'.$i ?>">S'abonner </button></div>
                    <div class="col-md-4 scrj1"><!--Score Joueur 1>--></div>
                    <div class="col-md-4 set1"><!--SetJ1--></div>
                    <div class="col-md-4 point1"><!--PointJ1--></div>
                    <br/>
                    <div class="col-md-4 scrj2" ><!--Score Joueur 2>--></div>
                    <div class="col-md-4 set2"><!--SetJ2--></div>
                    <div class="col-md-4 point2"><!--pointJ2--></div>


                </div>

            </div>

        </div>
    </div>
<?php } ?>








<?php require "$racine/vue/footer.php"; ?>