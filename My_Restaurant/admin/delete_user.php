
<?php
session_start();
include '../conn.php';
if(isset($_POST['id'])){
$id=$_POST['id'];


$sql = "DELETE FROM users WHERE   id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully go to  <a class=b href='users.php'>users</a>";
    
} else {
    echo "Error deleting record: " . $conn->error;
}
}

$conn->close();


