<?php
include_once('SessionManager.php');


include_once 'dbconnect.php';



$flightNo= $_POST['fno'];
$aDate= $_POST['aDate'];
$dDate= $_POST['dDate'];
$aTime=$_POST['aTime'];
$dTime=$_POST['dTime'];

$from=$_POST['from'];
$to=$_POST['to'];
$nop=$_POST['nop'];
$nop1=$_POST['nop1'];
$stopValue=$_POST['stopValue'];
$location=[];
$layover=[];
$Didate=[];
$diTime=[];
$aiDate=[];
$aiTime=[];

for($i=0;$i<intval($stopValue);$i++)
{
	$stoppos='stop'.strval($i+1);
	$layoverm='layover'.strval($i+1);
	$did='diDate'.strval($i+1);
	$dit='diTime'.strval($i+1);
	$aid='aiDate'.strval($i+1);
	$ait='aiTime'.strval($i+1);
	$location[]=$_POST[$stoppos];
	$layover[]=$_POST[$layoverm];
	$Didate[]=$_POST[$did];
	$aiDate[]=$_POST[$aid];
	$diTime[]=$_POST[$dit];
	$aiTime[]=$_POST[$ait];

}


$query1 = "INSERT INTO `flight` (`Flight_No`, `Departure_Date`, `Departure_Time`, `Arrival_Date`, `Arrival_Time`,`Business_Class_Seats`,`Economy_Class_Seats`,`isOperational`, `Origin`, `Destination`) VALUES  ('".$flightNo."','".$dDate."','".$dTime."','".$aDate."','".$aTime."','{$nop1}','{$nop}',1,'{$from}','{$to}')";


$result1 = mysqli_query($con,$query1);

echo $query1;
if($result1)
{   
for($i=0;$i<intval($stopValue);$i++)
{

$query2 = "INSERT INTO `flight_stop` (`Flight_No`, `intermediate_stop`, `layover_time`, `DDate`, `DTime`, `ADate`, `ATime`) VALUES ('".$flightNo."','".$location[$i]."','".$layover[$i]."','".$Didate[$i]."','".$diTime[$i]."','".$aiDate[$i]."','".$aiTime[$i]."')";

$result2 = mysqli_query($con,$query2);
}
}
if($result1)
{   

header("Location: displayFlights.php");

}

else
{
	echo "Couldn't connect to database";
}


?>