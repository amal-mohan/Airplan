<?php

echo 
 ' {"flightList": [
      {
        "flightNo": "jjj-66",
        "image": "s.jpg",
        "airline": "abc",
        "type": "International",
        "from": "f",
        "to": "sd",
        "food": "false",
        "passengersNo": "10",
        "eClassPrice": "10",
        "bClassPrice": "10",
        "cancelFee": "10",
        "checkinSize": "10",
        "cabinSize": "10",
        "intermediateStopNo": "2",
        "intermediateStop": [
          "is",
          "iss"
        ],
        "layover": [
          "23:12",
          "22:56"
        ]
      },
      {
        "flightNo": "sss-22",
        "image": "s.jpg",
        "airline": "abc",
        "type": "domestic",
        "from": "f",
        "to": "sd",
        "food": "true",
        "passengersNo": "10",
        "eClassPrice": "10",
        "bClassPrice": "10",
        "cancelFee": "10",
        "checkinSize": "10",
        "cabinSize": "10",
        "intermediateStopNo": "2",
        "intermediateStop": [
          "is",
          "iss"
        ],
        "layover": [
          "12:08",
          "09:07"
        ]
      }
    ]
}
';
?>


<?php
include_once('dbconnect.php');
    if(isset($_POST['action']) && $_POST['action'] == 'availability')
    {
            $flightNo = mysqli_real_escape_string($con,$_POST['flightNo']); // Get the username values
            $query  = "select * from flight_details";
            $res    = mysqli_query($con,$query);
            $count  = mysqli_num_rows($res);
            echo $count;
    }
?>