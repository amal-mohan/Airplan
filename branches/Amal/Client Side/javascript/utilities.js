$(document).ready(function()
{

	$("#flightImage").change(function()
	{
		if (this.files && this.files[0]) 
		{
		  $("#displayImage").attr("src",URL.createObjectURL(this.files[0]))
		  $("#displayImage").attr("class","visible")

        }
	});

	$("#stopValue").change(function()
	{	
		$("#intermediateStop").empty()
		var totalIntermediateStops=$("#stopValue").val()
		if(totalIntermediateStops!=0)
		{
			for(i=0;i<totalIntermediateStops;i++)
			{
				$("#intermediateStop").append("Stop "+(i+1)+": <input type='text' name='stop"+(i+1)+"'> Layover: <input type='text' name='layover"+(i+1)+"'>")
			}
		}

	});

	

});