<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body style="background-color:white;">
<?php
    require('db.php');
    session_start();

    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user loggedin page
            header("Location: loggedin.php");
        } else {
            echo "<div class='form'  style='border:1px solid black;'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <img src='cross.png'>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="nav" style="  background-color:#9394a5;width:100%;height:50px; padding:2px; margin:0px;">
  Login system using Php ~Harsh

</div>
    <form class="form" method="post" name="login" style="border:1px solid black;">
        <h1 class="login-title" style="color:black;">Login Portal</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button" style="background-color:#9394a5;"/>
        <p class="link">Don't have an account? <a href="registration.php">Register Now</a></p>
  </form>
<?php
    }
?>
</body>
</html>
