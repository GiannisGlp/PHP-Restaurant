<?php
session_start();
include 'Index.php';
?>
<!DOCTYPE html>
<html>
    <link href="login_css.css" rel="stylesheet" type="text/css" />
<body>



    <form action="loginsql_guest.php" method="POST">
  

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
     
   
    <button name="btn" type="submit">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>

  
</form>
 
<?php
include 'footer.php';
?>
</body>
</html>
