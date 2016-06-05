<?php
if(!mysql_connect("localhost","gallery_user","mixergy3"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("gallery"))
{
     die('oops database selection problem ! --> '.mysql_error());
}



$servername = "localhost";
$username = "gallery_user";
$password = "mixergy3";
$dbname = "gallery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

?>
