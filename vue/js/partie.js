function checkDuplicate() {
    var selOne = document.getElementById("j1").value;
    var selTwo = document.getElementById("j2").value;

    if (selOne == selTwo) { //|| selThree...
        alert("select are the same");
    }
}

function disableInputs(j1,j2,boo) {

        $("#" + j1.id).prop('disabled', boo);
        $("#" + j2.id).prop('disabled', boo);


}

function rez(){
	console.log("dedede");
	document.getElementById('creer').reset();
}

function rm(j1,j2){ //remove une option de tous les select de la page
	//console.log();
	var vl = $("#"+j1.id).val();
	var vl2 = $("#"+j2.id).val();
	//console.log(vl);
	$("select").each(function(e, r) {
		console.log(r.id);
		
		$("#"+r.id+" option[value='"+vl+"']").hide();
		$("#"+r.id+" option[value='"+vl2+"']").hide();
	});
}
