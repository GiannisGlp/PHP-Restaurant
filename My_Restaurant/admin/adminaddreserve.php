<?php

include 'cpmove.php';
?>
<!DOCTYPE html>
<html>
 <head>
     <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
     
  });
 </script>



<title>Add Reservation </title>
         

</head>
<body > 
    <div style="text-align: center;">
        <h1>Reservation</h1></div>
    <form action="addreservesql.php" method="POST">
         <div>    
       Full Name: <input style="width: 200px;"  name="fullname" placeholder="Reserve For" /><br>
    </div>
        <br>
    <div>    
        Check In Date: <input type="text" style="width: 200px;"  name="date" id="datepicker" placeholder="Pick A Date:" /><br>
    </div>
<?php

echo '<br>';
echo "<table >";
 echo "<tr>"
. "<th>Option Number</th>"
. "<th>People</th>"
. "</tr>";
?>
  People: <input style="width: 200px;" name="tableid" id="people" placeholder="Type Your Option Number" /><br>  
<?php
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
    $stmt = $conn->prepare("SELECT tableid, people FROM tables "); 
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



echo '<br>';
echo "<table>";
 echo "<tr>"
. "<th>Time Option Nember:</th>"
. "<th>From:</th>"
. "<th>To:</th>"
. "</tr>";
?>
    <div >    
        
    Check In/Out Time: <input style="width: 200px;" name="timeid" id="time" placeholder="Type Your Time Option Number:" /><br>
        
    </div> 

<?php    
 



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT timeid, timefrom, timeto FROM time "); 
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
    <br>
    <div>
        <button style="color:red;" name="button" type="submit">Reserve</button>
    </div>
    </form>
    <?php
echo '<br><br>';
include '../footer.php';
    ?>
</body>
</html>

