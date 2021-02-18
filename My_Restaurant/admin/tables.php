<!DOCTYPE html>
<html>
 <head>
<title>Delete Tables </title>
         
<link href="users.css" rel="stylesheet" type="text/css" />
</head>

<?php
    include 'cpmove.php';
    ?>
<body >   
    <h1>All Tables</h1>
    
    <form class="deletefrm" action="deletetable.php" method="POST" >
        <input class='id' type="text" name="id" placeholder="Type The ID From The Table To Delete" >
  <input style="color:red;" class="deluser" type="submit" value="Delete Table">
</form>
    
<?php

echo '<br>';
echo "<table >";
 echo "<tr>"

. "<th>Table ID</th>"
. "<th>Table Description</th>"
. "<th>People</th>"

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
    $stmt = $conn->prepare("SELECT  tableid, tdescription, people FROM tables"); 
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
<?php

echo '<br>';
echo "<table >";
 echo "<tr>"

. "<th>All Tables In Restaurant</th>"
. "<th>All People Can Fit The Tables</th>"

. "</tr>";


class Table extends RecursiveIteratorIterator { 
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



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT  SUM(tableid), Sum(people) FROM tables"); 
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



