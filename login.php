<?php

require_once "db.php";

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM $db.users WHERE email='$email'");

if ($result->num_rows != 1){
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}

$user = $result->fetch_assoc();

if($user['logged_in']){
    $_SESSION['message'] = "User already logged in!";
    header("location: error.php");
}
else if($user['user_type']=="admin")
{    
    $_SESSION['email'] = $user['email'];
    $curr_email = $user['email'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['logged_in'] = true;

    header("location: adminlogin.php");
}
else if($user['user_type']=="user")
{    
    $_SESSION['email'] = $user['email'];
    $curr_email = $user['email'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['logged_in'] = true;

    header("location: check_in.php");
}

?>