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




            $('.pointSel01').html("aa");
            //$('.sel08').html(response[3][2]);

            /*   
             *          PREMIER TOUR
             */
            if (response[0] != null && response[0][1] != null) {
                var set = "";
                if (response[0][3] == 1) {
                    set = " " + response[0][6] + " / " + response[0][8] + " / " + response[0][10];
                }
                $('.sel01').html(response[0][1] + set);
            }
            if (response[0] != null && response[0][2] != null) {
                var set2 = "";
                if (response[0][3] == 1) {
                    set2 = " " + response[0][7] + " / " + response[0][9] + " / " + response[0][11];
                }
                $('.sel02').html(response[0][2] + set2);
            }


            if (response[1] != null && response[1][1] != null) {
                var set = "";
                if (response[1][3] == 1) {
                    set = " " + response[1][6] + " / " + response[1][8] + " / " + response[1][10];
                }
                $('.sel03').html(response[1][1] + set);
            }
            if (response[1] != null && response[1][2] != null) {
                var set = "";
                if (response[1][3] == 1) {
                    set = " " + response[1][7] + " / " + response[1][9] + " / " + response[1][11];
                }
                $('.sel04').html(response[1][2] + set);
            }


            if (response[2] != null && response[2][1] != null) {
                var set = "";
                if (response[2][3] == 1) {
                    set = " " + response[2][6] + " / " + response[2][8] + " / " + response[2][10];
                }
                $('.sel05').html(response[2][1] + set);
            }
            if (response[2] != null && response[2][2] != null) {
                var set = "";
                if (response[2][3] == 1) {
                    set = " " + response[2][7] + " / " + response[2][9] + " / " + response[2][11];
                }
                $('.sel06').html(response[2][2] + set);
            }


            if (response[3] != null && response[3][1] != null) {
                var set = "";
                if (response[3][3] == 1) {
                    set = " " + response[3][6] + " / " + response[3][8] + " / " + response[3][10];
                }
                $('.sel07').html(response[3][1] + set);
            }
            if (response[3] != null && response[3][2] != null) {
                var set = "";
                if (response[3][3] == 1) {
                    set = " " + response[3][7] + " / " + response[3][9] + " / " + response[3][11];
                }
                $('.sel08').html(response[3][2] + set);
            }


            /*   
             *          Second TOUR /demi finale
             */


            if (response[4] != null && response[4][1] != null) {
                var set = "";
                if (response[4][3] == 1) {
                    set = " " + response[4][6] + " / " + response[4][8] + " / " + response[4][10];
                }
                $('.sel11').html(response[4][1] + set);
            }
            if (response[4] != null && response[4][2] != null) {
                var set = "";
                if (response[4][3] == 1) {
                    set = " " + response[4][7] + " / " + response[4][9] + " / " + response[4][11];
                }
                $('.sel12').html(response[4][2] + set);
            }


            if (response[5] != null && response[5][1] != null) {
                var set = "";
                if (response[5][3] == 1) {
                    set = " " + response[5][6] + " / " + response[5][8] + " / " + response[5][10];
                }
                $('.sel13').html(response[5][1] + set);
            }
            if (response[5] != null && response[5][2] != null) {
                var set = "";
                if (response[5][3] == 1) {
                    set = " " + response[5][7] + " / " + response[5][9] + " / " + response[5][11];
                }
                $('.sel14').html(response[5][2] + set);
            }


            /*   
             *          troisième TOUR /finale
             */

            if (response[6] != null && response[6][1] != null) {
                var set = "";
                if (response[6][3] == 1) {
                    set = " " + response[6][6] + " / " + response[6][8] + " / " + response[6][10];
                }
                $('.sel21').html(response[6][1] + set);
            }
            if (response[6] != null && response[4][1] != null) {
                var set = "";
                if (response[6][3] == 1) {
                    set = " " + response[6][7] + " / " + response[6][9] + " / " + response[6][11];
                }
                $('.sel22').html(response[6][2] + set);
            }

            /*
             * FINALISTE
             * 
             */

            if (response[6] != null && response[4][1] != null) {
                var set = "";
                if (response[6][3] == 1) {
                    if (response[6][4] == 1) {
                        $('.sel31').html(response[6][1] + set);
                    } else {
                        $('.sel31').html(response[6][2] + set);
                    }
                }

            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
            console.log('erreur');
        }
    });




});
