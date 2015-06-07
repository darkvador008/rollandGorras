<?php   require "$racine/vue/header.php"; ?>

<script src="vue/js/adminPartie.js"></script>


<div class="containerPartie">
            <?php
            for ($i=0;$i<4;$i++){

                


echo"
  <div class=\"col-md-4\">
    <!--panel-->
    <div class=\"panel panel-default\">
     <div class=\"panel-heading\">Joueur1     VS      Joueur2</div>
     <div class=\"panel-body\">
        <div class=\"row\">
            <div class=\"col-md-4\">Score j1= 15</div><div class=\"col-md-4\"><button type=\"button\" class=\"btn btn-default scorebtntop\" aria-label=\"Left Align\">
        <span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>
        </button></div><div class=\"col-md-4\"><button type=\"button\" class=\"btn btn-default scorebtntop\" aria-label=\"Left Align\">
        <span class=\"glyphicon glyphicon-minus\" aria-hidden=\"true\"></span>
        </button></div>
       
            <div class=\"col-md-4\">Score j1= 15</div><div class=\"col-md-4\"><button type=\"button\" class=\"btn btn-default scorebtntop\" aria-label=\"Left Align\">
        <span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>
        </button></div><div class=\"col-md-4\"><button type=\"button\" class=\"btn btn-default scorebtntop\" aria-label=\"Left Align\">
        <span class=\"glyphicon glyphicon-minus\" aria-hidden=\"true\"></span>
        </button></div>
        
        </div>
     </div>
    </div>
  </div>";


            };
            ?>

</div>



<?php   require "$racine/vue/footer.php"; ?>