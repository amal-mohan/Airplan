
$(document).ready(function(){

$('#cancel').click(function()
  {
    window.location.href = "../../Server Side/scripts/login.php";

  });

    $('#username').keyup(function(){
        var username = $(this).val(); // Get username textbox using $(this)
        var Result = $('#result'); // Get ID of the result DIV where we display the results
        if(username.length > 2) { // if greater than 2 (minimum 3)
            Result.html('Loading...'); // you can use loading animation here
            var dataPass = 'action=availability&username='+username;
            $.ajax({ // Send the username val to available.php
            type : 'POST',
            data : dataPass,
            url  : '../../Server Side/scripts/uidcheck.php',
            success: function(responseText){ 
                  // Get the result
                 if(responseText == 0){
                    Result.html('<span class="success">Available</span>');
                }
                else if(responseText > 0){
                    Result.html('<span class="error">Taken</span>');
                }
                else{
                    alert('Problem with sql query');
                }
            }
            });
        }else{
            Result.html('Enter atleast 3 characters');
        }
        if(username.length == 0) {
            Result.html('');
        }
    });

    $(document).ready(function() 
    {

    var text1 = $("<span>OK</span>");
    var text5 = $("<span>OK</span>");
    var text6 = $("<span>OK</span>");
    var text2 = $("<span></span>");
    var text3 = $("<span>Passoword should have min. of 8 characters, 1 Upper, 1 Lower, 1 Number</span>");
    var text4 = $("<span>The email field should be a valid email address (local-part@domain)</span>");
    var text7 = $("<span>error</span>");
    var text8 = $("<span>Passoword should have min. of 8 characters, 1 Upper, 1 Lower, 1 Number</span>");
    var text9 = $("<span>error</span>");
  var text10 = $("<span>Only alphabets</span>");
  var text11 = $("<span>OK</span>");
  var text12 = $("<span>error</span>");
  var text13 = $("<span>OK</span>");
  var text14 = $("<span>Passwords Do not match</span>");
  var text15 = $("<span>Only alphabets</span>");
  var text16 = $("<span>OK</span>");
  var text17 = $("<span>error</span>");

  

    text1.attr('class','ok');
    text5.attr('class','ok');
    text6.attr('class','ok');
  text11.attr('class','ok');
    text3.attr('class','info');
    text4.attr('class','info');
  text10.attr('class','info');
  text12.attr('class','error');
    text7.attr('class','error');
    text8.attr('class','error');
    text9.attr('class','error');
  text13.attr('class','ok');
  text14.attr('class','error');
  text15.attr('class','info');
  text16.attr('class','ok');
  text17.attr('class','error');

    $("#username").after(text1);
    $("#username").after(text7);
    $("#password").after(text5);
    $("#password").after(text3);
    $("#password").after(text8);
    $("#email").after(text6);
    $("#email").after(text4);
    $("#email").after(text9);
    $("#firstname").after(text11);
    $("#firstname").after(text10);
    $("#firstname").after(text12);
    $("#cpassword").after(text13);
    $("#cpassword").after(text14);
    $("#lastname").after(text16);
    $("#lastname").after(text15);
    $("#lastname").after(text17);



    text1.hide();
    text2.hide();
    text3.hide();
    text4.hide();
    text5.hide();
    text6.hide();
    text7.hide();
    text8.hide();
    text9.hide();
    text10.hide();
    text11.hide();
    text12.hide();
    text13.hide();
    text14.hide();
    text15.hide();
    text16.hide();
    text17.hide();



    $("#username").focus(function(){
   
    text1.hide();
    text7.hide();
   })
   $("#username").blur(function() {
    text2.hide();
    if(/^[A-Za-z0-9 _.-]+$/.test($("#username").val())){
        text7.hide();
      text2.hide();
        }

    else{
        text7.show();
        text1.hide();
        text2.hide();
    }
    if($("#username").val()==0)
    {
       text1.hide();
       text2.hide();
       text7.hide();
    }
   })
   $("#firstname").focus(function(){
    text11.hide();
    text12.hide();
   })
   $("#firstname").blur(function(){
    if(/^[A-Za-z]+$/.test($("#firstname").val())){
      text12.hide();
      text10.hide();
    }
    else
    {
      text12.show();
      text11.hide();
      text10.hide();
    }
    if($("#firstname").val()==0)
    {
       text11.hide();
       text12.hide();
       text10.hide();
       
    }
   })
   $("#lastname").focus(function(){
    text16.hide();
    text17.hide();
   })
   $("#lastname").blur(function(){
    if(/^[A-Za-z]+$/.test($("#lastname").val())){
      text15.hide();
      text17.hide();
    }
    else
    {
      text17.show();
      text15.hide();
      text16.hide();
    }
    if($("#lastname").val()==0)
    {
       text15.hide();
       text16.hide();
       text17.hide();
       
    }
  })

   $("#cpassword").focus(function(){
    text14.hide();
    text13.hide();
   })
   $("#cpassword").blur(function(){
    if($("#password").val() != $("#cpassword").val()){
      text13.hide();
      text14.show();

    }
   else{

    }
    if($("#cpassword").val()==0)
    {
       text13.hide();
       text14.hide();
       
    }

   })

   $("#password").focus(function(){
    text5.hide();
    text8.hide();
   })
    $("#password").blur(function(){
    text3.hide();
    if(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test($("#password").val()))
    {
      text8.hide();
      text3.hide();

    }
    else
    {
        text8.show();
        text3.hide();
        text5.hide();
    }
    if($("#password").val()==0)
    {
       text3.hide();
       text5.hide();
       text8.hide();
    }

   })
    $("#email").blur(function(){
        text4.hide();
        if(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test($("#email").val())){
            text9.hide();
            text4.hide();
        }
        else{
            text9.show();
            text6.hide();
            text4.hide();
        }
    })

   $("#email").focus(function(){
    text6.hide();
    text9.hide();
   })

 
 
 })

});