<?php
	include_once('SessionManager.php');

	include_once 'dbconnect.php';

	$id=$_GET['id'];
	$nop=$_GET['nop'];
	$class=$_GET['class'];
	$dd=$_GET['Departure_Date'];
	$fno=$_GET['fno'];

	$query="UPDATE `booking` SET `Status`='Cancelled' WHERE `Booking_Id`={$id}";

	$res = mysqli_query($con,$query);

	if($class=='b')
	{

	$query="UPDATE `flight` SET `Business_Class_Seats`=`Business_Class_Seats`+{$nop} WHERE `Flight_No`='{$fno}' and `Departure_Date`='{$dd}'";

	$res = mysqli_query($con,$query);

	}

	else
	{

	$query="UPDATE `flight` SET `Economy_Class_Seats`=`Economy_Class_Seats`+{$nop} WHERE `Flight_No`='{$fno}' and`Departure_Date`='{$dd}'";

	$res = mysqli_query($con,$query);


	}

	echo $query;

	header("Location: history.php");



?>
