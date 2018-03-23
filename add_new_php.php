<?php

require_once 'db.php';

if ( $_SESSION['logged_in'] != 1 ) {
	$_SESSION['message'] = "You must log in";
    header("location: error.php");  
    exit(0);  
}

$email = $_POST['email'];

$result = $mysqli->query('SELECT * FROM '. DB .".users WHERE email= '$email'");
$user = $result->fetch_assoc();

if ($result->num_rows!=0) {
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    exit(0);
}

$id = $_POST["id"];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$admin = $_POST['admin'];
$pass = NULL;

if ($admin)
{
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
}

$update =   'INSERT INTO '. DB .".users (id, first_name, last_name, email, password, admin) 
                                    VALUES ('$id', '$first_name', '$last_name', '$email', '$pass', $admin); " .
            'CREATE TABLE '. DB .".`$id` (logins DATETIME);";

if ($mysqli->multi_query($update)){
    $_SESSION['New user added'];
    header("location: success.php"); 
    exit(0);
}
else
{
    $_SESSION['message'] = 'Registration failed!';
    header("location: error.php"); 
    exit(0);
}

?>