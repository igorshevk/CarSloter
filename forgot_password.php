<?php include('common/config.php');
$errorArr = [];
if(isset($_POST['login_submit']))
{
$u_email=$_POST['u_email'];

$stmt=$conn->prepare("select * from tbl_users where u_email=:u_email");

$stmt->bindParam(':u_email',$u_email, PDO::PARAM_STR);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_OBJ);
$password=$row->u_password;
$count=$stmt->rowCount();
if($count==1)
{
	
$to ="$u_email";
$subject = "Forgot Password";

$message = "Dear your Passwords is $password". '   <a href="http://roger.gkssoftware.com/login.php">Login Now</a>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <no-reply@carsloter.eu>' . "\r\n";
//$headers .= 'Cc: carolgreen281@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
///echo "<script>window.alert('Passwords send on your email id. Please Check!!! ') </script>";
$_SESSION['SUCC_MSG']='Passwords send on your email id. Please Check.';
///echo "<script>window.location.href='login.php' </script>";

} else
{
///echo "<script>window.alert('Please enter valid Email Id') </script>";
$_SESSION['ERR_MSG']='Please enter valid Email Id';
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
<title>Online used car auction website | ADESA</title>
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

<h3 class="main-title text-left"> Forgot Password </h3>
<div style="margin: 21px;">
<?php
if(isset($_SESSION['ERR_MSG']) && $_SESSION['ERR_MSG']!='') {
?>
<div class="alert alert-danger">
  <strong><i class="fa fa-exclamation-triangle"></i> Please enter valid Email Id</strong> 
</div>

<?php } 
unset($_SESSION['ERR_MSG']);
?>


<?php
if(isset($_SESSION['SUCC_MSG']) && $_SESSION['SUCC_MSG']!='') {
?>
<div class="alert alert-success">
  <strong><i class="fa fa-check"></i> Passwords send on your email id. Please Check.</strong> 
</div>

<?php } 
unset($_SESSION['SUCC_MSG']);
?>

<form method="post" action="">
<div class="form-group">
<label for="email">Email address:</label>
<input type="email" class="form-control" name="u_email">
</div>


<button type="submit" class="btn btn-success" name="login_submit">Submit</button>
<br><br>
<p class="lost_password">
<a href="login.php">Login?</a>
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
