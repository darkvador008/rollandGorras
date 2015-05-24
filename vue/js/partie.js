
function checkDuplicate() {
    var selOne = document.getElementById("sel1").value;
    var selTwo = document.getElementById("sel2").value;

    if (selOne == selTwo) { //|| selThree...
        alert("select are the same");
    }
}

function disableInputs(){
//$("#validerbtn").on("click", function(){



	$("select").each(function(e,r){
		console.log(r.id);
		$("#"+r.id).prop('disabled',true);
	});

}