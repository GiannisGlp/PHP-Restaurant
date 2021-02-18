<!DOCTYPE html>
<html>
 <head>
<title>Delete Times</title>
         
<link href="users.css" rel="stylesheet" type="text/css" />
</head>

<?php
    include 'cpmove.php';
    ?>
<body >   
    <h1>All Times</h1>
    
    <form class="deletefrm" action="deletetime.php" method="POST" >
        <input class='id' type="text" name="id" placeholder="Type The ID From The Table To Delete" >
  <input  style="color:red;" class="deluser" type="submit" value="Delete Time">
</form>
    
<?php

echo '<br>';
echo "<table >";
 echo "<tr>"
. "<th>Time ID</th>"
. "<th>Time From</th>"
. "<th>Time To</th>"

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
    $stmt = $conn->prepare("SELECT timeid, timefrom, timeto FROM time"); 
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





