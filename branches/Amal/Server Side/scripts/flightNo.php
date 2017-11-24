
<?php
include_once('dbconnect.php');
    if(isset($_POST['action']) && $_POST['action'] == 'availability')
    {
            $flightNo = mysqli_real_escape_string($con,$_POST['flightNo']); // Get the username values
            $query  = "select flight_No from flight_details where flight_No='".$flightNo."'";
            $res    = mysqli_query($con,$query);
            $count  = mysqli_num_rows($res);
            echo $count;
    }
?>