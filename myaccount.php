<?php include('common/config.php');
$errorArr = [];

function protect_user()
{
if(empty($_SESSION['USER']))
{
echo "<script>window.location.href='login.php'</script>";
die();
}
}

echo protect_user();

$session_id=$_SESSION['USER'];
$stmt_profile=$conn->prepare("select * from tbl_users where u_id='$session_id'");
$stmt_profile->execute();
$row_profile=$stmt_profile->fetch(PDO::FETCH_OBJ);

if(isset($_POST['update']))
{
$u_fname=$_POST['u_fname'];
$u_lname=$_POST['u_lname'];
$u_refferral=$_POST['u_refferral'];
$u_phone=$_POST['u_phone'];
$u_email=$_POST['u_email'];


if(isset($_FILES['u_document']))
{
$doc_img1=$_FILES['u_document']['name'];
$img1_location=$_FILES['u_document']['tmp_name'];
$date_time=date('d-m-Y h-i-s');
$admPath=ADMIN_PATH;
$rand=rand();

$ndoc_img1=$date_time.'-'.$rand.'-'.$doc_img1;
move_uploaded_file($img1_location,$admPath."/uploaded_file/document/".$ndoc_img1);
} else 
{
$ndoc_img1=$row_profile->u_document;
}



$u_country=$_POST['u_country'];
$u_state_city=$_POST['u_state_city'];
$u_street_house=$_POST['u_street_house'];
$u_postalcode=$_POST['u_postalcode'];
$u_company=$_POST['u_company'];
$u_ccode=$_POST['u_ccode'];
$vat_type=$_POST['vat_type'];
$vat_number=$_POST['vat_number'];

$stmt=$conn->prepare("update tbl_users set u_fname=:u_fname,u_lname=:u_lname,u_refferral=:u_refferral,u_phone=:u_phone,u_email=:u_email,u_document=:ndoc_img1,u_country=:u_country,u_state_city=:u_state_city,u_street_house=:u_street_house,u_postalcode=:u_postalcode,u_company=:u_company,u_ccode=:u_ccode,vat_type=:vat_type,vat_number=:vat_number where u_id=:session_id");	

$stmt->bindParam(':u_fname',$u_fname,PDO::PARAM_STR);
$stmt->bindParam(':u_lname',$u_lname,PDO::PARAM_STR);
$stmt->bindParam(':u_refferral',$u_refferral,PDO::PARAM_STR);
$stmt->bindParam(':u_phone',$u_phone,PDO::PARAM_STR);
$stmt->bindParam(':u_email',$u_email,PDO::PARAM_STR);
$stmt->bindParam(':ndoc_img1',$ndoc_img1, PDO::PARAM_STR);
$stmt->bindParam(':u_country',$u_country,PDO::PARAM_STR);
$stmt->bindParam(':u_state_city',$u_state_city,PDO::PARAM_STR);
$stmt->bindParam(':u_street_house',$u_street_house,PDO::PARAM_STR);
$stmt->bindParam(':u_postalcode',$u_postalcode,PDO::PARAM_STR);
$stmt->bindParam(':u_company',$u_company,PDO::PARAM_STR);
$stmt->bindParam(':u_ccode',$u_ccode,PDO::PARAM_STR);
$stmt->bindParam(':vat_type',$vat_type,PDO::PARAM_STR);
$stmt->bindParam(':vat_number',$vat_number,PDO::PARAM_STR);
$stmt->bindParam(':session_id',$session_id,PDO::PARAM_STR);

try {
$result=$stmt->execute();
}
catch (PDOException $e){
echo $e->getMessage();
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
<title>Online used car auction website | CARSLOTER</title>
<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">
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
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.js"></script>




</head>
<body>
<!-- =-=-=-=-=-=-=  Header =-=-=-=-=-=-= -->
<?php include('common/header.php'); ?>

<div class="clearfix"></div>
<!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix ">
<section class="section-padding no-top gray padding-top-20">


	<div class="container main-body wrapper">
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
		<back>
    		<a onclick="window.history.back()">Back to results</a>
    	</back>
		<?php
		$count_live_order=$conn->prepare("select count(order_cid) as total_order_cid  from tbl_order where order_cid='$session_id' AND order_status='1'");
		$count_live_order->execute();
		$row_live_order=$count_live_order->fetch(PDO::FETCH_OBJ);
		$total_live_order=$row_live_order->total_order_cid;





		$count_won_order=$conn->prepare("select count(order_cid) as total_won_order_cid  from tbl_order where order_cid='$session_id' AND order_status='3'");
		$count_won_order->execute();
		$row_won_order=$count_won_order->fetch(PDO::FETCH_OBJ);
		$total_won_order=$row_won_order->total_won_order_cid;



		$count_lost_order=$conn->prepare("select count(order_cid) as total_lost_order_cid  from tbl_order where order_cid='$session_id' AND order_status='2'");
		$count_lost_order->execute();
		$row_lost_order=$count_lost_order->fetch(PDO::FETCH_OBJ);
		$total_lost_order=$row_lost_order->total_lost_order_cid;

		?>
        <ul class="nav nav-pills header_new">
            <li class="active">
                <a data-toggle="pill" href="#liveOrder">My Live Order <i>(<?php echo $total_live_order; ?>)</i></a>
            </li>
            <li>
                <a data-toggle="pill" href="#wonOrder">Won Order <i>(<?php echo $total_won_order; ?>)</i></a>
            </li>
            <li>
                <a data-toggle="pill" href="#lostOrder">Lost Order <i>(<?php echo $total_lost_order; ?>)</i></a>
            </li>
            <li>
                <a data-toggle="pill" href="#myProfile">My Profile</a>
            </li>
        </ul>
	    
	    <div class="tab-content">
		    <div id="liveOrder" class="table_wrap tab-pane fade in active">
		        <table style="width:100%">
		            <thead>
		                <tr>
		                    <th>S. No.</th>
		                    <th>Title</th>
		                    <th>Product Image</th>
		                    <th>Price</th>
		                    <th>Mileage</th>
		                    <th>Status</th>
		                    <!-- <th>Payment</th> -->
		                </tr>
		            </thead>
		            <tbody>
						<?php
						$session_id=$_SESSION['USER'];
						//////////find order
						$stmt_order1=$conn->prepare("select * from tbl_order where order_cid='$session_id' AND order_status='1'");
						$stmt_order1->execute();
						$sno=1;
						while($row_order1=$stmt_order1->fetch(PDO::FETCH_OBJ))
						{
						$count=$stmt_order1->rowCount();
						if($count > 0) {
						$productid=$row_order1->order_pid;

						//////////find product
						$stmt_product1=$conn->prepare("select * from tbl_products where id='$productid'");
						$stmt_product1->execute();
						$row_product1=$stmt_product1->fetch(PDO::FETCH_OBJ);


						$GetImg1=$conn->prepare("select * from productimages where pid='$productid'");
						$GetImg1->execute();
						$rowImg1=$GetImg1->fetch(PDO::FETCH_OBJ);

						$order_price = $row_order1->order_price;
						$str_price = explode($row_product1->p_currency, $order_price)[1];

						$arr_price = explode(',', $str_price);

						$bid_price = 0;
						for ($i=0; $i < count($arr_price); $i++) { 
						    $bid_price += floatval($arr_price[$i]) * pow(10, (count($arr_price) - $i - 1)*3);
						}

						$price = $bid_price + 715;

						?>
		                <tr>
		                    <td><?=$sno;?></td>
		                    <td><?php echo $row_product1->name; ?></td>
		                    <td>
		                        <div class="img_holder" style="background-image: url('<?=$rowImg1->image;?>')"></div>
		                    </td>
		                    <td><?php echo $row_product1->p_currency.number_format($price, 2); ?></td>
		                    <td><?php echo number_format($row_product1->Mileage); ?></td>
		                    <td><b>Pending</b><div class="loading_gif"></div></td>
		                    <!-- <td><b>Pending</b><div class="loading_gif"></div></td> -->
		                </tr>
						<?php  $sno++; } } ?>
		            </tbody>
		        </table>
		    </div>
		    <div id="wonOrder" class="table_wrap tab-pane fade">
		        <table style="width:100%">
		            <thead>
		                <tr>
		                    <th>S. No.</th>
		                    <th>Title</th>
		                    <th>Product Image</th>
		                    <th>Price</th>
		                    <th>Mileage</th>
		                    <th>Status</th>
		                    <th>Payment</th>
		                </tr>
		            </thead>
		            <tbody>
						<?php
						$session_id=$_SESSION['USER'];
						//////////find order
						$stmt_order2=$conn->prepare("select * from tbl_order where order_cid='$session_id' AND order_status='3'");
						$stmt_order2->execute();
						$sno=1;
						while($row_order2=$stmt_order2->fetch(PDO::FETCH_OBJ))
						{
						$count2=$stmt_order2->rowCount();
						if($count2 > 0) {
						$productid=$row_order2->order_pid;

						//////////find product
						$stmt_product2=$conn->prepare("select * from tbl_products where id='$productid'");
						$stmt_product2->execute();
						$row_product2=$stmt_product2->fetch(PDO::FETCH_OBJ);


						$GetImg2=$conn->prepare("select * from productimages where pid='$productid'");
						$GetImg2->execute();
						$rowImg2=$GetImg2->fetch(PDO::FETCH_OBJ);

						$order_price = $row_order2->order_price;
						$str_price = explode($row_product2->p_currency, $order_price)[1];

						$arr_price = explode(',', $str_price);

						$bid_price = 0;
						for ($i=0; $i < count($arr_price); $i++) { 
						    $bid_price += floatval($arr_price[$i]) * pow(10, (count($arr_price) - $i - 1)*3);
						}

						$price = $bid_price + 715;

						?>
		                <tr>
		                    <td><?=$sno;?></td>
		                    <td><?php echo $row_product2->name; ?></td>
		                    <td>
		                        <div class="img_holder" style="background-image: url('<?=$rowImg2->image;?>')"></div>
		                    </td>
		                    <td><?php echo $row_product2->p_currency.number_format($price, 2); ?></td>
		                    <td><?php echo number_format($row_product2->Mileage); ?></td>
		                    <td><b>Accepted</b><div class="check"></div></td>
		                    <td><b>Pending</b><div class="loading_gif"></div></td>
		                </tr>
						<?php  $sno++; } } ?>
		            </tbody>
		        </table>
		    </div>
		    <div id="lostOrder" class="table_wrap tab-pane fade">
		        <table style="width:100%">
		            <thead>
		                <tr>
		                    <th>S. No.</th>
		                    <th>Title</th>
		                    <th>Product Image</th>
		                    <th>Price</th>
		                    <th>Mileage</th>
		                    <th>Status</th>
		                    <!-- <th>Payment</th> -->
		                </tr>
		            </thead>
		            <tbody>
						<?php
						$session_id=$_SESSION['USER'];
						//////////find order
						$stmt_order3=$conn->prepare("select * from tbl_order where order_cid='$session_id' AND order_status='2'");
						$stmt_order3->execute();
						$sno=1;
						while($row_order3=$stmt_order3->fetch(PDO::FETCH_OBJ))
						{
						$count3=$stmt_order3->rowCount();
						if($count3 > 0) {
						$productid=$row_order3->order_pid;

						//////////find product
						$stmt_product3=$conn->prepare("select * from tbl_products where id='$productid'");
						$stmt_product3->execute();
						$row_product3=$stmt_product3->fetch(PDO::FETCH_OBJ);


						$GetImg3=$conn->prepare("select * from productimages where pid='$productid'");
						$GetImg3->execute();
						$rowImg3=$GetImg3->fetch(PDO::FETCH_OBJ);

						$order_price = $row_order3->order_price;
						$str_price = explode($row_product3->p_currency, $order_price)[1];

						$arr_price = explode(',', $str_price);

						$bid_price = 0;
						for ($i=0; $i < count($arr_price); $i++) { 
						    $bid_price += floatval($arr_price[$i]) * pow(10, (count($arr_price) - $i - 1)*3);
						}

						$price = $bid_price + 715;

						?>
		                <tr>
		                    <td><?=$sno;?></td>
		                    <td><?php echo $row_product3->name; ?></td>
		                    <td>
		                        <div class="img_holder" style="background-image: url('<?php echo $rowImg3->image; ?>')"></div>
		                    </td>
		                    <td><?php echo $row_product2->p_currency.number_format($price, 2); ?></td>
		                    <td><?php echo number_format($row_product3->Mileage); ?></td>
		                    <td><b>Cancel</b><div class="cancel"></div></td>
		                    <!-- <td><b>Pending</b><div class="loading_gif"></div></td> -->
		                </tr>
						<?php  $sno++; } } ?>
		            </tbody>
		        </table>
		    </div>
		    <div id="myProfile" class="tab-pane fade">
				<?php
				$session_id=$_SESSION['USER'];
				$stmt_profile=$conn->prepare("select * from tbl_users where u_id='$session_id'");
				$stmt_profile->execute();
				$row_profile=$stmt_profile->fetch(PDO::FETCH_OBJ);

				?>
				<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label col-sm-3" for="name">Name:</label>
						<div class="col-sm-5">
							<input type="text" class="form-control"  placeholder="Enter First Name" name="u_fname" value="<?php echo $row_profile->u_fname; ?>">
						</div>

						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Enter Last Name" name="u_lname" value="<?php echo $row_profile->u_lname; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" for="code">Refferral Code:</label>
						<div class="col-sm-9">          
							<input type="text" class="form-control" placeholder="Enter Refferral Code (Promo Code)" name="u_refferral" value="<?php echo $row_profile->u_refferral; ?>" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" for="phone">Phone Number:</label>
						<div class="col-sm-9">          
							<input type="text" class="form-control" placeholder="Enter Phone Number" name="u_phone" value="<?php echo $row_profile->u_phone; ?>" required >
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-3" for="email">Email Id:</label>
						<div class="col-sm-9">          
							<input type="email" class="form-control" placeholder="Enter Email Id" name="u_email" value="<?php echo $row_profile->u_email; ?>" readonly>
						</div>
					</div>
					<?php if($row_profile->u_document!="") { ?>
					<div class="form-group">
						<label class="control-label col-sm-3" for="document"> Document:</label>
						<div class="col-sm-9">          
							<a href="newadm/uploaded_file/document/<?=$row_profile->u_document;?>" class="btn btn-success" download>Download</a>
						</div>
					</div>
					<?php  } else { ?>
					<div class="form-group">
						<label class="control-label col-sm-3" for="document">Document:</label>
						<div class="col-sm-9">          
							<input type="file" class="form-control" name="u_document">
						</div>
					</div>
					<?php  } ?>

					<div class="form-group">
						<label class="control-label col-sm-3" for="email">&nbsp;</label>
						<div class="cols-sm-9">
							<div class="input-group">
								<ul class="nav nav-pills">
									<li class="active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info" id="hide">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Individual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
									</li>

									<li class="" style="background-color:#fff;">
										<button type="button" class="btn btn-default" id="show">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Legal entity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" for="country">Country:</label>
						<div class="col-sm-9">          
							<input type="text" class="form-control" placeholder="Enter Country" name="u_country" value="<?php echo $row_profile->u_country; ?>">
						</div>
					</div>		


					<div class="form-group">
						<label class="control-label col-sm-3" for="state">State / City:</label>
						<div class="col-sm-9">          
							<input type="text" class="form-control" placeholder="Enter State / City" name="u_state_city" value="<?php echo $row_profile->u_state_city; ?>">
						</div>
					</div>		

					<div class="form-group">
						<label class="control-label col-sm-3" for="strret">Street Number:</label>
						<div class="col-sm-9">          
							<input type="text" class="form-control" placeholder="Enter Street / House Number" name="u_street_house" value="<?php echo $row_profile->u_street_house; ?>">
						</div>
					</div>	


					<div class="form-group">
						<label class="control-label col-sm-3" for="postal_code">Postal Code:</label>
						<div class="col-sm-9">          
							<input type="text" class="form-control" placeholder="Enter Postal Code" name="u_postalcode" value="<?php echo $row_profile->u_postalcode; ?>">
						</div>
					</div>		


					<div id="demo1" style="display:none;">
						<div class="form-group">
							<label class="control-label col-sm-3" for="postal_code">Company Name:</label>
							<div class="col-sm-9">          
								<input type="text" class="form-control" placeholder="Enter Company Name" name="u_company" value="<?php echo $row_profile->u_company; ?>">
							</div>
						</div>		

						<div class="form-group">
							<label class="control-label col-sm-3" for="postal_code">Company Code:</label>
							<div class="col-sm-9">          
								<input type="text" class="form-control" placeholder="Enter Company Code" name="u_ccode" value="<?php echo $row_profile->u_ccode; ?>">
							</div>
						</div>		

						<div class="form-group">
							<label class="control-label col-sm-3" for="postal_code">VAT (if available):</label>
							<div class="col-sm-5">   
								<select class="form-control" name="vat_type">
									<option value="">--Select Type--</option>
									<option value="EU" <?php if($row_profile->vat_type=='EU') {echo "selected='selected'";} ?>>EU</option>
									<option value="Non-EU" <?php if($row_profile->vat_type=='Non-EU') {echo "selected='selected'";} ?>>Non-EU</option>
									</select>			
								</div>
							<div class="col-sm-4">          
								<input type="text" class="form-control" placeholder="Number:" name="vat_number" value="<?php echo $row_profile->vat_number; ?>">
							</div>
						</div>	
					</div>



					<div class="form-group">        
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn-success" name="update"> Update Profile</button>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>

		
<br><br><br><br>



</section>
<!-- Main Container End -->

<!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->

<?php include('common/footer.php'); ?>

<!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
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
