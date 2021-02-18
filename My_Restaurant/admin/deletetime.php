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
$sql = "DELETE FROM time WHERE   timeid='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully go to  <a class=b href='times.php'>Times</a>";
    
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
?>


