
function checkDuplicate() {
    var selOne = document.getElementById("sel1").value;
    var selTwo = document.getElementById("sel2").value;
    console.log(selOne);
    console.log(selTwo);
    if (selOne == selTwo) { //|| selThree...
        alert("select are the same");
    }
}