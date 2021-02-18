<?php
session_start();
include 'conn.php';
require  'function_input.php';
if(isset($_POST['btn'])){
   if(isset($_SESSION['guestUsername']) && isset($_SESSION['id'])) { 
    $fullname=input($_POST['fullname']);  
    $tableid=input($_POST['tableid']);
    $date=input($_POST['date']);
    $newdate= date("y-m-d", strtotime($date));
    $timeid=$_POST['timeid'];
    
    $sql="SELECT * FROM reservations WHERE tableid='$tableid'AND date='$newdate' AND timeid='$timeid'";
    $result = $conn->query($sql);
    if ($result->num_rows < 1){
    
    $sql = "INSERT INTO reservations (id,reservedfrom, tableid, date, timeid, reservedfor ) 
               VALUES ('".$_SESSION['id']."', '".$_SESSION['guestUsername']."', '$tableid', '$newdate', '$timeid','$fullname')";
       if( mysqli_query($conn,$sql)){
           echo "Reservation added succsesfully go to  <a class=b href='resselect.php'>Reservations</a>";
       }
     }else{
             echo "We Are Full At This Date And Time Please Choose Other Date For <a class=a href='resselect.php'>Reservations</a> Or Go To <a href='home.php'>Home</a>"; 
       }
    } 
    } else {
          echo "You are not a registered user. Please <a class=a href='login.php'>Log In</a> Or <a href='signup.php'>Register</a>
                                 Or Go To <a href='home.php'>home page</a>";     
}


