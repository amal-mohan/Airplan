<?php
session_start();

if(isset($_SESSION['user_id'])){
	include_once 'dbconnect.php';$query2 = "SELECT * from flight_details f, user_favorites u where u.User_id = '".$_SESSION['user_id']."' and u.Flight_No = f.Flight_No";
	$result2 = mysqli_query($con,$query2);
	echo "<h2>My Favorites</h2>";

	if(mysqli_num_rows($result2) >0){
		echo "<table>";
			echo "<tr><td>Flight No</td> <td>Flight No</td> <td>Operator</td> <td>Flight_Type</td> <td>Food</td> <td>Total Seats</td> <td>Seats available</td><td>Economy Price</td><td>Business Price</td><td>Cancellation Fee</td><td>Check-in Baggage</td><td>Cabin Baggage</td><td>Stops</td><td>$nbsp $nbsp    </td></tr>";
		while($row = mysqli_fetch_assoc($result2)){
			echo "<tr><td>".$row["Flight_No"]."</td><td>".$row["Operator"]."</td><td>".$row["flight_type"]."</td><td>".$row["Food"]."</td><td>".$row["Total_seats"]."</td><td>".$row["current_seats"]."</td><td>".$row["Economy_Class_Price"]."</td><td>".$row["Business_Class_Price"]."</td><td>".$row["Cancellation_Fee"]."</td><td>".$row["Check-In_Baggage"]."</td><td>".$row["Cabin_Baggage"]."</td><td>".$row["Number_of_Intermediate_Stops"]."</td>";
			echo "</tr>";
            echo "<img src = ".$row["display_image"]."/>";

		}
		echo "</table>";
	}
}

else{
	header("location: login.php");
}
?>