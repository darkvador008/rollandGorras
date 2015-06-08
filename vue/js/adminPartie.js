$(document).ready(function() {

    var myData = 'tour=1';// Il faudra mettre une var de session "tour" et ici il faudra mettre la valeur
    // de la session dans tour pour afficher le bon nombre de partie quand la page charge

    jQuery.ajax({
        type: "POST", // HTTP method POST or GET
        url: "index.php?page=_admin_parties", //Where to make Ajax calls
        dataType: "json", // Data type, HTML, json etc.
        data: myData, //Form variables
        success: function(response) {
            console.log(response);
            
            //console.log("nom1 "+noms[0]+" nom2 "+noms[1]);
            $('div.p1').html(response[0][1]+ " VS "+ response[1][1]);
            $('div.scrj1').html(response[0][3]);
            $('div.scrj2').html(response[0][4]);

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    });
});