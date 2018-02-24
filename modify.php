<?php 
require_once 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['modify_user'])) {

        require_once 'modify_php.php';
        
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify user</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="form">
      
       
             <div id="modify">   
          <h1>Modify User!</h1>
          
          <form action="change_info.php" method="post" autocomplete="off"> 
              <div class="field-wrap">
            <label>
              Enter the email address of user to modify<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
              
           
          <button class="button button-block" name="modify_user" />Modify</button>
          
          </form>

        </div>
          
        
      </div>
      
</div>  

    <script src="js/index.js"></script>

</body>
</html>
