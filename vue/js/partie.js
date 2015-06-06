function checkDuplicate() {
    var selOne = document.getElementById("j1").value;
    var selTwo = document.getElementById("j2").value;

    if (selOne == selTwo) { //|| selThree...
        alert("select are the same");
    }
}

function disableInputs(boo) {

    $("select").each(function(e, r) {
        console.log(r.id);
        $("#" + r.id).prop('disabled', boo);
    });



}


