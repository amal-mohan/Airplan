<!DOCTYPE html>
<html>
<head>
    <title>Flights</title>
    <link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/functional.css">
<?php
include_once 'dbconnect.php';
session_start();
 $departure = $_POST['search-box'];
 $arrival =  $_POST['search-box1'];
 $departuredate = $_POST['departuredate'];
 $returndate = $_POST['returndate'];
$userid=$_SESSION['user_id'];

if($_SESSION['user_id']=='Admin')
{
 $query = "SELECT * FROM `Flight`";
 $result = mysqli_query($con,$query);
 echo ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
 echo '<script src="../../Client Side/javascript/adminManager.js"></script>';    
}
else
{

 if(empty($departuredate) && !empty($returndate))
 {
    echo "Please enter return date";
 }

 if(!empty($departure) && !empty($arrival) && empty($departuredate) && empty($returndate)){
 $query = "SELECT * FROM `Flight` WHERE Departure_Airport = '".$departure."' AND Arrival_Airport = '".$arrival."'";
 $result = mysqli_query($con,$query);
}
else if(!empty($departure) && empty($arrival) && empty($departuredate) && empty($returndate)){
    $query = "SELECT * FROM `Flight` WHERE Departure_Airport = '".$departure."'";
    $result = mysqli_query($con,$query);
}
else if(empty($departure) && !empty($arrival) && empty($departuredate) && empty($returndate))
{ 
  $query = "SELECT * FROM `Flight` WHERE Arrival_Airport = '".$arrival."'";
  $result = mysqli_query($con,$query);

}
else if(!empty($departure) && !empty($arrival) && !empty($departuredate) && empty($returndate)){
    $query = "SELECT * FROM `Flight` WHERE Departure_Airport = '".$departure."' AND Departure_Date = '".$departuredate."' AND Arrival_Airport = '".$arrival."'";
    $result = mysqli_query($con,$query);


}
else if(!empty($departure) && !empty($arrival) && !empty($departuredate) && !empty($returndate)){
    $query1 = "SELECT * FROM `Flight` WHERE Departure_Airport = '".$departure."' AND Departure_Date = '".$departuredate."' AND Arrival_Airport = '".$arrival."'";
    $result1 = mysqli_query($con,$query1);

    $query2 = "SELECT * FROM `Flight` WHERE Departure_Airport = '".$arrival."' AND Departure_Date = '".$returndate."' AND Arrival_Airport ='".$departure."'";
    $result2 = mysqli_query($con,$query2);


}
}
?>

</head>
<body>

<div id ="admin" class="hidden">
    <a href="../../Client Side/content/addFlight.html">Add</a>
    <a href="../../Client Side/content/addFlightInstance.html">AddI</a>
    <a href="../../Client Side/content/deleteFlight.html"">Delete</a>
    <a href="../../Client Side/content/updateFlight.html"">Update</a>
    <a href="../../Client Side/content/updateFlightInstance.html"">Update</a>
</div>

<?php

 if (mysqli_num_rows($result)> 0){
    echo "<table> ";
    echo "<tr>";
    echo "<td>Flight No:</td><td>Departure Date</td><td>Departure Time</td><td>Arrival Date</td><td>Arrival Time</td><td>Departure Airport</td><td>Arrival Airport</td>";
    echo "</tr>";
 	while($row = mysqli_fetch_assoc($result)){
 		echo "<tr><td><a href = flight_details.php?flight_no=".urlencode($row["Flight_No"]).">".$row["Flight_No"]."</a></td><td>".$row["Departure_Date"]."</td><td>".$row["Departure_Time"]."</td><td>".$row["Arrival_Date"]."</td><td>"
 		.$row["Arrival_Time"]."</td><td>".$row["Departure_Airport"]."</td><td>".$row["Arrival_Airport"]."</td></tr>";
 	}
 	echo "</table>";

 }
 else if(mysqli_num_rows($result1)> 0 && mysqli_num_rows($result2)){

    echo "<h2> Departure Flights </h2>";
 	echo "<table> ";
    echo "<tr>";
    echo "<td>Flight No:</td><td>Departure Date</td><td>Departure Time</td><td>Arrival Date</td><td>Arrival Time</td><td>Departure Airport</td><td>Arrival Airport</td>";
    echo "</tr>";
 	while($row1 = mysqli_fetch_assoc($result1)){
 		echo "<tr><td><a href = flight_details.php?flight_no=".urlencode($row1["Flight_No"]).">".$row1["Flight_No"]."</a></td><td>".$row1["Departure_Date"]."</td><td>".$row1["Departure_Time"]."</td><td>".$row1["Arrival_Date"]."</td><td>"
 		.$row1["Arrival_Time"]."</td><td>".$row1["Departure_Airport"]."</td><td>".$row1["Arrival_Airport"]."</td></tr>";
 	}
 	echo "</table>";

 	echo "<h2> Return Flights </h2>";
 	echo "<table> ";
    echo "<tr>";
    echo "<td>Flight No:</td><td>Departure Date</td><td>Departure Time</td><td>Arrival Date</td><td>Arrival Time</td><td>Departure Airport</td><td>Arrival Airport</td>";
    echo "</tr>";
 	while($row2 = mysqli_fetch_assoc($result2)){
 		echo "<tr><td><a href = flight_details.php?flight_no=".urlencode($row2["Flight_No"]).">".$row2["Flight_No"]."</a></td><td>".$row2["Departure_Date"]."</td><td>".$row2["Departure_Time"]."</td><td>".$row2["Arrival_Date"]."</td><td>"
 		.$row2["Arrival_Time"]."</td><td>".$row2["Departure_Airport"]."</td><td>".$row2["Arrival_Airport"]."</td></tr>";
 	}
 	echo "</table>";
 }
 else
 {
 	echo "No Flights Found";
 }

?>
</body>
</html>
