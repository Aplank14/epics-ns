<?php
require_once 'db.php';
session_start();

$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$new_email = $_POST["new_email"];
$old_email = $_POST["orig_email"];
$user_type = $_POST["user_type"];
$result = $mysqli->query("SELECT * FROM users WHERE email='$old_email'") or die($mysqli->error());


if ( $result->num_rows > 0 ) { 

    $sql = "UPDATE users SET id = '$id', first_name = '$first_name', last_name = '$last_name', email = '$new_email', user_type = '$user_type' WHERE email = '$old_email'";

    if ($mysqli->query($sql)){
        $_SESSION['message'] = 'User modified!';
        header("location: success.php"); 
      
    }

    else {
        $_SESSION['message'] = 'Update failed!';
        header("location: error.php"); 
        
    }

}
else {
    
    $_SESSION['message'] = 'User with this email does not exist!';
    header("location: error.php");
    
}
?>