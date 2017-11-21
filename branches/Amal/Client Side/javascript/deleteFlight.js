
$(document).ready(function()
{

	$('#flightNo').focus(function()
	{
		$('#flightNo').attr('class','textBoxBlack')

	});

	$('#deleteFlight').submit(function()
	{
		if($.find('.textBoxRed').length!=0)
		{
			$('.textBoxRed').each(function()
			{
				var id=this.id
				var tool= "#"+id+"Tool"
				$(tool).tooltip('show')
				setTimeout(function(){$(tool).tooltip('hide')},4000)
			});
			return false
		}
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
				$('#flightNoTool').attr('data-original-title',"Incorrect Flight Number Format")
				$('#flightNoTool').tooltip('show')
				setTimeout(function(){$('#flightNoTool').tooltip('hide')},4000)
			}
			else 
			{		

				$.ajax(
				{
					url: "../../Server Side/scripts/flightNo.php",
					dataType: "json",
		 			success: function(data) 
		 			{
		 				existingflightNo=[]
		 				for(i in data['flightNo'])
		 			 	{
						 	existingflightNo.push(data['flightNo'][i])
						}

					 	if (existingflightNo.indexOf(flightNo) ==-1)
					 	{
	 						$('#flightNo').attr('class','textBoxRed')
							$('#flightNoTool').attr('data-original-title',"Flight Number does not exist")
							$('#flightNoTool').tooltip('show')
							setTimeout(function(){$('#flightNoTool').tooltip('hide')},4000)
						
					 	}
					},
					error: function()
				 	{
				 		alert("error loading file");
			  	 	}	
	     		});
			}

		}
	});

});
