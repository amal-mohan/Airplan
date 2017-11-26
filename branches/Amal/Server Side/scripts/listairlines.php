<html>
<head>
<style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #0066cc; color:#ffffcc; padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
#search-box1{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
#suggestion-box1{ float:right; }
#departuredate{ padding: 10px;border: #a8d4b1 1px solid;border-radius:4px; }
#returndate{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../../Client Side/javascript/utilities.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
$(document).ready(function(){
	$(".clickable-row").click(function() {

        window.location = $(this).data("href");
    });
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "Departure_suggest.php",
		data:'keyword='+$(this).val(),
	beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");

			

		}
		});
	});

	$("#search-box1").keyup(function(){
		$.ajax({
		type: "POST",
		url: "Arrival_suggest.php",
		data:'keyword1='+$(this).val(),
	beforeSend: function(){
			$("#search-box1").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box1").show();
			$("#suggesstion-box1").html(data);
			$("#search-box1").css("background","#FFF");

		}
		});
	});

	
});




//To select country name
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}

function selectCountry1(val) {
$("#search-box1").val(val);
$("#suggesstion-box1").hide();
}

</script>
</head>
<body>
<div>
<div id="head" class="row">
	<a href="logout.php" class="btn btn-outline-info">
          <span class="glyphicon glyphicon-log-out"></span> Logout <?php session_start(); echo $_SESSION['user_id']?>
        </a>

</div>
<div class="row">
<div class="frmSearch">
	
<h3 > Search Flights </h3>
 <form id = "airportSearch" action = "displayFlights.php" method="post">	
	<input type="text" name = "search-box"  id="search-box" placeholder="Departure" />

    <input type="date" name="departuredate" id="departuredate"  placeholder="Departure Date(yyyy/mm/dd)">
	<i class="fa fa-arrows-h" style="font-size:24px"></i>

	<input type="text" name = "search-box1" id="search-box1"  placeholder="Arrival" />

    <input type="date" name="returndate" id="returndate"  placeholder="Return Date(yyyy/mm/dd)">
   	
   	<input type="submit" name="search" value="Search" class="btn-danger btn-lg">

</form>

</div>

</div>
<div class="row" id="favts">
	
<?php
include_once('SessionManager.php');

include_once 'dbconnect.php';

$query2 = "SELECT * from flight_details f, user_favorites u where u.User_id = '".$_SESSION['user_id']."' and u.Flight_No = f.Flight_No order by u.count";
	$result2 = mysqli_query($con,$query2);
	echo "<h2>My Favorites</h2>";
	$count=0;
	if(mysqli_num_rows($result2) >0){
		echo "<table class='table table-hover'>";
			echo "<thead class='thead-dark'><th>Flight No</th> <th>Operator</th> <th>Flight_Type</th> <th>Food</th> <th>Economy Price</th><th>Business Price</th><th>Cancellation Fee</th><th>Check-in Baggage</th><th>Cabin Baggage</th><th>Stops</th><th><th></th></thead><tbody>";
		while($row = mysqli_fetch_assoc($result2))
		{

			if($row['Food']=='o')
			{
				$food="Yes";
			}
			else
			{
				$food="No";
			}
			echo "<tr class='clickable-row' data-href = 'flight_details.php?flight_no=".urlencode($row["Flight_No"])."'><td>".$row["Flight_No"]."</td><td>".$row["Operator"]."</td><td>".$row["flight_type"]."</td><td>".$food."</td><td>".$row["Economy_Class_Price"]."</td><td>".$row["Business_Class_Price"]."</td><td>".$row["Cancellation_Fee"]."</td><td>".$row["Check-In_Baggage"]."</td><td>".$row["Cabin_Baggage"]."</td><td>".$row["Number_of_Intermediate_Stops"]."</td>";
			echo "<td><img class='tn' src = '".$row["display_image"]."'/></td>";
			echo "</tr>";
           $count+=1;
           if($count>=5)
           {
           	break;
           } 
		}
		echo "</tbody></table>";
	}
	?>

</div>

</div>
</body>
</html>