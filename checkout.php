<?php

require_once "db.php";
session_start();

$result = $mysqli->query("SELECT * FROM $db.users WHERE logged_in=1");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form">

        <h1>Current Users</h1>
        <form action="checkout_php.php" method="post">
        
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $output = '<input class = "button button-block" type="submit" value="'. $row['first_name'] . ' ' . $row['last_name'] . '" name="' . $row['id']. '">';
                    echo $output;
                }
            }
        ?>
              
        </form>
        
        <br>
        <hr>
        <a href="main.php"><button class="button button-block">Back</button></a>
        
    </div>

</body>

</html>