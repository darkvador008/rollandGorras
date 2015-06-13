function checkDuplicate(j1, j2) {
    var selOne = document.getElementById("j1").value;
    var selTwo = document.getElementById("j2").value;
    var selOne2 = document.getElementById("j12").value;
    var selTwo2 = document.getElementById("j22").value;
    var selOne3 = document.getElementById("j13").value;
    var selTwo3 = document.getElementById("j23").value;
    var selOne4 = document.getElementById("j14").value;
    var selTwo4 = document.getElementById("j24").value;
    var selOne5 = document.getElementById("j15").value;
    var selTwo5 = document.getElementById("j25").value;
//    var selOne = j1;
//    var selTwo = j2;

    if (selOne === selTwo || selOne2 === selTwo2 || selOne3 === selTwo3 || selOne4 === selTwo4 || selOne5 === selTwo5) { 
        alert("select are the same");
    }
}

function disableInputs(j1, j2,ter, boo) {

    $("#" + j1.id).prop('disabled', boo);
    $("#" + j2.id).prop('disabled', boo);
    $("#" + ter.id).prop('disabled', boo);


}

function rez() {
    console.log("dedede");
    document.getElementById('creer').reset();
}

function rm(j1, j2) { //remove une option de tous les select de la page
    //console.log();
    var vl = $("#" + j1.id).val();
    var vl2 = $("#" + j2.id).val();
    //console.log(vl);
    $("select").each(function (e, r) {
        console.log(r.id);

        $("#" + r.id + " option[value='" + vl + "']").hide();
        $("#" + r.id + " option[value='" + vl2 + "']").hide();
    });
}
