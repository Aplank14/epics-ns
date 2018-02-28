<?php

require_once 'db.php';
session_start();

if ( $_SESSION['logged_in'] != 1 ) 
{
	$_SESSION['message'] = "You must log in before viewing your profile page!";
	header("location: error.php");    
}

$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
$time_stamp = date("Y-m-d H:i:s");

$update = "UPDATE $db.users SET login_time = '$time_stamp' WHERE email =  '$email'";
$mysqli->query($update);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <div class="form">

        <h1>Welcome User</h1>
       
        <h2><?= $first_name.' '.$last_name ?></h2>

        <a href="logout.php"><button class="button button-block" name="logout">Log Out</button></a>

    </div>

    <script src="js/index.js"></script>

</body>

</html>