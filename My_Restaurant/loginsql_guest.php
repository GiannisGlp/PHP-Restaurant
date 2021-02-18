<?php
session_start();
include 'conn.php';
require  'function_input.php';
$username= input( $_POST['username']);
$psw= input( $_POST['psw']);



$sql="SELECT * FROM users WHERE Username='$username'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$hash_psw=$row['password'];
$hash= password_verify($psw, $hash_psw);
 

if(isset($_POST['btn'])){
    $sql = "SELECT id, Username, password, userrole FROM users WHERE userrole=1 AND Username='$username' AND password='$hash_psw' ";
    $result = $conn->query($sql);
    if($row = $result->fetch_assoc()) 
     {
        $_SESSION['id']=$row['id'];
        $_SESSION['guestUsername']=$row['Username'];
        $_SESSION['guest']=$row['userrole'];
        include 'index.php';  
   
     }
 
 
    $sql = "SELECT id, Username, password, userrole FROM users WHERE userrole=2 AND Username='$username' AND password='$hash_psw' ";
    $result = $conn->query($sql);
    if($row = $result->fetch_assoc()) 
     {
        $_SESSION['adminid']=$row['id'];
        $_SESSION['adminUsername']=$row['Username'];
        $_SESSION['admin']=$row['userrole'];
        include 'index.php';  
   
     }
     
     
} else {     
        echo "You are not a registered user. Please <a class=a href='login.php'>retry</a> or <a href='signup.php'>register</a>
                                 or <a href='home.php'>home page</a>"; 
        }    
 
        
 