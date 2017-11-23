<html>
<head>
<style>
body{width:610px;}
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
#search-box1{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px; float:right;}
#suggestion-box1{ float:right; }
#departuredate{ padding: 10px;border: #a8d4b1 1px solid;border-radius:4px; }
#returndate{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;float:right;}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(document).ready(function(){
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
<div class="frmSearch">
<h3> Search Flights </h3>
 <form id = "airportSearch" action = "displayFlights.php" method="post">	
	<input type="text" name = "search-box" id="search-box" placeholder="Departure" />
	<span id="suggesstion-box"></span>

	<input type="text" name = "search-box1" id="search-box1" placeholder="Arrival" />
	<span id="suggesstion-box1"></span>
    <br/>
    <input type="text" name="departuredate" id="departuredate" placeholder="Departure Date(yyyy/mm/dd)">

    <input type="text" name="returndate" id="returndate" placeholder="Return Date(yyyy/mm/dd)">
    <br/>
	<input type="submit" name="search" value="Search">
	 <?php session_start(); 
	 if (isset($_SESSION['user_id'])){
	 	//echo $_SESSION['user_id'];
	 	echo "<a href='logout.php'>Logout &nbsp".$_SESSION['user_id']."</a>";
	 }
	 else{
	 	echo "Logged out!";
	 }
	 ?>
</form>	


</div>
</body>
</html>