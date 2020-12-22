<?php include("common/gaurav.library.php");
echo protect_admin();
if(isset($_GET['admid']))
{
	$admid=$_GET['admid'];
}
$sql=$conn->prepare("select * from tbl_admin where adm_id='$admid' and adm_type = 2");
$sql->execute();
$row=$sql->fetch(PDO::FETCH_OBJ);
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

      <title><?=SITE_NAME;?> | Edit Agent</title>
  
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
        Edit Agent
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Edit Agent</li>
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
			
			    <form method="POST" action="" enctype="multipart/form-data">
				
            	<div class="form-group row" id="#frmgrp">
				  <label for="example-text-input" class="col-sm-2 col-form-label">User Id</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="adm_uid" value="<?=$row->adm_uid;?>">
				  </div>
				</div>
				
				
				<div class="form-group row" id="#frmgrp">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="adm_password" value="<?=$row->adm_password;?>">
				  </div>
				</div>
				
				
				
				
				<div class="form-group row" id="#frmgrp">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Agent Name</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="adm_name" value="<?=$row->adm_name;?>">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label"> Status</label>
				  <div class="col-sm-10">
					<select class="form-control" name="adm_status">
                      <option value="0" <?php if($row->adm_status=='') {echo "selected='selected'"; }?>>--Select Status--</option>
					  <option value="1" <?php if($row->adm_status=='1') {echo "selected='selected'"; }?>>Active</option>
					  <option value="0" <?php if($row->adm_status=='0') {echo "selected='selected'"; }?>>Block</option>
					</select>
				  </div>
				</div>
				
								
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				  <div class="col-sm-10">
					<input type="submit" class="btn btn-success" name="update" value="Update">
				  </div>
				</div>
		     	</form>
				<?php
				if(isset($_POST['update']))
                {
	           $adm_uid=$_POST['adm_uid'];
	           $adm_password=$_POST['adm_password'];
			    $adm_name=$_POST['adm_name'];
			    $adm_status=$_POST['adm_status'];
               $stmt=$conn->prepare("update tbl_admin set adm_uid=:adm_uid,adm_password=:adm_password,adm_name=:adm_name,adm_status=:adm_status where adm_id=:admid");	
               $stmt->bindParam(":adm_uid",$adm_uid, PDO::PARAM_STR);
               $stmt->bindParam(":adm_password",$adm_password, PDO::PARAM_STR);
			    $stmt->bindParam(":adm_name",$adm_name, PDO::PARAM_STR);
			    $stmt->bindParam(":adm_status",$adm_status, PDO::PARAM_INT);
			    $stmt->bindParam(":admid",$admid, PDO::PARAM_INT);
               $result=$stmt->execute();
               if($result)
               {
	           echo "<script>window.location.href='manage_agent.php'</script>";
              }
              }
			  ?>
			
			
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
