<!DOCTYPE html>
<html>
<head>
	<title>History</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/functional.css">
	<link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/style.css">
	<script type="text/javascript" src="../../Client Side/javascript/history.js"></script>
<?php
	include_once('SessionManager.php');

	include_once 'dbconnect.php';
?>

</head>
<body>
<div id="head" class="row">
	<a href="logout.php" class="btn btn-outline-info">
          <span class="glyphicon glyphicon-log-out"></span> Logout <?php session_start(); echo $_SESSION['user_id']?>
        </a>
        <h2 id="wname">ZENOFLY</h2>

</div>
<div class="row">
<div class="push">
<div class="page-header">	<h2>History</h2></div>

<?php

$query="SELECT * FROM `booking` WHERE `User_id`='".$_SESSION['user_id']."'";

$res    = mysqli_query($con,$query);


$count=0;
if(mysqli_num_rows($res) >0)
{


	echo "<table class='table table-hover'>";
	echo "<thead class='thead-dark'><th></th><th>Booking ID</th><th>Number of Passengers</th><th>Passengers</th> <th>Departure Date</th> <th>Flight No</th> <th>Class</th> <th>Price</th><th>Operator</th><th>Origin</th><th>Destination</th><th>Status</th><th></th></thead><tbody>";

	while($row = mysqli_fetch_assoc($res))
	{
		 if(date($row['Departure_Date'])<date("Y-m-d"))
		 {
		 	$status="Completed";
		 }
		 else
		 {
		 	$status=$row['Status'];
		 }

		$query1="SELECT * FROM `flight_details` fd, flight f WHERE f.Flight_No =fd.Flight_No and f.Departure_Date='{$row['Departure_Date']}' and fd.`Flight_No`='".$row["Flight_No"]."'";

		$res1 = mysqli_query($con,$query1);
		$row1 = mysqli_fetch_assoc($res1);

		$query3="SELECT * FROM `passenger` WHERE `Booking_Id`='{$row['Booking_Id']}'";

		$res3 = mysqli_query($con,$query3);


		if($row['Class']=='b')
			{
				$food="Business";
			}
			else
			{
				$food="Economy";
			}
			echo "<tr'>";
			if($status=="Scheduled")
			{	
				echo '<td><a href="#" data-href="cancel.php?id='.urlencode($row["Booking_Id"]).'&class='.urlencode($row['Class']).'&Departure_Date='.urlencode($row['Departure_Date']).'&nop='.urlencode($row['Number_of_Passengers']).'&fno='.urlencode($row['Flight_No']).'" data-toggle="modal" data-target="#confirm-delete">Cancel</a></td>';
			}
			else
			{
				echo "<td></td>";
			}

			echo "<td>".$row["Booking_Id"]."</td><td>{$row['Number_of_Passengers']}</td><td><ul>";
		while($row3 = mysqli_fetch_assoc($res3))
		{
			echo "<li>{$row3['Passenger_Name']}&nbsp;{$row3['Sex']}&nbsp;{$row3['Age']}</li>";
		}
			echo "</ul></td><td>".$row["Departure_Date"]."</td><td>".$row["Flight_No"]."</td><td>".$food."</td><td>".$row["Price"]."</td><td>".$row1["Operator"]."</td><td>".$row1["Origin"]."</td><td>".$row1["Destination"]."</td><td>{$status}</td>";
			echo "<td><img class='tn' src = '".$row1["display_image"]."'/></td>";
			echo "</tr>";
            
		}
		echo "</tbody></table>";
	}
?>
<input type="button" id="cancel" class="btn btn-primary" value="Done">

</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Cancel Booking?
            </div>
            <div class="modal-body">
                Are you sure you want to cancel booking <php
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Confirm</a>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>