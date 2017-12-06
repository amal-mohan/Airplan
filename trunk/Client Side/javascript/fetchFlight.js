$(document).ready(function()
  {
  	//write fetch flight code for primary key validation
	$.ajax({
		 url: "../../Server Side/scripts/flightNames.php",
		 dataType: "json",
		 success: function(data) {
		 	for(i in data){
		 		alert(data[i] )
		 	}

		 	$(data).find('book').each(function(){
			var title = $(this).find('title').text();
			$("#books").append(title);
		    });

		 },
		 error: function() { alert("error loading file");  }
     });
});