<?php include('common/gaurav.library.php'); 
echo protect_agent();
$errorArr = [];
$successArr = [];
$admsession_id=$_SESSION['ADM_ID'];

$stmt=$conn->prepare("select * from tbl_admin where adm_id='$admsession_id'");
$stmt->execute();
$row_oldpass=$stmt->fetch(PDO::FETCH_OBJ);
$oldpassword=$row_oldpass->adm_password;

if(isset($_POST['submit']))
{
	$old_password=$_POST['old_password'];
	$new_password=$_POST['new_password'];
	$confirm_password=$_POST['confirm_password'];
	if(empty($old_password))
	{
		$errorArr[]="Please enter Old Password";
	}	
	else if($oldpassword!=$old_password)
	{
		$errorArr[]="Please enter Valid Old Password";
	}	
	else if(empty($new_password))
	{
		$errorArr[]="Please enter New Password";
	}	
	else if(empty($confirm_password))
	{
        $errorArr[]="Please enter Confirm Password";					 
	}	
	else if($confirm_password!=$new_password)
	{
	    $errorArr[]="Confirm Password and New Password do not match";
	} 
	else
	{
		$stmp_changepass=$conn->prepare("update tbl_admin set adm_password='$confirm_password' where adm_id='$admsession_id'");
		$result_changepass=$stmp_changepass->execute();
		if($result_changepass)
		{
			$successArr[]="Your Password Changed Successfully";	
		}
		
	}

}
				
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

      <title><?=SITE_NAME;?> | Change Password</title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.min.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="css/master_style.css">

	<!-- bonitoadmin Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="css/skins/_all-skins.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  
  <?php include("common/header_inc.php"); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include("common/sidebar_inc.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Change Password
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">&nbsp;</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
			
			
			  <?php 
	            foreach($errorArr as $errorlist)
	          { ?>
	         <div class="alert alert-danger"><?php echo $errorlist;
	         echo "<br>"; ?></div>
	        <?php } ?>
			
			 <?php foreach($successArr as $successlist)
			  { ?>
			  <div class="alert alert-success"><?php echo $successlist;
			  echo "<br>"; ?></div>
			  <?php } ?> 
			    <form method="POST" action="" enctype="multipart/form-data">
				
				<div class="form-group row">
				  <div class="col-sm-2"></div>
				  <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
				   <div class="col-sm-6">
                  <input class="form-control" name="old_password" type="text">
                  <div class="contents"></div>
				   </div>
				   <div class="col-sm-1"></div>
				</div>
				
				<div class="form-group row">
				<div class="col-sm-2"></div>
				  <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
				   <div class="col-sm-6">
                  <input class="form-control" name="new_password" type="text">
                  <div class="contents"></div>
				   </div>
				   <div class="col-sm-1"></div>
				</div>
				
				<div class="form-group row">
				 <div class="col-sm-2"></div>
				  <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
				   <div class="col-sm-6">
                  <input class="form-control" name="confirm_password" type="text">
                  <div class="contents"></div>
				   </div>
				   <div class="col-sm-1"></div>
				</div>
				
				
				
				
				<div class="form-group row">
				<div class="col-sm-2"></div>
				  <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				  <div class="col-sm-6">
					<input type="submit" class="btn btn-success" name="submit" value="Change Password">
				  </div>
				  <div class="col-sm-1"></div>
				</div>
		     	</form>
				
			
			
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
     
     
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include("common/footer_inc.php"); ?>


  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- bonitoadmin App -->
	<script src="js/template.js"></script>
	
	<!-- bonitoadmin for demo purposes -->
	<script src="js/demo.js"></script>
	
</body>
</html>
