<?php
session_start();
include '../conn.php';
require  '../function_input.php';
$firstname = input($_POST['firstname']);
$lastname =input($_POST['lastname']);
$username =input($_POST['username']);
$psw = input($_POST['psw']);
$psw2 = input($_POST['psw2']);
$email = input($_POST['email']);
$zip_code =input($_POST['zip_code']);
$phone_number =input($_POST['phone_number']);

$_SESSION['regusername'] = $username;
 $hashed_psw = password_hash($psw, PASSWORD_DEFAULT);
 $hashed_psw2 = password_hash($psw2, PASSWORD_DEFAULT);   
if ($_POST['psw'] == $_POST['psw2']){
    // check email
    $sql = "SELECT * FROM users WHERE  Email= '$email' AND Username='$username" ;
    $result = $conn->query($sql);
if ($result->num_rows == 0) {
$sql_insert = "INSERT INTO users (Firstname, Lastname, Username, password, password2, Email, Zip_Code,  Phone_Number,userrole) 
VALUES ('$firstname', '$lastname', '$username', '$hashed_psw', '$hashed_psw2', '$email', '$zip_code', '$phone_number', 2 )";
if ( mysqli_query($conn,$sql_insert)){
    echo  "Administrator Added Successfully go to  <a class=b href='admin_select.php'>Administrators</a>";
  } 
}
else {
    echo "email already exists";
}
}
    else {
    echo "wrong password matching";
}  
