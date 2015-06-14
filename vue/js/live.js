$(document).ready(function() {

    var arr=[];
    //Pour afficher les noms au chargement
    var myData = "";
    jQuery.ajax({
        type: "POST", // HTTP method POST or GET
        url: "index.php?page=_live", //Where to make Ajax calls
        dataType: "json", // Data type, HTML, json etc.
        data: myData, //Form variables
        success: function(response) {
            $.removeCookie('nbPartieLive');
            $.cookie("nbPartieLive", response.length);
            console.log(response);
            for (var i = 0; i < 7; i++) {
                if (response[i] != null) {
                    $('#' + i).find('.p1').html(response[i][1] + ' VS ' + response[i][2]);
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
            console.log('erreur');
        }
    });







    //click sur contains "sub"
    $('[id*="sub"]').click(function(e) {

        var id = e.target.id;
        i = id.split('-', 2)[1];
        console.log(id);
        arr.push(i);
        console.log(arr);
        var myData = "";
        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_live", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: myData, //Form variables
            success: function(response) {
                console.log(response);

                $.removeCookie('nbPartieLive');
                $.cookie("nbPartieLive", response.length);
                //for (var i = 0; i < response.length; i++) {
                if (response[i] != null) {

                    $('#' + e.target.id).remove();
                    $('#' + i).find('.p1').html(response[i][1] + ' VS ' + response[i][2]);
                    var setj1 = "";
                    var setJ2 = "";
                    if (response[i][6] != null) {
                        setj1 = setj1 + " " + response[i][6] + " / "
                    }
                    if (response[i][7] != null) {
                        setJ2 = setJ2 + " " + response[i][7] + " / "
                    }

                    if (response[i][8] != null) {
                        setj1 = setj1 + " " + response[i][8] + " / "
                    }

                    if (response[i][9] != null) {
                        setJ2 = setJ2 + " " + response[i][9] + " / "
                    }
                    if (response[i][10] != null) {
                        setj1 = setj1 + " " + response[i][10] + "  "
                    }
                    if (response[i][11] != null) {
                        setJ2 = setJ2 + " " + response[i][11] + "  "
                    }

                    $('#' + i).find('.scrj1').html(response[i][1]);
                    $('#' + i).find('.set1').html(setj1);
                    $('#' + i).find('.point1').html(response[i][4]);

                    $('#' + i).find('.scrj2').html(response[i][2]);
                    $('#' + i).find('.set2').html(setJ2);
                    $('#' + i).find('.point2').html(response[i][5]);
                }

                //}
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError);
                console.log('erreur');
            }
        });

        setInterval(function() {
            var randomnumber = Math.floor(Math.random() * 100);
            console.log(randomnumber);



            // Il faudra mettre une var de session "tour" et ici il faudra mettre la valeur
            // de la session dans tour pour afficher le bon nombre de partie quand la page charge

            jQuery.ajax({
                type: "POST", // HTTP method POST or GET
                url: "index.php?page=_live", //Where to make Ajax calls
                dataType: "json", // Data type, HTML, json etc.
                data: myData, //Form variables
                success: function(response) {
                    console.log(response);
                    //                $.removeCookie('nbPartieLive');
                    //                $.cookie("nbPartieLive", response.length);
                    for (var ii = 0; ii < arr.length; ii++) {
                        i=arr[ii];
                    if (response[i] != null) {
                        $('#' + i).find('.p1').html(response[i][1] + ' VS ' + response[i][2]);
                        var setj1 = "";
                        var setJ2 = "";
                        if (response[i][6] != null) {
                            setj1 = setj1 + " " + response[i][6] + " / "
                        }
                        if (response[i][7] != null) {
                            setJ2 = setJ2 + " " + response[i][7] + " / "
                        }

                        if (response[i][8] != null) {
                            setj1 = setj1 + " " + response[i][8] + " / "
                        }

                        if (response[i][9] != null) {
                            setJ2 = setJ2 + " " + response[i][9] + " / "
                        }
                        if (response[i][10] != null) {
                            setj1 = setj1 + " " + response[i][10] + "  "
                        }
                        if (response[i][11] != null) {
                            setJ2 = setJ2 + " " + response[i][11] + "  "
                        }


                        $('#' + i).find('.scrj1').html(response[i][1]);
                        $('#' + i).find('.set1').html(setj1);
                        $('#' + i).find('.point1').html(response[i][4]);

                        $('#' + i).find('.scrj2').html(response[i][2]);
                        $('#' + i).find('.set2').html(setJ2);
                        $('#' + i).find('.point2').html(response[i][5]);

                    }

                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError);
                    console.log('erreur');
                }
            });
        }, 5000);
    });

});