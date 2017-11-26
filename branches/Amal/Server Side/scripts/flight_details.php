<!DOCTYPE html>
<html>
<head>
	<title>Book</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function()
	{
		alert("d")

		$("#nop").change(function()
	{	
		$("#passList").empty()
		var totalIntermediateStops=$("#nop").val()
				if(totalIntermediateStops!=0)
		{
			for(i=0;i<totalIntermediateStops;i++)
			{
				$("#passList").append("Passenger "+(i+1)+":  <span id='passTool"+i+"' data-toggle='tooltip' data-placement='bottom' data-original-title='Incorrect intermediate stop format' data-trigger='manual'><input type='text' required='required' placeholder='Enter Passenger Name' name='pname"+(i+1)+"'></span> Age: <span id='ageT"+i+"' data-toggle='tooltip' data-placement='bottom' data-original-title='Incorrect age' data-trigger='manual'> <input type='text' required='required' placeholder='Enter Age' name='age"+(i+1)+"'></span>Sex:  <select name='sex"+(i+1)+"'><option value='M'>Male</option><option value='F'>Female</option></select>")
			}
		}

	});

	});	

	</script>
</head>
<body>

<?php

include_once('SessionManager.php');

include_once 'dbconnect.php';
echo "<link rel='stylesheet' type='text/css' href='css/airlinelist.css' />";

$flightno = $_GET['flight_no'];

$query = "SELECT * FROM `flight_details` where `Flight_No` = '".$flightno."'";
$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);
	
		if($row["isOperational"]){
			echo "<table>";
			echo "<tr><td>Flight No</td> <td>Flight No</td> <td>Operator</td> <td>Flight_Type</td> <td>Food</td> <td>Total Seats</td> <td>Seats available</td><td>Economy Price</td><td>Business Price</td><td>Cancellation Fee</td><td>Check-in Baggage</td><td>Cabin Baggage</td><td>Stops</td><td>$nbsp $nbsp    </td></tr>";
			echo "<tr><td>".$row["Flight_No"]."</td><td>".$row["Operator"]."</td><td>".$row["flight_type"]."</td><td>".$row["Food"]."</td><td>".$row["Total_seats"]."</td><td>".$row["current_seats"]."</td><td>".$row["Economy_Class_Price"]."</td><td>".$row["Business_Class_Price"]."</td><td>".$row["Cancellation_Fee"]."</td><td>".$row["Check-In_Baggage"]."</td><td>".$row["Cabin_Baggage"]."</td><td>".$row["Number_of_Intermediate_Stops"]."</td>";
			echo "</tr>";
			echo "<td><form action = 'myfavorites.php' method = 'POST'><input type = 'submit' name = 'favorites' value = 'Add to Favorites'>
			     <input type = 'hidden' name = 'flightno' value = '".$flightno."'></form></td>"; 
			echo "<img src = ".$row["display_image"]."/>";
            echo"</table>"; 

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

Class: <select name="class"><option value="b">Business Class</option><option value="e">Economy Class</option></select>>

Number of Passengers:  <span id='nopTool' data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Number of passengers should be a number" data-trigger='manual'><input id="nop" type="text" placeholder="Enter Number of Passengers" name="nop" required="required"></span>


<div id="passList"></div>

<input type="submit" name="" value="Proceed">
</form>

</body>
</html>



