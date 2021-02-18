<!DOCTYPE html>
<html>
 <head>
<title> Users  </title>
         
<link href="users.css" rel="stylesheet" type="text/css" />
</head>   
<body>
    <?php
    
    include 'cpmove.php';
    ?>
    
    <h1>All Registered Guests</h1>
    
    <form class="deletefrm" action="delete_user.php" method="POST" >
        <input class='id' type="text" name="id" placeholder="Type The ID From The Table To Delete">
  <input style="color:red;" class="deluser" type="submit" value="Delete User">
</form> 
    
<?php

echo '<br>';
echo "<table >";
 echo "<tr>"
. "<th>ID</th>"
. "<th>Firstname</th>"
. "<th>Lastname</th>"
. "<th>Email</th>"
. "<th>Zip-Code</th>"
. "</tr>";


class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
       
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, Firstname,Lastname,Email,Zip_Code FROM users WHERE userrole='1'"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";


  
echo '<br><br>';
include '../footer.php';
    
?> 

</body>
</html>
        