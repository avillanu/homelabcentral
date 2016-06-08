<?php
include("dbconnect.php");
$user=mysql_real_escape_string($_SESSION['user']);
$res=mysql_query("SELECT * FROM users WHERE user_id=".$user);
$userRow=mysql_fetch_array($res);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<style>
body {

background-image: url('background.jpg');
background-size: cover;
}
</style>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
 <div id="left">
    <label>homelabcentral</label>
    </div>
    <div id="right">
     <div id="content">
       <?php if(isset($_SESSION['user'])){ echo 'hi '.$userRow['username'].'<a href="logout.php?logout">Sign Out</a><BR>';
         echo '<a href="panel.php">View Panel</a>';} ?><BR>
                  <a href="viewgalleries.php">View Galleries</a>

     </div></div></div>
