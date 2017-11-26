<!DOCTYPE html>
<html>
<head>
	<title>Summary</title>
</head>
<body>
<h1>Summary</h1>

<?php 
$_SESSION['Ddate']="2017-08-07";

include_once('SessionManager.php');

include_once 'dbconnect.php';

if (isset($_POST['login'])) 
{

	for($i=0;$i<intval($_POST['nop']);$i++)
{

 $query  = "INSERT INTO `passenger`(`user_id`, `Passenger_Name`, `Flight_No`, `Sex`, `Age`, `Departure_Date`) VALUES ('".$_SESSION['User_id']."','".$_SESSION['Pnames'][$i]."','".$_SESSION['flightno']."','".$_SESSION['Sex'][$i]."','".$_SESSION['Age']."','".$_SESSION['Ddate']."')";
$res    = mysqli_query($con,$query);

}


 $query="INSERT INTO `Booking`(`user_id`, `Price`, `Class`, `Flight_No`, `Departure_Date`) VALUES ('".$_SESSION['User_id']."','".$_SESSION['Price']."','".$_SESSION['class']."','".$_SESSION['flightno']."','".$_SESSION['Ddate']."')";

 $res    = mysqli_query($con,$query);

 header("Location: displayFlights.php");


}
echo "Number of Passengers: ".$_POST['nop'];
$_SESSION['nop']=$_POST['nop'];
$_SESSION['class']=$_POST['class'];
echo "Class: ".$_POST['class'];
echo "<table>";
echo "<tr><th>Name</th><th>Age</th><th>Sex</th></tr>";
$_SESSION['Pnames']=[];
$_SESSION['Age']=[];
$_SESSION['Sex']=[];
for($i=0;$i<intval($_POST['nop']);$i++)
{
	array_push($_SESSION['Pnames'], $_POST['pname'.($i+1)]);
	array_push($_SESSION['Age'], $_POST['age'.($i+1)]);
	array_push($_SESSION['Sex'], $_POST['sex'.($i+1)]);
	echo "<tr><td>".$_POST['pname'.($i+1)]."</td><td>".$_POST['age'.($i+1)]."</td><td>".$_POST['sex'.($i+1)]."</td></tr>";

}
	echo "</table>";

$query  = "select * from flight_details where flight_No='".$_SESSION['flightno']."'";
$res    = mysqli_query($con,$query);

if($res)
{
	$row = mysqli_fetch_assoc($res);

	if($_POST['class']=='b')
	{
		$price=floatval($row['Business_Class_Price']);

	}
	else
	{
		$price=floatval($row['Economy_Class_Price']);
	}
	$total_price=floatval($_POST['nop'])*$price;
	echo "Total Charge: ".$total_price;
	$_SESSION['Price']=$total_price;
}
else{
	echo $query;
}


?>
<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="cfm">

                        <input type="submit" name="login" value="Login" class="btn btn-primary" />

</form>



</body>
</html>