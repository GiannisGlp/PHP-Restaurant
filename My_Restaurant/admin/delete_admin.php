<?php

include 'cpmove.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id=$_POST['id'];
if(isset($_POST['id'])){

// sql to delete a record
$sql = "DELETE FROM users WHERE   id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully go to  <a class=b href='admin_select.php'>Administrators</a>";
    
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
?>
