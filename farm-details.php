<?php include("common/config.php");
$id=$_GET['pid'];
$getData=$conn->prepare("select * from tbl_products WHERE id='$id' and status > 0");
$getData->execute();
if($getData->rowCount() == 0)
{
	echo "<script>window.location.href='farm-list.php' </script>";
	die();
}
$row=$getData->fetch(PDO::FETCH_OBJ);
$pid=$row->id;
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

<title><?php echo $row->name; ?> | CARSLOTER</title>

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
<?php
$date = date('Y-m-d');
$ffdate = date('Y-m-d', strtotime($date. "+2 days"));
?>
<a href="#" class="btn-lg newexpr" style="display: none;">tt</a>
<div class="clearfix"></div>
<!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix ">
<!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
<section class="section-padding no-top gray padding-top-20">
<!-- Main Container -->
<div class="container">
<!-- Row -->
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


<div class="back-links">

<div class="justify-content-between  row">

<div class="col-md-6"> <span class="fa fa-chevron-left"></span> <a class="link uitest-navigation-back" onclick="window.history.back()">Back to results</a></div>

<div class="align-right col-md-6"></div>

</div>

</div>

<div class="row">
<!-- Middle Content Area -->
<div class="col-md-8 col-xs-12 col-sm-12">
<div class="heading-zone">
<h1><?php echo $row->name; ?> - <?php echo number_format($row->Mileage); ?> HOURS</h1>
<p class="reference-number">Reference number <?php echo $row->reffNo; ?></p>
</div>
<!-- Single Ad -->



<div class="singlepage-detail " style="margin-bottom: 20px;">
<!-- Listing Slider  -->
<div id="single-slider" class="flexslider">
<ul class="slides">

<?php
$stmtImg=$conn->prepare("select * from productimages WHERE pid='$id'");
$stmtImg->execute();
while($rowImg=$stmtImg->fetch(PDO::FETCH_OBJ))
{ ?>
<li><a href="<?php echo $rowImg->image; ?>" data-fancybox="group"><img alt="" src="<?php echo $rowImg->image; ?>" /></a></li>
<?php } ?>
</ul>
</div>
<div id="carousel" class="flexslider hidden-xs hidden-sm">
<ul class="slides">
<?php
$stmtImg=$conn->prepare("select * from productimages WHERE pid='$id'");
$stmtImg->execute();
while($rowImg=$stmtImg->fetch(PDO::FETCH_OBJ))
{ ?>	
<li><img alt="" src="<?php echo $rowImg->image; ?>"></li>
<?php } ?>
</ul>
</div>

<div class="show-car-details hidden-xs hidden-sm">
<div class="list-style-1 margin-top-20">
<div class="panel with-nav-tabs panel-default">
<div class="panel-heading">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab3default" data-toggle="tab" role="tab"  aria-expanded="true">Profile</a></li>
<!-- <li class=""><a href="#tab2default" data-toggle="tab" role="tab" data-toggle="tab" aria-expanded="false">Equipment</a></li> -->

</ul>
</div>

<div class="panel-body">
<div class="tab-content">
<div class="tab-pane in active fade" id="tab3default">
<div class=" specification">
	<h3 class="main-title text-left"> Specifications </h3>
	<div class="lines-group">

		<div class="line">
			<div class="row">
				<div class="col-md-6">Year</div>
				<div data-attr="car-production" class="col-md-6"><?php echo $row->Production_date; ?></div>
			</div>
		</div>
<?php
$mcat_id = $row->make;
$make=$conn->prepare("select * from tbl_maincategory WHERE mcat_id=$mcat_id");
$make->execute();
$rowMake=$make->fetch(PDO::FETCH_OBJ);
?>
		<div class="line">
			<div class="row">
				<div class="col-md-6">Make</div>
				<div data-attr="car-production" class="col-md-6"><?php echo $rowMake->mcat_name; ?></div>
			</div>
		</div>
<?php
$scat_id = $row->model;
$model=$conn->prepare("select * from tbl_subcategory WHERE scat_id=$scat_id");
$model->execute();
$rowModel=$model->fetch(PDO::FETCH_OBJ);
?>
		<div class="line">
			<div class="row">
				<div class="col-md-6">Model</div>
				<div data-attr="car-production" class="col-md-6"><?php echo $rowModel->scat_name; ?></div>
			</div>
		</div>		

		<div class="line">
			<div class="row">
				<div class="col-md-6">Mileage (hours)</div>
				<div data-attr="car-mileage" class="col-md-6"><?php echo number_format($row->Mileage); ?></div>
			</div>
		</div>

		<div class="line">
			<div class="row">
				<div class="col-md-6">Body type</div>
				<div data-attr="car-body" class="col-md-6"><?php echo $row->Body_type; ?></div>
			</div>
		</div>

		<div class="line">
			<div class="row">
				<div class="col-md-6 col-xs-6">VIN</div>
				<div data-attr="car-chassisnumber" class="uitest-profile-chassisnr col-md-6 col-xs-6"><?php echo (isset($_SESSION['USER']) && $_SESSION['USER']!='') ? $row->VIN : '*****************'; ?></div>

			</div>
		</div>

<?php $sqlProperty=$conn->prepare("SELECT p.*, pp.property FROM tbl_property p left join (select * from tbl_productproperties where pid = $id) pp on p.id = pp.property_id where p.p_category = 3 and p.status = 1");
$sqlProperty->execute();
while($rowProperty=$sqlProperty->fetch(PDO::FETCH_OBJ))
{
?>

		<div class="line">
			<div class="row">
				<div class="col-md-6"><?php echo $rowProperty->name; ?></div>
				<div data-attr="car-body" class="col-md-6"><?php echo $rowProperty->property; ?></div>
			</div>
		</div>
<?php } ?>

	</div>

	<h3 class="main-title text-left"> Origin </h3>
	<div class="info-box-auction">
		<div class="row">
			<div class="col-md-1 "><div class="text-right"><i class="fa fa-info-circle"></i></div></div>
			<div class="col-md-11">
				<p>Additional fees are charged when you pick up the vehicle more than 14 days after the PuA was sent to you.</p>
			</div>
		</div>
	</div>

	<div class="lines-group">
		<div class="line">
			<div class="row">
				<div class="col-md-6">Pickup location</div>
				<?php 
				$Location= $row->Pickup_location;
				$getLocation=$conn->prepare("select * from tbl_countries WHERE country_id='$Location'");
				$getLocation->execute();
				$rowLocation=$getLocation->fetch(PDO::FETCH_OBJ);
				?>

					<div class="col-md-6"> <a class="uitest-address-link" href="#"><img src="newadm/uploaded_file/flag/<?php echo $rowLocation->country_flag_image; ?>" style="height: 18px;width: 18px;">   <?php echo $rowLocation->country_name; ?></a></div>
					</div>
			</div>
		</div>
	</div>
</div>

<div role="tabpanel" class="tab-pane" id="tab2default">
<div class=" specification Equipment">

	<h3 class="main-title text-left">High-value equipment <span class="fa fa-star top-option-icon"></span> </h3>

	<div class="lines-group">
		<div class="row">
			<div class="col-md-6">
				<ul>
					<li>Climate Control - Automatic </li>

					<li>Exterior Lighting - Xenon Headlamps </li>

					<li>Parking Aid - Front </li>
				</ul>
			</div>

			<div class="col-md-6">
				<ul>

					<li>Parking Aid - Rear </li>

					<li>Satellite Navigation System </li>

					<li>Upholstery - Leather </li>

				</ul>
			</div>
		</div>
	</div>

	<h3 class="main-title text-left"> All equipment </h3>

	<h3 class="main-title text-left"> Comfort </h3>

	<div class="lines-group">

		<div class="row">

			<div class="col-md-6">
				<ul>
					<li>Climate Control - Automatic <span class="fa fa-star top-option-icon"></span> </li>

					<li>Parking Aid - Front <span class="fa fa-star top-option-icon"></span> </li>

					<li>Parking Aid - Rear <span class="fa fa-star top-option-icon"></span> </li>

					<li>Armrest(s) - Front </li>

					<li>Cruise control </li>

					<li>Electric Windows - Front </li>

					<li>Electric Windows - Rear </li>

					<li>Mirrors External - Electric </li>

				</ul>
			</div>

			<div class="col-md-6">
				<ul>
					<li>Mirrors External - Electric Heated </li>

					<li>Power Assisted Steering </li>

					<li>Rain Sensor </li>

					<li>Seat Lumbar Support - Driver </li>

					<li>Seats - Heated Driver </li>

					<li>Seats - Heated Passenger </li>

					<li>Seats - Sports </li>

					<li>Steering Wheel - Multifunctional </li>
				</ul>
			</div>
		</div>
	</div>

	<h3 class="main-title text-left"> Safety and security </h3>

	<div class="lines-group">

		<div class="row">

			<div class="col-md-6">
				<ul>
					<li>Exterior Lighting - Xenon Headlamps <span class="fa fa-star top-option-icon"></span> </li>

					<li>Daytime Running Lights </li>

					<li>ESP - Electronic Stability Programme </li>
				</ul>
			</div>
		</div>
	</div>

	<h3 class="main-title text-left"> Multimedia </h3>

	<div class="lines-group">

		<div class="row">

			<div class="col-md-6">

				<ul>
					<li>Satellite Navigation System <span class="fa fa-star top-option-icon"></span> </li>

					<li>Bluetooth interface </li>
				</ul>
			</div>
		</div>
	</div>

	<h3 class="main-title text-left"> Finish </h3>

		<div class="lines-group">

			<div class="row">

			<div class="col-md-6">

				<ul>

					<li>Upholstery - Leather <span class="fa fa-star top-option-icon"></span> </li>

					<li>Steering Wheel - Leather </li>

				</ul>

			</div>

		</div>
	</div>

	<h3 class="main-title text-left">Wheels and tires</h3>

		<div class="lines-group">

			<div class="row">

			<div class="col-md-6">

				<ul>

					<li>Alloy Wheels - Unspecified </li>

				</ul>

			</div>

		</div>
	</div>

	<h3 class="main-title text-left">Exterior features</h3>

	<div class="lines-group">

		<div class="row"><div class="col-md-6"><ul> <li>Paint - Metallic  </li>  </ul></div></div></div>
	</div>
</div>

<div role="tabpanel" class="tab-pane" id="tab1default">

<div class=" specification">

<h3 class="main-title text-left"> Origin </h3>

<div class="lines-group CarDamages">

<div class="line">

<div class="row">

<div class="col-md-12">

<ul class="reports">

<li><a target="_blank" rel="noopener noreferrer" href="" class="link">Download external damage report</a> <i class="fa fa-file-pdf-o"></i></li>

</ul>

</div>

</div>

</div>

</div>

<h3 class="main-title text-left"> Damage locations </h3>

<div class="lines-group">

<div class="line">

<div class="row">

<div class="col-md-12">

<div class="row">

<div class="col-md-6" style="text-align: center;">

<img src="images/damage-car.png" class="img-responsive">

</div>

<div class="col-md-6">

<div class="damages-description">

<h3>Normal damage</h3>

<div class="damage-item"><span class="number">1.</span> <span class="label-new">Front bumper: Scratch</span></div>

<div class="damage-item"><span class="number">2.</span> <span class="label-new">Skirt: Dent</span></div>

<div class="damage-item"><span class="number">3.</span> <span class="label-new">Side: Dent</span></div>

</div>

</div>

</div>

</div>

</div>

</div>

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

<!-- Right Sidebar -->

<div class="col-md-4 col-xs-12 col-sm-12">

<!-- Sidebar Widgets -->

<div class="sidebar">

<!-- Contact info -->

<div class="auction-time-slot">
<?php

$order_status = 0;

if (isset($_SESSION['USER']) && $_SESSION['USER']!='') {
	$userid=$_SESSION['USER'];
	$userOrder=$conn->prepare("select * from tbl_order where order_cid='$userid' AND order_pid='$pid'");
	$userOrder->execute();
	$rowOrder=$userOrder->fetch(PDO::FETCH_OBJ);
	if($userOrder->rowCount() == 1)
		$order_status = $rowOrder->order_status;
}

$today = date("Y-m-d H:i:s");  
$pdate=$row->pdate; 

if($today < $pdate)
{
$startdatetime=($pdate);
} else
{
$pdate = date('Y-m-d H:i:s', strtotime($today. "+4 days"));
$startdatetime=($pdate);
}

$date1 = new DateTime($today);
$date2 = new DateTime($startdatetime);

$diff = $date2->getTimestamp() - $date1->getTimestamp();
?>
<div class="section"><span class="remaining-time-label" style="font-size: 14px;">Time remaining: <?php echo ($order_status == 3 || $row->status == 2) ? 'Closed' : '<span id="remain-time" data-time="'.$diff.'"></span>'; ?></span>

<div class="">
<?php
if($today < $pdate)
{
$startdatetime=date_create($pdate);
} else
{
$pdate = date('Y-m-d H:i:s', strtotime($today. "+4 days"));
$startdatetime=date_create($pdate);
}
$ntimedate =date_format($startdatetime,"d M h:i");
?>
<div class="col">End date: <?php echo ($order_status == 3 || $row->status == 2) ? 'Ended' : $ntimedate; ?></div>

<!-- <span class="auction-countdown-days uitest-countdown-timer" title="14/02/2020 02:20">21h 54m</span> -->
</div>
</div>
<?php 

if($order_status > 0 && !(isset($_SESSION['BID_MSG']) || isset($_SESSION['ERR_MSG']))) {
	if($order_status == 1) {
?>
<div class="section">
<span class="">
<div class="alert alert-success">
<i class="fa fa-check-circle"></i> Your Bid is under process. <img src="img/loading_transp.gif" width="20px">
</div>

</span>
</div>
<?php 
	} else if($order_status == 3) {
?>
<div class="section">
<span class="">
<div class="alert alert-success">
<i class="fa fa-check-circle"></i> Your bid has been accepted. <img src="img/check.png" width="25px">
</div>

</span>
</div>
<?php 
	} else if($order_status == 2) {
?>
<div class="section">
<span class="">
<div class="alert alert-danger">
<i class="fa fa-exclamation-triangle"></i> Your bid has been declined.
</div>

</span>
</div>
<?php 
	}
}
?>
<?php
if(isset($_SESSION['BID_MSG']))
{ ?>
<div class="section">
<span class="">
<div class="alert alert-success">
<i class="fa fa-check-circle"></i> Congratulations, you placed the bid.
</div>

</span>
</div>
<?php }
unset($_SESSION['BID_MSG']);
?>


<?php
if(isset($_SESSION['ERR_MSG']))
{ ?>
<div class="section">
<span class="">
<div class="alert alert-danger">
<i class="fa fa-exclamation-triangle"></i> <?php echo $_SESSION['ERR_MSG']; ?>
</div>

</span>
</div>
<?php }
unset($_SESSION['ERR_MSG']);
?>
</div>

<?php
if (isset($_SESSION['USER']) && $_SESSION['USER']!='') { ?>
<div class="car-auction-sectionpanel">
<div class="section auction-type">
<div class="row">
<div class="auction-icon uitest-auctiontype-dynamic col-1">
<i class="fa fa-shopping-cart"></i>
</div>

<a onclick="buynow()"><div class="col">  BUY NOW</div></a>

</div>


<div class="row">

<div class="auction-icon uitest-auctiontype-vatded col-1">

<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd" opacity="1"><path fill="#D8D8D8" fill-opacity="0" stroke="white" d="M.5.5h23v23H.5z"></path><circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle><text fill="#000" font-family="HelveticaNeue-Bold, Helvetica Neue" font-size="10" font-weight="bold"><tspan x="4.83" y="15">+5’</tspan></text></g></svg>

</div>

<div class="col"> ULTIMO </div>

</div>

<div class="row" style="margin-top: -7px;">

<div class="auction-icon uitest-auctiontype-vatded col-1">

<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">

<g fill="none" fill-rule="evenodd">

<path fill="#D8D8D8" fill-opacity="0" d="M0 0h24v24H0z"></path>

<circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle>

<text fill="#000" font-family="Arial" font-size="11" font-weight="bold">

<tspan x="7.925" y="16">D</tspan>

</text>

</g>

</svg>

</div>

<div class="col"> VAT INCLUDED</div>

</div>





</div>
<hr>
<div class="row">
<div class="col md-2" style=""><b>&nbsp;&nbsp;&nbsp;&nbsp;Current Price </b> </div>
<div class="col md-10" style="float: right;"><b style="  font-size: 115%;padding-right: 20px;float: right;font-weight: bold;
text-align: right;"> <?php echo $row->p_currency; ?> <?php echo number_format($row->Current_Price); ?> </b> </div>
</div>
<hr>
<div class="place-bid">
<h3>Place a Bid</h3>
<form method="post" action="order.php">
<div class="put-bids-wrap">
<div class="input-bid" style="width: calc(100% - 80px);">
<span class="form-control count current-price" style="background: white;color: black;border: 1px #dedede solid;height: 40px;border-radius: 0;box-shadow: none;padding-top: 10px;"><?php echo number_format($row->Current_Price); ?></span>
<input type="hidden" id="order_price" data-price="<?php echo ($row->Current_Price); ?>" placeholder="<?php echo number_format($row->Current_Price); ?>" class="form-control count" value="<?php echo ($row->Current_Price); ?>" name="order_price" style="background: white;color: black;" readonly>
</div>
<div class="add-bid" onclick="plusPrice();">
<a class="plus"><i class="fa fa-plus"></i></a>
</div>
<div class="minus-bid" onclick="minusPrice();">
<a class="minus"><i class="fa fa-minus"></i></a>
</div>
</div>
<!-- <div class="total-amount-show">
Total: $7.77,00
</div> -->

<div class="price-group">	
	<div class="widget my-quicklinks">
		<input type="checkbox" class="toggle" id="total-price">
		<h5> <label class="toggle" for="total-price">Total: <?php echo $row->p_currency; ?> <span class="total-value"><?php echo number_format(($row->Current_Price + 715), 2); ?></span></label></h5>
		<ul class="toggled">
			<div class="price-content">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6 price-title">
						Current price
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 price-value">
						<?php echo $row->p_currency; ?> <span class="current-price"><?php echo number_format($row->Current_Price, 2); ?></span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6 price-title">
						Paperwork Incl. EX
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 price-value">
						<?php echo $row->p_currency; ?> 120.00
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6 price-title">
						Auction Fee
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 price-value">
						<?php echo $row->p_currency; ?> 270.00
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6 price-title">
						Delivery & handling
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 price-value">
						<?php echo $row->p_currency; ?> 325.00
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6 price-title">
						<strong>Total</strong>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 price-value">
						<strong><?php echo $row->p_currency; ?> <span class="total-value"><?php echo number_format(($row->Current_Price + 715), 2); ?></span></strong>
					</div>
				</div>
			</div>
		</ul>
	</div>
</div>


<br>

<div class="use-bid-agent">
<label class="switch">
<input type="checkbox">
<span class="slider round"></span>
</label> <span class="toggle-text">Use bid agent</span>
</div>

<div class="submit-bid">
<input type="hidden" name="pid" value="<?php echo $id; ?>">	
<input type="hidden" name="p_currency" value="<?php echo $row->p_currency; ?>">	
<input type="hidden" name="Buy_Price" value="<?php echo $row->Buy_Price; ?>">	
<input type="hidden" name="reffNo" value="<?php echo $row->reffNo; ?>">	
<button type="submit" class="bid-btn btn-primary btn-lg btn-block" name="BidsbmtBtn">Submit my Bid</button>
</div>

<div class="submit-bid">
<button type="submit" class="buy-btn btn-primary btn-lg btn-block" name="BuysbmtBtn" id="BuysbmtBtn"><b>Buy Now for <?php echo $row->p_currency; ?> <?php echo number_format($row->Buy_Price+715); ?> </b></button>


</div>
<div class="text-danger" style="display: flex; align-items: center; line-height: 1.3;">
	<i class="fa fa-info-circle" style="margin: 10px; font-size: 20px;"></i>
	<div>
		Bidding is a legal obligation for making the payment if you won the auction.
	</div>
</div>

</form>

</div>


</div>

<?php 
if(isset($rowOrder->created_at)){
$order_date = date("m/d/Y H:i", strtotime($rowOrder->created_at));
$order_date1 = date("m/d/Y H:i", strtotime($rowOrder->created_at. "-653 mins"));
$order_date2 = date("m/d/Y H:i", strtotime($rowOrder->created_at. "-2187 mins"));
$order_date3 = date("m/d/Y H:i", strtotime($rowOrder->created_at. "-3729 mins"));
$order_date4 = date("m/d/Y H:i", strtotime($rowOrder->created_at. "+2 mins"));

$order_price = $rowOrder->order_price;

$str_price = explode($row->p_currency, $order_price)[1];

$arr_price = explode(',', $str_price);

$bid_price = 0;
for ($i=0; $i < count($arr_price); $i++) { 
    $bid_price += floatval($arr_price[$i]) * pow(10, (count($arr_price) - $i - 1)*3);
}

$current_price = $row->Current_Price;

$diff_price = $bid_price - $current_price;

if($diff_price < 200)
{
	$price1 = $current_price-100;
	$price2 = $current_price-200;
	$price3 = $current_price-300;	
}
else if($diff_price < 300)
{
	$price1 = $current_price+100;
	$price2 = $current_price;
	$price3 = $current_price;
}
else if($diff_price < 600)
{
	$price1 = $current_price+200;
	$price2 = $current_price+100;
	$price3 = $current_price;	
}
else
{
	$diff = intval($diff_price/100);
	$price1 = $current_price+($diff-3)*100;
	$price2 = $current_price+($diff-4)*100;
	$price3 = $current_price+($diff-5)*100;
	
}
}
if($order_status == 1 || $order_status == 3) {
?>
<div class="rc-BiddingHistoryPanel">
	<h3>Bidding history</h3>
	<ul>
		<li>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-user-circle"></i></div>
				<div class="col-md-5 col-sm-5 col-xs-5" style="padding: 0px 0px 0px 20px;line-height: 1.5;"><span class="name">Your bid</span> <span class="date"><?php echo $order_date; ?></span> 
				</div>
				<div class="bid-price text-right col-md-5 col-sm-5 col-xs-5"><?php echo $row->p_currency.' '.number_format($bid_price, 2); ?></div>
			</div>
		</li>
		<li>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-user-circle"></i></div>
				<div class="col-md-5 col-sm-5 col-xs-5" style="padding: 0px 0px 0px 20px;line-height: 1.5;"><span class="name">Other bidder</span> <span class="date"><?php echo $order_date1; ?></span> 
				</div>
				<div class="bid-price text-right col-md-5 col-sm-5 col-xs-5"><?php echo $row->p_currency.' '.number_format($price1, 2); ?></div>
			</div>
		</li>
		<li>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-user-circle"></i></div>
				<div class="col-md-5 col-sm-5 col-xs-5" style="padding: 0px 0px 0px 20px;line-height: 1.5;"><span class="name">Other bidder</span> <span class="date"><?php echo $order_date2; ?></span> 
				</div>
				<div class="bid-price text-right col-md-5 col-sm-5 col-xs-5"><?php echo $row->p_currency.' '.number_format($price2, 2); ?></div>
			</div>
		</li>
		<li>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-user-circle"></i></div>
				<div class="col-md-5 col-sm-5 col-xs-5" style="padding: 0px 0px 0px 20px;line-height: 1.5;"><span class="name">Other bidder</span> <span class="date"><?php echo $order_date3; ?></span> 
				</div>
				<div class="bid-price text-right col-md-5 col-sm-5 col-xs-5"><?php echo $row->p_currency.' '.number_format($price3, 2); ?></div>
			</div>
		</li>
	</ul>
</div>
<?php 
}
else if($order_status == 2) {
?>
<div class="rc-BiddingHistoryPanel">
	<h3>Bidding history</h3>
	<ul>
		<li>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-user-circle"></i></div>
				<div class="col-md-5 col-sm-5 col-xs-5" style="padding: 0px 0px 0px 20px;line-height: 1.5;"><span class="name">Other bidder</span> <span class="date"><?php echo $order_date4; ?></span> 
				</div>
				<div class="bid-price text-right col-md-5 col-sm-5 col-xs-5"><?php echo $row->p_currency.' '.number_format($bid_price+300, 2); ?></div>
			</div>
		</li>
		<li>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-user-circle"></i></div>
				<div class="col-md-5 col-sm-5 col-xs-5" style="padding: 0px 0px 0px 20px;line-height: 1.5;"><span class="name">Your bid</span> <span class="date"><?php echo $order_date; ?></span> 
				</div>
				<div class="bid-price text-right col-md-5 col-sm-5 col-xs-5"><?php echo $row->p_currency.' '.number_format($bid_price, 2); ?></div>
			</div>
		</li>
		<li>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-user-circle"></i></div>
				<div class="col-md-5 col-sm-5 col-xs-5" style="padding: 0px 0px 0px 20px;line-height: 1.5;"><span class="name">Other bidder</span> <span class="date"><?php echo $order_date1; ?></span> 
				</div>
				<div class="bid-price text-right col-md-5 col-sm-5 col-xs-5"><?php echo $row->p_currency.' '.number_format($price1, 2); ?></div>
			</div>
		</li>
		<li>
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-user-circle"></i></div>
				<div class="col-md-5 col-sm-5 col-xs-5" style="padding: 0px 0px 0px 20px;line-height: 1.5;"><span class="name">Other bidder</span> <span class="date"><?php echo $order_date2; ?></span> 
				</div>
				<div class="bid-price text-right col-md-5 col-sm-5 col-xs-5"><?php echo $row->p_currency.' '.number_format($price2, 2); ?></div>
			</div>
		</li>		
	</ul>
</div>
<?php
}

} else { 
?>

<div class="car-auction-sectionpanel">

<div class="section auction-type">

<div class="row">

<div class="auction-icon uitest-auctiontype-dynamic col-1">

<i class="fa fa-shopping-cart"></i>

</div>

<div class="col"> BUY NOW</div>

</div>

<div class="row">

<div class="auction-icon uitest-auctiontype-vatded col-1">

<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">

<g fill="none" fill-rule="evenodd">

<path fill="#D8D8D8" fill-opacity="0" d="M0 0h24v24H0z"></path>

<circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle>

<text fill="#000" font-family="Arial" font-size="11" font-weight="bold">

<tspan x="7.925" y="16">D</tspan>

</text>

</g>

</svg>

</div>

<div class="col"> VAT INCLUDED</div>

</div>

</div>

<div class="section login-register">

<div class="row">

<div class="login-message col"><a class="uitest-register-link" href="register.php">Register</a> or <a class="uitest-login-link" href="login.php">login </a> to place a bid and to see all vehicle information.</div>

</div>

</div>

</div>


<div class="bid-advisor">
<h3>Bidding advisor</h3>
<div class="row">
<div class="col-md-12">Estimated price: <?php echo number_format($row->Current_Price); ?> 
<div class="rc-InfoIcon undefined"><span id="recommended-price-info-icon" class="info-icon">i</span></div>
</div>
</div>
</div>
<?php } ?>	
</div>
<!-- Sidebar Widgets End -->

</div>

<!-- Middle Content Area  End -->

</div>

<!-- Row End -->

</div>
<div class="detail-group hidden-lg hidden-md">	
	<div class="widget my-quicklinks">
		<input type="checkbox" class="toggle" id="car-profile">
		<h5> <label class="toggle" for="car-profile">Profile</label></h5>
		<ul class="toggled">
			<div class=" specification">
				<h3 class="main-title text-left"> Specifications </h3>
				<div class="lines-group">
					<div class="line">
						<div class="row">
							<div class="col-md-6 col-xs-6">Year</div>
							<div data-attr="car-production" class="col-md-6 col-xs-6"><?php echo $row->Production_date; ?></div>
						</div>
					</div>

<?php
$mcat_id = $row->make;
$make=$conn->prepare("select * from tbl_maincategory WHERE mcat_id=$mcat_id");
$make->execute();
$rowMake=$make->fetch(PDO::FETCH_OBJ);
?>
					<div class="line">
						<div class="row">
							<div class="col-md-6 col-xs-6">Make</div>
							<div data-attr="car-production" class="col-md-6 col-xs-6"><?php echo $rowMake->mcat_name; ?></div>
						</div>
					</div>
<?php
$scat_id = $row->model;
$model=$conn->prepare("select * from tbl_subcategory WHERE scat_id=$scat_id");
$model->execute();
$rowModel=$model->fetch(PDO::FETCH_OBJ);
?>
					<div class="line">
						<div class="row">
							<div class="col-md-6 col-xs-6">Model</div>
							<div data-attr="car-production" class="col-md-6 col-xs-6"><?php echo $rowModel->scat_name; ?></div>
						</div>
					</div>					

					<div class="line">
						<div class="row">
							<div class="col-md-6 col-xs-6">Mileage (hours)</div>
							<div data-attr="car-mileage" class="col-md-6 col-xs-6"><?php echo number_format($row->Mileage); ?></div>
						</div>
					</div>					

					<div class="line">
						<div class="row">
							<div class="col-md-6 col-xs-6">Body type</div>
							<div data-attr="car-body" class="col-md-6 col-xs-6"><?php echo $row->Body_type; ?></div>
						</div>
					</div>			

					<div class="line">
						<div class="row">
							<div class="col-md-6 col-xs-6">VIN (short)</div>
							<div class="col-md-6 col-xs-6"><?php echo (isset($_SESSION['USER']) && $_SESSION['USER']!='') ? $row->VIN_short : '******'; ?></div>
						</div>
					</div>

<?php $sqlProperty=$conn->prepare("SELECT p.*, pp.property FROM tbl_property p left join (select * from tbl_productproperties where pid = $id) pp on p.id = pp.property_id where p.p_category = 3 and p.status = 1");
$sqlProperty->execute();
while($rowProperty=$sqlProperty->fetch(PDO::FETCH_OBJ))
{
?>

					<div class="line">
						<div class="row">
							<div class="col-md-6 col-xs-6"><?php echo $rowProperty->name; ?></div>
							<div data-attr="car-body" class="col-md-6 col-xs-6"><?php echo $rowProperty->property; ?></div>
						</div>
					</div>
<?php } ?>

				</div>

				<h3 class="main-title text-left"> Origin </h3>
				<div class="info-box-auction">
					<div class="row">
						<div class="col-md-1 "><div class="text-right"><i class="fa fa-info-circle"></i></div></div>
						<div class="col-md-11">
							<p>Additional fees are charged when you pick up the vehicle more than 14 days after the PuA was sent to you.</p>
						</div>
					</div>
				</div>

				<div class="lines-group">
					<div class="line">
						<div class="row">
							<div class="col-md-6 col-xs-6">Pickup location</div>
							<?php 
							$Location= $row->Pickup_location;
							$getLocation=$conn->prepare("select * from tbl_countries WHERE country_id='$Location'");
							$getLocation->execute();
							$rowLocation=$getLocation->fetch(PDO::FETCH_OBJ);
							?>

							<div class="col-md-6 col-xs-6"> <a class="uitest-address-link" href="#"><img src="newadm/uploaded_file/flag/<?php echo $rowLocation->country_flag_image; ?>" style="height: 18px;width: 18px;">   <?php echo $rowLocation->country_name; ?></a></div>
						</div>
						
					</div>
				</div>
			</div>
		</ul>
	</div>
	<!-- <div class="widget my-quicklinks">
		<input type="checkbox" class="toggle" id="equipment">
		<h5> <label class="toggle" for="equipment">Equipment</label></h5>
		<ul class="toggled">
			<div class=" specification Equipment">

				<h3 class="main-title text-left">High-value equipment <span class="fa fa-star top-option-icon"></span> </h3>

				<div class="lines-group">
					<div class="row">
						<div class="col-md-6">
							<ul>
								<li>Climate Control - Automatic </li>

								<li>Exterior Lighting - Xenon Headlamps </li>

								<li>Parking Aid - Front </li>
							</ul>
						</div>

						<div class="col-md-6">
							<ul>

								<li>Parking Aid - Rear </li>

								<li>Satellite Navigation System </li>

								<li>Upholstery - Leather </li>

							</ul>
						</div>
					</div>
				</div>

				<h3 class="main-title text-left"> All equipment </h3>

				<h3 class="main-title text-left"> Comfort </h3>

				<div class="lines-group">

					<div class="row">

						<div class="col-md-6">
							<ul>
								<li>Climate Control - Automatic <span class="fa fa-star top-option-icon"></span> </li>

								<li>Parking Aid - Front <span class="fa fa-star top-option-icon"></span> </li>

								<li>Parking Aid - Rear <span class="fa fa-star top-option-icon"></span> </li>

								<li>Armrest(s) - Front </li>

								<li>Cruise control </li>

								<li>Electric Windows - Front </li>

								<li>Electric Windows - Rear </li>

								<li>Mirrors External - Electric </li>

							</ul>
						</div>

						<div class="col-md-6">
							<ul>
								<li>Mirrors External - Electric Heated </li>

								<li>Power Assisted Steering </li>

								<li>Rain Sensor </li>

								<li>Seat Lumbar Support - Driver </li>

								<li>Seats - Heated Driver </li>

								<li>Seats - Heated Passenger </li>

								<li>Seats - Sports </li>

								<li>Steering Wheel - Multifunctional </li>
							</ul>
						</div>
					</div>
				</div>

				<h3 class="main-title text-left"> Safety and security </h3>

				<div class="lines-group">

					<div class="row">

						<div class="col-md-6">
							<ul>
								<li>Exterior Lighting - Xenon Headlamps <span class="fa fa-star top-option-icon"></span> </li>

								<li>Daytime Running Lights </li>

								<li>ESP - Electronic Stability Programme </li>
							</ul>
						</div>
					</div>
				</div>

				<h3 class="main-title text-left"> Multimedia </h3>

				<div class="lines-group">

					<div class="row">

						<div class="col-md-6">

							<ul>
								<li>Satellite Navigation System <span class="fa fa-star top-option-icon"></span> </li>

								<li>Bluetooth interface </li>
							</ul>
						</div>
					</div>
				</div>

				<h3 class="main-title text-left"> Finish </h3>

					<div class="lines-group">

						<div class="row">

						<div class="col-md-6">

							<ul>

								<li>Upholstery - Leather <span class="fa fa-star top-option-icon"></span> </li>

								<li>Steering Wheel - Leather </li>

							</ul>

						</div>

					</div>
				</div>

				<h3 class="main-title text-left">Wheels and tires</h3>

					<div class="lines-group">

						<div class="row">

						<div class="col-md-6">

							<ul>

								<li>Alloy Wheels - Unspecified </li>

							</ul>

						</div>

					</div>
				</div>

				<h3 class="main-title text-left">Exterior features</h3>

				<div class="lines-group">

					<div class="row"><div class="col-md-6"><ul> <li>Paint - Metallic  </li>  </ul></div></div></div>
				</div>
			</div>
		</ul>
	</div> -->
</div>
<!-- Main Container End -->

<div class="similars-car-list" style="background: #f7f7f7;margin-top: -1px;">

<div class="container">

<div class="row"><div class="col-md-12"><h2>Similar Farms</h2></div></div>

<div class="row">

<div class="col-md-12 col-xs-12 col-sm-12">

<div class="row" style="padding: 0 15px;">

<div class="featured-slider  owl-carousel owl-theme">



<?php
$stmt=$conn->prepare("select * from tbl_products where category = 3 order by id DESC LIMIT 12");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_OBJ))
{
$id=$row->id;
$getImage=$conn->prepare("select * from productimages WHERE pid='$id'");
$getImage->execute();
$rowImg=$getImage->fetch(PDO::FETCH_OBJ);
?>
<div class="item">
<div class="col-md-12 col-xs-12 col-sm-12">
<!-- Ad Box -->
<div class="white category-grid-box-1 ">
<!-- Image Box -->
<div class="image"> <img alt="Carspot" src="<?php echo $rowImg->image; ?>" class="img-responsive"> </div>
<!-- Short Description -->
<div class="short-description-1 ">
<!-- Ad Title -->
<h3> <a title="" href="farm-details.php?pid=<?php echo $id; ?>"><?php echo $row->name; ?> </a> </h3>
<!-- Location -->
<p class="location"><?php echo number_format($row->Mileage); ?></p>
<div class="prices-box"><div class="price"><label>Estimated price</label><span><?php echo $row->p_currency; ?> <?php echo number_format($row->Buy_Price); ?></span></div></div>
</div>
</div>
<!-- Ad Box End -->
</div>
</div>
<?php } ?>














</div>
</div>
</div> 
</div>

</div>

</div>



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

<script type="text/javascript">
    function showRemainTime() {
        var remain = document.getElementById("remain-time");

        if(remain)
        {
        	var remainTime = remain.dataset.time;
	        if(remainTime > 0)
	        {
	            var days = parseInt(remainTime/60/60/24);
	            var hours = parseInt((remainTime-days*24*60*60)/60/60);
	            var mins = parseInt((remainTime-days*24*60*60-hours*60*60)/60);
	            var seconds = remainTime-days*24*60*60-hours*60*60-mins*60;

	            if(days > 0)
	                remain.innerHTML = days + "D " + (hours < 10 ? "0"+hours : hours) + ":" + (mins < 10 ? "0"+mins : mins) + ":" + (seconds < 10 ? "0"+seconds : seconds);
	            else if(hours >= 5)
	                remain.innerHTML = (hours < 10 ? "0"+hours : hours) + ":" + (mins < 10 ? "0"+mins : mins) + ":" + (seconds < 10 ? "0"+seconds : seconds);
	            else
	                remain.innerHTML = "<span style='color: #dc4405'>" + (hours < 10 ? "0"+hours : hours) + ":" + (mins < 10 ? "0"+mins : mins) + ":" + (seconds < 10 ? "0"+seconds : seconds) + "</span>";
	            remain.dataset.time--;
	        }
        }
        
           
    }

    showRemainTime();

    setInterval(showRemainTime, 1000);

    function plusPrice() {
    	var order_price = document.getElementById("order_price");

        var bid_price = parseFloat(order_price.value);
        order_price.value = bid_price + 100;

        $(".current-price").html((bid_price + 100).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

        var total_value = bid_price + 815;
        $(".total-value").html(total_value.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }

    function minusPrice() {
    	var order_price = document.getElementById("order_price");

    	var bid_price = parseFloat(order_price.value);
        var current_price = parseFloat(order_price.dataset.price);

        if(bid_price > current_price)
        {
        	order_price.value = bid_price - 100;
        	$(".current-price").html((bid_price - 100).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

        	var total_value = bid_price + 615;
        	$(".total-value").html(total_value.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        }
    }

    function buynow() {
    	$("#BuysbmtBtn").click();
    }
    
</script>



</body>

</html>


