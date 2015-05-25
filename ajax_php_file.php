<?php

echo 'oooooooooooooooooooooooooooooooooooooo';
if(isset($_FILES["imgAvatar"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["imgAvatar"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["imgAvatar"]["type"] == "image/png") || ($_FILES["imgAvatar"]["type"] == "image/jpg") || ($_FILES["imgAvatar"]["type"] == "image/jpeg")
) && ($_FILES["imgAvatar"]["size"] < 1000000)//Approx. 1000kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["imgAvatar"]["error"] > 0)
{
echo "Return Code: " . $_FILES["imgAvatar"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("vue/img/" . $_FILES["imgAvatar"]["name"])) {
echo $_FILES["imgAvatar"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
$sourcePath = $_FILES['imgAvatar']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "img/".$_FILES['imgAvatar']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
echo "<br/><b>File Name:</b> " . $_FILES["imgAvatar"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["imgAvatar"]["type"] . "<br>";
echo "<b>Size:</b> " . ($_FILES["imgAvatar"]["size"] / 1024) . " kB<br>";
echo "<b>Temp file:</b> " . $_FILES["imgAvatar"]["tmp_name"] . "<br>";
}
}
}
else
{
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}
?>