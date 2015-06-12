$(document).ready(function () {


    var myData = 'tour=1';// Il faudra mettre une var de session "tour" et ici il faudra mettre la valeur
    // de la session dans tour pour afficher le bon nombre de partie quand la page charge

    jQuery.ajax({
        type: "POST", // HTTP method POST or GET
        url: "index.php?page=_parties_client", //Where to make Ajax calls
        dataType: "json", // Data type, HTML, json etc.
        data: myData, //Form variables
        success: function (response) {
            console.log(response);

            var scorej1 = "";
            var scorej2 = "";
            var scorej3 = "";
            var scorej4 = "";
            var scorej5 = "";
            var scorej6 = "";
            var scorej7 = "";
            var scorej8 = "";


            $('.sel07').html(response[3][1]);
            //$('.sel08').html(response[3][2]);

            /*   
             *          PREMIER TOUR
             */
            if (response[0] != null && response[0][1] != null) {
                $('.sel01').html(response[0][1]);
            }
            if (response[1] != null && response[1][1] != null) {
                $('.sel02').html(response[0][2]);
            }


            if (response[1] != null && response[1][1] != null) {
                $('.sel03').html(response[1][1]);
            }
            if (response[1] != null && response[1][2] != null) {
                $('.sel04').html(response[1][2]);
            }

            if (response[2] != null && response[2][1] != null) {
                $('.sel05').html(response[2][1]);
            }
            if (response[2] != null && response[2][2] != null) {
                $('.sel06').html(response[2][2]);
            }

            if (response[3] != null && response[3][1] != null) {
                $('.sel07').html(response[2][1]);
            }
            if (response[3] != null && response[3][2] != null) {
                $('.sel08').html(response[2][2]);
            }


            /*   
             *          Second TOUR /demi finale
             */


            if (response[4] != null && response[4][1] != null) {
                $('.sel11').html(response[4][1]);
            }
            if (response[4] != null && response[4][1] != null) {
                $('.sel12').html(response[4][2]);
            }


            if (response[5] != null && response[5][1] != null) {
                $('.sel13').html(response[5][1]);
            }
            if (response[5] != null && response[5][2] != null) {
                $('.sel14').html(response[5][2]);
            }


            /*   
             *          troisième TOUR /finale
             */

            if (response[6] != null && response[6][1] != null) {
                $('.sel21').html(response[6][1]);
            }
            if (response[6] != null && response[4][1] != null) {
                $('.sel22').html(response[6][2]);
            }



        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
            console.log('erreur');
        }
    });




});
