<!DOCTYPE html>
<html>
<head>
	<title>Book</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/functional.css">
	<link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/style.css">
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript">
	$(document).ready(function()
	{
		$('#cancel').click(function()
	{
		window.location.href = "listAirlines.php";

	});

		$("#nop").change(function()
	{	
		$("#passList").empty()
		var totalIntermediateStops=$("#nop").val()
				if(totalIntermediateStops!=0)
		{
			for(i=0;i<totalIntermediateStops;i++)
			{
				$("#passList").append("<div class='form-group'> <label>Passenger "+(i+1)+": <span class='star'>*</label><input required  type='text' class='form-control' required='required' placeholder='Enter Passenger Name' name='pname"+(i+1)+"'></div><div class='form-group'><label> Age: <span class='star'>*</label><span id='ageT"+i+"' data-toggle='tooltip' data-placement='bottom' data-original-title='Incorrect age' data-trigger='manual'> <input type='text' required class='form-control' required='required' placeholder='Enter Age' name='age"+(i+1)+"'></span></div><div class='form-group'><label>Sex: <span class='star'>* </label><select class='form-control' name='sex"+(i+1)+"'><option value='M'>Male</option><option value='F'>Female</option></select></div>")
			}
		}

	});



	});	

	</script>
</head>
<body>
<div id="head" class="row">
	<a href="logout.php" class="btn btn-outline-info">
          <span class="glyphicon glyphicon-log-out"></span> Logout <?php session_start(); echo $_SESSION['user_id']?>
        </a>
        <a href="history.php" class="btn btn-outline-info">My Bookings</a>
            <h2 id="wname">ZENOFLY</h2>


</div>
<div class="row">
<div class="push">
<?php

include_once('SessionManager.php');

include_once 'dbconnect.php';
echo "<link rel='stylesheet' type='text/css' href='css/airlinelist.css' />";

$flightno = $_GET['flight_no'];

$_SESSION['Ddate']=$_GET['departuredate'];


$query = "SELECT * FROM `flight_details` fd, flight f where f.Flight_No=fd.Flight_No and f.Departure_Date='{$_SESSION['Ddate']}' and fd.`Flight_No` = '".$flightno."'";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);
	
		if($row["isOperational"])
		{
			if($row['Food']=='o')
			{
				$food="Yes";
			}
			else
			{
				$food="No";
			}

			echo "<table class='table'>";
			echo "<tr> <th>Flight No</th> <th>Operator</th> <th>Flight_Type</th> <th>Food</th> <th>Business Class Seats</th> <th>Economy Class Seats</th><th>Economy Price</th><th>Business Price</th><th>Cancellation Fee</th><th>Check-in Baggage</th><th>Cabin Baggage</th><th>Stops</th><th></th></tr>";
			echo "<tr><td>".$row["Flight_No"]."</td><td>".$row["Operator"]."</td><td>".$row["flight_type"]."</td><td>".$food."</td><td>".$row['Business_Class_Seats']."</td><td>".$row['Economy_Class_Seats']."</td><td>".$row["Economy_Class_Price"]."</td><td>".$row["Business_Class_Price"]."</td><td>".$row["Cancellation_Fee"]."</td><td>".$row["Check-In_Baggage"]."</td><td>".$row["Cabin_Baggage"]."</td><td>".$row["Number_of_Intermediate_Stops"]."</td>";
			echo "<td><img class='tn' src = '".$row["display_image"]."'/></td>";;
    		echo "</tr>";
            echo"</table>"; 

            echo "<label>Origin: </label><span class='text-primary'>&nbsp;{$row['Origin']}</span><br/>";
			echo "<label>Destination: </label><span class='text-primary'>&nbsp;{$row['Destination']}</span>";


$_SESSION['flightno']=$flightno;

		}
		else{
			echo "The selected flight is not operational";
		}
	}



else{
	echo "Details not available";
}




?>

<h1>Passenger details</h1>

<form id="addFlight" method="post" action="../../Server Side/scripts/addPassenger.php" enctype="multipart/form-data">
	<div id="addFlightForm">
<div class='form-group'>
<label>Class:<span class='star'>*</label> <select class='form-control' name="class"><option value="b">Business Class</option><option value="e">Economy Class</option></select>
</div>
<div class='form-group'>
<label>Number of Passengers:</label> <span class="star">*</span></label> <select class="form-control" name="nop" id="nop"><option value="0" selected="selected">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
</div>

<div id="passList"></div>

<input type="submit" name="" value="Proceed" class="btn btn-primary">
<input type="button" id="cancel" class="btn btn-secondary" value="Cancel">

</form>

</body>
</html>



