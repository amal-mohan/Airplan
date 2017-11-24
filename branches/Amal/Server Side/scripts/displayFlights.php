<!DOCTYPE html>
<html>
<head>
    <title>Flights</title>
    <link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/functional.css">
    <style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function()
{
$("#fli1").style.color = "red"
//    var name = '<?php echo json_encode($num_rows) ?>';
  //  alert(name);

$('#myInput').keyup(function() 
{
    var input, filter, ul, li, a, i;
    input = $("#myInput").val();
    filter = input.toUpperCase();
    ul = document.getElementById("myUL1");
    li = ul.getElementsByTagName("tr");
    for (i = 1; i < li.length; i++) 
    {
 
        a1 = li[i].getElementsByTagName("td")[0];
        a = a1.getElementsByTagName("a")[0];

        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
    ul = document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i = 1; i < li.length; i++) {
        a1 = li[i].getElementsByTagName("td")[0];
        a = a1.getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
    ul = document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i = 1; i < li.length; i++) {
        a1 = li[i].getElementsByTagName("td")[0];
        a = a1.getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
});
});
</script>

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
 echo '<script src="../../Client Side/javascript/adminManager.js"></script>';    
 $num_rows = intval(mysqli_num_rows($result));

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
</div>


<input type="text" id="myInput"  placeholder="Search for names.." title="Type in a name">

<?php

 if (mysqli_num_rows($result)> 0){
    echo "<table id='myUL1'> ";
    echo "<tr>";
    echo "<th>Flight No:</th><th>Departure Date</th><th>Departure Time</th><th>Arrival Date</th><th>Arrival Time</th><th>Departure Airport</th><th>Arrival Airport</th>";
    echo "</tr>";
    for($i=0;$i<$num_rows;$i+=5)
    {
        $k=0;
 	while($row = mysqli_fetch_assoc($result))
    {
 		echo "<div id='fli".strval($i/5+1)."' <tr><td><a href = flight_details.php?flight_no=".urlencode($row["Flight_No"]).">".$row["Flight_No"]."</a></td><td>".$row["Departure_Date"]."</td><td>".$row["Departure_Time"]."</td><td>".$row["Arrival_Date"]."</td><td>"
 		.$row["Arrival_Time"]."</td><td>".$row["Departure_Airport"]."</td><td>".$row["Arrival_Airport"]."</td></tr></div>";
        $k+=1;
        if($k==5)
        {
            break;
        }
 	}
 }
 	echo "</table>";

 }
 else if(mysqli_num_rows($result1)> 0 && mysqli_num_rows($result2)){

    echo "<h2> Departure Flights </h2>";
 	echo "<table id='myUL2'> ";
    echo "<tr>";
    echo "<td>Flight No:</td><td>Departure Date</td><td>Departure Time</td><td>Arrival Date</td><td>Arrival Time</td><td>Departure Airport</td><td>Arrival Airport</td>";
    echo "</tr>";
 	while($row1 = mysqli_fetch_assoc($result1)){
 		echo "<tr><td><a href = flight_details.php?flight_no=".urlencode($row1["Flight_No"]).">".$row1["Flight_No"]."</a></td><td>".$row1["Departure_Date"]."</td><td>".$row1["Departure_Time"]."</td><td>".$row1["Arrival_Date"]."</td><td>"
 		.$row1["Arrival_Time"]."</td><td>".$row1["Departure_Airport"]."</td><td>".$row1["Arrival_Airport"]."</td></tr>";
 	}
 	echo "</table>";

 	echo "<h2> Return Flights </h2>";
 	echo "<table id='myUL3'> ";
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

<h2>Simple Pagination</h2>

<div class="pagination">
  <a href="#">&laquo;</a>
  <?php 
        for($i=0;$i<$num_rows;$i+=5)
        {
            echo "<a id='accref".strval($i/5+1)."'>".strval($i/5+1)."</a>";
        }
    ?>
  <a href="#">&raquo;</a>
</div>

</body>
</html>
