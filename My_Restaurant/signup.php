<?php
session_start();
include 'index.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <link href="signup_css.css" rel="stylesheet" type="text/css" />
    </head>
<body >

<h2>Signup Form</h2>

<form action="registration.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    
      <label><b>Firstname</b></label>
      <input type="text" placeholder="Enter Firstname" name="firstname" required autocomplete="off">
    
    <label><b>Lastname</b></label>
    <input type="text" placeholder="Enter Lastname" name="lastname" required autocomplete="off">
    
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required autocomplete="off">
      
      <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required autocomplete="off">
    
    <label><b>Zip-Code</b></label>
    <input type="text" placeholder="Enter Zip-Code" name="zip_code" required autocomplete="off">
    
    <label><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="phone_number" required autocomplete="off">

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required autocomplete="off">

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw2" required autocomplete="off">
    <input type="checkbox" checked="checked"> Remember me
    

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

<?php
include 'footer.php';
?>

</body>
</html>


