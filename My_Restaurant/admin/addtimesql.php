<?php

include 'cpmove.php';
include '../conn.php';
require  '../function_input.php';
if(isset($_POST['submit'])){
   
    $timefrom=input($_POST['timefrom']);  
    $timeto=input($_POST['timeto']);
    
    
    $sql = "INSERT INTO time (timefrom,timeto ) 
               VALUES ('$timefrom', '$timeto')";
if ( mysqli_query($conn,$sql)){
    
     echo "Record Added successfully go to  <a class=b href='times.php'>Times</a>";
}else{
    echo 'error';
}
   }   


