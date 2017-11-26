<?php
include_once('SessionManager.php');


include_once 'dbconnect.php';



$flightNo= $_POST['flightNo'];


$query1 = "UPDATE `flight_details` SET `isOperational`='0' where `Flight_No`='".$flightNo."'";


$result1 = mysqli_query($con,$query1);

if($result1)
{   

header("Location: displayFlights.php");

}

else
{
	echo "Couldn't connect to database";
}


?>