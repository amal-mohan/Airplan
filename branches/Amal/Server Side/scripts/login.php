<?php
session_start();

//if(isset($_SESSION['usr_id'])!="") {
  //  header("Location: index.php");
//}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM user WHERE `User_id` = '" . $username. "' and `password` = '" . md5($password) . "'");
    $resultrow = mysqli_num_rows($result);

    if ($resultrow) {
        //$_SESSION['usr_id'] = $row['id'];
        //$_SESSION['usr_name'] = $row['name'];
        //header("Location: index.php");
        $loginmsg = "Successfully logged in!!";
       
    } else {
        $errormsg = "Incorrect Email or Password!!!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Login Script</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                <fieldset>
                    <legend>Login</legend>
                    
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="username" placeholder="Your Username" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Your Password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            <span class="text-danger"><?php if (isset($loginmsg)) { echo $loginmsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">    
        New User? <a href="register1.php">Sign Up Here</a>
        </div>
    </div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>