<?php 

session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
     require_once 'login.php';

}

?>

<!DOCTYPE html>
<html>
<link href="css/style.css" rel="stylesheet" media="screen">

<title>Login Form</title>

<body>
    <div class="form">

        <div id="login">
            <h1>Welcome Back!</h1>

            <form action="main.php" method="post" autocomplete="off">

                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" required autocomplete="off" name="email" />
                </div>
                
                <button class="button button-block" name="login">Log In</button>

            </form>

        </div>


    </div>
    <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>

</html>