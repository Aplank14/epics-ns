<?php

require_once 'db.php';

$id = $_POST["id"];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$user_type = $_POST['user_type'];

$result = $mysqli->query("SELECT * FROM $db.users WHERE email= '$email'");
$user = $result->fetch_assoc();

if ($result->num_rows!=0) {
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
}

$update = "INSERT INTO $db.users (id, first_name, last_name, email, user_type) 
                                VALUES ($id, '$first_name', '$last_name', '$email', '$user_type')";

if ($mysqli->query($update))
{
    $_SESSION['message'] = 'New user added!';
    header("location: success_add.php"); 
} 
else 
{
    $_SESSION['message'] = 'Registration failed!';
    header("location: error.php"); 
}

?>