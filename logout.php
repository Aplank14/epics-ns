<?php
session_start();
session_unset();
session_destroy(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goodbye!</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form">
        
          <h1>Thanks for stopping by</h1>
              
          <p>You have been logged out!</p>
          
          <a href="main.php"><button class="button button-block">Home</button></a>

    </div>
    
</body>
    
</html>
