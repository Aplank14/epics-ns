<?php
session_start();

if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ){ 
        //echo $_SESSION['message'];    
}else{
        header( "location: adminlogin.php" );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success!</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="form">
    <h1>Success</h1>
    <p>
    </p>     
    <a href="adminlogin.php"><button class="button button-block"/>Admin Home</button></a>
</div>
</body>
</html>
