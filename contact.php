<?php include('common/config.php');

require_once('newadm/Mailer/PHPMailerAutoload.php');

if(isset($_POST['enq_submit']))
{
$enq_name=$_POST['enq_name'];
$enq_mobile=$_POST['enq_mobile'];
$enq_email=$_POST['enq_email'];
$enq_subject=$_POST['enq_subject'];
$enq_message=$_POST['enq_message'];

$stmt=$conn->prepare("insert into tbl_enquiry(enq_name,enq_mobile,enq_email,enq_subject,enq_message)values('$enq_name','$enq_mobile','$enq_email','$enq_subject','$enq_message')");
$bc=$stmt->execute();
if($bc) {
$to ='Carolgreen281@gmail.com';
$subject = "Enquiry details";
$message = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>

<body>
<p>Name: <b>$enq_name</b></p>
<p>Mobile No: <b>$enq_mobile</b></p>
<p>Email Id: <b>$enq_email</b></p>
<p>Subject: <b>$enq_subject</b></p>
<p>Message: <b>$enq_message</b></p>
</body>

</html>
";

$mail = new PHPMailer;
$mail->setFrom('mailbox@CarSloter.eu','From: Enquiry <contact@CarSloter.com>');
///$mail->addAddress('info@stumania.com', $name);
$mail->addAddress($to , 'Car Premier');
///$mail->addCC('invoice@CarSloter.eu');
///$mail->addReplyTo('invoice@CarSloter.eu', 'Car Premier');
$mail->Subject  = $subject;
$mail->Body = $message;
$mail->IsHTML(true); 
if(!$mail->send()) {
  $_SESSION['ENQ_MSG']='Your Message has been sent.';
}else{
/// echo "mail sent";
}

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
<title>CarSloter offices | company details</title>
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

<style>
.right-arrow
{
margin-right: 20px;
}	


</style>

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

<?php

if (isset($_SESSION['USER']) && $_SESSION['USER']!='') { 
$uid=$_SESSION['USER'];
$checkUserId=$conn->prepare("select * from tbl_users WHERE u_id='$uid'");
$checkUserId->execute();
$rowUserId=$checkUserId->fetch(PDO::FETCH_OBJ);
$getIdProof=$rowUserId->u_document;
if($getIdProof=='')
{
?>
<div class="accunt-auction-messages">
<div class="row">
<div class="col-md-12">
<p><i class="fa fa-info-circle p-r-2"></i>Your account is still limited to a maximum number of auctions.<a href="idupload.php" style="text-decoration:underline;">Upload your documents</a> to get full access.</p>
</div>
</div>
</div>
<?php } } ?>


<div class="row">
<div class="col-md-12 col-xs-12 col-sm-12">
<h3>GET IN TOUCH</h3>
<p>For anything from business inquiries about our services to general questions about CarSloter, please choose the desired contact options.</p>

</div>
</div>
<div class="row">
<!-- Middle Content Area -->

<div class="col-md-8 col-xs-12 col-sm-12">

<div class="singlepage-detail">
<!-- Listing Slider  -->
<div class="show-car-details">
<div class="list-style-1 margin-top-20">
<div class="panel with-nav-tabs panel-default">

<div class="panel-body">
<div class="tab-content">
<div class="tab-pane in active fade" id="tab3default">
<div class=" specification">

<div style="margin: 21px;">
<?php
if(isset($_SESSION['ENQ_MSG']) && $_SESSION['ENQ_MSG']!='')
{	
?>	
<div class="alert alert-success">
<strong><i class="fa fa-check-circle"></i> Your Message has been sent.</strong> 
</div>
<?php } 
unset($_SESSION['ENQ_MSG']);
?>
<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

<div class="form-group">
<div class="col-sm-12">
<input type="text" class="form-control"  placeholder="Enter Name" name="enq_name" required style="    border: 1px solid #dedbdb;border-radius: 0px;background: #f2f2f2;">
</div>
</div>

<div class="form-group">
<div class="col-sm-12">
<input type="text" class="form-control"  placeholder="Enter Mobile No." name="enq_mobile" required style="border: 1px solid #dedbdb;border-radius: 0px;background: #f2f2f2;">
</div>
</div>

<div class="form-group">
<div class="col-sm-12">
<input type="text" class="form-control"  placeholder="Enter Email Id" name="enq_email" required style="border: 1px solid #dedbdb;border-radius: 0px;background: #f2f2f2;">
</div>
</div>


<div class="form-group">
<div class="col-sm-12">
<input type="text" class="form-control"  placeholder="Enter Subject" name="enq_subject" required style="    border: 1px solid #dedbdb; border-radius: 0px;background: #f2f2f2;">
</div>
</div>



<div class="form-group">
<div class="col-sm-12">
<textarea class="form-control"  placeholder="Enter Message" name="enq_message" rows="5" style="border: 1px solid #dedbdb; border-radius: 0px; background: #f2f2f2;"></textarea>	
</div>
</div>

<div class="form-group">        
<div class="col-sm-offset-3 col-sm-9">
<button type="submit" class="btn btn-warning" name="enq_submit"> Submit</button>
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


<div class="col-md-4 col-xs-12 col-sm-12">

<div class="sectionBlock" style="margin-top: 18px;">        
<div class="sectionContent">

<div class="panel-group" id="accordion">	


</h4>
</div>
<div id="1" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">



<div class="row justify-content-sm-center justify-content-xs-center">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Address</span><br>
<br>
<span class="panel-bold">
<strong>Lange Dreef 11/M<br>
4131NJ Vianen<br>
Netherlands<br>
<br>
<br>
<br>
</span>
General / Contact: support@CarSloter.eu<br>
Email: info@CarSloter.eu<br>
VAT: BE0867129221<br>
<a href="https://www.google.com/maps/place/ADESA+Deutschland+GmbH/@49.4046435,11.7625647,17z/data=!3m1!4b1!4m5!3m4!1s0x479f810b7b2bbb6d:0xadaa95fd2264074e!8m2!3d49.40464!4d11.7647535" target="_blank"><span style="text-decoration: underline; color: #008c95;"></span></a><br>
</strong>
<br>
<br>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Opening Hours</span><br>
<br>
<table>
<tbody>
<tr>
<th colspan="2" style="text-align: left;"><strong>Office</strong></th>
</tr>
<tr>
<th><strong>Mon:</strong></th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th><strong>Tue:</strong></th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th><strong>Wed:</strong></th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th><strong>Thu:</strong></th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th><strong>Fri:<br>
</strong>
<br>
</th>
<td>8:00 - 18:00<br>
<br>
</td>
</tr>
<tr>
<th colspan="2" style="text-align: left;"><strong>Pickup Genk</strong></th>
</tr>
<tr>
<th><strong>Mon:</strong></th>
<td>7:30 - 17:00</td>
</tr>
<tr>
<th><strong>Tue:</strong></th>
<td>7:30 - 17:00</td>
</tr>
<tr>
<th><strong>Wed:</strong></th>
<td>7:30 - 17:00</td>
</tr>
<tr>
<th><strong>Thu:</strong></th>
<td>7:30 - 17:00</td>
</tr>
<tr>
<th><strong>Fri:</strong></th>
<td>7:30 - 17:00</td>
</tr>
</tbody>
</table>
<br>
<br>
<br>
</div>
</div>
<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Bank details</span><br>
<br>
<strong>BNP Paribas Fortis&nbsp;<br>
</strong>IBAN: BE85 0014 3657 0606<br>
BIC / SWIFT: GEBABEBB<br>
<br>
<strong>ING&nbsp;</strong><br>
IBAN: BE41 3631 2691 1810<br>
BIC&nbsp;/ Swift: BBRUBEBBXXX<br>
<br>
<strong>Bank account Poland:&nbsp;<br>
</strong>BGZ BNP PARIBAS S.A.&nbsp;<br>
IBAN: PL77 1600 1462 1831 2793 6000 0004<br>
BIC / SWIFT: PPABPLPKXXX<br>
<br>
<strong>Bank account Bulgaria:&nbsp;<br>
</strong>BNP PARIBAS S.A.-SOFIA<br>
IBAN: BG10 BNPA 9440 1420 0815 10<br>
BIC / SWIFT: BNPABGSXXXX<br>
<br>
<strong>Bank account Hungary:&nbsp;<br>
</strong>BNP-Paribas Magyarországi fióktelepe<br>
IBAN: HU72 1310 0007 0251 1600 0033 9783<br>
BIC / SWIFT: BNPAHUHX<br>
<br>
<strong>Bank account Portugal:&nbsp;<br>
</strong>BNP PARIBAS PORTUGAL - LISBON<br>
IBAN: PT50 0034 0109 0105 5750 10377<br>
BIC / SWIFT: BNPAPTPLXXX<br>
<br>
</div>
</div> -->
</div>



</div>
</div>
</div>
</div>


</h4>
</div>
<div id="2" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">


<div class="row justify-content-sm-center justify-content-xs-center">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Address</span><br>
<br>
<strong>Meendijkstraat<br>
3300 Tienen<br>
Belgium<br>
<br>
<a href="https://www.google.com/maps/place/ADESA+Europe+NV/@50.8067203,4.9136746,17z/data=!3m1!4b1!4m5!3m4!1s0x47c16c1828179721:0xa7b33a0ff4641ac1!8m2!3d50.8067203!4d4.9158633" target="_blank"><span style="text-decoration: underline; color: #008c95;"></span></a></strong><br>
<br>

General / Seller contact:&nbsp; support@CarSloter.eu<br>
Email: info@CarSloter.eu<br>
VAT: BE0895976428<br>
<br>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Opening Hours</span><br>
<br>
<table>
<tbody>
<tr>
<th colspan="2" style="text-align: left;"><strong>Office</strong></th>
</tr>
<tr>
<th><strong>Mon:</strong></th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th><strong>Tue:</strong></th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th><strong>Wed:</strong></th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th><strong>Thu:</strong></th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th><strong>Fri:<br>
</strong>
<br>
</th>
<td>8:00 - 18:00<br>
<br>
</td>
</tr>
<tr>
<th colspan="2" style="text-align: left;"><strong>Pickup Genk:</strong></th>
</tr>
<tr>
<th><strong>Mon:</strong></th>
<td>7:30 - 17:00</td>
</tr>
<tr>
<th><strong>Tue:</strong></th>
<td>7:30 - 17:00</td>
</tr>
<tr>
<th><strong>Wed:</strong></th>
<td>7:30 - 17:00</td>
</tr>
<tr>
<th><strong>Thu:</strong></th>
<td>7:30 - 17:00</td>
</tr>
<tr>
<th><strong>Fri:</strong></th>
<td>7:30 - 17:00</td>
</tr>
</tbody>
</table>
<br>
<br>
</div>
</div>
<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Bank details</span><br>
<br>
<strong>BNP Paribas Fortis<br>
</strong>
<bnp>
IBAN: BE77 0015 4566 0442<br>
BIC / SWIFT: GEBABEBB<br>
<br>
</bnp></div>
</div> -->
</div>

</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#3" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> CarSloter ( Partner VOF ) Netherlands</b></a>
</h4>
</div>
<div id="3" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<div class="row justify-content-sm-center justify-content-xs-center">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Address</span><br>
<br>
<span class="panel-bold">
<strong>Laan 00021 Begane <br>
Grond 8071JG Nunspeet<br>
Netherlands<br>
<br>
<a href="https://www.google.com/maps/place/ADESA+Deutschland+GmbH/@49.4046435,11.7625647,17z/data=!3m1!4b1!4m5!3m4!1s0x479f810b7b2bbb6d:0xadaa95fd2264074e!8m2!3d49.40464!4d11.7647535" target="_blank"><span style="text-decoration: underline; color: #008c95;"></span></a><br>
</strong>
<br>
</span>

General / Seller contact:&nbsp;support@CarSloter.eu<br>
Email: info@CarSloter.eu <br>
VAT: NL856741310B01<br>
<br>


</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Opening Hours</span><br>
<br>
<table>
<tbody>
<tr>
<th colspan="2" style="text-align: left;">Office</th>
</tr>
<tr>
<th>Mon:</th>
<td>8:00 - 19:00</td>
</tr>
<tr>
<th>Tue:</th>
<td>8:00 - 19:00</td>
</tr>
<tr>
<th>Wed:</th>
<td>8:00 - 19:00</td>
</tr>
<tr>
<th>Thu:</th>
<td>8:00 - 19:00</td>
</tr>
<tr>
<th>Fri:</th>
<td>8:00 - 19:00</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Bank details</span><br>
<br>




<strong>BNP Paribas Fortis<br>
</strong>IBAN: DE33 3701 0600 1100 2111 77<br>
BIC / SWIFT: BNPADEFFXXX<br>
<br>
</div>
</div> -->
</div>

</div>
</div>
</div>
</div>

</h4>
</div>
<div id="4" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<div class="row justify-content-sm-center justify-content-xs-center">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Address</span><br>
<br>
<span class="panel-bold">
<strong>Via dei Missaglia 97 Ed. B2<br>
20142 Milano<br>
Italy</strong><br>
<br>
<strong><a href="https://www.google.com/maps/place/ADESA+Italia+S.R.L/@45.4096152,9.1747066,17z/data=!3m1!4b1!4m5!3m4!1s0x4786c27a857b2bf9:0x838762c190583039!8m2!3d45.4096115!4d9.1768953" target="_blank"><span style="text-decoration: underline; color: #008c95;"></span></a></strong><br>
<br>

General / Seller contact: support@CarSloter.eu<br>
Email: info@CarSloter.eu<br>
VAT: IT05732740964<br>
<br>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Opening Hours</span><br>
<br>
<table>
<tbody>
<tr>
<th colspan="2" style="text-align: left;">Office</th>
</tr>
<tr>
<th>Mon:</th>
<td>9:00 - 13:00</td>
<td>14:00 - 18:00</td>
</tr>
<tr>
<th>Tue:</th>
<td>9:00 - 13:00</td>
<td>14:00 - 18:00</td>
</tr>
<tr>
<th>Wed:</th>
<td>9:00 - 13:00</td>
<td>14:00 - 18:00</td>
</tr>
<tr>
<th>Thu:</th>
<td>9:00 - 13:00</td>
<td>14:00 - 18:00</td>
</tr>
<tr>
<th>Fri:</th>
<td>9:00 - 13:00</td>
<td>14:00 - 18:00</td>
</tr>
</tbody>
</table>
<br>
<br>
</div>
</div>
<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Bank details&nbsp;<br>
</span><br>
<strong>BANCA NAZIONALE DEL LAVORO S.P.A.<br>
</strong>IBAN: IT67 R010 0501 6000 0000 0013 205<br>
BIC / SWIFT: BNLIITRR<br>
Sede Legale: Via Del Caravaggio 3,<br>
20144 Milano - Capitale Sociale Euro<br>
100.000100 int. vers.<br>
<br>
<br>
</div>
</div> -->
</div>
</div>
</div>
</div>
</div>


</h4>
</div>
<div id="5" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<div class="row justify-content-sm-center justify-content-xs-center">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Address</span><br>
<br>
<span class="panel-bold">
<strong>104, Avenue Albert 1er<br>
92500 Rueil-Malmaison<br>
France</strong><br>
<br>
<strong><a href="https://www.google.com/maps/place/ADESA+France+SAS/@48.8864074,2.1688789,17z/data=!3m1!4b1!4m5!3m4!1s0x47e6636c419ca6c3:0x77c17b878a6cd885!8m2!3d48.8864039!4d2.1710676" target="_blank"><span style="text-decoration: underline; color: #008c95;"></span></a></strong><br>
<br>
</span>

General / Seller contact: support@CarSloter.eu<br>
Email: info@CarSloter.eu<br>
VAT: FR51495157951<br>
<br>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Opening Hours</span><br>
<br>
<table>
<tbody>
<tr>
<th colspan="2" style="text-align: left;">Office</th>
</tr>
<tr>
<th>Mon:</th>
<td>9:00 - 12:45</td>
<td>14:00 - 17:45</td>
</tr>
<tr>
<th>Tue:</th>
<td>9:00 - 12:45</td>
<td>14:00 - 17:45</td>
</tr>
<tr>
<th>Wed:</th>
<td>9:00 - 12:45</td>
<td>14:00 - 17:45</td>
</tr>
<tr>
<th>Thu:</th>
<td>9:00 - 12:45</td>
<td>14:00 - 17:45</td>
</tr>
<tr>
<th>Fri:</th>
<td>9:00 - 12:45</td>
<td>14:00 - 17:15</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Bank details&nbsp;</span><br>
<br>
<strong>BNP PARIBAS S.A.<br>
</strong>IBAN: FR76 3000 4013 2800 0133 2770 804<br>
BIC / SWIFT: BNPAFRPPXXX<br>
C.V.V. 042-2013 CPV Christophe Doré<br>
<br>
<br>
</div>
</div> -->
</div>
</div>
</div>
</div>
</div>


</h4>
</div>
<div id="6" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<div class="row justify-content-sm-center justify-content-xs-center">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Address</span><br>
<br>
<span class="panel-bold">
<strong>Lange Dreef 11/M<br>
4131NJ Vianen<br>
Netherlands</strong><br>
<br>
</span>

General / Seller contact: support@CarSloter.eu<br>
Email: info@CarSloter.eu<br>
VAT: NL851934134B02</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Opening Hours</span><br>
<br>
<table>
<tbody>
<tr>
<th colspan="2" style="text-align: left;">Office</th>
</tr>
<tr>
<th>Mon:</th>
<td>8:30 - 17:00</td>
</tr>
<tr>
<th>Tue:</th>
<td>8:30 - 17:00</td>
</tr>
<tr>
<th>Wed:</th>
<td>8:30 - 17:00</td>
</tr>
<tr>
<th>Thu:</th>
<td>8:30 - 17:00</td>
</tr>
<tr>
<th>Fri:<br>
<br>
</th>
<td>8:30 - 17:00<br>
<br>
</td>
</tr>
<tr>
<th colspan="2" style="text-align: left;">Pickup</th>
</tr>
<tr>
<th>Mon:</th>
<td>8:00 - 16:00</td>
</tr>
<tr>
<th>Tue:</th>
<td>8:00 - 16:00</td>
</tr>
<tr>
<th>Wed:</th>
<td>8:00 - 16:00</td>
</tr>
<tr>
<th>Thu:</th>
<td>8:00 - 16:00</td>
</tr>
<tr>
<th>Fri:</th>
<td>8:00 - 16:00</td>
</tr>
</tbody>
</table>
<br>
<br>
</div>
</div>
<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Bank details&nbsp;</span><br>
<br>
<strong>BNP PARIBAS S.A.</strong><br>
IBAN: NL98BNPA0227703073<br>
BIC / SWIFT: BNPANL2A<br>
<br>
<br>
</div>
</div> -->
</div>
</div>
</div>
</div>
</div>


</h4>
</div>
<div id="7" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<div class="row justify-content-sm-center justify-content-xs-center">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Address</span><br>
<br>
<span class="panel-bold">
<strong>C/ Huelva 3 Dpl.<br>
28002 Madrid<br>
Spain</strong><br>
<br>
</span>

General / Seller contact: support@CarSloter.eu<br>
Email: info@CarSloter.eu<br>
VAT: ESB-85107604<br>
<br>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Opening Hours</span><br>
<br>
<table>
<tbody>
<tr>
<th colspan="2" style="text-align: left;">Office</th>
</tr>
<tr>
<th>Mon:</th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th>Tue:</th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th>Wed:</th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th>Thu:</th>
<td>8:00 - 18:00</td>
</tr>
<tr>
<th>Fri:</th>
<td>8:00 - 17:00</td>
</tr>
</tbody>
</table>
</div>
</div>

<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div style="margin:auto;width:100%; margin-top:25px;">
<span class="panel-title-new">Bank details&nbsp;</span><br>
<br>
<strong>BNP PARIBAS S.A. ESPANA - MADRID<br>
</strong>
IBAN: ES55 01490 10118 030307 2001<br>
BIC / SWIFT: BNPAESMSXXX<br>
<br>
</div>
</div> -->

</div>
</div>
</div>
</div>
</div>




</div> 
</div>
</div>


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
