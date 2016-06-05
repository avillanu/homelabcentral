<html>
<body>

Welcome <?php
session_start();
include("dbconnect.php");
$comment = mysql_real_escape_string($_POST['comment']);
$username = mysql_real_escape_string($_POST['username']);
$home = mysql_real_escape_string($_POST['home']);
$sql = "INSERT INTO comments (comment,username, home)
VALUES ('$comment','$username', '$home')";
$conn->query($sql);
// $user = $_SESSION['user'];
// $content = mysql_real_escape_string($_POST['comment']);
// $query="UPDATE content
//            SET content='$content'
//            WHERE user_id='$user'";
//            mysql_query($query)or die(mysql_error());
?>


<br>

</body>
</html>
