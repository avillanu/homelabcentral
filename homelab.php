<?php
session_start();
include("header2.php");
$target_dir = "uploads/";
include("dbconnect.php");
echo "<BR><BR><BR><BR><BR><div class='panel'>";
if( isset($_GET['id']) )
{
$id = mysql_real_escape_string($_GET['id']);
echo 'Username: '.$id;
$res=mysql_query("SELECT * FROM content WHERE username='$id'");
$contentRow=mysql_fetch_array($res);
$userid = mysql_real_escape_string($contentRow['user_id']);
$content = nl2br($contentRow['content']);
echo '<BR>'.$content.'<BR><BR><BR>';
$res=mysql_query("SELECT * FROM gallery_photos WHERE username='$userid'");
$photoRow=mysql_fetch_array($res);
$sql2 = "SELECT photo_filename FROM gallery_photos WHERE username='$userid'";
$result2 = $conn->query($sql2);
while($row2 = $result2->fetch_assoc()) {echo '<a href="'.$target_dir.$row2["photo_filename"].'"><IMG SRC="thumb.php?file='.$target_dir.$row2["photo_filename"].'&sizey=50"></a>';}
$sql="SELECT * FROM comments WHERE home='$id'";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      echo "<BR>".'<a href="homelab.php?action=get&id='.$row["username"].'">'.$row["username"].'</a> - '.$row["comment"];
}
}




?>


<!-- <img src="thumb.php?file=uploads/1464279203.gif&size=250"> -->


<?php


if(isset($_SESSION['user'])){ echo '<BR><BR>
<BR>create comment
<form method="post" action="addacomment.php" id="usrform">
<textarea name="comment" id="comment" rows="10" cols="75">
</textarea>
<input type="hidden" name="home" value="<?php echo $id; ?>">
<input type="hidden" name="username" value="'.$contentRow['username'].'"><BR><input type="submit"></form>';}
echo "</div>";
include("footer.php") ?>
