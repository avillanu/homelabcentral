<?php

session_start();
include("header.php");
?>

<BR><BR><div class="panel">
  Enter in the description of your homelab
  <form method="post" action="change_content.php" id="usrform">
  <textarea name="comment" id="comment" rows="24" cols="95">
<?php
$user = mysql_real_escape_string($_SESSION['user']);
$res=mysql_query("SELECT * FROM content WHERE user_id=".$user);
$contentRow=mysql_fetch_array($res);
    echo $contentRow['content'];
?>
  </textarea>
  <input type="submit">
  </form>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
$sql="SELECT * FROM gallery_photos WHERE username=".$user;
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["photo_filename"];
    echo '<a href="delete.php?action=delete&id='.$row["photo_filename"].'">Delete</A><BR>';}
echo "</div>";
include("footer.php");
 ?>
