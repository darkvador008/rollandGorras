$(document).ready(function () {

    //##### send add record Ajax request to _admin_joueur #########
    $("#addPlayer").click(function (e) {
        console.log('bbbbbbbbbbbbbbbbbbbbbb');
        e.preventDefault();

        //build a post data structure
        var myData = 'name=' + $("#nom").val() + '&' + 'nationality=' + $("#nationality").val() + '&' + 'imgAvatar=' + $("#imgAvatar").val();

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_admin_joueur", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: myData, //Form variables
            success: function (response) {
                console.log(response);
                $("#tt").append(response);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });    
    $("[name='upTerr']").click(function (e) {
        console.log('upterrain');
        e.preventDefault();
        console.log(e.target.id);
        var idd =e.target.id.substr(1,1);
        var terrain_id=$("#ter"+e.target.id.substr(1,1)).val();
        idd--;
        console.log('sb'+idd)
        // var partie_id = $('#'+sb).find('bouton');//lm.split("-", 4)[3];
         var partie_id = $('[id*="plus"]').eq(idd+2).attr('id').split("-", 4)[3];
         //var partie_id=.split("-", 4)[3];
         console.log('test'+ partie_id + 'terrain id' + terrain_id);
        //build a post data structure
        var myData = "terrain="+terrain_id+ "&partie_id="+partie_id;
        console.log(myData);

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_admin_partie", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: myData, //Form variables
            success: function (response) {
                console.log(response);
               

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });


    //##### Send delete Ajax request to _admin_joueur #########
    $("body").on("click", "#tt .del_button", function (e) {
        if (confirm("Est-tu sur de vouloir supprimer ?")) {
            console.log('aaaaaaaaaaaaaaaaaaaaaaaaa');
            e.preventDefault();
            var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
            var DbNumberID = clickedID[1]; //and get number from array
            console.log('clicked id = ' + DbNumberID);
            var myData = 'recordToDelete=' + DbNumberID; //build a post data structure

            $('#item_' + DbNumberID).addClass("sel"); //change background of this element by adding class
            $(this).hide(); //hide currently clicked delete button

            jQuery.ajax({
                type: "POST", // HTTP method POST or GET
                url: "index.php?page=_admin_joueur", //Where to make Ajax calls
                dataType: "text", // Data type, HTML, json etc.
                data: myData, //Form variables
                success: function (response) {

                    //on success, hide  element user wants to delete.
                    console.log(response);
                    $("#responds_" + DbNumberID).remove();
                    //$('#item_'+DbNumberID).fadeOut();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //On error, we alert user
                    console.log(thrownError);
                    console.log(ajaxOptions);

                }
            });
        }

    });


    //##### send add record Ajax request to _admin_creer_partie #########
    $("[name='valider']").click(function (e) {
        console.log('cccccccccccccccccccccccccc');
        e.preventDefault();//name

        console.log(e.target.id);
        var j1 = new String();
        var j2 = new String();
        var ter = new String();
        switch (e.target.id) {
            case 'addPartie':
                j1 = "j1";
                j2 = "j2";
                ter = "ter1";
                break;
            case 'addPartie2':
                j1 = "j12";
                j2 = "j22";
                ter = "ter2";
                break;
            case 'addPartie3':
                j1 = "j13";
                j2 = "j23";
                ter = "ter3";
                break;
            case 'addPartie4':
                j1 = "j14";
                j2 = "j24";
                ter = "ter4";
                break;

        }
        //bcorej1,$scouild a post data structure
        console.log(j1);
        var myData = 'playerID1=' + $("#" + j1 + " option:selected").val()
                + '&' + 'playerID2=' + $("#" + j2 + " option:selected").val()
                + '&' + 'terrainID=' + $("#" + ter + " option:selected").val();
        console.log(myData);

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_admin_creer_partie", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: myData, //Form variables
            success: function (response) {
                console.log(response);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                //$("#addPlayer").show(); //show submit button
                alert(thrownError);
            }
        });
    });


});

