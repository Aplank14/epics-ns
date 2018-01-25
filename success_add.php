<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Success</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: adminlogin.php" );
    endif;
    ?>
    </p>     
    <a href="adminlogin.php"><button class="button button-block"/>Admin Home</button></a>
</div>
</body>
</html>