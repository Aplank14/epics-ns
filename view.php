<?php

require_once "db.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form">

        <h1>Users</h1>
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Hours</td>
            </tr>
        </table>

        <hr>
        <a href="adminlogin.php"><button class="button button-block" name="back">Back</button></a>
        
    </div>


</body>

</html>