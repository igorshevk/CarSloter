<?php include('common/config.php');
$errorArr = [];
$whereClause = '1=1';
if (isset($_POST['sbmtBtn'])) {
$make=$_POST['make'];
$model=$_POST['model'];
$Fuel_type=$_POST['Fuel_type'];
$Transmission_type=$_POST['Transmission_type'];
$whereClause = $whereClause.' and (make = '.$make.' or model = '.$model.' or Fuel_type = '.$Fuel_type.') and Transmission_type = '.$Transmission_type.'';
//$whereClause= make='$make' OR model='$model' OR Fuel_type='$Fuel_type' AND Transmission_type='$Transmission_type';
} else if (isset($_POST['sbmtSrch'])) {
$reffNo=$_POST['reffNo'];
$whereClause = $whereClause.' and reffNo = '.$reffNo.'';

//$whereClause= reffNo='$reffNo';
} else if (isset($_POST['srchBtn'])) {

if(isset($_POST['country']) && $_POST['country']!='')
{
	$country=$_POST['country'];
}	else
{
	$country='';
}

if(isset($_POST['make']) && $_POST['make']!='')
{
	$make=$_POST['make'];
}	else
{
	$make='';
}


if(isset($_POST['model']) && $_POST['model']!='')
{
	$model=$_POST['model'];
}	else
{
	$model='';
}


if(isset($_POST['Transmission_type']) && $_POST['Transmission_type']!='')
{
	$Transmission_type=$_POST['Transmission_type'];
}	else
{
	$Transmission_type='';
}

if(isset($_POST['Fuel_type'])  && $_POST['Fuel_type']!='' )
{
	$Fuel_type=$_POST['Fuel_type'];
}	else
{
	$Fuel_type='';
}


$MileageFrom=$_POST['MileageFrom'];
$MileageTo=$_POST['MileageTo'];
$PriceFrom=$_POST['PriceFrom'];
$PriceTo=$_POST['PriceTo'];

if($country!='')
{
  $whereClause = $whereClause.' and (Origin_country = '.$country.')';  
} 
if($Transmission_type!='')
{
  $whereClause = $whereClause.' and (Transmission_type = '.$Transmission_type.')';  
} 
if($country!='')
{
  $whereClause = $whereClause.' and (Fuel_type = '.$Fuel_type.')';  
} 

 if($make!='')
{
     $whereClause = $whereClause.' and (make = '.$make.' and model='.$model.')'; 
}  if($MileageFrom!='')
{
    $whereClause = $whereClause.' and (Mileage BETWEEN  '.$MileageFrom.' AND '.$MileageTo.')';  
}   if($PriceFrom!='')
{
    $whereClause = $whereClause.' and (Buy_Price BETWEEN  '.$PriceFrom.' AND '.$PriceTo.')';  
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
<section class="section-padding no-top gray padding-top-30">
<!-- Main Container -->
<div class="container">
<!-- Row -->
<div class="row">
<!-- Left Sidebar -->
<?php include('sidebar.php'); ?>
<div class="col-md-9 col-lg-9 col-sx-12">
<!-- Row -->
<div class="row">
<!-- Sorting Filters -->
<div class="clearfix"></div>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
<div class="clearfix"></div>
<div class="col-md-12 col-xs-12 col-sm-12 no-padding">
<div class="header-listing">
<div class="custom-select-box pull-right">
<select name="order" class=" form-control">
<option value="0">A - Z</option>
<option value="1">Z - A</option>
<option value="2">End date - Ascending</option>
<option value="3">End date - Descending</option>
</select>
</div>
</div>
</div>
</div>
<!-- Sorting Filters End-->
<div class="clearfix"></div>
<!-- Ads Archive -->

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

<div class="col-md-12 col-xs-12 col-xs-12">
<div class="posts-masonry list-item-display for-desktop-view">
<?php
 ///echo "select * from tbl_products WHERE $whereClause";
 ///exit;
$stmt=$conn->prepare("select * from tbl_products WHERE $whereClause");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_OBJ))
{
$id=$row->id;
$getImage=$conn->prepare("select * from productimages WHERE pid='$id'");
$getImage->execute();
$rowImg=$getImage->fetch(PDO::FETCH_OBJ);
?>
<div class="ads-list-archive">
<div class="main">
<div class="headline">
<h3 class="title"><a href="details.php?pid=<?php echo $id; ?>"><span class="strong"><?php echo $row->name; ?></span> - <?php echo $row->Fuel_type; ?> - <?php echo $row->Transmission_type; ?> - <?php echo number_format($row->Mileage); ?></a></h3></div>
<h4>Buy now auction</h4>
<div class="cols">
<div class="first-col"><a href="details.php?pid=<?php echo $id; ?>">
<?php $CountImg=$conn->prepare("select count(id) as total_img  from productimages WHERE pid='$id'");
$CountImg->execute();
$rowImgs=$CountImg->fetch(PDO::FETCH_OBJ);
$total_img=$rowImgs->total_img;
?>



<div class="thumbnail"><img src="<?php echo $rowImg->image; ?>"><span class="pictures-count-icon"><i class="fa fa-camera"></i> <?php echo $total_img; ?></span></div>
</a>
<div class="remaining-time"> <span>Ends:</span> <span class="time"><span class="auction-countdown-days uitest-countdown-timer" title="13/02/2020 04:50">12h 57m</span></span> </div>
</div>
<div class="auction-details">

<div class="columns">
<div class="column">
<b style="color: black;
font-weight: bold;">Current price</b>
<b style="color: black; 
font-weight: bold;">Buy Now</b>
</div>
<div class="column"></div>
<div class="column"></div>
</div>
<div class="columns">
<div class="column"><span class="strong" style="color: black;
font-size: 129%;
font-weight: bold;"><?php echo $row->p_currency; ?> <?php echo number_format($row->Current_Price); ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="strong" style="color: black;
font-size: 129%;
font-weight: bold;"><?php echo $row->p_currency; ?> <?php echo number_format($row->Buy_Price); ?></span>
</div>
<div class="column"></div>
<div class="column"></div>
</div>



<div class="columns">
<div class="column"><span class="data"><?php echo $row->Production_date;?></span></div>
<div class="column"><span class="data"><?php echo $row->CO2_emission_standard;?></span></div>
<div class="column"><span class="data"><?php echo $row->CO2_emission;?></span></div>
</div>
<div class="columns">
<div class="column"><span class="data"><?php echo $row->Body_type;?></span></div>
<div class="column"><span class="data">VAT included
<svg class="vat-non-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<g fill="none" fill-rule="evenodd" opacity="1">
<path fill="#FFF" d="M0 0h24v24H0z"></path>
<circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle>
<text fill="#000" font-family="Arial" font-size="11" font-weight="bold">
<tspan x="7.011" y="16">M</tspan>
</text>
</g>
</svg>
</span></div>


<?php
$Pickup_location=$row->Pickup_location;
$getFlag=$conn->prepare("select * from tbl_countries WHERE country_id='$Pickup_location'");
$getFlag->execute();
$rowFlag=$getFlag->fetch(PDO::FETCH_OBJ);
?>
<div class="column"><span class="data"><?php echo $rowFlag->country_name; ?>&nbsp;&nbsp; <img src="newadm/uploaded_file/flag/<?php echo $rowFlag->country_flag_image; ?>" style="height: 15px;"></span></div>
</div>
<hr>
<span id="premium-offer-44238780">Highest win chance</span>

</div>
</div>
</div>
<a class="show-detail-arrow uitest-show-auction-link" href="details.php?pid=<?php echo $id; ?>"><i class="fa fa-chevron-right"></i></a>
</div>
<?php  } ?>








</div>
<div class="result-list-mobile for-mobile-view">
<div class="list-mobile-result">
<div class="carlistmobile-box">
<div class="header">
<div class="headline">
<h3 class="title"><a href=""><span class="strong">Abarth 500 1.4 (2009)</span> - Petrol - Manual - 114.316 km</a></h3>
<div class="follow-icon-container"></div>
</div>
<h4>Dynamic auction</h4>
</div>
<div class="thumbnail"><img src="images/review/2.jpg" style="display: block; width: 100%;"><span class="pictures-count-icon"><i class="fa fa-camera"></i> 13</span></div>
<div class="cols prices">
<div class="details"><span class="strong">€ 5.000 <i>Estimated price</i></span></div>
</div>
<div class="cols">
<div class="details"><span class="data">24/10/2008</span><span class="data">VAT included
<svg class="vat-non-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<g fill="none" fill-rule="evenodd" opacity="1">
<path fill="#FFF" d="M0 0h24v24H0z"></path>
<circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle>
<text fill="#000" font-family="Arial" font-size="11" font-weight="bold">
<tspan x="7.011" y="16">M</tspan>
</text>
</g>
</svg>
</span><span class="data">Compact</span></div>
<div class="details"><span class="data">155 g/km (EU5)</span><span class="data">99 kW (135 hp)</span><span class="data">Belgium&nbsp;&nbsp;<span class="flag-sm be"></span></span></div>
</div>
<div class="remaining-time">
<label>Time left</label>
&nbsp;<span class="auction-countdown-days uitest-countdown-timer" title="17/02/2020 04:50">13h 24m</span></div>
<button class="cotw-btn secondary ghost-blue">View details</button>
</div>
<div class="carlistmobile-box">
<div class="header">
<div class="headline">
<h3 class="title"><a href=""><span class="strong">Abarth 500 1.4 (2009)</span> - Petrol - Manual - 114.316 km</a></h3>
<div class="follow-icon-container"></div>
</div>
<h4>Dynamic auction</h4>
</div>
<div class="thumbnail"><img src="images/review/2.jpg" style="display: block; width: 100%;"><span class="pictures-count-icon"><i class="fa fa-camera"></i> 13</span></div>
<div class="cols prices">
<div class="details"><span class="strong">€ 5.000 <i>Estimated price</i></span></div>
</div>
<div class="cols">
<div class="details"><span class="data">24/10/2008</span><span class="data">VAT included
<svg class="vat-non-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<g fill="none" fill-rule="evenodd" opacity="1">
<path fill="#FFF" d="M0 0h24v24H0z"></path>
<circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle>
<text fill="#000" font-family="Arial" font-size="11" font-weight="bold">
<tspan x="7.011" y="16">M</tspan>
</text>
</g>
</svg>
</span><span class="data">Compact</span></div>
<div class="details"><span class="data">155 g/km (EU5)</span><span class="data">99 kW (135 hp)</span><span class="data">Belgium&nbsp;&nbsp;<span class="flag-sm be"></span></span></div>
</div>
<div class="remaining-time">
<label>Time left</label>
&nbsp;<span class="auction-countdown-days uitest-countdown-timer" title="17/02/2020 04:50">13h 24m</span></div>
<button class="cotw-btn secondary ghost-blue">View details</button>
</div>
<div class="carlistmobile-box">
<div class="header">
<div class="headline">
<h3 class="title"><a href=""><span class="strong">Abarth 500 1.4 (2009)</span> - Petrol - Manual - 114.316 km</a></h3>
<div class="follow-icon-container"></div>
</div>
<h4>Dynamic auction</h4>
</div>
<div class="thumbnail"><img src="images/review/2.jpg" style="display: block; width: 100%;"><span class="pictures-count-icon"><i class="fa fa-camera"></i> 13</span></div>
<div class="cols prices">
<div class="details"><span class="strong">€ 5.000 <i>Estimated price</i></span></div>
</div>
<div class="cols">
<div class="details"><span class="data">24/10/2008</span><span class="data">VAT included
<svg class="vat-non-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<g fill="none" fill-rule="evenodd" opacity="1">
<path fill="#FFF" d="M0 0h24v24H0z"></path>
<circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle>
<text fill="#000" font-family="Arial" font-size="11" font-weight="bold">
<tspan x="7.011" y="16">M</tspan>
</text>
</g>
</svg>
</span><span class="data">Compact</span></div>
<div class="details"><span class="data">155 g/km (EU5)</span><span class="data">99 kW (135 hp)</span><span class="data">Belgium&nbsp;&nbsp;<span class="flag-sm be"></span></span></div>
</div>
<div class="remaining-time">
<label>Time left</label>
&nbsp;<span class="auction-countdown-days uitest-countdown-timer" title="17/02/2020 04:50">13h 24m</span></div>
<button class="cotw-btn secondary ghost-blue">View details</button>
</div>
<div class="carlistmobile-box">
<div class="header">
<div class="headline">
<h3 class="title"><a href=""><span class="strong">Abarth 500 1.4 (2009)</span> - Petrol - Manual - 114.316 km</a></h3>
<div class="follow-icon-container"></div>
</div>
<h4>Dynamic auction</h4>
</div>
<div class="thumbnail"><img src="images/review/2.jpg" style="display: block; width: 100%;"><span class="pictures-count-icon"><i class="fa fa-camera"></i> 13</span></div>
<div class="cols prices">
<div class="details"><span class="strong">€ 5.000 <i>Estimated price</i></span></div>
</div>
<div class="cols">
<div class="details"><span class="data">24/10/2008</span><span class="data">VAT included
<svg class="vat-non-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<g fill="none" fill-rule="evenodd" opacity="1">
<path fill="#FFF" d="M0 0h24v24H0z"></path>
<circle cx="12" cy="12" r="8.25" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="1.5"></circle>
<text fill="#000" font-family="Arial" font-size="11" font-weight="bold">
<tspan x="7.011" y="16">M</tspan>
</text>
</g>
</svg>
</span><span class="data">Compact</span></div>
<div class="details"><span class="data">155 g/km (EU5)</span><span class="data">99 kW (135 hp)</span><span class="data">Belgium&nbsp;&nbsp;<span class="flag-sm be"></span></span></div>
</div>
<div class="remaining-time">
<label>Time left</label>
&nbsp;<span class="auction-countdown-days uitest-countdown-timer" title="17/02/2020 04:50">13h 24m</span></div>
<button class="cotw-btn secondary ghost-blue">View details</button>
</div>
</div>
</div>
<!-- Ads Archive End -->
</div>
<div class="clearfix"></div>
<!-- Pagination -->
<!-- <div class="text-center margin-top-30">
<ul class="pagination ">
<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
<li><a href="#">1</a></li>
<li class="active"><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
</ul>
</div> -->
<!-- Pagination End -->
</div>
<!-- Row End -->
</div>
<!-- Left Sidebar End -->
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
