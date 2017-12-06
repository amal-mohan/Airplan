
$(document).ready(function()
{

	$('#flightNo').focus(function()
	{
	$('#flightNo').addClass('textBoxBlack')
		$('#flightNo').removeClass('textBoxRed')
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
	$('#flightNo').addClass('textBoxBlack')
		$('#flightNo').removeClass('textBoxRed')
var flightNo=$("#flightNo").val()
		if((flightNo)!="")
		{
			if(flightNo.match(/^[a-zA-Z]{3}\-[0-9]{2}$/)==null)
			{
					$('#flightNo').addClass('textBoxRed')
				$('#flightNo').removeClass('textBoxBlack')
				$('#flightNoTool').attr('data-original-title',"Incorrect Flight Number Format")
				$('#flightNoTool').tooltip('show')
				setTimeout(function(){$('#flightNoTool').tooltip('hide')},4000)
			}
			else 
			{		
			var dataPass = 'action=availability&flightNo='+flightNo;
				 $.ajax({ // Send the username val to available.php
            type : 'POST',
            data : dataPass,
            url  : '../../Server Side/scripts/flightNo.php',
            success: function(responseText){ 
                  // Get the result
                 if(responseText == 0)
                 {
	$('#flightNo').addClass('textBoxRed')
		$('#flightNo').removeClass('textBoxBlack')

							$('#flightNoTool').attr('data-original-title',"Flight Number does not exist")
							$('#flightNoTool').tooltip('show')
							setTimeout(function(){$('#flightNoTool').tooltip('hide')},4000)
							$('#flightDetails').attr('class','hidden')       
						}
            }
            });
			}

		}
	});

});
