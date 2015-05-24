<?php   require "$racine/vue/header.php"; ?>
<style>
//table, th, td {    border: 1px solid black;}
</style>
<table border='0' id="seltb" cellspacing='0' width='100%' class="NONE">
    <tr>
        <td class='JH'>
            <select class="form-control sel" id="sel1" onchange="checkDuplicate()">
                <option value="player1">Joueur 1</option>
                <?php
                for ($i=0;$i<count($item);$i++){
                echo"<option value=' $i '>";
                    echo $item[$i]->nom;
                echo '</option>';
                };
                ?>
            </select>
        </td>
        
        <td width='25%'class='JH' rowspan=2><a name='b6'>&nbsp;</a><button type="button" class="btn btn-default scorebtntop" aria-label="Left Align">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default scorebtntop" aria-label="Left Align">
        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button></td>

    <td width='25%'class='JH' rowspan=4><a name='b2'>&nbsp;</a></td>
    <td width='25%'class='JH' rowspan=8><a name='b0'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JHS'><a name='b14'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JB'>
        <select class="form-control sel" id="sel2" onchange="checkDuplicate()">
            <option value="player2">Joueur 2</option>
            <?php
            for ($i=0;$i<count($item);$i++){
            echo"<option value=' $i '>";
                echo $item[$i]->nom;
            echo '</option>';
            };
            ?>
        </select>
    </td>

    <!-- SCORE BTN -->
    <td class='JHS' rowspan=2><a name='b6'>&nbsp;</a><button type="button" class="btn btn-default scorebtn" aria-label="Left Align">
        <div >
        <span class="glyphicon glyphicon-plus " aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default scorebtn" aria-label="Left Align">
        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </button></div></td>
</td>
</tr>
<tr>
    <td class='JBS'><a name='b13'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JH'>
        <select class="form-control sel" id="sel3" onchange="checkDuplicate()">
            <option value="player3">Joueur 3</option>
            <?php
            for ($i=0;$i<count($item);$i++){
            echo"<option value=' $i '>";
                echo $item[$i]->nom;
            echo '</option>';
            };
            ?>
        </select>
    </td>
    <td class='JB' rowspan=2><a name='b5'>&nbsp;</a></td>
    <td class='JHS' rowspan=4><a name='b2'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JHS'><a name='b12'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JB'>
        <select class="form-control sel" id="sel4" onchange="checkDuplicate()">
            <option value="player4">Joueur 4</option>
            <?php
            for ($i=0;$i<count($item);$i++){
            echo"<option value=' $i '>";
                echo $item[$i]->nom;
            echo '</option>';
            };
            ?>
        </select>
    </td>
    <td class='JBS' rowspan=2><a name='b5'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JBS'><a name='b11'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JH'>
        <select class="form-control sel" id="sel5" onchange="checkDuplicate()">
            <option value="player5">Joueur 5</option>
            <?php
            for ($i=0;$i<count($item);$i++){
            echo"<option value=' $i '>";
                echo $item[$i]->nom;
            echo '</option>';
            };
            ?>
        </select>
    </td>
    <td class='JH' rowspan=2><a name='b4'>&nbsp;</a></td>
    <td class='JB' rowspan=4><a name='b1'>&nbsp;</a></td>
    <td class='JBS' rowspan=8><a name='b0'>&nbsp;</a></td>
</tr>
<tr>
    <td class='JHS'><a name='b10'>&nbsp;</a></td>
</tr>
<td class='JB'>
    <select class="form-control sel" id="sel6" onchange="checkDuplicate()">
        <option value="player6">Joueur 6</option>
        <?php
        for ($i=0;$i<count($item);$i++){
        echo"<option value=' $i '>";
            echo $item[$i]->nom;
        echo '</option>';
        };
        ?>
    </select>
</td>
<td class='JHS' rowspan=2><a name='b4'>&nbsp;</a></td>
</tr>
<tr>
<td class='JBS'><a name='b9'>&nbsp;</a></td>
</tr>
<tr>
<td class='JH'>
    <select class="form-control sel" id="sel7" onchange="checkDuplicate()">
        <option value="player7">Joueur 7</option>
        <?php
        for ($i=0;$i<count($item);$i++){
        echo"<option value=' $i '>";
            echo $item[$i]->nom;
        echo '</option>';
        };
        ?>
    </select>
</td>
<td class='JB' rowspan=2><a name='b3'>&nbsp;</a></td>
<td class='JBS' rowspan=4><a name='b1'>&nbsp;</a></td>
</tr>
<tr>
<td class='JHS'><a name='b8'>&nbsp;</a></td>
</tr>
<tr>
<td class='JB'>
    <select class="form-control sel" id="sel8" onchange="checkDuplicate()">
        <option value="player8">Joueur 8</option>
        <?php
        for ($i=0;$i<count($item);$i++){
        echo"<option value=' $i '>";
            echo $item[$i]->nom;
        echo '</option>';
        };
        ?>
    </select>
</td>
<td class='JBS' rowspan=2><a name='b3'>&nbsp;</a></td>
</tr>
<tr>
<td class='JBS'><a name='b7'>&nbsp;</a></td>
</tr>
</table>
<button type="button" id="validerbtn" class="btn btn-success" onclick="disableInputs()">Valider</button>
<?php   require "$racine/vue/footer.php"; ?>