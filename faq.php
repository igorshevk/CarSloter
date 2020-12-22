<?php include('common/config.php');
$errorArr = [];
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
<title>Frequently Asked Questions | CARSLOTER</title>
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
<div class="col-md-7 col-xs-12 col-sm-12">

<div class="sectionBlock">        
<div class="sectionContent">

<div class="panel-group" id="accordion">	

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#1" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> How do I bid for an item?
</b></a>
</h4>
</div>
<div id="1" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>You need to register first. Simply click on Buy It Now button. If you are the winning bidder, you have the obligation to submit the payment within 24 hours after the invoice was issued.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#2" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> How do I register?</b></a>
</h4>
</div>
<div id="2" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Simply complete the&nbsp;<a href="https://carsloter.eu/register.php">Online Registration Form</a>.<br>
In some cases upload or send via e-mail the copies of:<br>
Passport or ID card<br>
For legal entities will also need:<br>
Company registration document<br>
VAT document (if available)</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#3" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Is there a fee for registration?</b></a>
</h4>
</div>
<div id="3" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>The registration is free.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#4" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> How do I search for an item?</b></a>
</h4>
</div>
<div id="4" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Use the Refine Search box on the home page.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#5" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> What methods of payment are accepted? </b></a>
</h4>
</div>
<div id="5" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Bank Payments.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#6" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Is there a warranty for any items purchased at an auction?</b></a>
</h4>
</div>
<div id="6" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>All items are sold AS IS, if there will be any type of problems with the merchandise, it will be shown on it's page. All the items description are accurate.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#7" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> How much do things sell for?</b></a>
</h4>
</div>
<div id="7" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Sale price depends on the merchandise (car, truck, etc). Such things as condition, appeal and uniqueness all play a part. Bids may also depend upon how badly different bidders want an item.&nbsp;</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#8" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> What is live bidding?</b></a>
</h4>
</div>
<div id="8" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Live bidding allows you to bid at auctions, across the world, from your computer, mobile or tablet.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#9" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> What are the advantages of live bidding?</b></a>
</h4>
</div>
<div id="9" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>You can participate in auctions around the world, using your computer and save time, travel and money.&nbsp;</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#10" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Forgotten Password?</b></a>
</h4>
</div>
<div id="10" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>We will email you the link for you to reset your password.&nbsp;</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#11" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> I’m having trouble viewing the items on my watch list.</b></a>
</h4>
</div>
<div id="11" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>You must login to can access the watch list. Please note, items will no longer appear on the watch list when the auctions in which they feature are over.&nbsp;</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#12" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> I am unable to access a page on the website.</b></a>
</h4>
</div>
<div id="12" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Try using an alternative internet browser.&nbsp;</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#13" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> I have questions about the condition of an item.</b></a>
</h4>
</div>
<div id="13" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Items are properly inspected before taking place the auctions. Inspections are performed by a dedicated team. Any major faults or defects will be posted on the item page.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#14" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Who Has Access To My Personal Information?</b></a>
</h4>
</div>
<div id="14" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Any personal information collected is used exclusively to prove proper ownership of each item and is for your protection as well as ours.&nbsp;All personal information received&nbsp;is accessible to the necessary law enforcement agencies and our management only.&nbsp;Under no circumstance is any personal information ever sold, traded or made accessible to another party by any means ever.&nbsp;</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#15" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Who will attend the auction?</b></a>
</h4>
</div>
<div id="15" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Our auctions are open day and night.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#16" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Where do these items come from?</b></a>
</h4>
</div>
<div id="16" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Seized/Pawned/Repossessed (Banks, Customs, IRS...)</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#17" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> How do I know that what I buy isn't stolen?</b></a>
</h4>
</div>
<div id="17" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>We work closely with the Police Department to identify stolen property. Every day, we forward them copies of every pawned item. Pawnshops are the worst place to get rid of stolen merchandise. Pawnshops are tightly regulated and work very closely with local and federal law enforcement agencies. Everything pawned or sold to us is described in detail along with the required information from the customer’s identification, in mandatory daily reports to the police. Our video surveillance equipment also verifies customers identities.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#18" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> When do I get the vehicle documents and are there any liens or back taxes? </b></a>
</h4>
</div>
<div id="18" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>The documents and registration will be provided to the successful bidder along with the item. All vehicles will be cleared of any back taxes or traffic violations prior to sale at auction. The vehicles will need to be insured, safety inspected and licensed before they are legal to drive on the street.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#19" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> How long will take to get my mechandise?</b></a>
</h4>
</div>
<div id="19" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Item will get transfered to us once payment proof is received and the amount is credited. An international bank transfer could take up to 3 business days to validate. It can take up to 4 business days to prepare and handle your merchandise, depending on how many items are in a que. Picking and delivering your merchandise from our location to your location will vary depending on the shippers terms.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#20" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Do you provide insurance?</b></a>
</h4>
</div>
<div id="20" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Your item is fully insured during shipment.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#21" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Are all the items sold at auction?</b></a>
</h4>
</div>
<div id="21" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>At our auction, everything will be sold, if the highest bid is rejected by the seller entity the item will be reposted.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#22" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Why do you need my passport information and how will it be used?</b></a>
</h4>
</div>
<div id="22" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Your passport details are required for identity verification and billing purposes.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#23" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Why do you require the copies of my passport pages and other documents?</b></a>
</h4>
</div>
<div id="23" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>These documents are required to verify the information you have provided and to avoid any possible errors in our documentation.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#24" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> If a fixed price is listed, can I still offer a lower price?</b></a>
</h4>
</div>
<div id="24" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>We are an online auction platform with <strong>Buy Now</strong> option which means the first person who press the <strong>Buy Now</strong> button will won the auction. The supplier decides whether to accept or refuse the bid.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#25" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> What should I do if I discover defects that were not disclosed in the vehicle description?</b></a>
</h4>
</div>
<div id="25" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>In this case, you will need to file a claim. Our professional staff will review your claim and notify you regarding their decision which can resolve in compensating you for the flaws.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#26" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Do I need to pay VAT?</b></a>
</h4>
</div>
<div id="26" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Legal entities with a valid VAT number do not pay VAT upon purchase.<br>
Citizens are subject to pay VAT upon purchase of a item(for items tagged with VAT).</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#27" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Can I pick up the item from the supplier myself?</b></a>
</h4>
</div>
<div id="27" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>No, carsloter&nbsp;picks up the item from the supplier and hands it over to the buyer because, as a broker, we assume all liability on behalf of the buyer for the item purchased in the auction.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#28" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> How long does it take to ship the vehicle?</b></a>
</h4>
</div>
<div id="28" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Depending on the vehicle’s location, it can take between 7 and 14 days upon receipt of payment for the vehicle to be delivered.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#29" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> When will I receive the vehicle’s registration certificate?</b></a>
</h4>
</div>
<div id="29" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>If the vehicle registration certificate is not handed over to you along with the vehicle, it will be sent to you in the mail once documents confirming that the vehicle has been delivered to the final destination have been received.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#30" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Can I see the bids made by other participants?</b></a>
</h4>
</div>
<div id="30" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>No, participants can only see their own bids as carsloter is a blind bidding platform.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#31" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> When can I pick up the item I have purchased?</b></a>
</h4>
</div>
<div id="31" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Once the item has been delivered to our location and all the necessary paperwork is complete, the item’s status changes to READY FOR DELIVERY/PICK-UP. The item can be picked or shipped up at this moment.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#32" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Can I cancel a bid?</b></a>
</h4>
</div>
<div id="32" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>No, bids cannot be cancelled. Each bid is a legal obligation for making a deal.<br>
I won an auction. Does this mean that I have bought the item?<br>
If the seller accepts your bid, you are the item’s purchaser. If the supplier refuses the bid, the purchase is cancelled and the item is reposted on auction.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#33" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> How do I know your site is credible?</b></a>
</h4>
</div>
<div id="33" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>The Contact Us page lists carsloter physical addresses. You are welcome to visit any of our offices.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#34" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> Additional Questions?</b></a>
</h4>
</div>
<div id="34" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>Contact us directly <strong>support@carsloter.eu</strong> if you need any additional information.</p>
</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4 data-toggle="collapse" data-parent="#accordion" href="#35" class="panel-title expand">
<div class="right-arrow pull-right"><i class="fa fa-angle-down"></i></div>
<a href="#"><b> How much does it cost to ship the vehicle?</b></a>
</h4>
</div>
<div id="35" class="panel-collapse collapse">
<div class="panel-body">
<div class="policy-text-box block left clear htmlcontentco">
<p>The cost of shipping depends on the destination and the vehicle’s size.</p>
</div>
</div>
</div>
</div>
</div> 
</div>
</div>


</div>


<div class="col-md-5 col-xs-12 col-sm-12">
<img src="images/faq.jpg">
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
