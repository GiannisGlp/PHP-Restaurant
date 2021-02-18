<!DOCTYPE html>
<html>
 <head>


<title> Reservations </title>
         
<link href="users.css" rel="stylesheet" type="text/css" />
</head>   
<body>
    <?php
    
    include 'cpmove.php';
    ?>
    
    <h1>All Reservations</h1>
    
    <form class="deletefrm" action="deletereservesql.php" method="POST" >
        <input style="width: 400px" class='id' type="text" name="resid" placeholder="Type The ID From The Table To Delete Reservation">
        <input style="color:red;"  class="deluser" name="delreserve" type="submit" value="Delete Reservation">
</form> 
    
    <div id="res">   
<?php

echo '<br>';
echo "<table >";
 echo "<tr>"
. "<th>Reservation Number</th>"
. "<th>User Number</th>"
. "<th>Table Number</th>"
. "<th>Date</th>"
. "<th>Time Number</th>"
. "<th>Reserved From</th>"
. "<th>Reserved For</th>"
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
    $stmt = $conn->prepare("SELECT resid, id, tableid, date , timeid, reservedfrom,reservedfor FROM reservations ORDER BY date"); 
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

?> 
        
    </div>
    <br>
    <br>
    <div style="text-align: center;" id="myres">
        <h1><?php echo $_SESSION['adminUsername'];echo ':';  ?> Reservations</h1>
        <div id="table">
            
      <?php

echo '<br>';
echo "<table >";
 echo "<tr>"
. "<th>Reservation Number</th>"
. "<th>Check In Date</th>"
. "<th>Check In Time</th>"         

. "</tr>";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT resid, date, timeid FROM reservations WHERE reservedfrom='".$_SESSION['adminUsername']."'"); 
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

?> 
        </div>
    </div>
<br>
<br>
<br>
<br>
    <?php

echo '<br>';
echo "<table >";
 echo "<tr>"
 
. "<th>My Total Reservations</th>"
       

. "</tr>";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT SUM(resid) FROM reservations WHERE reservedfrom='".$_SESSION['adminUsername']."'"); 
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
        

