<?php

require_once 'db.php';
session_start();

$old_email = $_SESSION["old_email"];

$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$user_type = $_POST["user_type"];

$sql = "UPDATE $db.users SET 
                            id = '$id', 
                            first_name = '$first_name', 
                            last_name = '$last_name', 
                            email = '$email', 
                            user_type = '$user_type' 
                        WHERE email = '$old_email'";

if ($mysqli->query($sql))
{
    $_SESSION['message'] = 'User modified!';
    header("location: success.php"); 
}
else 
{
    $_SESSION['message'] = 'Update failed!';
    header("location: error.php"); 
}

?>