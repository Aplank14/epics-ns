<?php
require_once 'db.php';

$email = $_POST["email"];
$result = $mysqli->query("SELECT * FROM $db.users WHERE email='$email'");


if ( $result->num_rows != 0 ) { 
    
    if ($mysqli->query("DELETE FROM $db.users WHERE email = '$email'")){
        $_SESSION['message'] = 'User deleted!';
        header("location: success.php"); 
    }

    else {
        $_SESSION['message'] = 'Delete failed!';
        header("location: error.php"); 
    }

}
else {
    
    $_SESSION['message'] = 'User with this email does not exist!';
    header("location: error.php");
}

?>