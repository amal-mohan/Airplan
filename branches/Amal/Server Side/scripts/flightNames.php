

<?php
include_once('SessionManager.php');
include_once('dbconnect.php');
    if(isset($_POST['action']) && $_POST['action'] == 'availability')
    {
            $flightNo = mysqli_real_escape_string($con,$_POST['flightNo']); // Get the username values
            $query  = "select * from flight_details where flight_No='".$flightNo."'";
            $result    = mysqli_query($con,$query);
            if (mysqli_num_rows($result)> 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                $query1  = "select * from flight_stop where flight_No='".$flightNo."'";
                $res1    = mysqli_query($con,$query1);
                $location1=[];
                $layover=[];
                while($row1 = mysqli_fetch_assoc($res1))
                {
                  array_push($location1,$row1['intermediate_stop']);
                  array_push($layover,$row1['layover_time']);
                }

                  $result_array[]= array(
                          "flightNo"=> $row['Flight_No'],
                          "image"=> $row['display_image'],
                          "airline"=> $row['Operator'],
                          "from"=>$row['Origin'],
                          "to"=>$row['Destination'],
                          "type"=> $row['flight_type'],
                          "food"=> $row['Food'],
                          "passengersNo"=> $row['Total_seats'],
                          "eClassPrice"=> $row['Economy_Class_Price'],
                          "bClassPrice"=> $row['Business_Class_Price'],
                          "cancelFee"=> $row['Cancellation_Fee'],
                          "checkinSize"=> $row['Check-In_Baggage'],
                          "cabinSize"=> $row['Cabin_Baggage'],
                          "intermediateStopNo"=> $row['Number_of_Intermediate_Stops'],
                          "intermediateStop"=> $location1,
                          "layover"=> $layover);

                  }
                }
                 echo json_encode($result_array);
            }
?>