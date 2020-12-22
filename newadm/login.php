<?php
include("common/gaurav.library.php");
$errorArr = [];
if(isset($_POST['login_submit']))
{
$adm_uid=htmlspecialchars($_POST['adm_uid']);
$adm_password=htmlspecialchars($_POST['adm_password']);

  if(empty($adm_uid))
	{
	  $errorArr[]="Please enter User Id";		
	}
	
	  if(empty($adm_uid))
	{
	  $errorArr[]="Please enter Password";		
	}

$stmt = $conn->prepare("SELECT adm_id,adm_uid,adm_password,adm_type FROM tbl_admin WHERE adm_uid=:adm_uid AND adm_password=:adm_password AND adm_status='1'"); 
$stmt->bindParam("adm_uid", $adm_uid,PDO::PARAM_STR);
$stmt->bindParam("adm_password", $adm_password,PDO::PARAM_STR);

$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_OBJ);

$count=$stmt->rowCount();

 if($count==1)
 {
	$_SESSION['ADM_TYPE']=$data->adm_type;
	$_SESSION['ADM_ID']=$data->adm_id;
	
 echo "<script>window.location.href='myaccount.php'</script>";	
 } else
 {
	if($adm_uid!='' || $adm_password!='')
	{
 $errorArr[]="Please enter valid user id or password";	
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

     <title><?=SITE_NAME;?> Admin | Login</title>
  
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b><?=SITE_NAME;?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <p class="login-box-msg">Sign in to start your session</p>
     
	 <?php 
	  foreach($errorArr as $errorlist)
	  { ?>
	  <div class="alert alert-danger"><?php echo $errorlist;
	  echo "<br>"; ?></div>
	 <?php } ?>
	 
    <form action="" method="POST" class="form-element">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="User" name="adm_uid">
        <span class="ion ion-email form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="adm_password">
        <span class="ion ion-locked form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="checkbox">
            <input type="checkbox" id="basic_checkbox_1" >
			<label for="basic_checkbox_1">Remember Me</label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-6">
         <div class="fog-pwd">
          	<a href="forgot_password.php"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-success btn-block btn-flat margin-top-10" name="login_submit">SIGN IN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
