
$(document).ready(function()
{
	//add date compare logic

	var bug=10


	validlist=[]
	$('#addFlight').submit(function()
	{
		if(validlist.length==10)
		{
			if($('#displayImage').attr('src')=='#')
			{
			   	$('#displayImageTool').attr('data-original-title','Upload Airline Image')
				$('#displayImageTool').tooltip('show')
				setTimeout(function(){$('#displayImageTool').tooltip('hide')},4000)
				return false
			}
			return true
		}
		else
		{
			$('.textBoxRed').each(function()
			{
				var id=this.id
				var tool= "#"+id+"Tool"
				$(tool).tooltip('show')
				setTimeout(function(){$(tool).tooltip('hide')},4000)
				if($('#displayImage').attr('src')=='#')
				{
					$('#displayImageTool').tooltip('show')
					setTimeout(function(){$('#displayImageTool').tooltip('hide')},4000)
				}

			});
			return false
		}

	});

	$('#flightNo').focus(function()
	{
		$('#flightNo').attr('class','textBoxBlack')
	
	});

	$('#nop').focus(function()
	{
		$('#nop').attr('class','textBoxBlack')
	
	});

	$('#airline').focus(function()
	{
		$('#airline').attr('class','textBoxBlack')
	
	});

	$('#from').focus(function()
	{
		$('#from').attr('class','textBoxBlack')
	
	});

	$('#to').focus(function()
	{
		$('#to').attr('class','textBoxBlack')
	
	});

	$('#ePrice').focus(function()
	{
		$('#ePrice').attr('class','textBoxBlack')
	
	});

	$('#bPrice').focus(function()
	{
		$('#bPrice').attr('class','textBoxBlack')
	
	});

	$('#checkIn').focus(function()
	{
		$('#checkIn').attr('class','textBoxBlack')
	
	});

	$('#cabIn').focus(function()
	{
		$('#cabIn').attr('class','textBoxBlack')
	
	});
	$('#cancelFee').focus(function()
	{
		$('#cancelFee').attr('class','textBoxBlack')
	
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
				if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else
			{
			var dataPass = 'action=availability&flightNo='+flightNo;
            $.ajax({ 
            type : 'POST',
            data : dataPass,
            url  : '../../Server Side/scripts/flightNo.php',
            success: function(responseText){ 
                  // Get the result
                  alert(responseText)
                 if(responseText == 0)
                 {
							validlist.push(this.id)
                }
                else if(responseText > 0){
					        $('#flightNo').attr('class','textBoxRed')
							$('#flightNoTool').attr('data-original-title',"Flight Number exist")
							$('#flightNoTool').tooltip('show')
							setTimeout(function(){$('#flightNoTool').tooltip('hide')},4000)
							$('#flightDetails').attr('class','hidden')        }
                else{
                    alert('Problem with sql query');
                }
            }
            });
			
			}

		}
});

	$('#airline').blur(function()
	{
		$('#airline').attr('class','textBoxBlack')
		var airline=$("#airline").val()		
		if((airline)!="")
		{
			if(airline.match(/^[a-zA-Z0-9]+$/)==null)
			{
				bug+=1
				$('#airline').attr('class','textBoxRed')
				$('#airlineTool').tooltip('show')
				setTimeout(function(){$('#airlineTool').tooltip('hide')},4000)
				if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else if (validlist.indexOf(this.id) == -1)
			{		
				validlist.push(this.id)
			}
		}
});

	$('#from').blur(function()
	{
		$('#from').attr('class','textBoxBlack')
		var from=$("#from").val()		
		if((from)!="")
		{
			if(from.match(/^[a-zA-Z0-9]+$/)==null)
			{
				$('#from').attr('class','textBoxRed')
				$('#fromTool').tooltip('show')
				setTimeout(function(){$('#fromTool').tooltip('hide')},4000)
			if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else if (validlist.indexOf(this.id) == -1)
			{		
				validlist.push(this.id)
			}
		}
});
	$('#to').blur(function()
	{
		$('#to').attr('class','textBoxBlack')
		var to=$("#to").val()		
		if((to)!="")
		{
			if(to.match(/^[a-zA-Z0-9]+$/)==null)
			{
				$('#to').attr('class','textBoxRed')
				$('#toTool').tooltip('show')
				setTimeout(function(){$('#toTool').tooltip('hide')},4000)
			if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else if (validlist.indexOf(this.id) == -1)
			{		
				validlist.push(this.id)
			}
		}
});
	$('#nop').blur(function()
	{
		$('#nop').attr('class','textBoxBlack')
		var nop=$("#nop").val()		
		if((nop)!="")
		{
			if(nop.match(/^[0-9]+$/)==null)
			{
				$('#nop').attr('class','textBoxRed')
				$('#nopTool').tooltip('show')
				setTimeout(function(){$('#nopTool').tooltip('hide')},4000)
			if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else if (validlist.indexOf(this.id) == -1)
			{		
				validlist.push(this.id)
			}

		}
});
	$('#bPrice').blur(function()
	{
		$('#bPrice').attr('class','textBoxBlack')
		var bPrice=$("#bPrice").val()		
		if((bPrice)!="")
		{
			if(bPrice.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#bPrice').attr('class','textBoxRed')
				$('#bPriceTool').tooltip('show')
				setTimeout(function(){$('#bPriceTool').tooltip('hide')},4000)
			if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else if (validlist.indexOf(this.id) == -1)
			{		
				validlist.push(this.id)
			}
		}
});
	$('#ePrice').blur(function()
	{
		$('#ePrice').attr('class','textBoxBlack')
		var ePrice=$("#ePrice").val()		
		if((ePrice)!="")
		{
			if(ePrice.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#ePrice').attr('class','textBoxRed')
				$('#ePriceTool').tooltip('show')
				setTimeout(function(){$('#ePriceTool').tooltip('hide')},4000)
			if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else if (validlist.indexOf(this.id) == -1)
			{		
				validlist.push(this.id)
			}
		}
});
	$('#cancelFee').blur(function()
	{
		$('#cancelFee').attr('class','textBoxBlack')
		var cancelFee=$("#cancelFee").val()		
		if((cancelFee)!="")
		{
			if(cancelFee.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#cancelFee').attr('class','textBoxRed')
				$('#cancelFeeTool').tooltip('show')
				setTimeout(function(){$('#cancelFeeTool').tooltip('hide')},4000)
			if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else if (validlist.indexOf(this.id) == -1)
			{		
				validlist.push(this.id)
			}
		}
});
	$('#checkIn').blur(function()
	{
		$('#checkIn').attr('class','textBoxBlack')
		var checkIn=$("#checkIn").val()		
		if((checkIn)!="")
		{
			if(checkIn.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#checkIn').attr('class','textBoxRed')
				$('#checkInTool').tooltip('show')
				setTimeout(function(){$('#checkInTool').tooltip('hide')},4000)
			if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else if (validlist.indexOf(this.id) == -1)
			{		
				validlist.push(this.id)
			}
		}
});
	$('#cabIn').blur(function()
	{
		$('#cabIn').attr('class','textBoxBlack')
		var cabIn=$("#cabIn").val()		
		if((cabIn)!="")
		{
			if(cabIn.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#cabIn').attr('class','textBoxRed')
				$('#cabInTool').tooltip('show')
				setTimeout(function(){$('#cabInTool').tooltip('hide')},4000)
			if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
			}
			else if (validlist.indexOf(this.id) == -1)
			{		
				validlist.push(this.id)
			}
		}
});
});