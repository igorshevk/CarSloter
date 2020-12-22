<?php
include("common/gaurav.library.php");
echo protect_agent();
$successArr = [];
$session_id=$_SESSION['ADM_ID'];
$stmt=$conn->prepare("select * from tbl_admin where adm_id='$session_id'");
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_OBJ);



if(isset($_POST['update_profile']))
									{
 $adm_uid=$_POST['adm_uid'];
	//$adm_type=$_POST['adm_type'];
 $file_name=$_FILES['adm_image']['name'];
 $tmp_name=$_FILES['adm_image']['tmp_name'];
  if($file_name=="")
  {
	$nfile_name=$row->adm_image;	
	} else {
  $rand_no=rand(1,9999);
  $nfile_name='profile'.$rand_no.$file_name;
 move_uploaded_file($tmp_name,"uploaded_file/profile/".$nfile_name);
  }
  $adm_name=$_POST['adm_name'];
  $adm_email=$_POST['adm_email'];
  $adm_mobile=$_POST['adm_mobile'];
  $adm_about=$_POST['adm_about'];
  
 $sql=$conn->prepare("update tbl_admin set adm_uid=:adm_uid,adm_name=:adm_name,adm_image=:nfile_name,adm_email=:adm_email,adm_mobile=:adm_mobile,adm_about=:adm_about where adm_id='$session_id'");

 $sql->bindParam(":adm_uid", $adm_uid,PDO::PARAM_STR);
  $sql->bindParam(":nfile_name", $nfile_name,PDO::PARAM_STR);
  $sql->bindParam(":adm_name", $adm_name,PDO::PARAM_STR);
  $sql->bindParam(":adm_email", $adm_email,PDO::PARAM_STR);
  $sql->bindParam(":adm_mobile", $adm_mobile,PDO::PARAM_STR);
  $sql->bindParam(":adm_about", $adm_about,PDO::PARAM_STR);
  $result=$sql->execute();
  if($result)
  {
  $successArr[]="Your profile Update successfully!!!";	
										 
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

       <title><?=SITE_NAME;?> | Profile</title>
  
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
  
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <<section class="content">

      <div class="row">
        <div class="col-xl-4 col-lg-5">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
			<?php if($row->adm_image !="") { ?>
			<img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="uploaded_file/profile/<?=$row->adm_image;?>" alt="User profile picture">
              <?php } else { ?>
			  <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="images/user.png" alt="User profile picture">
             <?php } ?>			  
              <h3 class="profile-username text-center"><?=$row->adm_name;?></h3>

              <div class="row">
              	<div class="col-12">
              		<div class="profile-user-info">
					    <p>User Id</p>
						<h6 class="margin-bottom"><?=$row->adm_uid;?></h6>
						 <p>Name</p>
						<h6 class="margin-bottom"><?=$row->adm_name;?></h6>
						<p>About Me</p>
						<h6 class="margin-bottom"><?=$row->adm_about;?></h6>
						<p>Email address </p>
						<h6 class="margin-bottom"><?=$row->adm_email;?></h6>
						<p>Phone</p>
						<h6 class="margin-bottom"><?=$row->adm_mobile;?></h6> 
						
					
						
					</div>
             	</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-8 col-lg-7">
          <div class="row">
            <div class="col-12">
			  <?php foreach($successArr as $successlist)
			  { ?>
			  <div class="alert alert-success"><?php echo $successlist;
			  echo "<br>"; ?></div>
			  <?php } ?> 
			                          
			<form method="POST" action="" enctype="multipart/form-data"> 
			  <div class="form-group row">
				  <label for="example-text-input" class="col-sm-3 col-form-label"> User Id</label>
				  <div class="col-sm-7">
					<input class="form-control" name="adm_uid" type="text" value="<?=$row->adm_uid;?>" readonly="">
				  </div>
				   <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				</div>
			
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-3 col-form-label"> Name</label>
				  <div class="col-sm-7">
					<input class="form-control" type="text" name="adm_name" value="<?=$row->adm_name;?>">
				  </div>
				   <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-3 col-form-label"> About Me</label>
				  <div class="col-sm-7">
					<textarea class="form-control" type="text" name="adm_about"><?=$row->adm_about;?></textarea>
				  </div>
				   <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-3 col-form-label">Profile Image</label>
				  <div class="col-sm-7">
					<input class="form-control" type="file" name="adm_image">
				  </div>
				   <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-3 col-form-label"> Email Id</label>
				  <div class="col-sm-7">
					<input class="form-control" type="text" name="adm_email" value="<?=$row->adm_email;?>">
				  </div>
				   <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-3 col-form-label"> Mobile No.</label>
				  <div class="col-sm-7">
					<input class="form-control" type="text" name="adm_mobile" value="<?=$row->adm_mobile;?>">
				  </div>
				   <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-3 col-form-label">&nbsp;</label>
				  <div class="col-sm-7">
					<input type="submit" name="update_profile" class="btn btn-success" value="Update Profile">
				  </div>
				   <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				</div>
				</form>
							
            </div>
            <!-- /.col -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <?php include("common/footer_inc.php"); ?>
  
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
