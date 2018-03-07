<?php

require_once "db.php";
session_start();

$result = $mysqli->query("SELECT id, first_name, last_name, email, user_type, hours FROM $db.users")

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
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Hours</th>
            </tr>
            <?php
                
                while($row = $result->fetch_assoc()) {
                    if ($row['user_type']=='admin'){
                        continue;
                    }
                    echo "<tr>";
                    $output = "<td>$row[id]</td><td>$row[first_name] $row[last_name]</td><td>$row[email]</td><td>$row[hours]</td>";
                    echo $output;
                    echo "</tr>";
                }
            ?>
        </table>
                
        <br>
        <a href="adminlogin.php"><button class="button button-block" name="back">Back</button></a>
        
    </div>


</body>

</html>