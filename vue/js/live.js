$(document).ready(function () {
    var myData = 'tour=1';
    jQuery.ajax({
        type: "POST", // HTTP method POST or GET
        url: "index.php?page=_live", //Where to make Ajax calls
        dataType: "json", // Data type, HTML, json etc.
        data: myData, //Form variables
        success: function (response) {
            console.log(response);
            $.removeCookie('nbPartieLive');
            $.cookie("nbPartieLive", response.length);
            for (var i = 0; i < response.length; i++) {
                if (response[i] != null) {
                    $('#' + i).find('.p1').html(response[i][1] + ' VS ' + response[i][2]);
                    $('#' + i).find('.scrj1').html(response[i][1] + ' : ' + response[i][4]);
                    $('#' + i).find('.scrj2').html(response[i][2] + ' : ' + response[i][5]);
                }

            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
            console.log('erreur');
        }
    });

    setInterval(function () {
        var randomnumber = Math.floor(Math.random() * 100);
        console.log(randomnumber);



        // Il faudra mettre une var de session "tour" et ici il faudra mettre la valeur
        // de la session dans tour pour afficher le bon nombre de partie quand la page charge

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_live", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: myData, //Form variables
            success: function (response) {
                console.log(response);
//                $.removeCookie('nbPartieLive');
//                $.cookie("nbPartieLive", response.length);
                for (var i = 0; i < response.length; i++) {
                    if (response[i] != null) {
                        $('#' + i).find('.p1').html(response[i][1] + ' VS ' + response[i][2]);
                        $('#' + i).find('.scrj1').html(response[i][1] + ' : ' + response[i][4]);
                        $('#' + i).find('.scrj2').html(response[i][2] + ' : ' + response[i][5]);
                    }

                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError);
                console.log('erreur');
            }
        });
    }, 5000);
});
