<?php 

require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['delete_user']))
    {

        require_once 'delete_php.php';
        
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    
    <div class="form">

        <div id="delete">
            
            <h1>Delete User!</h1>

            <form action="delete.php" method="post" autocomplete="off">
                
                <div class="field-wrap">
                    <input type="email" autocomplete="off" name="email" placeholder="Email of the user to delete" required/>
                </div>

                <button class="button button-block" name="delete_user">Delete</button>

            </form>

        </div>

    </div>

</body>

</html>
