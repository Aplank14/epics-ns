<?php 

session_start();

if ( $_SESSION['logged_in'] != 1 ) {
	$_SESSION['message'] = "You must log in";
	header("location: error.php");    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    require_once 'add_new_php.php';       
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new user</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    
    <div class="form">

        <div id="add">
    
            <h1>Add New User!</h1>

            <form action="add_new.php" method="post" autocomplete="off">

                <div class="field-wrap">
                    <input type="number" required autocomplete="off" name="id" placeholder="ID*" required/>
                </div>

                <div class="field-wrap">
                    <input type="text" required autocomplete="off" name="first_name" placeholder="First Name*" required/>
                </div>

                <div class="field-wrap">
                    <input type="text" required autocomplete="off" name="last_name" placeholder="Last Name*" required/>
                </div>

                <div class="field-wrap">
                    <input type="email" required autocomplete="off" name="email" placeholder="Email Address*" required/>
                </div>

                <div class="field-wrap">
                    <input type="text" required autocomplete="off" name="user_type" placeholder="User Type*" required/>
                </div>

                <button class="button button-block" name="add_new">Add</button>

            </form>

        </div>
        
        <hr>
        <a href="adminlogin.php"><button class="button button-block" name="back">Back</button></a>

    </div>

</body>

</html>
