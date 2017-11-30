<!DOCTYPE html>
<html>
<head>
	<title>Summary</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/functional.css">
	<link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/style.css">
	<script src="../../Client Side/javascript/addPassenger.js"></script>

</head>
<body>

<div id="head" class="row">
	<a href="../../Server Side/scripts/logout.php" class="btn btn-outline-info">
          <span class="glyphicon glyphicon-log-out"></span> Logout <?php session_start(); echo $_SESSION['user_id']?>
     </a>
        <h2 id="wname">ZENOFLY</h2>

</div>
<div class="row">
<div class="push" id="addFlightForm">
<div class="page-header">	<h2>Summary</h2></div>

<?php 

include_once('SessionManager.php');

include_once 'dbconnect.php';

if (isset($_POST['login'])) 
{

 $query="SELECT `Booking_Id` FROM `booking` ORDER BY `Booking_Id` DESC";

 $res    = mysqli_query($con,$query);

 if(mysqli_num_rows($res) >0)
 {
 	$row = mysqli_fetch_assoc($res);
 	$bid=$row['Booking_Id']+1;
 }
else
{
	$bid=1;

}

$query="INSERT INTO `Booking`(`user_id`, `Price`, `Class`, `Flight_No`, `Departure_Date`,`Status`,`Number_of_Passengers`,`Booking_Id`) VALUES ('".$_SESSION['user_id']."','".$_SESSION['Price']."','".$_SESSION['class']."','".$_SESSION['flightno']."','".$_SESSION['Ddate']."', 'Scheduled','{$_SESSION["nop"]}',{$bid})";

 $res    = mysqli_query($con,$query);


	for($i=0;$i<intval($_SESSION['nop']);$i++)
{

 $query  = "INSERT INTO `passenger`(`user_id`, `Passenger_Name`, `Flight_No`, `Sex`, `Age`, `Departure_Date`,`Booking_Id`) VALUES ('".$_SESSION['user_id']."','".$_SESSION['Pnames'][$i]."','".$_SESSION['flightno']."','".$_SESSION['Sex'][$i]."','".$_SESSION['Age'][$i]."','".$_SESSION['Ddate']."',{$bid})";
$res    = mysqli_query($con,$query);
}

if($_SESSION['class']=='b')
{

$query="UPDATE flight SET Business_Class_Seats=Business_Class_Seats-{$_SESSION["nop"]}  WHERE Departure_Date='{$_SESSION['Ddate']}' AND `Flight_No` = '".$_SESSION['flightno']."'";

 $res    = mysqli_query($con,$query);
}
else
{
	$query="UPDATE flight SET Economy_Class_Seats=Economy_Class_Seats-{$_SESSION["nop"]}  WHERE Departure_Date='{$_SESSION['Ddate']}' AND `Flight_No` = '".$_SESSION['flightno']."'";

 $res    = mysqli_query($con,$query);

}

 $query="SELECT * FROM `user_favorites` WHERE `Flight_No`='".$_SESSION['flightno']."' AND `User_id`='".$_SESSION['user_id']."'";

 $res    = mysqli_query($con,$query);


 if(mysqli_num_rows($res)==0)
 {
 	$query="INSERT INTO `user_favorites` (`User_id`, `Flight_No`, `Count`) VALUES ('".$_SESSION['user_id']."','".$_SESSION['flightno']."','1')"; 
 	$res    = mysqli_query($con,$query);

 }
else
{
$query="UPDATE `user_favorites` SET `Count`=`Count`+1 WHERE `Flight_No` = '".$_SESSION['flightno']."' and `User_id` = '".$_SESSION['user_id']."'";
$res    = mysqli_query($con,$query);	

}

echo "<script src='modelshow.js'> </script>";


}
echo "<label>Number of Passengers: </label><span class='text-primary'> ".$_POST['nop']."</span>";
$_SESSION['nop']=$_POST['nop'];
$_SESSION['class']=$_POST['class'];
if($_POST['class']=='b')
{
	$class='Business';
}
else
{
$class='Economy';	
}
echo "<br><label>Class:&nbsp; </label><span class='text-primary'>".$class."</span>";
echo "<table class='table'>";
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
$_SESSION['nop']=$_POST['nop'];
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
	echo "<label>Total Charge:&nbsp; </label><span class='text-primary'>".$total_price."</span>";
	$_SESSION['Price']=$total_price;

}
else{
	echo $query;
}


?>
<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="cfm">

 <input type="submit" name="login" value="Confirm Booking" class="btn btn-primary" />

 <input type="button" id="cancel" class="btn btn-secondary" value="Cancel">


</form>

   <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
     <div class="modal-content">
     <div class="modal-header">
         <h4 class="modal-title">Flight Booking</h4>
     </div>
     <div class="modal-body">
         <p><strong>Booking Successful</p>
     </div>
     <div class="modal-footer">
         <button type="button" id="clickbutton" class="btn btn-white" data-dismiss="modal" aria-label="Close">Close</button>
     </div>
   </div>
  </div>
</div>     


</div>
</body>
</html>