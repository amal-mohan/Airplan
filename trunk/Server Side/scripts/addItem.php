<?php

include_once('SessionManager.php');

include_once 'dbconnect.php';


$fileExtention=['.jpg','.jpeg','.gif','.png'];
$fileName=$_FILES["flightImage"]["name"];
foreach($fileExtention as $f)
{
	$extention=strtolower(substr($fileName,strlen($fileName) - strlen($f), strlen($f)));
	if ($extention == $f)
	{
		break;
	}
}
$fileName= date("Y_m_d_h_i_s_a").$extention;
$target_file = "../resources/". basename($fileName);
move_uploaded_file($_FILES["flightImage"]["tmp_name"], $target_file);

$flightNo= $_POST['flightNo'];
$aDate= $_POST['aDate'];
$dDate= $_POST['dDate'];
$aTime=$_POST['aTime'];
$dTime=$_POST['dTime'];
$airline=$_POST['airline'];
$type=$_POST['type'];
$from=$_POST['from'];
$to=$_POST['to'];
$food=$_POST['food'];
$nop=$_POST['nop'];
$nop1=$_POST['nop1'];
$ePrice=$_POST['ePrice'];
$bPrice=$_POST['bPrice'];
$cancelFee=$_POST['cancelFee'];
$checkIn=$_POST['checkIn'];
$cabIn=$_POST['cabIn'];
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


$query = "INSERT INTO `flight_details` (`Flight_No`, `Operator`, `isOperational`, `display_image`, `flight_type`, `Food`, `Economy_Class_Price`, `Business_Class_Price`, `Cancellation_Fee`, `Check-In_Baggage`, `Cabin_Baggage`, `Number_of_Intermediate_Stops`) VALUES ('".$flightNo."','".$airline."',1,'".$target_file."','".$type."','".$food."','".$ePrice."','".$bPrice."','".$cancelFee."','".$checkIn."','".$cabIn."','".$stopValue."')";

$result = mysqli_query($con,$query);

if($result)
{   

$query1 = "INSERT INTO `flight` (`Flight_No`, `Departure_Date`, `Departure_Time`, `Arrival_Date`, `Arrival_Time`,`Business_Class_Seats`,`Economy_Class_Seats`,`isOperational`, `Origin`, `Destination`) VALUES  ('".$flightNo."','".$dDate."','".$dTime."','".$aDate."','".$aTime."','{$nop1}','{$nop}',1,'{$from}','{$to}')";


$result1 = mysqli_query($con,$query1);


if($result1)
{   
for($i=0;$i<intval($stopValue);$i++)
{

$query2 = "INSERT INTO `flight_stop` (`Flight_No`, `intermediate_stop`, `layover_time`, `DDate`, `DTime`, `ADate`, `ATime`) VALUES ('".$flightNo."','".$location[$i]."','".$layover[$i]."','".$Didate[$i]."','".$diTime[$i]."','".$aiDate[$i]."','".$aiTime[$i]."')";

$result2 = mysqli_query($con,$query2);
}

header("Location: displayFlights.php");

}


}

else{
	echo "Couldn't connect to database";
}


?>