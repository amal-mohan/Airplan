$(document).ready(function()
{

//write logic to calculate arrival and departure time
	
  $.ajax({ 

            type : 'POST',
            url  : '../../Server Side/scripts/sessionChecker.php',
            success: function(responseText)
            { 
                  // Get the result
                 if(responseText == 0)
                 {
                   window.location="../../Server Side/scripts/login.php"
                }
              }
            });
});