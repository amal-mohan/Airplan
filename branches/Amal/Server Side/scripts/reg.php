<?php
include_once 'dbconnect.php';

if (isset($_POST['signup'])) {
$userid = mysqli_real_escape_string($con, $_POST['username']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(empty($firstname) || empty($lastname) ||empty($userid) ||empty($email) ||empty($password) ||empty($cpassword)){
    	
    	header('location: validate.html');
    }
     if (empty($userid)){
        $error = true;
        $user_error = "Username cannot be empty";
        $errormsg = "Error in registering...Please try again later!";
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
        $errormsg = "Error in registering...Please try again later!";
    }
    if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
        $errormsg = "Error in registering...Please try again later!";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
        $errormsg = "Error in registering...Please try again later!";
    }
    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        $error = true;
        $password_error = "Password must be minimum of 8 characters, 1 Upper case, 1 Lower case and 1 special character";
        $errormsg = "Error in registering...Please try again later!";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
        $errormsg = "Error in registering...Please try again later!";
        
    }
    if (!$error) {
        
        if(mysqli_query($con, "INSERT INTO user (User_id,First_name,Last_name,Password,Email) VALUES('" . $userid . "', '" . $firstname . "','" . $lastname . "', '" . md5($password) . "','" . $email . "')")) {
           $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        echo $userid;
        }
    }
}
   
?>
