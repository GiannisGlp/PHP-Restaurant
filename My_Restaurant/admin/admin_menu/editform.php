<?php
        session_start();
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT userName, userProfession, userPic FROM menu WHERE userID =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];// user email
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['userPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['userPic']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE menu 
									     SET userName=:uname, 
										     userProfession=:ujob, 
										     userPic=:upic 
								       WHERE userID=:uid');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='index.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">



<!-- custom stylesheet -->

<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body>
    <body style=" background-color: #cccccc;">
    <div class="header">
      <h1>Omnia Restaurants</h1>
    </div>
<div style="text-align:right;"><a>Control Panel</a></div>
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
    <div  style="text-align: right; color: red;">
<?php
 if (isset($_SESSION['admin'])){
              echo 'Admin: ';
              echo ' ';
              echo ' ';
              echo $_SESSION['adminUsername'] ;
          }
         
?>
    </div>

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


<div class="container">


	<div class="page-header">
    	<h1 class="h2">update menu. <a class="btn btn-default" href="index.php"> all plates </a></h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Menu Name.</label></td>
        <td><input class="form-control" type="text" name="user_name" value="<?php echo $userName; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Description.</label></td>
        <td><input class="form-control" type="text" name="user_job" value="<?php echo $userProfession; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="170" width="250" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>

<?php
echo '<br><br>';
include '../../footer.php';
?>
</div>
</body>
</html>