<?php
session_start();
include 'Index.php';
?>
<!DOCTYPE html>
<html>
 <head>
     <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
  $(document).ready(function(){
    $("#myres").click(function(){
        $("#table").slideToggle("slow");
    });
});
 </script>
 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
     
  });
 </script>

<title>Table Reservation </title>
         

</head>
<body > 
    
        
    <div style="text-align: center;">
        <h1>Table Reservation</h1></div>
    <form action="ressql.php" method="POST">
         <div>    
       Full Name: <input style="width: 200px;"  name="fullname" placeholder="Reserve For" /><br>
    </div>
    <div>    
        Check In Date: <input style="width: 200px;"  name="date" id="datepicker" placeholder="Pick A Date:" /><br>
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
        <button name="btn" type="submit">Reserve</button>
    </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    
    
    <div><h1>Reservations Made By
        
      <?php
      if(isset($_SESSION['guestUsername'])){
          echo $_SESSION['guestUsername'];
      }
      ?>
        </h1></div>
<?php
echo '<br>';
echo "<table >";
 echo "<tr>"
. "<th>Reservation Number</th>"
. "<th>Check In Date</th>"
. "<th>Check In Time</th>"         
. "<th>Reserved For</th>" 
. "</tr>";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_SESSION['guestUsername'])){
    $stmt = $conn->prepare("SELECT resid, date, timeid, reservedfor FROM reservations WHERE reservedfrom='".$_SESSION['guestUsername']."' ORDER BY date"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
    }
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

?> 
        
    
    
    
        <form action="deletereserveuser.php" method="POST" >
            <input style="width: 300px;"  type="text" name="resid" placeholder="Type The Reservation Number To Delete It">
            <input   name="delreserve" type="submit" value="Delete Reservation">
</form>
    
    <br>
    <br>
    <?php
include 'footer.php';
    ?>
</body>
</html>



