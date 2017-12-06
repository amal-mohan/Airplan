<!DOCTYPE html>
<html>
<head>
    <title>Flights</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/functional.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/style.css">


    <style>
* {
  box-sizing: border-box;
}


#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
<script>
$(document).ready(function()
{

//    var name = '<?php echo json_encode($num_rows) ?>';
  //  alert(name);
$(".clickable-row").click(function() {

        window.location = $(this).data("href");
    });
  






// var userFilter, statusFilter, milestoneFilter, priorityFilter, tagsFilter;

// function filtering() {
//   $('.task-list-row').hide().filter(function() {
//     var
//       self = $(this),
//       result = true; // not guilty until proven guilty

//     if (userFilter && (userFilter != 'None')) {
//       result = result && userFilter === self.data('assigned-user');
//     }
//     if (statusFilter && (statusFilter != 'Any')) {
//       result = result && statusFilter === self.data('status');
//     }
//     if (milestoneFilter && (milestoneFilter != 'None')) {
//       result = result && milestoneFilter === self.data('milestone');
//     }
//     if (priorityFilter && (priorityFilter != 'None')) {
//       result = result && priorityFilter === self.data('priority');
//     }
//     if (tagsFilter && (tagsFilter != 'None')) {
//       result = result && tagsFilter === self.data('tags');
//     }
    
//     return result;
//   }).show();
// }

function ePfilter(order)
{

try
{
var ul

a=document.getElementsByClassName("eprice")
m=0
for (var i5 = a.length - 1; i5 >= 0; i5--) 
{
  if(a[i5].checked)
  {
      m+=parseInt(a[i5].value)
  }
}

if(m==0 || m==7)
{
try    {
    var ul= document.getElementById("myUL1");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
              var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }

        a1 = li[i1].getElementsByTagName("td")[2]; 
             if(z || order)
             { 
        li[i1].style.display = "";
}     
     }
   }
   catch(err)
{
  
}

try
{
     var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
           a1 = li[i1].getElementsByTagName("td")[2]; 
             if(z || order)
             { 
        li[i1].style.display = "";
}
        }
           }
   catch(err)
{
  
}

   try {
    var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
         var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
             a1 = li[i1].getElementsByTagName("td")[2];
             if(z || order)
             { 
        li[i1].style.display = "";
}
        }
           }
   catch(err)
{
  
}

}

else if(m==1)
{
    try {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}


       try {var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
    {var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        a1 = li[i].getElementsByTagName("td")[2];
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}


}
else if(m==2)
{
   try  {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}


      try  {var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
    {var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

  
}
else if(m==3)
{
   try {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

      try  {var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
    {var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

  
}
else if(m==4)
{
   try {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

      try  {var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
   if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
                 li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

}
else if(m==5)
{
  try
    {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
       var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==6)
{
try
{var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
       }

   catch(err)
{
  
}

}
   try     {var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

  
}

catch(err)
{

}


}

function bPfilter(order)
{

{
var ul

a=document.getElementsByClassName("bprice")
m=0
for (var i5 = a.length - 1; i5 >= 0; i5--) 
{
  if(a[i5].checked)
  {
      m+=parseInt(a[i5].value)
  }
}

if(m==0 || m==7)
{
try    {var ul= document.getElementById("myUL1");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
              var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }

        a1 = li[i1].getElementsByTagName("td")[3]; 
             if(z || order)
             { 
        li[i1].style.display = "";
}     
     }

        }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
           a1 = li[i1].getElementsByTagName("td")[3]; 
             if(z || order)
             { 
        li[i1].style.display = "";
}
        }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
         var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
             a1 = li[i1].getElementsByTagName("td")[3];
             if(z || order)
             { 
        li[i1].style.display = "";
}
        }
           }
   catch(err)
{
  
}

}
else if(m==1)
{
   try  {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }

           }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        a1 = li[i].getElementsByTagName("td")[3];
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}

}
else if(m==2)
{
   try  {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }

           }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==3)
{
   try {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==4)
{
    try{var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
   if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
                 li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

}
else if(m==5)
{
 try   {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
       var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==6)
{
try
    {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }

           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

  
}
}

}



$(".eprice").change(function()
{


try{
  var ul= document.getElementById("myUL1");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
        li[i1].style.display = "";     
     }
   }
   catch(err)
   {

   }

try{
     var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";
        }
    }
catch(err)
    {
    }
try{
    var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";

        }
}
catch(err)
{
}
  order=0
  bPfilter(1)
  searcher(0)
var ul

a=document.getElementsByClassName("eprice")
m=0
for (var i5 = a.length - 1; i5 >= 0; i5--) 
{
  if(a[i5].checked)
  {
      m+=parseInt(a[i5].value)
  }
}

if(m==0 || m==7)
{
   try {var ul= document.getElementById("myUL1");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
              var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }

        a1 = li[i1].getElementsByTagName("td")[2]; 
             if(z || order)
             { 
        li[i1].style.display = "";
}     
     }

        }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
           a1 = li[i1].getElementsByTagName("td")[2]; 
             if(z || order)
             { 
        li[i1].style.display = "";
}
        }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
         var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
             a1 = li[i1].getElementsByTagName("td")[2];
             if(z || order)
             { 
        li[i1].style.display = "";
}
        }
   }
   catch(err)
{
  
}
}
else if(m==1)
{
   try  {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }

           }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        a1 = li[i].getElementsByTagName("td")[2];
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}

}
else if(m==2)
{
   try  {var ul= document.getElementById("myUL1");

      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }

           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==3)
{
    try{var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==4)
{
   try {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
   if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
                 li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
}
else if(m==5)
{
   try {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
       var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==6)
{

    try{var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2]; 
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
  }
  catch(err)
  {

  }

       try {var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[2];
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }

   }
     catch(err)
{
  
}
 
  
}
inition()

});


$(".bprice").change(function()
{


try
{
  var ul= document.getElementById("myUL1");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
        li[i1].style.display = "";     
     }
}
catch(err)
{
}
try
{
     var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";
        }
    }
catch(err)
    {
    }
try{
    var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";

        }
}
catch(err)
{
}  order=0
  ePfilter(1)
  searcher(0)
var ul

a=document.getElementsByClassName("bprice")
m=0
for (var i5 = a.length - 1; i5 >= 0; i5--) 
{
  if(a[i5].checked)
  {
      m+=parseInt(a[i5].value)
  }
}

if(m==0 || m==7)
{
   try {var ul= document.getElementById("myUL1");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
              var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }

        a1 = li[i1].getElementsByTagName("td")[3]; 
             if(z || order)
             { 
        li[i1].style.display = "";
}     
     }

        }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
           a1 = li[i1].getElementsByTagName("td")[3]; 
             if(z || order)
             { 
        li[i1].style.display = "";
}
        }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
         var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
             a1 = li[i1].getElementsByTagName("td")[3];
             if(z || order)
             { 
        li[i1].style.display = "";
}
        }
   }
   catch(err)
{
  
}

}
else if(m==1)
{
    try {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }

           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        a1 = li[i].getElementsByTagName("td")[3];
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        if (parseFloat(a1.innerHTML) < 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}

}
else if(m==2)
{
    try {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }

           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}
try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 10 && parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==3)
{
   try {var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==4)
{
    try{var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
      var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
   if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
                 li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}

}

else if(m==5)
{
 try   {
      var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }
           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
       var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) < 10 || parseFloat(a1.innerHTML) > 40 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
   }
   catch(err)
{
  
}
  
}
else if(m==6)
{

    try{var ul= document.getElementById("myUL1");
   
      li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) 
    {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3]; 
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } 
        else {
            li[i1].style.display = "none";

        }
    }

           }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1 = li[i1].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        var z=1;

        if(li[i1].style.display=="none")
        {
          z=0;

        }
        a1= li[i].getElementsByTagName("td")[3];
        if (parseFloat(a1.innerHTML) > 10 && (z || order)) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

  
}
inition()
});




$('#myInput').keyup(function() 
{
  
  {

try
{
  var ul= document.getElementById("myUL1");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
        li[i1].style.display = "";     
     }
}
catch(err)
{
}try
{
     var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";
        }
    }
catch(err)
    {
    }try
{
    var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";

        }
}
catch(err)
{
}    order=0
   ePfilter(1);
   bPfilter(0);
    var input, filter, ul, li, a, i;
    input = $("#myInput").val();
    filter = input.toUpperCase();
    try{var ul= document.getElementById("myUL1");
    li = ul.getElementsByTagName("tr");
    for (i = 1; i < li.length; i++) 
    {

        a = li[i].getElementsByTagName("td")[0];
        
        var z=1;

        if(li[i].style.display=="none")
        {
          z=0;

        }


        if (a.innerHTML.toUpperCase().indexOf(filter) > -1 && (z || order) ) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        a = li[i1].getElementsByTagName("td")[0];
        var z=1;

        if(li[i].style.display=="none")
        {
          z=0;

        }


        if (a.innerHTML.toUpperCase().indexOf(filter) > -1 && (z || order) ) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }
    }
      }
   catch(err)
{
  
}try
{var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        a = li[i].getElementsByTagName("td")[0];
        var z=1;

        if(li[i].style.display=="none")
        {
          z=0;

        }


        if (a.innerHTML.toUpperCase().indexOf(filter) > -1 && (z || order) ) {
            li[i1].style.display = "";
        } else {
            li[i1].style.display = "none";

        }

    }
       }
   catch(err)
{
  
}

        inition()


  }
});

function inition()
{
 try {
    var ul= document.getElementById("myUL1");
   var li = ul.getElementsByTagName("tr");
     var z=0;
    for (i = 1; i < li.length; i++) 
    {

        a = li[i].getElementsByTagName("td")[0];
        if(li[i].style.display=="none")
        {
          z+=1;

        }
    }
  

    $("#nav").remove()
    $('#myUL1').after('<div id="nav"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#myUL1 tbody tr').length-z;
    var numPages = rowsTotal/rowsShown;
     
         
    for(i = 0;i < numPages;i++) 
    {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    k=1
    {var ul= document.getElementById("myUL1");
   var li = ul.getElementsByTagName("tr");

  for (i = 1; i < li.length; i++) 
    {
                
        if(li[i].style.display=="")
        {
          if(k>rowsShown)
        {
            li[i].style.display = "none";
        }
        else
        {
             li[i].style.display = "";
        
          k+=1
        }

      }
    }
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function()
    {
      
try{
   ul= document.getElementById("myUL1");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
        li[i1].style.display = "";     
     }
}
catch(err)
{
}try
{
     var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";
        }
    }
catch(err)
    {
    }try
{
    var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";

        }
}
catch(err)
{
}
      searcher(1)
      bPfilter(0)
      ePfilter(0)
      var k=0
        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
     
        for (i = 1; i < li.length; i++) 
        {
                
        if(li[i].style.display=="")
        {
          if(k>=startItem && k<endItem)
        {
            li[i].style.display = "";
            k+=1
        }
        else
        {
             li[i].style.display = "none";
        
          k+=1
        }

      }
    }

        // $('#myUL1 tbody tr').hide().slice(startItem, endItem).
        // show();
    });


try
{var ul= document.getElementById("myUL2");
   var li = ul.getElementsByTagName("tr");
     var z=0;
    for (i = 1; i < li.length; i++) 
    {

        a = li[i].getElementsByTagName("td")[0];
        if(li[i].style.display=="none")
        {
          z+=1;

        }
    }

    $("#nav1").remove()
    $('#myUL2').after('<div id="nav1"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#myUL2 tbody tr').length-z;
    var numPages = rowsTotal/rowsShown;
     
         
    for(i = 0;i < numPages;i++) 
    {
        var pageNum = i + 1;
        $('#nav1').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    k=1
       }
   catch(err)
{
  
}

   try {var ul= document.getElementById("myUL2");
   var li = ul.getElementsByTagName("tr");

  for (i = 1; i < li.length; i++) 
    {
                
        if(li[i].style.display=="")
        {
          if(k>rowsShown)
        {
            li[i].style.display = "none";
        }
        else
        {
             li[i].style.display = "";
        
          k+=1
        }

      }
    }
       }
   catch(err)
{
  
}

    $('#nav1 a:first').addClass('active');
    $('#nav1 a').bind('click', function()
    {
      try
{
  var ul= document.getElementById("myUL2");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
        li[i1].style.display = "";     
     }
}
catch(err)
{
}
try
{
     var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";
        }
    }
catch(err)
    {
    }
try{
    var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";

        }
}
catch(err)
{
}
      searcher(1)
            bPfilter(0)
      ePfilter(0)

      var k=0
        $('#nav1 a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        for (i = 1; i < li.length; i++) 
        {
                
        if(li[i].style.display=="")
        {
          if(k>=startItem && k<endItem)
        {
            li[i].style.display = "";
            k+=1
        }
        else
        {
             li[i].style.display = "none";
        
          k+=1
        }

      }
    }

        // $('#myUL2 tbody tr').hide().slice(startItem, endItem).
        // show();
    });

    try{var ul= document.getElementById("myUL3");
   var li = ul.getElementsByTagName("tr");
     var z=0;
    for (i = 1; i < li.length; i++) 
    {

        a = li[i].getElementsByTagName("td")[0];
        if(li[i].style.display=="none")
        {
          z+=1;

        }
    }

    $("#nav2").remove()
    $('#myUL3').after('<div id="nav2"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#myUL3 tbody tr').length-z;
    var numPages = rowsTotal/rowsShown;
     
         
    for(i = 0;i < numPages;i++) 
    {
        var pageNum = i + 1;
        $('#nav2').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    k=1
       }
   catch(err)
{
  
}
k=1
    try{var ul= document.getElementById("myUL3");
   var li = ul.getElementsByTagName("tr");

  for (i = 1; i < li.length; i++) 
    {
                
        if(li[i].style.display=="")
        {
          if(k>rowsShown)
        {
            li[i].style.display = "none";
        }
        else
        {
             li[i].style.display = "";
        
          k+=1
        }

      }
    }
       }
   catch(err)
{
  
}

    $('#nav2 a:first').addClass('active');
    $('#nav2 a').bind('click', function()
    {
      
try{
  var ul= document.getElementById("myUL3");
   
    li = ul.getElementsByTagName("tr");
      
    for (i1 = 1; i1 < li.length; i1++) 
    {
        li[i1].style.display = "";     
     }
}
catch(err)
{
}try
{
     var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";
        }
    }
catch(err)
    {
    }
try{
    var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        li[i1].style.display = "";

        }
}
catch(err)
{
}
      searcher(1)
            bPfilter(0)
      ePfilter(0)

      var k=0
        $('#nav2 a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        for (i = 1; i < li.length; i++) 
        {
                
        if(li[i].style.display=="")
        {
          if(k>=startItem && k<endItem)
        {
            li[i].style.display = "";
            k+=1
        }
        else
        {
             li[i].style.display = "none";
        
          k+=1
        }

      }
    }

        // $('#myUL3 tbody tr').hide().slice(startItem, endItem).
        // show();
    });

}
}catch(err){}}
function searcher(order)
{
     try
  {
    var input, filter, ul, li, a, i;
    input = $("#myInput").val();
    filter = input.toUpperCase();
   try {var ul= document.getElementById("myUL1");
    li = ul.getElementsByTagName("tr");
    for (i = 1; i < li.length; i++) 
    {

        a = li[i].getElementsByTagName("td")[0];
        
        var z=1;

        if(li[i].style.display=="none")
        {
          z=0;

        }


        if (a.innerHTML.toUpperCase().indexOf(filter) > -1 && (z || order) ) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}


try    {var ul= document.getElementById("myUL2");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        a = li[i1].getElementsByTagName("td")[0];
             var z=1;

        if(li[i].style.display=="none")
        {
          z=0;

        }


        if (a.innerHTML.toUpperCase().indexOf(filter) > -1 && (z || order) ) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

   try {var ul= document.getElementById("myUL3");
    li = ul.getElementsByTagName("tr");
    for (i1 = 1; i1 < li.length; i1++) {
        a = li[i].getElementsByTagName("td")[0];
                var z=1;

        if(li[i].style.display=="none")
        {
          z=0;

        }


        if (a.innerHTML.toUpperCase().indexOf(filter) > -1 && (z || order) ) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
       }
   catch(err)
{
  
}

  }
  catch(err)
  {

  }

}});



</script>
<?php
include_once('SessionManager.php');

include_once 'dbconnect.php';
session_start();
 $departure = $_POST['search-box'];
 $arrival =  $_POST['search-box1'];
 $departuredate = $_POST['departuredate'];
 $returndate = $_POST['returndate'];
$userid=$_SESSION['user_id'];

if($_SESSION['user_id']=='Admin')
{
 $query = "SELECT * FROM `flight_details` fd,Flight f WHERE f.Flight_No=fd.Flight_No AND f.isOperational='1'";
 $result = mysqli_query($con,$query);
 echo '<script src="../../Client Side/javascript/adminManager.js"></script>';    
 $num_rows = intval(mysqli_num_rows($result));

}
else
{
echo '<script src="../../Client Side/javascript/userManager.js"></script>';    
 if(empty($departuredate) && !empty($returndate))
 {
    echo "Please enter return date";
 }

 if(!empty($departure) && !empty($arrival) && empty($departuredate) && empty($returndate)){
 $query = "SELECT * FROM `flight_details` fd,Flight f WHERE f.Flight_No=fd.Flight_No AND f.isOperational='1' AND Origin = '".$departure."' AND Destination = '".$arrival."'";
 $result = mysqli_query($con,$query);
 // $query1 = "SELECT * FROM `Flight_stop` f, flight_details fd WHERE f.Flight_No=fd.Flight_No fd.isOperational='1' AND f.Departure_Airport = '".$departure."' AND f.Arrival_Airport = '".$arrival."'";
 // $result1 = mysqli_query($con,$query);
   }
else if(!empty($departure) && empty($arrival) && empty($departuredate) && empty($returndate)){
    $query = "SELECT * FROM `flight_details` fd,Flight f WHERE f.Flight_No=fd.Flight_No AND f.isOperational='1' AND Origin = '".$departure."'";
    $result = mysqli_query($con,$query);

}
else if(empty($departure) && !empty($arrival) && empty($departuredate) && empty($returndate))
{ 
  $query = "SELECT * FROM `flight_details` fd,Flight f WHERE f.Flight_No=fd.Flight_No AND f.isOperational='1' AND Destination = '".$arrival."'";
  $result = mysqli_query($con,$query);
}
else if(!empty($departure) && !empty($arrival) && !empty($departuredate) && empty($returndate)){
    $query = "SELECT * FROM `Flight` f, 'flight_details' fd WHERE f.Flight_No=fd.Flight_No AND f.isOperational='1' AND fd.Origin = '".$departure."' AND f.Departure_Date = '".$departuredate."' AND fd.Destination = '".$arrival."'";
    $result = mysqli_query($con,$query);

}
else if(!empty($departure) && !empty($arrival) && !empty($departuredate) && !empty($returndate)){
    $query1 = "SELECT * FROM `flight_details` fd,Flight f WHERE f.Flight_No=fd.Flight_No AND isOperational='1' AND Origin = '".$departure."' AND Departure_Date = '".$departuredate."' AND Destination = '".$arrival."'";
    $result1 = mysqli_query($con,$query1);

    $query2 = "SELECT * FROM `flight_details` fd,Flight f WHERE f.Flight_No=fd.Flight_No AND f.isOperational='1' AND Origin = '".$arrival."' AND Departure_Date = '".$returndate."' AND Destination ='".$departure."'";
    $result2 = mysqli_query($con,$query2);


}
else
{
  $query = "SELECT * FROM `flight_details` fd,Flight f WHERE f.Flight_No=fd.Flight_No AND f.isOperational='1'";
 $result = mysqli_query($con,$query);
 
}
}
?>

</head>
<body>
<div id="head" class="row">
  <a href="logout.php" class="btn btn-outline-info">
          <span class="glyphicon glyphicon-log-out"></span> Logout <?php session_start(); echo $_SESSION['user_id']?>
        </a>
                <h2 id="wname">ZENOFLY</h2>

<div id ="admin" class="hidden">

    <a href="../../Client Side/content/addFlight.html" class="btn btn-outline-info">Add Flight</a>
    <a href="../../Client Side/content/addFlightInstance.html" class="btn btn-outline-info">Add Schedule</a>
    <a href="../../Client Side/content/deleteFlight.html" class="btn btn-outline-info">Delete Flight</a>
    <a href="../../Client Side/content/deleteFlightInstance.html" class="btn btn-outline-info">Delete Schedule</a>
    <a href="../../Client Side/content/updateFlight.html" class="btn btn-outline-info">Update Flight</a>
</div>
<div id="User" class="hidden">
    <a href="history.php" class="btn btn-outline-info">My Bookings</a>
    <a href="listairlines.php" class="btn btn-outline-info">Search</a>

</div>

</div>
<div class="row" id="row">
<div class="col-md-2" id="leftp">
<div class="push2">  
<div class="page-header"> <h4>Fliter Your Results</h4></div>  

<label>Search Flights:&nbsp;</label><input type="text" id="myInput"  placeholder="flight names.." title="Type in a name">

 <div class="form-group">

<label>Economy Price:</span></label><br/>
 <input class="form-check-input eprice" type="checkbox" value="1" name="food"> &lt;10$<br />
  <input class="form-check-input eprice" type="checkbox" value="2" name="food"> 10$-40$<br/>
  <input class="form-check-input eprice" type="checkbox" value="4" name="food"> &gt;40$<br/>

<label>Business Price:</span></label><br/>
 <input class="form-check-input bprice" type="checkbox" value="1" name="food"> &lt;10$<br />
  <input class="form-check-input bprice" type="checkbox" value="2" name="food"> 10$-40$<br/>
  <input class="form-check-input bprice" type="checkbox" value="4" name="food"> &gt;40$<br/>
</div>


</div>
</div>
<!-- <div class="col-md-4">
  d
</div>
d
<div class="col-md-4"></div>

</div>
<div class="row">
 -->
 <div id="af" class="col-md-10">
  
<div class="page-header"> <h2>Available Flights</h2></div>
<div class="push">
<?php

if($_SESSION['user_id']!='Admin')
{
 if (mysqli_num_rows($result)> 0){
    echo "<table id='myUL1' class='table table-hover' id='data'> ";
    echo "<tr>";
    echo "<th>Flight No</th><th>Airline</th><th>Economy Class Price</th><th>Business Class Price</th><th>Departure Date</th><th>Departure Time</th><th>Arrival Date</th><th>Arrival Time</th><th>Departure Airport</th><th>Arrival Airport</th><th>Economy Seats Available</th><th>Business Seats Available</th>";
    echo "</tr>";

  while($row = mysqli_fetch_assoc($result))
    {
      if(date($row['Departure_Date'])>=date("Y-m-d") && ($row["Economy_Class_Seats"]>0 || $row["Business_Class_Seats"]>0))
        {
  		echo "<div id='fli".strval($i/5+1)."'><tr class='clickable-row' data-href = 'flight_details.php?flight_no=".urlencode($row["Flight_No"])."&departuredate=".urlencode($row["Departure_Date"])."'><td>".$row["Flight_No"]."</td><td>".$row["Operator"]."<img class='tn' src = '".$row["display_image"]."'/></td><td>".$row["Economy_Class_Price"]."</td><td>".$row["Business_Class_Price"]."</td><td>".$row["Departure_Date"]."</td><td>".$row["Departure_Time"]."</td><td>".$row["Arrival_Date"]."</td><td>"
 		.$row["Arrival_Time"]."</td><td>".$row["Origin"]."</td><td>".$row["Destination"]."</td><td>".$row["Economy_Class_Seats"]."</td><td>".$row["Business_Class_Seats"]."</td></tr></div>";

      }
 	}
 
 	echo "</table>";






}
 else if(mysqli_num_rows($result1)> 0 && mysqli_num_rows($result2)){

    echo "<h2> Departure Flights </h2>";
 	echo "<table id='myUL2' class='table table-hover'> ";
    echo "<tr>";
    echo "<th>Flight No</th><th>Airline</th><th>Economy Class Price</th><th>Business Class Price</th><th>Departure Date</th><th>Departure Time</th><th>Arrival Date</th><th>Arrival Time</th><th>Departure Airport</th><th>Arrival Airport</th><th>Economy Seats Available</th><th>Business Seats Available</th>";
    echo "</tr>";
 	while($row1 = mysqli_fetch_assoc($result1)){
        if(date($row1['Departure_Date'])>=date("Y-m-d") && ($row1["Economy_Class_Seats"]>0 || $row1["Business_Class_Seats"]>0))
        {
  
 		echo "<tr class='clickable-row' data-href = 'flight_details.php?flight_no=".urlencode($row["Flight_No"])."&departuredate=".urlencode($row["Departure_Date"])."'><td>".$row1["Flight_No"]."</td><td>".$row1["Operator"]."<img class='tn' src = '".$row1["display_image"]."'/></td><td>".$row1["Economy_Class_Price"]."</td><td>".$row1["Business_Class_Price"]."</td><td>".$row1["Departure_Date"]."</td><td>".$row1["Departure_Time"]."</td><td>".$row1["Arrival_Date"]."</td><td>"
 		.$row1["Arrival_Time"]."</td><td>".$row1["Origin"]."</td><td>".$row1["Destination"]."</td></tr><td>".$row1["Economy_Class_Seats"]."</td><td>".$row1["Business_Class_Seats"]."</td></tr>";
 	}}
 	echo "</table>";

 	echo "<h2> Return Flights </h2>";
 	echo "<table id='myUL3' class='table table-hover'> ";
    echo "<tr>";
    echo "<th>Flight No</th><th>Airline</th><th>Economy Class Price</th><th>Business Class Price</th><th>Departure Date</th><th>Departure Time</th><th>Arrival Date</th><th>Arrival Time</th><th>Departure Airport</th><th>Arrival Airport</th><th>Economy Seats Available</th><th>Business Seats Available</th>";
    echo "</tr>";
 	while($row2 = mysqli_fetch_assoc($result2)){
 		    if(date($row2['Departure_Date'])>=date("Y-m-d") && ($row2["Economy_Class_Seats"]>0 || $row2["Business_Class_Seats"]>0))
        {
  
    echo "<tr class='clickable-row' data-href = 'flight_details.php?flight_no=".urlencode($row["Flight_No"])."&departuredate=".urlencode($row["Departure_Date"])."'><td>".$row2["Flight_No"]."</td><td>".$row2["Operator"]."<img class='tn' src = '".$row2["display_image"]."'/></td><td>".$row2["Economy_Class_Price"]."</td><td>".$row2["Business_Class_Price"]."</td><td>".$row2["Departure_Date"]."</td><td>".$row2["Departure_Time"]."</td><td>".$row2["Arrival_Date"]."</td><td>"
 		.$row2["Arrival_Time"]."</td><td>".$row2["Origin"]."</td><td>".$row2["Destination"]."</td><td>".$row2["Economy_Class_Seats"]."</td><td>".$row2["Business_Class_Seats"]."</td></tr>";
 	}}
 	echo "</table>";
 }
 else
 {
 	echo "No Flights Found";
 }
}
else
{

 if (mysqli_num_rows($result)> 0){
    echo "<table id='myUL1' class='table'><thead>";
    echo "<tr>";
    echo "<th>Flight No</th><th>Airline</th><th>Economy Class Price</th><th>Business Class Price</th><th>Departure Date</th><th>Departure Time</th><th>Arrival Date</th><th>Arrival Time</th><th>Departure Airport</th><th>Arrival Airport</th><th>Economy Seats Available</th><th>Business Seats Available</th></thead><tbody>";
    echo "</tr>";
  while($row = mysqli_fetch_assoc($result))
    {
      if(date($row['Departure_Date'])>=date("Y-m-d") && ($row["Economy_Class_Seats"]>0 || $row["Business_Class_Seats"]>0))
        {
      echo "<div id='fli".strval($i/5+1)."'><tr><td>".$row["Flight_No"]."</td><td>".$row["Operator"]."<img class='tn' src = '".$row["display_image"]."'/></td><td>".$row["Economy_Class_Price"]."</td><td>".$row["Business_Class_Price"]."</td><td>".$row["Departure_Date"]."</td><td>".$row["Departure_Time"]."</td><td>".$row["Arrival_Date"]."</td><td>"
    .$row["Arrival_Time"]."</td><td>".$row["Origin"]."</td><td>".$row["Destination"]."</td><td>".$row["Economy_Class_Seats"]."</td><td>".$row["Business_Class_Seats"]."</td></tr></div>";

      }
  }
  echo "</tbody></table>";

 }

  }
//  echo "<script src='a.js'></script>";


?>

<!-- <h2>Simple Pagination</h2>

<div class="pagination">
  <a href="#">&laquo;</a>
  <?php 
        for($i=0;$i<$num_rows;$i+=5)
        {
            echo "<a id='accref".strval($i/5+1)."'>".strval($i/5+1)."</a>";
        }
    ?>
  <a href="#">&raquo;</a>
</div> -->
</div>
</body>
</html>
