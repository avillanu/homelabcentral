<?php
include("header.php");
$user = mysql_real_escape_string($_SESSION['user']);
$content = mysql_real_escape_string($_POST['comment']);
$query="UPDATE content
           SET content='$content'
           WHERE user_id='$user'";
           mysql_query($query)or die(mysql_error());
echo "<div class='panel'> Content added </div>";
include("footer.php");
?>
