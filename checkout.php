<?php

require_once "db.php";
session_start();

$result = $mysqli->query("SELECT "first_name" FROM $db.users WHERE logged_in=1");

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

        <h1>Users</h1>
        <table>
            <tr>
                <td>Name</td>
                <td></td>
            </tr>
            <?=
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<br> $row['first_name']";
                }
            ?>
        </table>

        
    </div>

</body>

</html>