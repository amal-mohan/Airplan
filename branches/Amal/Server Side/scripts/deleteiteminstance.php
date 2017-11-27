<?php
include_once('SessionManager.php');


include_once 'dbconnect.php';



$flightNo= $_POST['flightNo'];
$dDate=$_POST['dDate'];

$query1 = "UPDATE `flight` SET `isOperational` = '0' WHERE `flight`.`Flight_No` ='".$flightNo."' AND `flight`.`Departure_Date` = '".$dDate."'";


$result1 = mysqli_query($con,$query1);

if($result1)
{ 

echo $query1;  

//header("Location: displayFlights.php");

}

else
{
	echo "Couldn't connect to database";
}


?>