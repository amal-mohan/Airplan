<?php
session_start();

//if(isset($_SESSION['usr_id'])!="") {
  //  header("Location: index.php");
//}

include_once 'dbconnect.php';


if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM user WHERE `User_id` = '" . $username. "' and `Password` = '" . md5($password) . "'");
    $resultrow = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($resultrow) {
        $_SESSION['user_id'] = $row['User_id'];

        //$_SESSION['usr_name'] = $row['name'];
        if($username!='Admin')
        {
            header("Location: listairlines.php");
        }
        else
        {
            header("Location: displayFlights.php");   
        }

        //echo $_SESSION['user_id'];
        $loginmsg = "Successfull!";
       
    } else {
        $errormsg = '<div class="alert alert-danger">Incorrect Email or Password!!!</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../Client Side/stylesheets/style.css">
</head>
<body>
<div class="child" id="register-form">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform" id="form1">
                <fieldset>
                    <legend id="register-header" class="text-primary" class="text-muted">Login</legend>
                    
                    <div class="form-group">
                        <label for="name" class="text-muted">Username <span class="star">*</span></label>
                        <input type="text" name="username" placeholder="Your Username" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="name" class="text-muted">Password <span class="star">*</span></label>
                        <input type="password" name="password" placeholder="Your Password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            <span class="text-danger"><?php if (isset($loginmsg)) { echo $loginmsg; } ?></span><br/ >
        New User? <a href="../../Client Side/content/register.html">Sign Up Here</a>
</div>
</body>
</html>