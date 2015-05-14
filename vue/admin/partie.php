<?php   require "$racine/vue/header.php"; ?>

<script>
function checkDuplicate() {
    var selOne= document.getElementById("sel1").value;
    var selTwo= document.getElementById("sel2").value;

    if (selOne==selTwo){//|| selThree...
        alert("same values in select")
    }

}
</script>
<style>
//table, th, td {    border: 1px solid black;}
</style>
<table border='0' cellspacing='0' width='100%' class="NONE">
    <tr>
        <td class='JH'>
            <select class="form-control" id="sel1" onchange="checkDuplicate()">
                <option value="player">Joueur 1</option>
                <?php
                for ($i=0;$i<count($item);$i++){
                echo'<option value=$i>';
                    echo $item[$i]->nom;
                echo '</option>';
                };
                ?>
            </select>
        </div></td>
        <td width='25%'class='JH' rowspan=2><a name='b6'>&nbsp;</a></td>
        <td width='25%'class='JH' rowspan=4><a name='b2'>&nbsp;</a></td>
        <td width='25%'class='JH' rowspan=8><a name='b0'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JHS'><a name='b14'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JB'>
            <select class="form-control" id="sel2" onchange="checkDuplicate()">
                <option value="player">Joueur 2</option>
                <?php
                for ($i=0;$i<count($item);$i++){
                echo'<option value=$i>';
                    echo $item[$i]->nom;
                echo '</option>';
                };
                ?>
            </select>
        </td>
        <td class='JHS' rowspan=2><a name='b6'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JBS'><a name='b13'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JH'> <a name='b12'>Joueur 3</a></a></td>
        <td class='JB' rowspan=2><a name='b5'>&nbsp;</a></td>
        <td class='JHS' rowspan=4><a name='b2'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JHS'><a name='b12'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JB'> <a name='b11'>Joueur 4 </a></a></td>
        <td class='JBS' rowspan=2><a name='b5'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JBS'><a name='b11'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JH'> <a name='b10'>Joueur 5 </a></a></td>
        <td class='JH' rowspan=2><a name='b4'>&nbsp;</a></td>
        <td class='JB' rowspan=4><a name='b1'>&nbsp;</a></td>
        <td class='JBS' rowspan=8><a name='b0'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JHS'><a name='b10'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JB'> <a name='b9'>Joueur 6</a></a></td>
        <td class='JHS' rowspan=2><a name='b4'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JBS'><a name='b9'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JH'> <a name='b8'>Joueur 7</a></td>
        <td class='JB' rowspan=2><a name='b3'>&nbsp;</a></td>
        <td class='JBS' rowspan=4><a name='b1'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JHS'><a name='b8'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JB'> <a name='b7'>Joueur 8</a></td>
        <td class='JBS' rowspan=2><a name='b3'>&nbsp;</a></td>
    </tr>
    <tr>
        <td class='JBS'><a name='b7'>&nbsp;</a></td>
    </tr>
</table>
<button type="button" class="btn btn-success">Valider</button>
<?php   require "$racine/vue/footer.php"; ?>