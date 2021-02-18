

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
 

.header h1 {
  position: inherit;
  font-style: oblique;
 
}
</style>   

</head>
<body style=" background-color: #cccccc;">
    <div  class="header">
        
  <h1>Omnia Restaurants</h1>
    
    <div style="text-align: right; 
    
    box-sizing: border-box;
    border: none;
    
    color: #ff0033;">
     <?php 
    
 if (isset($_SESSION['regusername'])) {
       echo 'Guest:';
       echo ' ';
       echo ' ';
       echo $_SESSION['regusername'] ;
       
      }
   if (isset($_SESSION['guestUsername'])) {
       echo 'Guest: ';
       echo ' ';
       
       echo ' ';
       echo $_SESSION['guestUsername'] ;
       }
          if (isset($_SESSION['admin'])){
              echo '<div style="text-align:right; color:black;"><a>Home Page</a></div>';
              echo 'Admin: ';
              echo ' ';
              echo ' ';
              echo $_SESSION['adminUsername'] ;
          }
     
      ?>
    </div>
    </div>
    <ul class="topnav">
  <li><a  href="home.php">Home</a></li>
  <li><a  href="login.php">Login</a></li>
  <li><a href="signup.php">Registration</a></li>
  <li><a href="meal.php">Menu</a></li>
  <li><a href="resselect.php">Reservation</a></li>
  <li><a href="location.php">location</a></li>
  <?php
    if (isset($_SESSION['admin'])){
  ?>
  <li>  <a  href="admin/users.php"> Control Panel</a></li>
  <?php
    }
   ?>
   <li class="right">  <ul >
   <li> <a href="logout.php">Log Out</a></li>
</ul>
</ul>

</body>

</html>
