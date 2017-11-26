$(document).ready(function()
{

//write logic to calculate arrival and departure time
				

	$('#cancel').click(function()
	{
		window.location.href = "../../Server Side/scripts/displayFlights.php";

	});

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
		minute='0'+minute
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

	var today = new Date().toISOString().split('T')[0];
	$("#journeyDate").attr('min', today);
	$("#arrivalDate").attr('min', today);
	$("#departuredate").attr('min',today);
	$("#returndate").attr('min',today);


	$("#stopValue").val('0')

	$("#flightImage").change(function()
	{	
		
		var fileExtention=['.jpg','.jpeg','.gif','.png']
		var valid=false
		var fileName=$('#flightImage').val()
		for(var f in fileExtention)
		{
			extention=fileName.substr(fileName.length - fileExtention[f].length, fileExtention[f].length).toLowerCase()
			if (extention == fileExtention[f])
			{
				valid = true;
				break;
			}
		}

		if(valid==true)
		{
			if (this.files[0]) 
			{
				$("#displayImage").attr("src",URL.createObjectURL(this.files[0]))
				$("#displayImage").attr("class","visible")
        	}
        }
        else
        {
        	$("#displayImage").attr("class","hidden")
        	$('#flightImage').val("")
        	$('#displayImageTool').attr('data-original-title','Incorrect file format')
        	$('#displayImageTool').tooltip('show')
			setTimeout(function(){$('#displayImageTool').tooltip('hide')},4000)
			
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