<?php


include_once 'dbconnect.php';



$flightNo= $_POST['flightNo'];
$aDate= $_POST['aDate'];
$dDate= $_POST['dDate'];
$aTime=$_POST['aTime'];
$dTime=$_POST['dTime'];


$query1 = "INSERT INTO `flight` (`Flight_No`, `Departure_Date`, `Departure_Time`, `Arrival_Date`, `Arrival_Time`) VALUES  ('".$flightNo."','".$dDate."','".$dTime."','".$aDate."','".$aTime."')";


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