<?php
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$user = mysql_real_escape_string($_SESSION['user']);
$res=mysql_query("SELECT * FROM users WHERE user_id=".$user);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <style>
  body {
  background-image: url('background.jpg');
  background-size: cover;

  }

  </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div id="header">
 <div id="left">
    <label>homelabcentral.com</label>
    </div>
    <div id="right">
     <div id="content">
         <?php if(isset($_SESSION['user'])){ echo 'hi '.$userRow['username'].'<a href="logout.php?logout">Sign Out</a><BR>';
         echo '<a href="panel.php">View Panel</a>';}?>
<BR>
           <a href="viewgalleries.php">View Galleries</a>
        </div>
</div></div>
