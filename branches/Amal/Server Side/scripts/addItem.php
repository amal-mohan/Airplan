<?php
$target_dir = "../resources/";
$target_file = $target_dir . basename($_FILES["flightImage"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 if (move_uploaded_file($_FILES["flightImage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["flightImage"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
?>