<?php include('common/config.php');
$errorArr = [];
if(isset($_POST['register']))
{
$u_fname=$_POST['u_fname'];
$u_lname=$_POST['u_lname'];
$u_refferral=$_POST['u_refferral'];
$u_phone=$_POST['u_phone'];
$u_email=$_POST['u_email'];
$u_password=$_POST['u_password'];
$u_country=$_POST['u_country'];
$u_state_city=$_POST['u_state_city'];
$u_street_house=$_POST['u_street_house'];
$u_postalcode=$_POST['u_postalcode'];
$u_company=$_POST['u_company'];
$u_ccode=$_POST['u_ccode'];
$vat_type=$_POST['vat_type'];
$vat_number=$_POST['vat_number'];
$u_status='0';

$_SESSION['U_EMAIL']=$u_email;
$stmt=$conn->prepare("insert into tbl_users(u_fname,u_lname,u_refferral,u_phone,u_email,u_password,u_country,u_state_city,u_street_house,u_postalcode,u_company,u_ccode,vat_type,vat_number,u_status)values(:u_fname,:u_lname,:u_refferral,:u_phone,:u_email,:u_password,:u_country,:u_state_city,:u_street_house,:u_postalcode,:u_company,:u_ccode,:vat_type,:vat_number,:u_status)");



$stmt->bindParam(':u_fname',$u_fname, PDO::PARAM_STR);
$stmt->bindParam(':u_lname',$u_lname, PDO::PARAM_STR);
$stmt->bindParam(':u_refferral',$u_refferral, PDO::PARAM_STR);
$stmt->bindParam(':u_phone',$u_phone, PDO::PARAM_STR);
$stmt->bindParam(':u_email',$u_email, PDO::PARAM_STR);
$stmt->bindParam(':u_password',$u_password, PDO::PARAM_STR);
$stmt->bindParam(':u_country',$u_country, PDO::PARAM_STR);
$stmt->bindParam(':u_state_city',$u_state_city, PDO::PARAM_STR);
$stmt->bindParam(':u_street_house',$u_street_house, PDO::PARAM_STR);
$stmt->bindParam(':u_postalcode',$u_postalcode, PDO::PARAM_STR);
$stmt->bindParam(':u_company',$u_company, PDO::PARAM_STR);
$stmt->bindParam(':u_ccode',$u_ccode, PDO::PARAM_STR);
$stmt->bindParam(':vat_type',$vat_type, PDO::PARAM_STR);
$stmt->bindParam(':vat_number',$vat_number, PDO::PARAM_STR);
$stmt->bindParam(':u_status',$u_status, PDO::PARAM_STR);




$mail_exist=$conn->prepare("select * from tbl_users where u_email='$u_email'");
$mail_exist->execute();
$count=$mail_exist->rowCount();
if($count == 1)
{
echo "<script>window.alert('Email already exist!!') </script>";
echo "<script>window.location.href='register.php' </script>";
} else
{
$result=$stmt->execute();
$LastUserId=$conn->prepare("select * from tbl_users where u_email='$u_email'");
$LastUserId->execute();
$rowUserId=$LastUserId->fetch(PDO::FETCH_OBJ);
$uid=$rowUserId->u_id;
}


if($result)
{

$to =$u_email;
$subject = "Registration Confirmation";
$message = '
<html>

	<head>

		<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Register</title>

	</head>

	<body style="background: #f1f1f1; margin: 0; font-family: Helvetica, Arial, Verdana, sans-serif;">
		<div style="background-color: #ffffff; overflow: auto;">
			<div style="max-width: 680px; width: 100%; margin: auto;">
				<div style="padding: 10px;">
					<div style="float: left;">
						<img src="https://carsloter.eu/images/logo.png" style="max-width: 100%;">
					</div>
					<div style="display: flex; float: right;">
						<div>
							<img alt="" src="https://carsloter.eu/img/unnamed.gif" style="float: left; width: 36px; height: 54px;">
							<div style="margin-left: 50px; margin-top: 5px;	line-height: 1.2; font-family: Helvetica,Arial,Verdana,sans-serif;">
								<div style="color: rgb(45, 55, 64);	font-size: 14px; font-weight: bold;">
									CarSloter Support
								</div>
								<a style="color: rgb(240, 134, 25) !important; font-size: 20px;">
									info@carsloter.eu
								</a>
							</div>
						</div>
					</div>
				</div>			
			</div>		
		</div>	
		<div style="background-color: #01948c;">
			<div style="max-width: 680px; margin: auto;">
				<div style="font-size: 21px; color: rgb(255, 255, 255);	line-height: 1.3; font-family: Helvetica, Arial, Verdana, sans-serif;
			padding: 12px 15px;">
					Your exclusive access
				</div>
			</div>
		</div>
		<div style="margin-top: 15px;">
			<div style="background-color: #ffffff; max-width: 600px; margin: auto; padding: 30px;">
				<div style="font-size: 21px; color: rgb(51, 63, 73); line-height: 1.3; font-weight: bold;">
					Hello '.$userfname.' '.$userlname.',
				</div>			
				<div style="font-size: 14px; line-height: 1.3; margin: 20px 0;">
					Thank you for registering at carsloter.eu.<br><br>You now have access to our exclusive carsloter.eu. Login now and find the item that best fit your preferences.
				</div>
				<div>
					<div style="margin: 10px auto; border: solid 2px rgb(240, 134, 25); max-width: 345px; padding: 15px;">
						<div style="font-size: 19px; color: rgb(240, 134, 25); font-weight: bold; text-align: center; padding: 20px 0">
							Your personal login access
						</div>
						<div style=" overflow: auto; padding-bottom: 20px;">
							<div style="font-size: 15px; color: rgb(51, 63, 73); font-weight: bold; width: 50%; float: left;">
								<div style="padding: 5px;">
									Email:
								</div>
								<div style="padding: 5px;">
									Password:
								</div>
							</div>
							<div style="font-size: 15px; width: 50%; float: left;">
								<div style="padding: 5px;">
									<a href="$u_email" target="_blank" style="color: rgb(17, 85, 204);">'.$u_email.'</a>
								</div>
								<div style="padding: 5px;">
									<a href="$u_email" target="_blank" style="color: rgb(17, 85, 204);">'.$u_password.'</a>
								</div>
							</div>
						</div>
						<div style="background: rgb(240, 134, 25); text-align: center; padding: 12px; max-width: 240px; margin: auto;">
							<a href="https://www.carsloter.eu/verifyUser.php?uid='.$uid.'" style="color: rgb(255, 255, 255); font-size: 16px; font-family: Helvetica,Arial,Verdana,sans-serif; font-weight: bold; line-height: 18px; text-decoration: none;">Verify now</a>
						</div>
					</div>
					<div style="display: flex;">
						<div style="margin: auto;">
							<div style="padding: 10px;">
								<img src="https://www.carsloter.eu/img/unnamed.png" alt="-" class="float-left mt-1 mr-2" width="20">
								<span class="status-title" style="font-size: 15px; color: rgb(51, 63, 73); font-weight: bold;vertical-align: top;">
									Over 20 000 items
								</span>
							</div>
							<div style="padding: 10px;">
								<img src="https://www.carsloter.eu/img/unnamed.png" alt="-" class="float-left mt-1 mr-2" width="20">
								<span class="status-title" style="font-size: 15px; color: rgb(51, 63, 73); font-weight: bold;vertical-align: top;">
									Over 3 000 new items daily
								</span>
							</div>
							<div style="padding: 10px;">
								<img src="https://www.carsloter.eu/img/unnamed.png" alt="-" class="float-left mt-1 mr-2" width="20">
								<span class="status-title" style="font-size: 15px; color: rgb(51, 63, 73); font-weight: bold;vertical-align: top;">
									100% free of charge
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>	
		<div style="margin-top: 15px;">
			<div style="background-color: #ffffff; max-width: 600px; margin: auto; padding: 30px;">
				<div style="font-size: 21px; color: rgb(51, 63, 73); line-height: 1.3; font-weight: bold;">
					About our service
				</div>	
				<div style="overflow: auto; margin-top: 15px;">
					<div style="max-width: 280px; float: left;">
						<ul style="padding-left: 10px; font-size: 14px; line-height: 1.3; color: rgb(51, 63, 73); margin: 0;">
							<li style="margin-left: 15px;">Simple and direct purchase from carsloter.eu</li>
							<li style="margin-left: 15px;">Exclusive access to over 20&nbsp;000 inspected items</li>
							<li style="margin-left: 15px;">3&nbsp;000 new items daily</li>
							<li style="margin-left: 15px;">No hidden fees</li>
							<li style="margin-left: 15px;">No minimum purchase amount</li>
						</ul>
					</div>
					<div style="max-width: 280px; float: left;">
						<ul style="padding-left: 10px; font-size: 14px; line-height: 1.3; color: rgb(51, 63, 73); margin: 0;">
							<li style="margin-left: 15px;">24/7 online access</li>
							<li style="margin-left: 15px;">Reliable documentation of the item condition</li>
							<li style="margin-left: 15px;">TÜV-certified purchase process from private sellers</li>
							<li style="margin-left: 15px;">Personal assistance for every purchase Mon-Sat</li>
							<li style="margin-left: 15px;">Competitive pick-up and transport service rates</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 15px;">
			<div style="background-color: #ffffff; max-width: 600px; margin: auto; padding: 30px;">
				<div style="font-size: 21px; color: rgb(51, 63, 73); line-height: 1.3; font-weight: bold;">
					Frequently Asked Questions
				</div>	
				<div style="margin-top: 20px;">
					<div style="font-size: 16px; color: rgb(51, 63, 73); line-height: 1.3; font-weight: bold;">
						1. Where do the items come from?
					</div>	
					<br>
					<div style="font-size: 14px; line-height: 1.3; color: rgb(51, 63, 73);">
						All of the items sold at auction come from leasing companies, customs, IRS, fiscal agencies, fleet agencies, pawnshops, bank seizures. The suppliers ship the items to our Hub once someone won the auction and paid for it. We are an online auctions platform, we are not a dealership.
					</div>
				</div>
				<div style="margin-top: 20px;">
					<div style="font-size: 16px; color: rgb(51, 63, 73); line-height: 1.3; font-weight: bold;">
						2. Where is the item located?
					</div>	
					<br>
					<div style="font-size: 14px; line-height: 1.3; color: rgb(51, 63, 73);">
						All the items will stay in the supplier\'s custody. Once are shipped to our Hub then you can come and pick it up or we can ship it anywhere in the country.
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 15px; text-align: center;">
			<div style="background-color: #ffffff; max-width: 630px; margin: auto; padding: 15px;">
				<div style="font-size: 14px; line-height: 1.3; color: rgb(240, 134, 25); font-weight: bold;">
					Questions? Support: info@carsloter.eu
				</div>
			</div>
			<div style="font-family: Helvetica,Arial,Verdana,sans-serif; font-size: 11px; color: rgb(112, 118, 124); margin: 15px;">
				Copyright @ 2020 carsloter. All rights reserved
			</div>
		</div>
	</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//$headers .= "CC: Carolgreen281@gmail.com\r\n";
// More headers
$headers .= 'From: CarSloter <register@carsloter.eu>' . "\r\n";
///$headers .= 'Cc: Carolgreen281@gmail.com' . "\r\n";
$a=mail($to,$subject,$message,$headers,'register@carsloter.eu');
if($a)
{
$to2 ='Carolgreen281@gmail.com';
$subject2 = "New User: $u_fname $u_lname, $u_email";
$message2 = "
Email : $u_email <br/>
Password: $u_password <br/>
Code: $u_refferral <br/>
";
// Always set content-type when sending HTML email
$headers2 = "MIME-Version: 1.0" . "\r\n";
$headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//$headers2 .= "CC: Carolgreen281@gmail.com\r\n";
// More headers
$headers2 .= 'From: Register <register@carsloter.eu>' . "\r\n";
///$headers2 .= 'Cc: Carolgreen281@gmail.com' . "\r\n";
mail($to2,$subject2,$message2,$headers2,'-fregister@carsloter.eu');    

}
}
echo "<script>window.location.href='register-user.php' </script>";

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
<title>Create account | carsloter</title>
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

<h3 class="main-title text-center"> Register </h3>
<div style="margin: 21px;">


<?php
if(isset($_SESSION['SUCC_MSG']) && $_SESSION['SUCC_MSG']!='') {
?>
<div class="alert alert-success">
  <strong><i class="fa fa-check"></i> Succeeded</strong> <br>
  <p>An email has been sent to <?php echo $_SESSION['U_EMAIL']; ?> use the link in the email to access My 2nd Hand</p>
</div>

<?php } 
unset($_SESSION['SUCC_MSG']);
?>

<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
<div class="form-group">
<label class="control-label col-sm-3" for="name">Name <span style="color:red;">*</span></label>
<div class="col-sm-5">
<input type="text" class="form-control"  placeholder="Enter First Name" name="u_fname" required>
</div>

<div class="col-sm-4">
<input type="text" class="form-control" placeholder="Enter Last Name" name="u_lname" required>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" for="code">Referral Code <span style="color:red;">*</span></label>
<div class="col-sm-9">          
<input type="text" class="form-control" placeholder="Item # of product (Promo Code)" name="u_refferral" required>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" for="phone">Phone Number <span style="color:red;">*</span></label>
<div class="col-sm-9">          
<input type="text" class="form-control" placeholder="Enter Phone Number" name="u_phone" required>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" for="email">Email Address <span style="color:red;">*</span></label>
<div class="col-sm-9">          
<input type="email" class="form-control" placeholder="Enter Email" name="u_email" required>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" for="password">Password <span style="color:red;">*</span></label>
<div class="col-sm-9">          
<input type="password" class="form-control" placeholder="Enter Password" name="u_password" required>
</div>
</div>



<div class="form-group">
<label class="control-label col-sm-3" for="email">&nbsp;</label>
<div class="col-sm-9 col-xs-12">
<div class="input-group">
<ul class="nav nav-pills">
<li class="active margin-gaurv1">

<button type="button" class="btn btn-info" id="hide">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Individual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
</li>




<li class="" style="background-color:#fff;">
<button type="button" class="btn btn-default" id="show">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Legal entity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
</li>
</ul>
</div>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" for="country">Country <span style="color:red;">*</span></label>
<div class="col-sm-9">          
<input type="text" class="form-control" placeholder="Enter Country" name="u_country" required>
</div>
</div>		


<div class="form-group">
<label class="control-label col-sm-3" for="state">State / City <span style="color:red;">*</span></label>
<div class="col-sm-9">          
<input type="text" class="form-control" placeholder="Enter State / City" name="u_state_city" required>
</div>
</div>		

<div class="form-group">
<label class="control-label col-sm-3" for="strret">Street Address <span style="color:red;">*</span></label>
<div class="col-sm-9">          
<input type="text" class="form-control" placeholder="Enter Street / House Number" name="u_street_house" required>
</div>
</div>	


<div class="form-group">
<label class="control-label col-sm-3" for="postal_code">Postal Code <span style="color:red;">*</span></label>
<div class="col-sm-9">          
<input type="text" class="form-control" placeholder="Enter Postal Code" name="u_postalcode" required>
</div>
</div>		


<div id="demo1" style="display:none;">
<div class="form-group">
<label class="control-label col-sm-3" for="postal_code">Company Name:</label>
<div class="col-sm-9">          
<input type="text" class="form-control" placeholder="Enter Company Name" name="u_company">
</div>
</div>		

<div class="form-group">
<label class="control-label col-sm-3" for="postal_code">Company Code:</label>
<div class="col-sm-9">          
<input type="text" class="form-control" placeholder="Enter Company Code" name="u_ccode">
</div>
</div>		

<div class="form-group">
<label class="control-label col-sm-3" for="postal_code">VAT (if available):</label>
<div class="col-sm-5">   
<select class="form-control" name="vat_type">
<option value="">--Select Type--</option>
<option value="EU">EU</option>
<option value="Non-EU">Non-EU</option>
</select>			
</div>
<div class="col-sm-4">          
<input type="text" class="form-control" placeholder="Number:" name="vat_number">
</div>
</div>	
</div>



<div class="form-group">        
<div class="col-sm-offset-2 col-sm-10">
<div class="checkbox margin-gaurv">
<label> Each bid at auction is a legal obligation for making a deal</label>
</div>
<div class="checkbox margin-gaurv">
<label>I read <a href="page.php?url=terms" >General Terms and Conditions</a></label>
</div>
</div>
</div>
<div class="form-group">        
<div class="col-sm-offset-3 col-sm-9">
<button type="submit" class="btn btn-block btn-success" name="register"> Register Now</button>
</div>
</div>
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

<script>
$(document).ready(function(){
$("#hide").click(function(){
$("#demo1").hide();
});
$("#show").click(function(){
$("#demo1").show();
});
});
</script>
</body>
</html>
