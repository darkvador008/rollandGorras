$(document).ready(function() {

    var myData = 'tour=1';
    console.log("get parties");
    jQuery.ajax({
        type: "POST", // HTTP method POST or GET
        url: "index.php?page=_admin_parties", //Where to make Ajax calls
        dataType: "text", // Data type, HTML, json etc.
        data: myData, //Form variables
        success: function(response) {
            console.log(response);

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    });
});