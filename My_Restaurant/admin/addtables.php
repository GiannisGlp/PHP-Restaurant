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
    

      <h1>ADD Tables</h1>
     <div class="navbar navbar-default navbar-static-top" role="navigation">
    <form action="addtablesql.php" method="POST"  >
        <input  type="text" name="description" placeholder="Table Description" >
  <br><br>
       <input type="text" name="people" placeholder="People">
  <br><br>
  <input style="color:red;" class="delete" name="submit" type="submit" value="ADD" >
</form> 
     </div>        
      </br>
      </br>
     

<?php
include '../footer.php';
?>

</body>
</html>




