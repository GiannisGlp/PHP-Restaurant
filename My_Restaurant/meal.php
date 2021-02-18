<?php
        
        session_start();
	require_once 'admin/admin_menu/dbconfig.php';
	include 'index.php';
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Menu </title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>

<body>


<div class="container">

    <div class="page-header" style="text-align: center;">
    	<h1 class="h2">All Plates</h1> 
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
                            <img src="admin/admin_menu/user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="330px" height="250px" />
                            
                            </br>
                            
                            </br>  
			</div>  
      
   
			<?php
		}
	}
	
	include 'footer.php';
		?>
        
        
	
	

</div>	





</div>


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
