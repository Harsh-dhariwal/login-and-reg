<?php
//including auth_session.php file on all user panel pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logged in - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body style="background-color:white;">
    <div class="form"  style="border:1px solid black;">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You have successfully logged in.</p>
        <img src="tick.png" alt="" style="text-align:center;">
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
