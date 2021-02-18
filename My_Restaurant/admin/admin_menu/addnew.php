<?php
        session_start();
	error_reporting( ~E_NOTICE ); // avoid notice
	require  '../../function_input.php';
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$username = input($_POST['user_name']);// user name
		$userjob = input($_POST['user_job']);// user email
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($username)){
			$errMSG = "Please Enter Plate Name.";
		}
		else if(empty($userjob)){
			$errMSG = "Please Enter Plate Description.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO menu(userName,userProfession,userPic) VALUES(:uname, :ujob, :upic)');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image </title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
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
    	<h1 class="h2">add new Plate. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Menu Name.</label></td>
        <td><input class="form-control" type="text" name="user_name" placeholder="Enter Menu Name" value="<?php echo $username; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Description.</label></td>
        <td><input class="form-control" type="text" name="user_job" placeholder="Menu Description" value="<?php echo $userjob; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Menu Img.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>
   
</div>
    
    
<?php
echo '<br><br>';
include '../../footer.php';
?>


	


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>