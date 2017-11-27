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

	$stoppos='stop0'.strval($i+1);
	$layoverm='layover0'.strval($i+1);
	$location[]=$_POST[$stoppos];
	$layover[]=$_POST[$layoverm];
}



if($extention!="")
{
$query = "UPDATE `flight_details` SET  `Operator`='".$airline."', `isOperational`=1, `display_image`='".$target_file."', `flight_type`='".$type."', `Food`='".$food."', `Total_seats`='".$nop."', `Economy_Class_Price`='".$ePrice."', `Business_Class_Price`='".$bPrice."', `Cancellation_Fee`='".$cancelFee."', `Check-In_Baggage`='".$checkIn."', `Cabin_Baggage`='".$cabIn."', `Number_of_Intermediate_Stops`='".$stopValue."', `Origin`='".$from."', `Destination`='".$to."' where `Flight_No`='".$flightNo."'";
}
else
{
	$query = "UPDATE `flight_details` SET  `Operator`='".$airline."', `isOperational`=1, `flight_type`='".$type."', `Food`='".$food."', `Total_seats`='".$nop."', `Economy_Class_Price`='".$ePrice."', `Business_Class_Price`='".$bPrice."', `Cancellation_Fee`='".$cancelFee."', `Check-In_Baggage`='".$checkIn."', `Cabin_Baggage`='".$cabIn."', `Number_of_Intermediate_Stops`='".$stopValue."', `Origin`='".$from."', `Destination`='".$to."' where `Flight_No`='".$flightNo."'";


}
$result = mysqli_query($con,$query);

if($result)
{   

for($i=0;$i<intval($stopValue);$i++)
{

$query2 = "UPDATE `flight_stop` SET  `intermediate_stop`='".$location[$i]."', `layover_time`='".$layover[$i]."' where `Flight_No`='".$flightNo."'";
$result2 = mysqli_query($con,$query2);

}

if($result2)
{
	
	header("Location: displayFlights.php");

}

else
{

echo $query2;

}

}

else{
	echo $query;
	echo "Couldn't connect to database";
}


?>