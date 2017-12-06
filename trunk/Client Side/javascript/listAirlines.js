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
