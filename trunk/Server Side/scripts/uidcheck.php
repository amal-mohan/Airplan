<?php
include_once('SessionManager.php');

include_once('dbconnect.php');
    if(isset($_POST['action']) && $_POST['action'] == 'availability')
    {
            $username = mysqli_real_escape_string($con,$_POST['username']); // Get the username values
            $query  = "select User_id from user where User_id='".$username."'";
            $res    = mysqli_query($con,$query);
            $count  = mysqli_num_rows($res);
            echo $count;
    }
?>