<!DOCTYPE html>
<html>
<head>
<style>

   .pagination {
    display: inline-block;
    padding-bottom: auto; 
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

.pagination a {
    color: white;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.header h1 {
  position: relative;
  font-style: oblique; 
  float: left;
}
</style>
</head>
<body style="background-color: #cccccc;">
     
    <div class="header">
      <h1>Omnia Restaurants</h1>
    </div>
    <div style="text-align:right;"><a>Control Panel</a></div>
   
    <div style="text-align: right; color: red;">
        
    <?php
          session_start();
          if (isset($_SESSION['admin'])){
              echo 'Admin: ';
              echo ' ';
              echo ' ';
              echo $_SESSION['adminUsername'] ;
          }
         
      ?>
    </div>
    
    <div class="pagination" >
  <a href="users.php">Guests</a>
  <a href=admin_select.php>Delete Administrators</a>
  <a href="design_add_admin.php">Add Administrators</a>
  <a href="../admin/admin_menu/Index.php">Menu</a>
  <a href="admindeletereserve.php">Delete Reservations</a>
  <a href="adminaddreserve.php">Add Reservations</a>
  <a href="tables.php">Delete Tables</a>
  <a href="addtables.php">Add Tables</a>
   <a href="times.php">Delete Times</a>
   <a href="addtime.php"> Add Times</a>
  
  <a href="../home.php">Home Page</a>
</div>
     
    
</body>
</html>
