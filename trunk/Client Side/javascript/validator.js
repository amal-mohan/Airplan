$(document).ready(function()
{
	$('#flightNo').focus(function()
	{
		$('#flightNo').attr('class','textBoxBlack')
	
	});

	$('#flightNo').blur(function()
	{
		$('#flightNo').attr('class','textBoxBlack')
		var flightNo=$("#flightNo").val()		
		if((flightNo)!="")
		{
			if(flightNo.match(/^[a-zA-Z]{3}\-[0-9]{2}$/)==null)
			{
				$('#flightNo').attr('class','textBoxRed')
				$('#flightNoTool').tooltip('show')
				setTimeout(function(){$('#flightNoTool').tooltip('hide')},4000)
			}

		}
	});

});