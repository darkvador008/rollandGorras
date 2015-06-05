
$(document).ready(function() {

    //##### send add record Ajax request to response.php #########
    $("#addPlayer").click(function (e) {
	console.log('bbbbbbbbbbbbbbbbbbbbbb');
            e.preventDefault();
            if($("#nom").val()==='')
            {
                alert("Please enter some text!");
                return false;
            }
           
            //$("#addPlayer").hide(); //hide submit button
           
		   //build a post data structure
            var myData = 'name='+ $("#nom").val()+'&' 
						+ 'nationality='+ $("#nationality").val() + '&'
						+ 'imgAvatar='+ $("#imgAvatar").val(); 

            //console.log($("#nom").val());
            //console.log($("#nationality").val());
            //console.log($("#bornDate").val());
            //console.log(myData);
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_admin_joueur", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:myData, //Form variables
            success:function(response){
                console.log(response);
                $("#tt").append(response);
                //$("#nom").val(''); //empty text field on successful
                //$("#addPlayer").show(); //show submit button


            },
            error:function (xhr, ajaxOptions, thrownError){
                //$("#addPlayer").show(); //show submit button
                alert(thrownError);
            }
            });
    });

	
	
	
    //##### Send delete Ajax request to response.php #########
    $("body").on("click", "#responds .del_button", function(e) {
		console.log('aaaaaaaaaaaaaaaaaaaaaaaaa');
         e.preventDefault();
         var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
         var DbNumberID = clickedID[1]; //and get number from array
         var myData = 'recordToDelete='+ DbNumberID; //build a post data structure
         
        $('#item_'+DbNumberID).addClass( "sel" ); //change background of this element by adding class
        $(this).hide(); //hide currently clicked delete button
         
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "index.php?page=_admin_joueur", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:myData, //Form variables
            success:function(response){
                //on success, hide  element user wants to delete.
                console.log(response);
                $("#responds").remove();
                //$('#item_'+DbNumberID).fadeOut();
            },
            error:function (xhr, ajaxOptions, thrownError){
                //On error, we alert user
                console.log(thrownError);
                console.log(ajaxOptions);
                
            }
            });
    });

});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/*	$("#upload").on('submit',(function(e) {
e.preventDefault();
$("#message").empty();
$('#loading').show();
$.ajax({
url: "ajax_php_file.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#loading').hide();
$("#message").html(data);
}
});
            error:function (xhr, ajaxOptions, thrownError){
                //$("#addPlayer").show(); //show submit button
                alert(thrownError);
            }
}));

*/



/*
// Function to preview image after validation
$(function() {
$("#imgAvatar").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#imgAvatar").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};


	*/
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	







