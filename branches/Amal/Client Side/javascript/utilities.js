$(document).ready(function()
{

//write logic to calculate arrival and departure time

	$('#addFlight').trigger('reset')

  	var today = new Date();
  	var hour = today.getHours();
  	var minute = today.getMinutes();
	var today = new Date();
	var month=today.getMonth()+1
	var day=today.getDate()

  	if(hour<10)
	{
		hour ='0'+hour
	}
	if(minute<10)
	{
		minute='0'+10
	}
	$('#dTime').val(hour+':'+minute)
	$('#aTime').val(hour+':'+minute)

	if(day<10)
	{
    day = '0'+day
	} 
	if(month<10) 
	{
    month = '0'+month
	}

	$('#journeyDate').val(today.getFullYear()+"-"+month+"-"+day)
	$('#arrivalDate').val(today.getFullYear()+"-"+month+"-"+day)

	$("#stopValue").val('0')

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
				$("#intermediateStop").append("Stop "+(i+1)+":  <span id='intermediateStopTool"+i+"' data-toggle='tooltip' data-placement='bottom' data-original-title='Incorrect intermediate stop format' data-trigger='manual'><input type='text' required='required' placeholder='Enter Airport Name' name='stop"+(i+1)+"'></span> Layover: <span id='Layover"+i+"' data-toggle='tooltip' data-placement='bottom' data-original-title='Incorrect Layover format' data-trigger='manual'> <input type='text' required='required' placeholder='Enter Layover Time(HH:MM)' name='layover"+(i+1)+"'>")
			}
		}

	});

});