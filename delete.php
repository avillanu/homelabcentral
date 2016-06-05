<?php
session_start();
include("dbconnect.php");
if( isset($_GET['id']) )
{
$id = mysql_real_escape_string($_GET['id']);
$user = mysql_real_escape_string($_SESSION['user']);
$res=mysql_query("SELECT * FROM gallery_photos WHERE photo_filename='$id'");
$photoRow=mysql_fetch_array($res);
if ($photoRow['username'] == $user)
{
    $sql= $conn->prepare("DELETE FROM gallery_photos WHERE photo_filename='$id'");
    $sql->execute();
    echo "photo deleted";}

}
?>
