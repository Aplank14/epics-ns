<?php

$email = $mysqli->escape_string($_POST['email']);
$test = "SELECT * FROM" . $_SESSION['db'] . ".users WHERE email='" . $email . "'";
$result = $mysqli->query("SELECT * FROM " . $_SESSION['db'] . ".users WHERE email='" . $email . "'");

if ($result->num_rows == 0){
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}

$user = $result->fetch_assoc();

if($user['user_type']=="admin")
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

    header("location: profile.php");
}
else
{
    $_SESSION['message']="Unexpected user type";
    header("location: error.php");
}

?>