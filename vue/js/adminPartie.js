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
            
            for (var i = 0; i <4; i++) {
                $('#'+i).find('.p1').html(response[i][1]+ " VS "+ response[i][2]);
                $('#'+i).find('.scrj1').html(response[i][1]+ " : "+ response[i][3]);
                $('#'+i).find('.scrj2').html(response[i][2]+ " : "+ response[i][4]);
                $('#'+i).find('.plus1').attr("id",i+"-plus-1-"+response[i][0]);
                $('#'+i).find('.plus2').attr("id",i+"-plus-2-"+response[i][0]);
                //$('div.p1').html(response[0][1]+ " VS "+ response[1][1]);
                //$('div.scrj1').html(response[0][1]+"  : "+response[0][3]);
                //$('div.scrj2').html(response[1][1]+"  : "+response[0][4]);
            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
        }
    });
 
    //##### pour le boutton +
    $("[name='bouton']").click(function(e) {  
        e.preventDefault();
        console.log(e.target.id);
        //console.log(e.target.id);//ex: plus1-48, premier boutton +, partie id:48
        var numButton = e.target.id.split("-",4)[2];    
        var partie_id=e.target.id.split("-",4)[3];
        var panelNum =e.target.id.split("-",4)[0];//4 panels. start at '0'
        console.log(partie_id);
        //build a post data structure
        var scorej1=$("#"+panelNum).find("div.scrj1").text().split(": ",2)[1];
        var scorej2=$("#"+panelNum).find("div.scrj2").text().split(": ",2)[1];


        var myData = "action=plus&"+"scorej1="+scorej1+"&scorej2="+scorej2+"&partie_id="+partie_id+"&numButton="+numButton;
        console.log(myData);
        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_admin_joueur?", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: myData, //Form variables
            success: function(response) {
                //ici afficher le score. Il faudra renvoyer et recup ici
                //un objet json avec les sets et scores
                console.log(response);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });






});
