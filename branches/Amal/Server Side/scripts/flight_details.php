<?php
include_once 'dbconnect.php';
session_start();
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



		}
		else{
			echo "The selected flight is not operational";
		}
	}



else{
	echo "Details not available";
}




?>