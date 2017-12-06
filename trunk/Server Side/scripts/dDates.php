<?php
include_once('SessionManager.php');

include_once('dbconnect.php');
    if(isset($_POST['action']) && $_POST['action'] == 'availability')
    {
            $flightNo = mysqli_real_escape_string($con,$_POST['flightNo']);
            $dep=mysqli_real_escape_string($con,$_POST['dDate']);
             // Get the username values
            $query  = "select Flight_No from flight where isOperational='1' and Departure_Date='{$dep}' and Flight_No='".$flightNo."'";
            $res    = mysqli_query($con,$query);
            $count  = mysqli_num_rows($res);
            echo $count;
    }
?>