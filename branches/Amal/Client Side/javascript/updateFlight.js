
$(document).ready(function()
{
	//add date compare logic

	var bug=10

	// $('#searchItem').click(function()
	// {
	// 	var flightNo=$("#flightNo").val()
	// 	if($.find('.textBoxRed').length!=0)
	// 	{
	// 		$('.textBoxRed').each(function()
	// 		{
	// 			var id=this.id
	// 			var tool= "#"+id+"Tool"
	// 			$(tool).tooltip('show')
	// 			setTimeout(function(){$(tool).tooltip('hide')},4000)
	// 		});
	// 	}
	// 	else
	// 	{
	// 	$.ajax(
	// 			{
	// 				url: "../../Server Side/scripts/flightNames.php",
	// 				dataType: "json",
	// 	 			success: function(data) 
	// 	 			{
	// 	 				existingflightNo=[]
	// 	 				for(i in data['flightList'])
	// 	 			 	{
	// 					 	if(data['flightList'][i]['flightNo']==flightNo)
	// 					 	{

	// 					 		$('#displayImage').attr('src',data['flightList'][i]['image'])
	// 					 		$('#airline').val(data['flightList'][i]['airline'])
	// 					 		$("#from").val(data['flightList'][i]['from'])
	// 					 		$("#to").val(data['flightList'][i]['to'])
	// 							$('#nop').val(data['flightList'][i]['passengersNo'])
	// 							$('#ePrice').val(data['flightList'][i]['eClassPrice'])
	// 							$('#bPrice').val(data['flightList'][i]['bClassPrice'])
	// 							$('#checkIn').val(data['flightList'][i]['checkinSize'])
	// 							$('#cabIn').val(data['flightList'][i]['cabinSize'])
	// 							$('#cancelFee').val(data['flightList'][i]['cancelFee'])
	// 							$('#type').val(data['flightList'][i]['type'])
 //        					    if(data['flightList'][i]['food']=='true')
 //        					    {
 //        					    	$('#food').attr('checked',data['flightList'][i]['food'])
 //        					    }
 //        					    else
 //        					    {
 //        					    	$('#food').removeAttr('checked')
 //        					    }
 //        					    $('#stopValue').val(data['flightList'][i]['intermediateStopNo']) 
 //        						var totalIntermediateStops=$("#stopValue").val()
	// 							if(totalIntermediateStops!=0)
	// 							{
	// 								$("#intermediateStop").empty()

	// 								for(j=0;j<totalIntermediateStops;j++)
	// 								{
	// 									$("#intermediateStop").append("Stop "+(j+1)+":  <span id='intermediateStopTool"+j+"' data-toggle='tooltip' data-placement='bottom' data-original-title='Incorrect intermediate stop format' data-trigger='manual'><input type='text'  required='required' placeholder='Enter Airport Name' name='stop"+(j+1)+" id='stop"+(j+1)+"' value='"+data['flightList'][i]['intermediateStop'][j]+"'></span> Layover: <span id='Layover"+j+"' data-toggle='tooltip' data-placement='bottom' data-original-title='Incorrect Layover format' data-trigger='manual'> <input type='time' required='required' placeholder='Enter Layover Time(HH:MM)' name='layover"+(j+1)+" id='layover"+(j+1)+"' value='"+data['flightList'][i]['layover'][j]+"'></span>")
										
										
	// 									$("#layover"+(j+1)).val(data['flightList'][i]['layover'][j])
	// 								}
	// 							}
	// 							$('#flightDetails').attr('class','visible')
 // 						    }

	// 					}

	// 				},
	// 				error: function()
	// 			 	{
	// 			 		alert("error loading file");
	// 		  	 	}	
	//      		});
	// }

	// });

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
	$('#flightNo').keyup(function()
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
				if(validlist.indexOf(this.id) != -1)
				{	
					validlist.splice(validlist.indexOf(this.id),1)
				}
				$('#flightDetails').attr('class','hidden')

            }
            else            
              {             
              	var dataPass ='action=availability&flightNo='+flightNo;            

              	 $.ajax({ // Send the username val to available.php    
              	          type : 'POST',
              	          data :dataPass,   
              	          url  : '../../Server Side/scripts/flightNo.php',
						success: function(responseText)
						{                    // Get the result
								if(responseText == 0)                  
								{
											$('#flightNo').attr('class','textBoxRed')
											$('#flightNoTool').attr('data-original-title',"Flight Number does not exist")
											$('#flightNoTool').tooltip('show')
											setTimeout(function(){$('#flightNoTool').tooltip('hide')},4000)
											$('#flightDetails').attr('class','hidden')                                
								}
							
								else  
								{
//////////////////////////////////////////////////////////////
									var dataPass = 'action=availability&flightNo='+flightNo;
									$.ajax({ // Send the username val to available.php    
              				          type : 'POST',
              	          			  data :dataPass,   
							        url:"../../Server Side/scripts/flightNames.php",				
							        dataType:"json"
							        success: function(data){
							        		existingflightNo=[] 
										for(i in data['flightList'])
										{
										if(data['flightList'][i]['flightNo']==flightNo)
										{

							 				$('#displayImage').attr('src',data['flightList'][i]['image'])
									 		$('#airline').val(data['flightList'][i]['airline'])
						 		// $("#from").val(data['flightList'][i]['from'])
						 		// $("#to").val(data['flightList'][i]['to'])
											$('#nop').val(data['flightList'][i]['passengersNo'])
											$('#ePrice').val(data['flightList'][i]['eClassPrice'])
											$('#bPrice').val(data['flightList'][i]['bClassPrice'])
											$('#checkIn').val(data['flightList'][i]['checkinSize'])
											$('#cabIn').val(data['flightList'][i]['cabinSize'])
											$('#cancelFee').val(data['flightList'][i]['cancelFee'])
											$('#type').val(data['flightList'][i]['type'])
        					    			if(data['flightList'][i]['food']=='true')
        					    			{
        					    				$('#food').attr('checked',data['flightList'][i]['food'])
        					    			}
        					   				 else
        					    			{
        					    				$('#food').removeAttr('checked')
        					    			}
			        					    $('#stopValue').val(data['flightList'][i]['intermediateStopNo']) 
        									var totalIntermediateStops=$("#stopValue").val()
											if(totalIntermediateStops!=0)
											{
												$("#intermediateStop").empty()

												for(j=0;j<totalIntermediateStops;j++)
												{
													$("#intermediateStop").append("Stop "+(j+1)+":  <span id='intermediateStopTool"+j+"' data-toggle='tooltip' data-placement='bottom' data-original-title='Incorrect intermediate stop format' data-trigger='manual'><input type='text'  required='required' placeholder='Enter Airport Name' name='stop"+(j+1)+" id='stop"+(j+1)+"' value='"+data['flightList'][i]['intermediateStop'][j]+"'></span> Layover: <span id='Layover"+j+"' data-toggle='tooltip' data-placement='bottom' data-original-title='Incorrect Layover format' data-trigger='manual'> <input type='time' required='required' placeholder='Enter Layover Time(HH:MM)' name='layover"+(j+1)+" id='layover"+(j+1)+"' value='"+data['flightList'][i]['layover'][j]+"'></span>")
													$("#layover"+(j+1)).val(data['flightList'][i]['layover'][j])
												}
											}
											$('#flightDetails').attr('class','visible')
 									    }

									}

							    		alert("m")

							    	}});


////////////////////////////////////////////////////////////////////////
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