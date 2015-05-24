
$(document).ready(function() {

    //##### send add record Ajax request to response.php #########
    $("#addPlayer").click(function (e) {
            e.preventDefault();
            if($("#nom").val()==='')
            {
                alert("Please enter some text!");
                return false;
            }
           
            $("#addPlayer").hide(); //hide submit button
           
            var myData = 'name='+ $("#nom").val()+'&' + 'nationality='+'&'+ $("#nationality").val() + '&'+ 'bornDate='+ $("#bornDate").val(); //build a post data structure

            console.log($("#nom").val());
            console.log($("#nationality").val());
            console.log($("#bornDate").val());
            console.log(myData);
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_admin_joueur?_adminJoueur_btcCreer", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:myData, //Form variables
            success:function(response){
                console.log(response);
                $("#tt").append(response);
                $("#nom").val(''); //empty text field on successful
                //$("#addPlayer").show(); //show submit button


            },
            error:function (xhr, ajaxOptions, thrownError){
                $("#addPlayer").show(); //show submit button
                alert(thrownError);
            }
            });
    });


});