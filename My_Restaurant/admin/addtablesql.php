<?php

include 'cpmove.php';
include '../conn.php';
require  '../function_input.php';
if(isset($_POST['submit'])){
   
    $description=input($_POST['description']);  
    $people=input($_POST['people']);
    
    
    $sql = "INSERT INTO tables (tdescription,people ) 
               VALUES ('$description', '$people')";
if ( mysqli_query($conn,$sql)){
    
    echo "Record Added successfully go to  <a class=b href='tables.php'>Tables</a>";
}else{
    echo 'error';
}
   }   



