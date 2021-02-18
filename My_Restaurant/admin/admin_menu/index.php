<?php
        session_start();
	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM menu WHERE userID =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM menu WHERE userID =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: index.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Upload, Insert, Update, Delete an Image </title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>

<body style=" background-color: #cccccc;">
    <div class="header">
      <h1>Omnia Restaurants</h1>
    </div>
    <div class="cp" style="text-align:right;"><a>Control Panel</a></div>
     <div style="text-align: right; color: red;">
    <?php
    
         if (isset($_SESSION['admin'])){
              echo 'Admin: ';
              echo ' ';
              echo ' ';
              echo $_SESSION['adminUsername'] ;
          }
         
      ?>
    </div>
    

<style>

   .pagination {
       width: 100%;
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


    
<div class="pagination">
   <a href="../users.php">Guests</a>
  <a href=../admin_select.php>Delete Administrators</a>
  <a href="../design_add_admin.php">Add Administrators</a>
  <a href="Index.php">Menu</a>
  <a href="../admindeletereserve.php">Delete Reservations</a>
  <a href="../adminaddreserve.php">Add Reservations</a>
  <a href="../tables.php">Delete Tables</a>
  <a href="../addtables.php">Add Tables</a>
   <a href="../times.php">Delete Times</a>
   <a href="../addtime.php"> Add Times</a>
  
  <a href="../../home.php">Home Page</a>
</div>



	<div class="page-header">
    	<h1 class="h2">All Plates. / <a class="btn btn-default" href="addnew.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; add new </a></h1> 
    </div>
    
<br />

<div class="row">
<?php
	
	$stmt = $DB_con->prepare('SELECT userID, userName, userProfession, userPic FROM menu ORDER BY userID DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-xs-3">
                            <p class="page-header" style="text-align:center; font-weight: bold;"><?php echo"" .$userName?></p>
                            <p class="page-header"style="text-align:left;"><?php echo"".$userProfession ?></p>
				<img src="user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="330px" height="250px" />
				<p class="page-header">
				<span>
				<a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['userID']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $row['userID']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
				</span>
				</p>
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
</div>
</div>
        <?php
	}
	
       
echo '<br><br>';
include '../../footer.php';
    
?>









<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>