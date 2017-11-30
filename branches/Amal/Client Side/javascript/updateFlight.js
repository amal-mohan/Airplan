
$(document).ready(function()
{
	//add date compare logic

	$('#cancel').click(function()
	{
		window.location.href = "../../Server Side/scripts/displayFlights.php";

	});
	$('#cancel1').click(function()
	{
		window.location.href = "../../Server Side/scripts/displayFlights.php";

	});

	var bug=10
	validlist=[]
	$('#addFlight').submit(function()
	{
		if(validlist.length==7)
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
		$('#flightNo').addClass('textBoxBlack')
		$('#flightNo').removeClass('textBoxRed')
	
	});

	$('#nop').focus(function()
	{
		$('#nop').addClass('textBoxBlack')
		$('#nop').removeClass('textBoxRed')
	
	});

	$('#airline').focus(function()
	{
		$('#airline').addClass('textBoxBlack')
		$('#airline').removeClass('textBoxRed')
	
	});

	$('#from').focus(function()
	{
		$('#from').addClass('textBoxBlack')
		$('#from').removeClass('textBoxRed')
	
	});

	$('#to').focus(function()
	{
		$('#to').addClass('textBoxBlack')
		$('#to').removeClass('textBoxRed')
	
	});

	$('#ePrice').focus(function()
	{
		$('#ePrice').addClass('textBoxBlack')
		$('#to').removeClass('textBoxRed')
	
	});

	$('#bPrice').focus(function()
	{
		$('#bPrice').addClass('textBoxBlack')
		$('#bPrice').removeClass('textBoxRed')
	
	});

	$('#checkIn').focus(function()
	{
		$('#checkIn').addClass('textBoxBlack')
		$('#checkIn').removeClass('textBoxRed')
	
	});

	$('#cabIn').focus(function()
	{
		$('#cabIn').addClass('textBoxBlack')
		$('#cabIn').removeClass('textBoxRed')
	
	});
	$('#cancelFee').focus(function()
	{
		$('#cancelFee').addClass('textBoxBlack')
		$('#cancelFee').removeClass('textBoxRed')
	
	});


	$('#flightNo').keyup(function()
	{
		$('#cancel1').removeClass('hidden')
		$('#flightNo').addClass('textBoxBlack')
		$('#flightNo').removeClass('textBoxRed')
		var flightNo=$("#flightNo").val()
		if((flightNo)!="")
		{
			if(flightNo.match(/^[a-zA-Z]{3}\-[0-9]{2}$/)==null)
			{
				$('#flightNo').addClass('textBoxRed')
				$('#flightNo').removeClass('textBoxBlack')	
				$('#flightNoTool').tooltip('show')
				setTimeout(function(){$('#flightNoTool').tooltip('hide')},4000)
				if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
				$('#flightDetails').attr('class','hidden')

            }
            else            
              {             
              	var dataPass ='action=availability&flightNo='+flightNo;            

              	 $.ajax(
              	 { // Send the username val to available.php    
              	          type : 'POST',
              	          data :dataPass,   
              	          url  : '../../Server Side/scripts/flightNo.php',
						success: function(responseText)
						{                    // Get the result
								if(responseText == 0)                  
								{
									$('#flightNo').addClass('textBoxRed')
									$('#flightNo').removeClass('textBoxBlack')	
									$('#flightNoTool').attr('data-original-title',"Flight Number does not exist")
									$('#flightNoTool').tooltip('show')
									setTimeout(function(){$('#flightNoTool').tooltip('hide')},4000)
									$('#flightDetails').attr('class','hidden')                                
								}
							
								else  
								{
									if(validlist.indexOf(this.id) != -1)
									{	
										validlist.splice(validlist.indexOf(this.id),1)
									}
//////////////////////////////////////////////////////////////
									$('#cancel1').addClass('hidden')
									var dataPass = 'action=availability&flightNo='+flightNo;
									$.ajax(
									{	type : 'POST',
              	          			  	data :dataPass,   
							        	url:"../../Server Side/scripts/flightNames.php",				
							       		dataType:"json",
							        	success: function(data)
							        	{

							        		existingflightNo=[] 
											for(i in data)
											{
												if(data[i]['flightNo']==flightNo)
												{
													$("#fno").val(flightNo)
													var image="../../Server Side/resources/"+data[i]['image']
									 				$('#displayImage').attr('src',image)
											 		$('#airline').val(data[i]['airline'])
											 		$("#from").val(data[i]['from'])
							 						$("#to").val(data[i]['to'])
													$('#nop').val(data[i]['passengersNo'])
													$('#ePrice').val(data[i]['eClassPrice'])
													$('#bPrice').val(data[i]['bClassPrice'])
													$('#checkIn').val(data[i]['checkinSize'])
													$('#cabIn').val(data[i]['cabinSize'])
													$('#cancelFee').val(data[i]['cancelFee'])
													$('#type').val(data[i]['type'])
        					    					if(data[i]['food']=='true')
        					    					{
        					    						$('#food').attr('checked',data[i]['food'])
        					    					}
	       					   						else
        					    					{
        					    						$('#food').removeAttr('checked')
        					    					}
				        					    	$('#stopValue').val(data[i]['intermediateStopNo']) 
    	    										var totalIntermediateStops=$("#stopValue").val()
													if(totalIntermediateStops!=0)
													{
														$("#intermediateStop").empty()

														for(j=0;j<totalIntermediateStops;j++)
														{
															$("#intermediateStop").append("<div class='form-group'><label>Stop "+(i+1)+":<span class='star'>*</span></label>  <span id='intermediateStopTool"+i+"' data-toggle='tooltip' data-placement='right' data-original-title='Incorrect intermediate stop format' data-trigger='manual'><input type='text' class='form-control' required='required' value='"+data[i]['intermediateStop'][j]+"' placeholder='Enter Airport Name' name='stop"+(i+1)+"'></span></div><div class='form-group'> <label>Layover:</label><span class='star'>*</span> <span id='Layover"+i+"' data-toggle='tooltip' data-placement='left' data-original-title='Incorrect Layover format' data-trigger='manual'> <input type='text' value='"+data[i]['layover'][j]+"' class='form-control' required='required' placeholder='Enter Layover Time(HH:MM)' id='layover"+(i+1)+"' name='layover"+(i+1)+"'></div>")
														}
													}
													$('#flightDetails').attr('class','visible')
 										    	}

											}


								    	}
							    	});


////////////////////////////////////////////////////////////////////////
							 	}
						}
					});
			}
		}	

	});

	$('#airline').blur(function()
	{
		$('#airline').addClass('textBoxBlack')
		$('#airline').removeClass('textBoxRed')

		var airline=$("#airline").val()		
		if((airline)!="")
		{
			if(airline.match(/^[a-zA-Z0-9\s]+$/)==null)
			{
				bug+=1
				$('#airline').addClass('textBoxRed')
				$('#airline').removeClass('textBoxBlack')
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
		$('#from').addClass('textBoxBlack')
		$('#from').removeClass('textBoxRed')
		var from=$("#from").val()		
		if((from)!="")
		{
			if(from.match(/^[a-zA-Z0-9]+$/)==null)
			{
				$('#from').addClass('textBoxRed')
				$('#from').removeClass('textBoxBlack')
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
		$('#to').addClass('textBoxBlack')
		$('#to').removeClass('textBoxRed')
		var to=$("#to").val()		
		if((to)!="")
		{
			if(to.match(/^[a-zA-Z0-9]+$/)==null)
			{
				$('#to').addClass('textBoxRed')
				$('#flightNo').removeClass('textBoxBlack')
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
		$('#nop').addClass('textBoxBlack')
		$('#nop').removeClass('textBoxRed')
		var nop=$("#nop").val()		
		if((nop)!="")
		{
			if(nop.match(/^[0-9]+$/)==null)
			{
				$('#nop').addClass('textBoxRed')
				$('#nop').removeClass('textBoxBlack')
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
		$('#bPrice').addClass('textBoxBlack')
		$('#bPrice').removeClass('textBoxRed')
		var bPrice=$("#bPrice").val()		
		if((bPrice)!="")
		{
			if(bPrice.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#bPrice').addClass('textBoxRed')
				$('#bPrice').removeClass('textBoxBlack')
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
		$('#ePrice').addClass('textBoxBlack')
		$('#ePrice').removeClass('textBoxRed')
		var ePrice=$("#ePrice").val()		
		if((ePrice)!="")
		{
			if(ePrice.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#ePrice').addClass('textBoxRed')
				$('#ePrice').removeClass('textBoxBlack')
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
		$('#cancelFee').addClass('textBoxBlack')
		$('#cancelFee').removeClass('textBoxRed')
		var cancelFee=$("#cancelFee").val()		
		if((cancelFee)!="")
		{
			if(cancelFee.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#cancelFee').addClass('textBoxRed')
				$('#cancelFee').removeClass('textBoxBlack')
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
		$('#checkIn').addClass('textBoxBlack')
		$('#checkIn').removeClass('textBoxRed')
		var checkIn=$("#checkIn").val()		
		if((checkIn)!="")
		{
			if(checkIn.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#checkIn').addClass('textBoxRed')
				$('#checkIn').removeClass('textBoxBlack')
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
		$('#cabIn').addClass('textBoxBlack')
		$('#cabIn').removeClass('textBoxRed')
		var cabIn=$("#cabIn").val()		
		if((cabIn)!="")
		{
			if(cabIn.match(/^[0-9]*.?[0-9]+$/)==null)
			{
				$('#cabIn').addClass('textBoxRed')
				$('#cabIn').removeClass('textBoxBlack')
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