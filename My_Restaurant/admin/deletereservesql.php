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
$resid=$_POST['resid'];
if(isset($_POST['delreserve'])){

// sql to delete a record
$sql = "DELETE FROM reservations WHERE   resid='$resid'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully go to  <a class=b href='admin_select.php'>Administrators</a>";
    
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
?>

