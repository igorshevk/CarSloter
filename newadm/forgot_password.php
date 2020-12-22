<?php include("common/gaurav.library.php"); 
$successArr = [];
$errorArr = [];
if(isset($_POST['forgot_submit']))
{
$adm_email=htmlspecialchars($_POST['adm_email']);

  if(empty($adm_email))
	{
	  $errorArr[]="Please enter Email Id";		
	}
	
$stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE adm_email=:adm_email"); 
$stmt->bindParam("adm_email", $adm_email,PDO::PARAM_STR);
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_OBJ);

$count=$stmt->rowCount();

 if($count==1)
 {
        
        $to =$adm_email;
        $subject = 'Forgot Password';
		$name=$data->adm_name;
		$password=$data->adm_password;
		
		$message ="Dear $name your password is $password";
		$headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
           // More headers
        $headers .= 'From: <info@example.com>' . "\r\n";
          //$headers .= 'Cc: gaurav@gmail.com' . "\r\n";
        mail($to,$subject,$message,$headers);
 
  $successArr[]="Please check your Email";	
 } else if(!empty($adm_email))
 {	
 $errorArr[]="Your Email Id does not exist.";		
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

     <title><?=SITE_NAME;?> | Forgot Password</title>
  
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
	  <?php foreach($successArr as $successlist)
			  { ?>
			  <div class="alert alert-success"><?php echo $successlist;
			  echo "<br>"; ?></div>
			  <?php } ?> 
    <form action="" method="POST" class="form-element">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email Id" name="adm_email">
        <span class="ion ion-email form-control-feedback"></span>
      </div>
      
      <div class="row">
	  
	   <div class="col-12 text-center">
          <button type="submit" class="btn btn-success btn-block btn-flat margin-top-10" name="forgot_submit">Submit</button>
        </div> <br><br>
        <div class="col-8">
         &nbsp;
        </div>
        <!-- /.col -->
        <div class="col-4">
         <div class="fog-pwd">
          	<a href="login.php"><i class="ion ion-locked"></i> Login?</a><br>
          </div>
        </div>
        <!-- /.col -->
       
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
