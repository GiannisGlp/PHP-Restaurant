<?php
session_start();
include 'conn.php';

$resid=$_POST['resid'];
if(isset($_POST['delreserve'])){

// sql to delete a record
$sql = "DELETE FROM reservations WHERE   resid='$resid'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully go to  <a class=b href='resselect.php'>Reservations</a>";
    
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
?>

