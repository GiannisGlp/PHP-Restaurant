<?php

include 'cpmove.php';
include '../conn.php';
require  '../function_input.php';
if(isset($_POST['button'])){
   if(isset($_SESSION['adminUsername']) && isset($_SESSION['adminid'])) { 
    $fullname=input($_POST['fullname']);  
    $tableid=input($_POST['tableid']);
    $date=input($_POST['date']);
    $newdate= date("y-m-d", strtotime($date));
    $timeid=input($_POST['timeid']);
    
    $sql="SELECT * FROM reservations WHERE tableid='$tableid'AND date='$newdate' AND timeid='$timeid'";
    $result = $conn->query($sql);
    if ($result->num_rows < 1){
    
    $sql = "INSERT INTO reservations (id,reservedfrom, tableid, date, timeid, reservedfor ) 
               VALUES ('".$_SESSION['adminid']."', '".$_SESSION['adminUsername']."', '$tableid', '$newdate', '$timeid','$fullname')";
if ( mysqli_query($conn,$sql)){
            echo 'Reservation added succsesfully';
       }
     }else{
             echo "We Are Full At This Date And Time Please Choose Other Date For <a class=a href='adminaddreserve.php'>Reservations</a> "; 
             }
   }       
}else {
          echo "You are not a registered user. Please <a class=a href='login.php'>Log In</a> Or <a href='signup.php'>Register</a>
                                 Or Go To <a href='home.php'>home page</a>"; 
    } 

