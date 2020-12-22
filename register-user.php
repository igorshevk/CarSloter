<?php include('common/config.php');

$errorArr = [];

// if(isset($_SESSION['U_EMAIL']) && $_SESSION['U_EMAIL']!='') {



// } else

// {

// 	echo "<script>window.location.href='index.php' </script>"; 

// }

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

<title>Online used car auction website | CARSLOTER</title>

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

<div style="margin: 21px;">

<div class="alert alert-success">

  <strong><i class="fa fa-check-circle"></i> Account successfully created ! </strong> 

</div>

<br>

 <h2>Check your email</h2> 

 <br>

  <p>An email has been sent to <b> <?php echo $_SESSION['U_EMAIL']; ?> </b> Use the link in the email to access your Car Premier account.</p>

  <p> <b>Didn't get the email?</b> Please check your junk folder or <b>SPAM</b> folder.</p>
<br>


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

