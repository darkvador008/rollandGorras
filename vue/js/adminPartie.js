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

    //##### pour le boutton +
    $("#plus").click(function(e) { //ici il va falloir prendre sur le name et faire un switch sur l'id comme dans addpartie à moins que t'aies une meilleure solution
        console.log('plus clicked');
        e.preventDefault();

        //build a post data structure
        var myData = "scorej1="+$("div.scrj1").text()+"&scorej2="+$("div.scrj1").text();
        console.log(myData);
        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_admin_joueur", //Where to make Ajax calls
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






});
