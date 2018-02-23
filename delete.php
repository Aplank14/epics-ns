<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add New</title>
  <?php include 'css/css.html'; ?>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['delete_user'])) { //user logging in

        require 'delete_php.php';
        
    }
    
}
?>
<body>
  <div class="form">
      
       
             <div id="delete">   
          <h1>Delete User!</h1>
          
          <form action="delete.php" method="post" autocomplete="off"> 
              <div class="field-wrap">
            <label>
              Enter the email address of user to remove<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
              
           
          <button class="button button-block" name="delete_user" />Delete</button>
          
          </form>

        </div>
          
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
