<?php   require "$racine/vue/header.php"; ?>  




<style>
//table, th, td {    border: 1px solid black;}


</style>

    <div class="form-group">
      <label for="sel1">Select list (select one):</label>
      <select class="form-control" id="sel1">
	<?php 
	for ($i=0;$i<count($item);$i++){
		echo'<option value=$i>';
		echo $item[$i]->nom;
		echo '</option>';	
	};	
	?>
      </select>
</div>



<table border='0' cellspacing='0' width='100%' class="NONE">
        <tr>

            <td width='25%'class='JH'> <a name='b14'><div class="btn-group">
          <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            First Player
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
 <li>test<li>
 
        </ul>
    </div></a></a></td>
            <td width='25%'class='JH' rowspan=2><a name='b6'>&nbsp;</a></td>
            <td width='25%'class='JH' rowspan=4><a name='b2'>&nbsp;</a></td>
            <td width='25%'class='JH' rowspan=8><a name='b0'>&nbsp;</a></td>
        </tr>
        <tr>
            <td class='JHS'><a name='b14'>&nbsp;</a></td>
        </tr>
        <tr>
            <td class='JB'> <a name='b13'>Joueur 2</a></a></td>

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










<?php   require "$racine/vue/footer.php"; ?>  