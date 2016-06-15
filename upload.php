<?php
include("header.php");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
session_start();
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
echo "<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><div class='panel'>";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "GIF" && $imageFileType != "JPEG") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {




        //
        // $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG");
        // $temp = explode(".", $_FILES["file"]["name"]);
        // $extension = end($temp);
        // // if ((($_FILES["file"]["type"] == "image/gif")
        // // || ($_FILES["file"]["type"] == "image/jpeg")
        // // || ($_FILES["file"]["type"] == "image/jpg")
        // // || ($_FILES["file"]["type"] == "image/pjpeg")
        // // || ($_FILES["file"]["type"] == "image/x-png")
        // // || ($_FILES["file"]["type"] == "image/png"))
        // // && ($_FILES["file"]["size"] < 100000000000000)
        // // && in_array($extension, $allowedExts))
        //
        //   if ($_FILES["file"]["error"] > 0)
        //     {
        //     echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        //     }
        //   else
        //     {
        //
        //       $fileName = $temp[0].".".$temp[1];
        //       $temp[0] = rand(0, 3000); //Set to random number
        //       $fileName;
        //
        //     if (file_exists("../uploads/" . $_FILES["file"]["name"]))
        //       {
        //       echo $_FILES["file"]["name"] . " already exists. ";
        //       }
        //     else
        //       {
        //         $temp = explode(".", $_FILES["file"]["name"]);
        //         $newfilename = round(microtime(true)) . '.' . end($temp);
        //         move_uploaded_file($_FILES["file"]["tmp_name"], "../uploads" . $newfilename);
        //         echo "Stored in: " . "../uploads/" . $_FILES["file"]["name"];
        //       }
        //     }

        // else
        //   {
        //   echo "Invalid file";
        //   }
        $temp = explode(".", $_FILES["file"]["name"]);
        $fileName = $temp[0].".".$temp[1];
        $temp[0] = rand(0, 3000); //Set to random number
        $fileName;
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . $imageFileType;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/" . $newfilename);
        echo "Stored in: " . "../uploads/" .  $newfilename;
        $user = $_SESSION['user'];
        $query="INSERT INTO gallery_photos (photo_filename, username)
VALUES ('$newfilename', '$user')";
        mysql_query($query)or die(mysql_error());

echo "</div>";
    // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    // } else {
    //     echo "Sorry, there was an error uploading your file.";
    // }
}
include("footer.php");
?>
