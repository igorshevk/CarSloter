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
<title>Online used car auction website | CARSLOTER</title>
<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/style.css">
<link href="css/slick.min.css" rel="stylesheet">
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
<script src="js/jquery.min.js"></script>
<script>
function getsubcategory(val) {
	$.ajax({
		type: "POST",
		url: "get_super_subcategory.php",
		data:'supercat_mcat_id='+val,
		success: function(data){
			$("#subcategory_list").html(data);
		}
	});
}	

function getTruckModelList(val) {
	$.ajax({
		type: "POST",
		url: "get_super_subcategory.php",
		data:'supercat_mcat_id='+val,
		success: function(data){
			$("#truck_model_list").html(data);
		}
	});
}

function getFarmModelList(val) {
	$.ajax({
		type: "POST",
		url: "get_super_subcategory.php",
		data:'supercat_mcat_id='+val,
		success: function(data){
			$("#farm_model_list").html(data);
		}
	});
}
</script>

<style>
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
	border: none;
	border-bottom: 2px solid #008C95;
}

.nav-tabs > li > a > svg {
	fill: #777;
}

.nav-tabs > li.active > a > svg, .nav-tabs > li.active > a:hover > svg, .nav-tabs > li.active > a:focus > svg {
	fill: #33A3AA;
}

.nav-tabs > li > a > svg {
	height: 25px;
}
</style>

</head>
<body>
<!-- =-=-=-=-=-=-=  Header =-=-=-=-=-=-= -->
<?php include('common/header.php'); ?>
<div class="clearfix"></div>

<!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= Home Banner 2 =-=-=-=-=-=-= -->

<section class="main-search parallex">
<div class="container">
<div class="row">
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="main-search-title">
	<h3>Search our offer</h3>
</div>
<div class="panel with-nav-tabs panel-default" style="border-top: none;">
	
	<div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#carTab" data-toggle="tab" role="tab"  aria-expanded="true">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 15" width="50">
						<g>
							<path d="M6 9a3 3 0 100 6 3 3 0 000-6zm0 4.8c-.993 0-1.8-.807-1.8-1.8s.807-1.8 1.8-1.8 1.8.807 1.8 1.8-.807 1.8-1.8 1.8z"></path>
							<path d="M1.604 13.5c-.066 0-.104-.898-.104-1.225 0-2.484 2.015-4.638 4.5-4.638s4.5 2.196 4.5 4.681c0 .346-.047.182-.12 1.182h13.24c-.073-1-.12-.905-.12-1.25 0-2.485 2.015-4.625 4.5-4.625s4.5 2.202 4.5 4.688c0 .345-.047.188-.12 1.188h.466C33.482 12.5 34 11.207 34 10c0-2.092-1.321-3.581-2.496-3.842l-7.031-1.377S18.979.5 15.713.5H9.099C4.002.5 0 6.273 0 9.463 0 11.164.172 11.5.953 13.5h.651zm3.238-8L6.25 3.181C7.241 1.619 9.262 1.5 11.094 1.5h1.075l.479 4H4.842zm9.238 0l-.478-4h2.11c2.379 0 7.07 4 7.07 4H14.08z"></path><path d="M28 9a3 3 0 100 6 3 3 0 000-6zm0 4.8c-.993 0-1.8-.807-1.8-1.8s.807-1.8 1.8-1.8 1.8.807 1.8 1.8-.807 1.8-1.8 1.8z"></path>
						</g>
					</svg> 
				</a>
			</li>

			<li class="">
				<a href="#truckTab" data-toggle="tab" role="tab" data-toggle="tab" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 17">
						<g>
							<path d="M7.871 11.796H3.123v.897l3.525 1.111a3.283 3.283 0 011.223-2.008zM33.697 6.799l-.729-3.105c-.166-.715-.902-1.265-1.635-1.265H26c-.733 0-1.367.532-1.367 1.265v8.103H11.906a3.295 3.295 0 011.27 2.429h11.467a3.291 3.291 0 016.574 0h1.449C33.4 14.225 34 13.76 34 13.027V9.414c0-.733-.137-1.9-.303-2.615zm-4.363.834c-.848 0-1.232-.348-1.232-1.271V4.164H31c.521 0 1 .119 1.129.672l.537 2.797h-3.332z"></path>
							<path d="M23.939 11.103H1.334C.6 11.103 0 10.428 0 9.694V1.361C0 .627.6 0 1.334 0h21.333c.733 0 1.272.627 1.272 1.361v9.742zM11.514 14.398c0 .897-.729 1.626-1.626 1.626a1.627 1.627 0 010-3.253c.897 0 1.626.729 1.626 1.627zm-1.626-2.602a2.603 2.603 0 100 5.206 2.603 2.603 0 000-5.206zM29.555 14.398a1.627 1.627 0 11-3.25-.001 1.627 1.627 0 013.25.001zm-1.626-2.602a2.602 2.602 0 10-.001 5.205 2.602 2.602 0 00.001-5.205z"></path>
						</g>
					</svg>
				</a>
			</li>

			<li class="">
				<a href="#farmTab" data-toggle="tab" role="tab" data-toggle="tab" aria-expanded="false">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 32">
						<g>
							<path class="st0" d="M45.8,14.6c-1.5-2.2-5-4-6.5-4h-0.5l-1-8.5h1c0.8,0-0.4-2-1.7-2h-13c-1.3,0-2.4,1.2-2.4,1.7
								c0,0.2,0.6,0.3,1,0.3v1c-0.6-0.2-1-0.4-1.6-0.4s-0.6,1-0.6,1v0.5c-0.4,0-1.2,0.5-1.2,2.2s1,2.4,1.3,2.4h0.5V4.2
								c0-0.2,0-0.4-0.2-0.5c0-0.3,0-1,0.2-1l1.5,0.5l-1,6c0,0.7-1.2,2-2,2h-1.8v-2h0.7l0,0c0-0.5-0.4-0.7-0.8-0.7h-0.8
								c-0.3,0-0.8,0.2-0.8,0.6v0.2h0.8v2h-1.8V8.2V7.7l-0.6-0.4V3.2c0-0.8-0.2-1.5-0.6-2c-0.5-0.4-1-0.7-1.8-0.7c-0.2,0.4-0.2,0.8,0,1.2
								c0.7,0,1.3,0.7,1.2,1.4v4l-0.5,0.6v3.8h-1.7c-0.4,0-0.8,0-1.2,0.3l-4.8,2.6c-0.6,0.3-1,1-1,1.6v5.2l-1-0.5c0,0,0-1-0.4-1H1.5
								c-0.3,0-1.2,1.5-1.2,2V24c0,0.2,0.5,1.4,1,1.4c0.7,0,1-0.4,2-0.4h0.6c0.4,0.3,0.5,1,1.3,1.5v-1.3c0-3.7,2.8-6.8,6.6-7
								c3.7-0.5,7,2.2,7.7,6c0,0.2,0.3,0.8,0.8,0.8h0.8c-0.2,0.3-0.2,0.5,0,0.8c0,0.2,0.4,0.4,0.7,0.4h7.3c-1-3-0.8-6.6,1-9.4
								c1.8-2.7,5-4.4,8.3-4.5c2.5,0,5,1,7,3C45.7,15.3,46.4,15.5,45.8,14.6L45.8,14.6z M29.5,12.2l-2,8.4c-0.4,1.2-1,1.6-2,1.6h-1
								c-0.8,0-1.5-0.6-1.5-1.4V18c0-1,2.4-1.8,2.4-2.6v-2c0,0,0-0.4-0.2-0.6l-0.4-0.4l-0.7-0.8c0-0.2-0.3-0.3-0.6-0.3
								c-0.6,0-1.2-0.4-1-1.5l1-7c0-0.2,0.2-0.4,0.5-0.4h5.1c0.2,0,0.5,0.3,0.5,0.6c0,0,0.4,5.4,0.4,8c-0.4,0.4-0.7,1-0.8,1.5h0.2
								L29.5,12.2z M36.9,10.6V8.4c0-0.3-0.2-0.5-0.5-0.5h-0.6c-0.3,0-0.5,0.2-0.5,0.5v1.2c0,0.4-0.2,0.7-0.4,1h-3.6l-0.5-8
								c0,0,0.2-0.3,0.4-0.3h5c0.3,0,0.6,0.3,0.6,0.5l1,8H37L36.9,10.6z"></path>
							<path class="st1" d="M18.7,25.6v-0.7h-0.4v-1h0.3l-0.3-0.7h-0.2c-0.2,0-0.3-0.4-0.4-0.7l0.4-0.2l-0.4-0.4h-0.4l-0.4-0.5v-0.2
								l-0.3-0.4L16.3,21l-0.7-0.5l0.2-0.3l-0.6-0.4L15,20.2l-0.7-0.4l0.2-0.3l-0.8-0.2v0.4h-0.8v-0.6h-0.8v0.5l-1,0.2v-0.5l-0.8,0.3v0.3
								l-0.7,0.4l-0.2-0.4l-0.7,0.4l0.2,0.3l-0.6,0.5l-0.2-0.3l-0.5,0.6l0.2,0.3c0,0.3-0.3,0.5-0.5,0.7H7.1l-0.5,0.5L7,23.1l-0.5,0.8H6.2
								L6,24.5h0.3v1H6.1v0.6h0.3v1H6.1l0.2,0.6h0.4L7,28.4l-0.4,0.2L7,29.2L7.3,29c0,0.2,0.3,0.4,0.5,0.6l-0.3,0.3L8,30.4l0.3-0.2L9,30.6
								L8.8,31l0.7,0.4l0.2-0.3l0.8,0.4v0.2h0.6l0.2-0.2h0.8v0.4h0.8v-0.7h0.8v0.3h0.8v-0.6l0.7-0.3l0.4,0.3l0.6-0.3L16,30.3
								c0.3,0,0.5-0.2,0.7-0.4l0.2,0.3l0.5-0.7l-0.2-0.3l0.5-0.6l0.3,0.2l0.3-0.7l-0.2-0.2c0-0.3,0.3-0.5,0.3-0.8h0.5l0.2-0.6h-0.3
								L18.7,25.6l0.3-0.1L18.7,25.6z M12.3,28.6c-1.8-0.1-3.2-1.6-3.2-3.4c0-1.6,1.3-3,3-3c1.8,0,3.3,1.5,3.3,3.3c0,2-1.5,3.3-3.3,3.3
								L12.3,28.6z"></path>
							<path class="st1" d="M12.3,22.5c-1.5,0-2.7,1.2-2.7,2.8s1.2,2.8,2.7,2.8s2.7-1.2,2.7-2.7c0-1.4-1.3-2.7-2.8-2.7L12.3,22.5z
								 M13.3,23.5V24h-0.2v-0.4L13.3,23.5z M10.8,25.5h-0.5v-0.4h0.5v0.2V25.5z M11.5,27h-0.2l-0.2-0.3l0.2-0.2h0.3V27H11.5z M11.5,24
								h-0.2l-0.2-0.3l0.2-0.3h0.3v0.5L11.5,24z M12.5,25.6h-0.4l-0.2-0.4l0.2-0.4h0.5l0.2,0.4L12.5,25.6z M13.3,27h-0.2l-0.2-0.3l0.2-0.2
								h0.2l0.2,0.2L13.3,27z M13.9,25.4V25h0.3l0.2,0.2v0.3H14L13.9,25.4z M47.7,22.7v-1h-0.6v-0.5h0.5l-0.2-1l-0.5,0.2v-0.8l0.3-0.3
								l-0.2-1l-0.5,0.3c0-0.3-0.3-0.6-0.4-0.8l0.3-0.3l-0.5-0.7l-0.4,0.3l-0.6-0.7l0.4-0.3l-0.5-0.6L44.3,16l-0.5-0.5L44,15l-0.8-0.5
								L42.9,15l-0.8-0.5v-0.4l-0.7-0.3l-0.2,0.4l-1-0.3l0.2-0.4l-1-0.2v0.4h-0.8v-0.6h-0.5v0.5c-0.4,0-0.6,0-0.8,0.2v-0.5h-1v0.6
								l-0.7,0.2l-0.2-0.4l-0.8,0.4v0.5l-0.8,0.3l-0.2-0.4l-0.7,0.4l0.2,0.3l-0.6,0.5l-0.3-0.3L31.6,16l0.4,0.3l-0.5,0.6L31,16.6l-0.5,0.7
								l0.5,0.2l-0.5,0.8l-0.3-0.2l-0.4,0.8l0.4,0.2c0,0.3-0.2,0.5-0.3,0.8h-0.5v0.8h0.3v1h-0.6v1h0.4v0.7l-0.4,0.2l0.2,0.8h0.5l0.2,0.8
								h-0.6l0.4,1l0.3-0.2l0.6,0.8L30.3,27l0.5,0.7l0.4-0.2l0.6,0.7l-0.3,0.3l1,0.8V29l0.7,0.5L33,29.9l0.7,0.5l0.2-0.5
								c0.3,0,0.5,0.3,0.8,0.5l-0.2,0.3l0.8,0.3l0.2-0.4c0.3,0.2,0.7,0.3,1,0.3l-0.2,0.4h1v-0.4l1,0.2v0.4H39v-0.4h0.8v0.4l1-0.2v-0.5
								c0.2,0,0.4,0,0.7-0.2V31l1-0.3l-0.3-0.4l0.7-0.4l0.3,0.4l0.7-0.5l-0.3-0.4l0.7-0.3l0.4,0.2l0.7-0.7v-0.4l0.4-0.6l0.3,0.2l0.5-0.7
								l-0.4-0.4l0.5-0.7h0.4l0.3-0.8h-0.3c0-0.4,0-0.7,0.2-1h0.4v-0.8h-0.6v-1h0.6V22.7z M38.5,27.2c-2,0-4-1-4.7-3c-0.8-1.8-0.4-4,1-5.4
								c1.5-1.5,3.6-2,5.5-1c2,0.6,3,2.5,3,4.5C43.3,25.1,41.3,27.3,38.5,27.2L38.5,27.2z"></path>
							<path class="st1" d="M38.5,18.2c-1.6,0-3,1-3.8,2.5c-0.6,1.5-0.3,3.3,1,4.4c1,1,2.8,1.4,4.3,0.8c1.4-0.6,2.4-2,2.4-3.7
								c0-1-0.4-2-1.2-2.8C40.4,18.7,39.4,18.2,38.5,18.2L38.5,18.2z M39.5,19.9l0.3,0.2v0.2l-0.3,0.3h-0.4v-0.4L39.5,19.9z M36.3,22.5
								h-0.7V22H36l0.3,0.2V22.5z M37.3,24.5h-0.2v-0.3h0.5v0.7L37.3,24.5z M37.3,20.5h-0.2l-0.3-0.2L37,20h0.2l0.2,0.4v0.4L37.3,20.5z
								 M38.6,22.8h-0.5l-0.4-0.5l0.3-0.4h0.5l0.3,0.5L38.5,23L38.6,22.8z M39.6,24.6h-0.3l-0.2-0.4V24h0.5v0.7V24.6z M40.9,22.6h-0.4
								l-0.2-0.3v-0.1h0.5L40.9,22.6l-0.1,0.3L40.9,22.6z"></path>
						</g>
					</svg>
				</a>
			</li>
		</ul>
	</div>

	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane in active fade" id="carTab">
				<div class="search-section">
					<div id="form-panel">
						<div class="line row">
							<div class="col-md-12">
								<input class="cotw-checkbox" type="checkbox" id="damaged-only">
								<label for="damaged-only">Damaged vehicles only</label>
							</div>
						</div>

						<form method="get" action="listing.php">  
							<div class="line row">
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="make" onChange="getsubcategory(this.value);">
											<option value="">--Select Make--</option>
											<?php $sql=$conn->prepare("select * from tbl_maincategory where mcat_status='1' and p_category = 1 order by mcat_name");
											$sql->execute();
											while($row=$sql->fetch(PDO::FETCH_OBJ))
											{
											?>
											<option value="<?php echo $row->mcat_id; ?>"><?php echo $row->mcat_name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="model" id="subcategory_list">
											<option value="None">--Select Model--</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<select class=" form-control" name="Fuel_type">
											<option label="" value="">Fuel Type</option>
											<option value="Petrol">Petrol</option>
											<option value="CNG">CNG</option>
											<option value="Diesel">Diesel</option>
											<option value="Electric">Electric</option>
											<option value="Hybrid">Hybrid</option>
											<option value="LPG">LPG</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<select class=" form-control" name="Transmission_type">
											<option label="" value="">Transmission</option>
											<option value="Automatic">Automatic </option>
											<option value="Manual">Manual  </option>
										</select>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<select class=" form-control" name="Mileage_type">
											<option label="">Mileage</option>
											<option value="1">20.000 km</option>
											<option value="2">20.000 km - 80.000 km</option>
											<option value="3">80.000 km - 140.000 km</option>
											<option value="4">140.000 km - 200.000 km</option>
											<option value="5">200.000 km</option>
										</select>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<select class=" form-control" name="Price_type">
											<option label="">Price</option>
											<option value="1">€ 3.000</option>
											<option value="2">€ 3.000 - € 6.000 </option>
											<option value="3">€ 6.000</option>
											<option value="4">€ 6.000  - € 10.000</option>
											<option value="5">€10.000 - €20.000</option>
											<option value="6">20.000€</option>
										</select>
									</div>
								</div>
							</div>
<?php $TotalProducts=$conn->prepare("select count(id) as total_products  from tbl_products where category = 1 and status > 0");
$TotalProducts->execute();
$rowProducts=$TotalProducts->fetch(PDO::FETCH_OBJ);
$gettProducts=$rowProducts->total_products;
?>

	
							<div class="line row">
								<div class="col-md-12">
									<button class="cotw-btn secondary positive uitest-search-btn" type="submit" name="sbmtBtn"><span>Search Item (<?php echo number_format($gettProducts); ?>)</span></button>
								</div>
							</div>

							<div class="line row">
								<div class="col-md-12"><a class="advanced-search cotw-btn secondary link-blue uitest-advsearch-link" href="#">Advanced search</a></div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="tab-pane in fade" id="truckTab">
				<div class="search-section">
					<div id="form-panel">
						<div class="line row">
							<div class="col-md-12">
								<input class="cotw-checkbox" type="checkbox" id="damaged-only">
								<label for="damaged-only">Damaged vehicles only</label>
							</div>
						</div>

						<form method="get" action="truck-list.php">  
							<div class="line row">
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="make" onChange="getTruckModelList(this.value);">
											<option value="">--Select Make--</option>
											<?php $sql=$conn->prepare("select * from tbl_maincategory where mcat_status='1' and p_category = 2 order by mcat_name");
											$sql->execute();
											while($row=$sql->fetch(PDO::FETCH_OBJ))
											{
											?>
											<option value="<?php echo $row->mcat_id; ?>"><?php echo $row->mcat_name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="model" id="truck_model_list">
											<option value="None">--Select Model--</option>
										</select>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<select class=" form-control" name="Mileage_type">
											<option label="">Mileage</option>
											<option value="1">20.000 km</option>
											<option value="2">20.000 km - 80.000 km</option>
											<option value="3">80.000 km - 140.000 km</option>
											<option value="4">140.000 km - 200.000 km</option>
											<option value="5">200.000 km</option>
										</select>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<select class=" form-control" name="Price_type">
											<option label="">Price</option>
											<option value="1">€ 3.000</option>
											<option value="2">€ 3.000 - € 6.000 </option>
											<option value="3">€ 6.000</option>
											<option value="4">€ 6.000  - € 10.000</option>
											<option value="5">€10.000 - €20.000</option>
											<option value="6">20.000€</option>
										</select>
									</div>
								</div>
							</div>
<?php $TotalTrucks=$conn->prepare("select count(id) as total_trucks  from tbl_products where category = 2 and status > 0");
$TotalTrucks->execute();
$rowTrucks=$TotalTrucks->fetch(PDO::FETCH_OBJ);
$getTrucks=$rowTrucks->total_trucks;
?>
							<div class="line row">
								<div class="col-md-12">
									<button class="cotw-btn secondary positive uitest-search-btn" type="submit" name="sbmtBtn"><span>Search Item (<?php echo number_format($getTrucks); ?>)</button>
								</div>
							</div>

							<div class="line row">
								<div class="col-md-12"><a class="advanced-search cotw-btn secondary link-blue uitest-advsearch-link" href="#">Advanced search</a></div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="tab-pane in fade" id="farmTab">
				<div class="search-section">
					<div id="form-panel">
						<div class="line row">
							<div class="col-md-12">
								<input class="cotw-checkbox" type="checkbox" id="damaged-only">
								<label for="damaged-only">Damaged vehicles only</label>
							</div>
						</div>

						<form method="get" action="farm-list.php">  
							<div class="line row">
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="make" onChange="getFarmModelList(this.value);">
											<option value="">--Select Make--</option>
											<?php $sql=$conn->prepare("select * from tbl_maincategory where mcat_status='1' and p_category = 3 order by mcat_name");
											$sql->execute();
											while($row=$sql->fetch(PDO::FETCH_OBJ))
											{
											?>
											<option value="<?php echo $row->mcat_id; ?>"><?php echo $row->mcat_name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="model" id="farm_model_list">
											<option value="None">--Select Model--</option>
										</select>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<select class=" form-control" name="Mileage_type">
											<option label="">Mileage</option>
											<option value="1">20.000 km</option>
											<option value="2">20.000 km - 80.000 km</option>
											<option value="3">80.000 km - 140.000 km</option>
											<option value="4">140.000 km - 200.000 km</option>
											<option value="5">200.000 km</option>
										</select>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<select class=" form-control" name="Price_type">
											<option label="">Price</option>
											<option value="1">€ 3.000</option>
											<option value="2">€ 3.000 - € 6.000 </option>
											<option value="3">€ 6.000</option>
											<option value="4">€ 6.000  - € 10.000</option>
											<option value="5">€10.000 - €20.000</option>
											<option value="6">20.000€</option>
										</select>
									</div>
								</div>
							</div>
<?php $TotalFarms=$conn->prepare("select count(id) as total_farms  from tbl_products where category = 3 and status > 0");
$TotalFarms->execute();
$rowFarms=$TotalFarms->fetch(PDO::FETCH_OBJ);
$getFarms=$rowFarms->total_farms;
?>
							<div class="line row">
								<div class="col-md-12">
									<button class="cotw-btn secondary positive uitest-search-btn" type="submit" name="sbmtBtn"><span>Search Item (<?php echo number_format($getFarms); ?>)</button>
								</div>
							</div>

							<div class="line row">
								<div class="col-md-12"><a class="advanced-search cotw-btn secondary link-blue uitest-advsearch-link" href="#">Advanced search</a></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>

<div class="col-md-6 col-xs-12 col-sm-12">
<div class="main-search-title">
<h1>Get the latest used cars for the fairest prices.</h1>
<p class="subtitle">Passenger cars, vans, light trucks and even margin cars or damaged vehicles, you’re sure to find what you’re looking for.</p>
</div>
</div>
</div>
</div>
</section>


<!-- =-=-=-=-=-=-= Home Banner 2 End =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->

<div class="main-content-area clearfix">

<section class="custom-padding about-us for-desktop-view">

<div class="container">

<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="title">

<div class="border"></div>

<h3>Why choose CarSloter?</h3>

<div class="border"></div>

</div>

</div>

</div>

<div class="line wide row">

<div class="section col-sm-4">

<h3>High-quality second-hand vehicles</h3>

<p>We sell high-quality second-hand vehicles exclusively and directly to car dealers and traders.&nbsp; All cars come with quality car descriptions and inspections.</p>

</div>

<div class="section col-sm-4">

<h3>One secure platform</h3>

<p>We offer one EU-wide platform to access all our vehicles, one partner to deal with, one way of working and a solid expertise in cross-border sales. It's all about being fast, easy and hassle-free.</p>

</div>

<div class="section col-sm-4">

<h3>We take care of you</h3>

<p>Your single contact person speaks your language. We offer transport, delivery and financing solutions. We deliver what we promise.</p>

</div>

</div>



<div class="line row">

<div class="col-md-6">

<button class="cotw-btn primary ghost-blue uitest-cta1-btn">Learn more</button>

</div>

<div class="col-md-6">

<button class="cotw-btn primary positive uitest-cta2-btn"><a style="color: white;width: 100%;height: 100%;" href="register.php">Register now</a></button>

</div>

</div>

</div>

</section>



<section class="custom-padding about-us for-mobile-view">

<div class="container">

<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="title">

<div class="border"></div>

<h3>Why choose CarSloter?</h3>

<div class="border"></div>

</div>

</div>

</div>

<div class="slider slider-wrapper">

<div class="slide inner-wrapper">

<h3>High-quality second-hand vehicles</h3>

<p>We sell high-quality second-hand vehicles exclusively and directly to car dealers and traders.&nbsp; All cars come with quality car descriptions and inspections.</p>

</div>

<div class="slide">

<h3>One secure platform</h3>

<p>We offer one EU-wide platform to access all our vehicles, one partner to deal with, one way of working and a solid expertise in cross-border sales. It's all about being fast, easy and hassle-free.</p>

</div>

<div class="slide">

<h3>We take care of you</h3>

<p>Your single contact person speaks your language. We offer transport, delivery and financing solutions. We deliver what we promise.</p>

</div>

</div>



<div class="line row">

<div class="col-md-6">

<button class="cotw-btn primary ghost-blue uitest-cta1-btn">Learn more</button>

</div>

<div class="col-md-6">

<button class="cotw-btn primary positive uitest-cta2-btn">Register now</button>

</div>

</div>

</div>

</section>

<!-- =-=-=-=-=-=-= About  End =-=-=-=-=-=-= -->



<!-- =-=-=-=-=-=-= Featured  Ads =-=-=-=-=-=-= -->

<section class="custom-padding gray over-hidden">

<!-- Main Container -->

<div class="container">

<!-- Row -->

<div class="row">

<!-- Heading Area -->

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="strikethrough-title">

<div class="border"></div>

<h3>Highest win chance</h3>

<div class="border"></div>

</div>

</div>



<!-- Middle Content Box -->

<div class="col-md-12 col-xs-12 col-sm-12">

<div class="row">

<div class="featured-slider  owl-carousel owl-theme">




<?php
$stmt=$conn->prepare("select * from tbl_products order by id DESC LIMIT 12");
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
<h3> <a title="" href="details.php?pid=<?php echo $id; ?>"><?php echo $row->name; ?> </a> </h3>
<!-- Location -->
<p class="location"><?php echo number_format($row->Mileage); ?></p>
<p class="location"><?php echo $row->First_registration; ?></p>
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
<!-- Middle Content Box End -->

</div>

<!-- Row End -->

</div>

<!-- Main Container End -->

</section>

<!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->



<!-- =-=-=-=-=-=-= Trending Ads =-=-=-=-=-=-= -->

<section class="custom-padding white auction-channel-section">

<!-- Main Container -->

<div class="container">

<div class="row">

<!-- Heading Area -->

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="strikethrough-title">

<div class="border"></div>

<h3>Most popular auction channels</h3>

<div class="border"></div>

</div>

</div>

</div>

<!-- Row -->



<div class="line full-width row">

<input type="checkbox" class="toggle" id="auction-channels-toggle">

<div class="auction-channels col">

<div class="auction-channel"><img src="images/Leaseplan.png">

<p>LeasePlan</p>

</div>

<div class="auction-channel"><img src="images/alphabet.png">

<p>Alphabet</p>

</div>

<div class="auction-channel"><img src="images/gwListe.png">

<p>GWListe</p>

</div>

<div class="auction-channel"><img src="images/arval.png">

<p>Arval</p>

</div>

<div class="auction-channel"><img src="images/athlon.png">

<p>Athlon</p>

</div>

<div class="auction-channel"><img src="images/europcar.png">

<p>Europcar</p>

</div>

<div class="auction-channel"><img src="images/aldAutomotive.png">

<p>ALD Automotive</p>

</div>

<div class="auction-channel"><img src="images/avis.png">

<p>AVIS</p>

</div>

<div class="auction-channel"></div>

<div class="auction-channel"></div>

</div>

</div>

<!-- Row End -->

</div>

<!-- Main Container End -->

</section>

<!-- =-=-=-=-=-=-= Trending Ads End =-=-=-=-=-=-= -->

<section class="custom-padding gray over-hidden body-typesection">

<!-- Main Container -->

<div class="container">

<!-- Row -->

<div class="row">

<!-- Heading Area -->

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div class="strikethrough-title">

<div class="border"></div>

<h3>News articles</h3>

<div class="border"></div>

</div>

</div>

</div>

<div class="line wide row news-articles-section">

<div class="col-md-12">

<div class="articles">

<article class="article">

<div class="img" style="background-image: url(&quot;https://cms.adesa.eu/images/default-source/default-album/search-facets.jpg?sfvrsn=0&amp;amp;maxwidth=840&amp;amp;maxheight=&amp;amp;scaleup=true&amp;amp;quality=high&amp;amp;method=resizefittoareaarguments&amp;amp;signature=d3cb66cde6ca7b3ad74a013f69b977c4&quot;);"></div>

<div class="body">

<h3>Increase your chances to acquire the cars you like and to get your cars faster</h3>

<p>&#8203;When you search on the two new options ‘Highest win chance cars’ and ‘Immediately available cars’, you’ll find cars that are more likely to be (...)</p>

<a href="">Read the full article</a></div>

</article>

<article class="article">

<div class="img" style="background-image: url(&quot;https://cms.adesa.eu/images/default-source/default-album/50_years_of_the_ford_transit.jpg?sfvrsn=0&amp;amp;maxwidth=840&amp;amp;maxheight=&amp;amp;scaleup=false&amp;amp;quality=high&amp;amp;method=resizefittoareaarguments&amp;amp;signature=ae6528fdd3e04f8973633cf56b625869&quot;);"></div>

<div class="body">

<h3>When vans tell a story...</h3>

<p>Humans have always needed effective ways to transport loads of all sizes. Since the middle of the 20th century, this need has driven a real (...)</p>

<a href="">Read the full article</a></div>

</article>

<article class="article">

<div class="img" style="background-image: url(&quot;https://cms.adesa.eu/images/default-source/default-album/gps.jpg?sfvrsn=0&amp;amp;maxwidth=840&amp;amp;maxheight=&amp;amp;scaleup=false&amp;amp;quality=high&amp;amp;method=resizefittoareaarguments&amp;amp;signature=2a882b6c484237069ebe67aa41e9eda6&quot;);"></div>

<div class="body">

<h3>Car options: do’s and don'ts </h3>

<p>Modern cars are packed with technical gadgets. Most manufacturers (not only the Germans) have almost endless lists of options nowadays. Even in the (...)</p>

<a href="">Read the full article</a></div>

</article>

<article class="article">

<div class="img" style="background-image: url(&quot;https://cms.adesa.eu/images/default-source/default-album/audi_q4_e-tron.jpg?sfvrsn=0&amp;amp;maxwidth=840&amp;amp;maxheight=&amp;amp;scaleup=true&amp;amp;quality=high&amp;amp;method=resizefittoareaarguments&amp;amp;signature=fffeaf367d79f68caa1c48f5a2d66343&quot;);"></div>

<div class="body">

<h3>These are the 20 most important vehicles for 2020</h3>

<p>The vehicle industry has come to a historical crossroads. After a hegemony of more than 120 years, the combustion engine is slowly getting ready to (...)</p>

<a href="">Read the full article</a></div>

</article>

</div>

</div>

</div>



</div>

</section>



<!-- =-=-=-=-=-=-= Blog Section =-=-=-=-=-=-= -->

<section class="custom-padding ExploreOffersBanner">

<!-- Main Container -->

<div class="container">

<!-- Content Box -->

<!-- Row -->




<!-- Row End -->

</div>

<!-- Main Container End -->

</section>

<!-- =-=-=-=-=-=-= Blog Section End =-=-=-=-=-=-= -->

<section class=" gray mobile-app-section">

<div class="container">

<div class="line row">

<div class="col-md-12">

<div class="banner">

<div class="img" style="background-image: url(images/iphone-s9_secondary.png);"></div>

<div class="body">

<h3>Download our app</h3>

<p>Find cars even when you are on the move.</p>

<button class="cotw-btn primary ghost-white">Learn more</button>

</div>

</div>

</div>

</div>



</div>

</section>



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
<script src="skins/jquery.min.js"></script>
<script src="skins/slick.min.js"></script>

<script>
$('.slider').slick({
infinite: true,
dots: true,
arrows: false,
autoplay: true,
autoplaySpeed: 3000,
fade: true,
fadeSpeed: 1000
});
</script>
</body>
</html>





