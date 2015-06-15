<?php require "$racine/vue/header.php"; ?>
<script src="vue/js/partieClient.js"></script>
<style>
    //table, th, td {    border: 1px solid black;}
</style>
<center><h2>Le tournoi Rolland Gorras </h2></center>
<br>
<table border='0' id="seltb" cellspacing='0' width='100%' class="NONE">
    <tr>
        <td class='JH'>&nbsp;
            <label class="form-control label  label-info sel01" id="sel07" onchange="checkDuplicate()">
                <!--                Joueur1-->Quart de finale
            </label> 
        </td>

        <td width='25%'class='JH' rowspan=2>&nbsp;
            <label class="form-control label  label-warning sel11" id="sel07" onchange="checkDuplicate()">
                <!--Joueur11-->Demi-finale
            </label>
        </td>
        <td width='25%'class='JH' rowspan=4>&nbsp;
            <!--            FINALE JOUEUR 1-->
            <label class="form-control label label-danger sel21" id="sel07" onchange="checkDuplicate()">
                <!--Joueur21-->Finale
            </label>
        </td>
        <td width='25%'class='JH' rowspan=8> <label class="form-control label label-success sel31" id="sel07" onchange="checkDuplicate()">
                Finaliste
            </label></td>
    </tr>
    <tr>
        <td class='JHS'><a name='b14'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JB'>&nbsp;
            <label class="form-control label label-info sel02" id="sel7" onchange="checkDuplicate()">
                <!--Joueur2-->Quart de finale
            </label>
        </td>
        <!-- SCORE BTN -->
        <td class='JHS' rowspan=2><a name='b6'>&nbsp;</a></td>
        </td>
    </tr>
    <tr>
        <td class='JBS'><a name='b13'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JH'>&nbsp;
            <label class="form-control label label-info sel03" id="sel7" onchange="checkDuplicate()">
                <!--Joueur3-->Quart de finale
            </label>
        </td>
        <td class='JB' rowspan=2>&nbsp;
            <label class="form-control label label-warning sel12" id="sel07" onchange="checkDuplicate()">
                <!--Joueur12-->Demi-finale
            </label>

        </td>
        <td class='JHS' rowspan=4><a name='b2'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JHS'><a name='b12'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JB'>&nbsp;
            <label class="form-control label label-info sel04" id="sel7" onchange="checkDuplicate()">
                <!--Joueur4-->Quart de finale
            </label>
        </td>
        <td class='JBS' rowspan=2><a name='b5'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JBS'><a name='b11'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JH'>&nbsp;
            <label class="form-control label label-info sel05" id="sel7" onchange="checkDuplicate()">
                <!--Joueur5-->Quart de finale
            </label>
        </td>
        <td class='JH' rowspan=2>&nbsp;
            <label class="form-control label label-warning sel13" id="sel07" onchange="checkDuplicate()">
                <!--Joueur13-->Demi-finale
            </label>

        </td>
        <td class='JB' rowspan=4>&nbsp;
            <!--Demi finale joueur 2-->            
            <label class="form-control label label-danger sel22" id="sel7" onchange="checkDuplicate()">
                <!--Joueur22-->Finale
            </label>

        </td>
        <td class='JBS' rowspan=8><a name='b0'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JHS'><a name='b10'>&nbsp;</a></td>
    </tr>
    <td class='JB'>&nbsp;
        <label class="form-control label label-info sel06" id="sel7" onchange="checkDuplicate()">
            <!--Joueur6-->Quart de finale
        </label>
    </td>
    <td class='JHS' rowspan=2><a name='b4'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JBS'><a name='b9'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JH'>&nbsp;
        <label class="form-control label label-info sel07" id="sel7" onchange="checkDuplicate()">
            <!--Joueur7-->Quart de finale
        </label>
    </td>
    <td class='JB' rowspan=2>&nbsp;
        <label class="form-control label label-warning sel14" id="sel07" onchange="checkDuplicate()">
            <!--Joueur14-->Demi-finale
        </label>

    </td>
    <td class='JBS' rowspan=4><a name='b1'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JHS'><a name='b8'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JB'>&nbsp;
        <label class="form-control label label-info sel08" id="sel7" onchange="checkDuplicate()">
            <!--Joueur8-->Quart de finale
        </label>
    </td>
    <td class='JBS' rowspan=2><a name='b3'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JBS'><a name='b7'>&nbsp;</a></td>
</tr>
</table>
<br><br><br><br>
<?php require "$racine/vue/footer.php"; ?>