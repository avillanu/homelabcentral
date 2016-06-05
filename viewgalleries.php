<?php
include("dbconnect.php");
include("header2.php");

echo '<div class="panel"><p align=center>';
$sql = "SELECT username,content,user_id FROM content";

$root = $_SERVER['DOCUMENT_ROOT'];
// include($root."/nasapan/inc/header.php");
$target_dir = "uploads/";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $content = $row["content"];
        echo '<a href="homelab.php?action=get&id='.$row['username'].'">View Homelab</a>';
        echo " id: " . $row["username"]. " - content " . substr($content, 0, 100). " <br>";
        $user = $row["user_id"];
        $sql2 = "SELECT photo_filename FROM gallery_photos WHERE username='$user' LIMIT 4";
        $result2 = $conn->query($sql2);
        while($row2 = $result2->fetch_assoc()) {echo '<IMG SRC="thumb.php?file='.$target_dir.$row2["photo_filename"].'&sizey=50">';}
        echo '<BR>';
// <img src="thumb.php?file=FILE&sizex=SIZEX&sizey=SIZEY">
    }
} else {
    echo "0 results";
}


$conn->close();
echo '</p></panel>';
include("footer.php");
?>
