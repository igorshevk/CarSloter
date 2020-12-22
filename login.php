<?php include('common/config.php');
$errorArr = [];
if(isset($_POST['login_submit']))
{
$u_email=$_POST['u_email'];
$u_password=$_POST['u_password'];

$stmt=$conn->prepare("select * from tbl_users where u_email=:u_email AND u_password=:u_password AND u_status=1");
$stmt->bindParam(':u_email',$u_email, PDO::PARAM_STR);
$stmt->bindParam(':u_password',$u_password, PDO::PARAM_STR);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_OBJ);
$count=$stmt->rowCount();
if($count==1)
{
$_SESSION['USER']=$row->u_id;

echo "<script>window.location.href='myaccount.php' </script>";
} else
{
	$_SESSION['ERR_MSG']='Please enter valid userid or password';
///echo "<script>window.alert('Please enter valid userid or password') </script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="description" content="">
<meta name="author" content="ScriptsBundle">
<title>Log in | CARSLOTER</title>
<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/style.css">
<!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
<link href="css/flaticon.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
<!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/home-menu.css" type="text/css">
<!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/animate.min.css" type="text/css">
<!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
<link href="css/select2.min.css" rel="stylesheet" />
<!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
<link href="css/nouislider.min.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
<link href="css/slider.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
<!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
<link href="skins/minimal/minimal.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= PrettyPhoto =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/jquery.fancybox.min.css" type="text/css" media="screen"/>
<!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
<link href="css/responsive-media.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
<link rel="stylesheet" id="color" href="css/colors/defualt.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CSource+Sans+Pro:400,400i,600" rel="stylesheet">
<!-- JavaScripts -->
<script src="js/modernizr.js"></script>
</head>
<body>
<!-- =-=-=-=-=-=-=  Header =-=-=-=-=-=-= -->
<?php include('common/header.php'); ?>

<div class="clearfix"></div>
<!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix ">
<!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
<section class="section-padding no-top gray padding-top-20">
<!-- Main Container -->
<div class="container">
<!-- Row -->
<div class="back-links">
<div class="justify-content-between  row">
<div class="col-md-6"> <span class="fa fa-chevron-left"></span> <a class="link uitest-navigation-back" onclick="window.history.back()">Back to results</a></div>
<div class="align-right col-md-6"></div>
</div>
</div>
<div class="row">
<!-- Middle Content Area -->
<div class="col-md-2 col-xs-12 col-sm-12"> </div>

<div class="col-md-8 col-xs-12 col-sm-12">

<!-- Single Ad -->

<div class="singlepage-detail ">
<!-- Listing Slider  -->


<div class="show-car-details">
<div class="list-style-1 margin-top-20">
<div class="panel with-nav-tabs panel-default">

<div class="panel-body">
<div class="tab-content">
<div class="tab-pane in active fade" id="tab3default">
<div class=" specification">

<h3 class="main-title text-left"> Login </h3>
<div style="margin: 21px;">
<?php
if(isset($_SESSION['ERR_MSG']) && $_SESSION['ERR_MSG']!='') {
?>
<div class="alert alert-danger">
  <strong><i class="fa fa-exclamation-triangle"></i> Something went wrong</strong> 
  <p>The email address or email is invalid</p>
</div>

<?php } 
unset($_SESSION['ERR_MSG']);
?>


<?php
if(isset($_SESSION['VERIFY_MSG']) && $_SESSION['VERIFY_MSG']!='') {
?>
<div class="alert alert-success">
  <strong><i class="fa fa-check"></i> Your account was successfully confirmed !</strong> 
</div>

<?php } 
unset($_SESSION['VERIFY_MSG']);
?>

<form method="post" action="">
<div class="form-group">
<label for="email">Email address:</label>
<input type="email" class="form-control" name="u_email">
</div>
<div class="form-group">
<label for="pwd">Password:</label>
<input type="password" class="form-control" name="u_password">
</div>

<button type="submit" class="btn btn-success" name="login_submit">Submit</button>
<br><br>
<p class="lost_password">
<a href="forgot_password.php">Lost your password?</a>
<a href="register.php" style="float: right;">Create new account</a>
</p>

</form>
</div>

</div>
</div>


</div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
<!-- Single Ad End -->

</div>


<div class="col-md-2 col-xs-12 col-sm-12"> </div>
<!-- Right Sidebar -->

<!-- Middle Content Area  End -->
</div>
<!-- Row End -->
</div>
<!-- Main Container End -->


</section>


<!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
<?php include('common/footer.php'); ?>

<!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap Core Css  -->
<script src="js/bootstrap.min.js"></script>
<!-- Jquery Easing -->
<script src="js/easing.js"></script>
<!-- Menu Hover  -->
<script src="js/carspot-menu.js"></script>
<!-- Jquery Appear Plugin -->
<script src="js/jquery.appear.min.js"></script>
<!-- Numbers Animation   -->
<script src="js/jquery.countTo.js"></script>
<!-- Jquery Select Options  -->
<script src="js/select2.min.js"></script>
<!-- noUiSlider -->
<script src="js/nouislider.all.min.js"></script>
<!-- Carousel Slider  -->
<script src="js/carousel.min.js"></script>
<script src="js/slide.js"></script>
<!-- Image Loaded  -->
<script src="js/imagesloaded.js"></script>
<script src="js/isotope.min.js"></script>
<!-- CheckBoxes  -->
<script src="js/icheck.min.js"></script>
<!-- Jquery Migration  -->
<script src="js/jquery-migrate.min.js"></script>
<!-- Style Switcher -->
<script src="js/color-switcher.js"></script>
<!-- PrettyPhoto -->
<script src="js/jquery.fancybox.min.js"></script>
<!-- Wow Animation -->
<script src="js/wow.js"></script>
<!-- Template Core JS -->
<script src="js/custom.js"></script>
</body>
</html>
