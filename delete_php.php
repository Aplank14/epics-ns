<?php

require_once 'db.php';

$email = $_POST["email"];
$result = $mysqli->query("SELECT * FROM $db.users WHERE email='$email'");

if ( $result->num_rows == 0 ) 
{ 

    $_SESSION['message'] = 'User with this email does not exist!';
    header("location: error.php");   
 
}

$sql = "DELETE FROM $db.users WHERE email = '$email'";

if ($mysqli->query($sql))
{
    $_SESSION['message'] = 'User delete!';
    header("location: success_add.php"); 
}
else 
{
    $_SESSION['message'] = 'Delete failed!';
    header("location: error.php"); 
}

?>
