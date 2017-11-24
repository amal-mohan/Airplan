<?php


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
$ePrice=$_POST['ePrice'];
$bPrice=$_POST['bPrice'];
$cancelFee=$_POST['cancelFee'];
$checkIn=$_POST['checkIn'];
$cabIn=$_POST['cabIn'];
$stopValue=$_POST['stopValue'];
$location=[];
$layover=[];

for($i=0;$i<intval($stopValue);$i++)
{
	$stoppos='stop'.strval($i+1);
	$layoverm='layover'.strval($i+1);
	$location[]=$_POST[$stoppos];
	$layover[]=$_POST[$layoverm];
}


$query = "INSERT INTO `flight_details` (`Flight_No`, `Operator`, `isOperational`, `display_image`, `flight_type`, `Food`, `Total_seats`, `current_seats`, `Economy_Class_Price`, `Business_Class_Price`, `Cancellation_Fee`, `Check-In_Baggage`, `Cabin _Baggage,`, `Number_of_Intermediate_Stops`) VALUES ('".$flightNo."','".$airline."',1,'".$target_file."','".$type."','".$food."','".$nop."','".$nop."','".$ePrice."','".$bPrice."','".$cancelFee."','".$checkIn."','".$cabIn."','".$stopValue."')";

$result = mysqli_query($con,$query);

if($result)
{   

$query1 = "INSERT INTO `flight` (`Flight_No`, `Departure_Date`, `Departure_Time`, `Arrival_Date`, `Arrival_Time`) VALUES  ('".$flightNo."','".$dDate."','".$dTime."','".$aDate."','".$aTime."')";


$result1 = mysqli_query($con,$query1);

if($result1)
{   
for($i=0;$i<intval($stopValue);$i++)
{

$query2 = "INSERT INTO `flight_stop` (`Flight_No`, `intermediate_stop`, `layover_time`) VALUES ('".$flightNo."','".$location[$i]."','".$layover[$i]."')";

$result2 = mysqli_query($con,$query2);
}

header("Location: displayFlights.php");

}


}

else{
	echo "Couldn't connect to database";
}


?>