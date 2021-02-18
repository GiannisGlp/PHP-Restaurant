<?php

    include 'cpmove.php';
    ?>
<!DOCTYPE html>
<html>
    <body >
         
        <style>
            h1 {
                text-align: center;
            }
            form{
                text-align: center;
            }
            input{
                width: 200px;
    height: 30px;
    border: 1px solid grey;
    box-sizing: border-box;
            }
         
        </style>

      <h1>ADD Administrators</h1>
     <div class="navbar navbar-default navbar-static-top" role="navigation">
    <form action="add_admin.php" method="POST"  >
        <input  type="text" name="firstname" placeholder="Firstname" >
  <br><br>
       <input type="text" name="lastname" placeholder="Lastname">
  <br><br>
       <input type="text" name="username" placeholder="Username">
  <br><br>
      <input type="text" name="email" placeholder="Email">
  <br><br>  
       <input type="text" name="zip_code" placeholder="Zip-Code">
  <br><br>
       <input type="text" name="phone_number" placeholder="Phone Number">
  <br><br>
       <input type="text" name="psw" placeholder="Password">
  <br><br>
       <input type="text" name="psw2" placeholder="Repeat Password">
  <br><br>
  <input style="color:red;" class="delete" name="submit" type="submit" value="ADD" >
</form> 
     </div>        
     

  <?php
echo '<br><br>';
include '../footer.php';
    ?>

</body>
</html>

