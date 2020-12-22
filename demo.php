<?php
include('common/config.php');
if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
}

$stmt_p=$conn->prepare("select * from tbl_products where p_id='$pid'");
$stmt_p->execute();
$row_p=$stmt_p->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="new">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=SITE_NAME;?></title>
<link href="https://fonts.googleapis.com/css?family=Gidugu" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="sliderengine/amazingslider-1.css" type="text/css">
<script src="sliderengine/jquery.js"></script>
<script src="sliderengine/amazingslider.js"></script>
<script src="sliderengine/initslider-1.js"></script>
<link rel="icon" href="img/ficon.png" type="image/png" sizes="16x16">
<style>
.img-rlated a img {min-height: 206px;}
</style>
<?php

$date = date('Y-m-d');
$ffdate = date('Y-m-d', strtotime($date. "+2 days"));

?>

</head>
<body onload=display_c(86400);>

<?php include('common/topbar.php'); ?>
<?php include('common/logo_topbar.php'); ?>
<div class="top-baner">

<div class="menu-top">
<div class="container">
<div class="row">
<div class="col-sm-12">
 <?php include('common/navbar.php'); ?>
</div>
</div>
</div>
</div>

<div class="body-main-section1">
<div class="container">
<div class="row">
<div class="col-sm-12 text-center">
<h1>All Auction</h1>
<ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Product Detail</li>          
        </ol>
</div><!-- col sm 12 -->
</div><!-- row -->
</div><!-- container -->
</div>
</div>
<div class="product-detal">
<div class="container">
<div class="row">
<div class="col-sm-8">
<div class="listinDetal">
<div class="no-space"><h2><?=$row_p->p_title;?></h2></div>

<div id="countdown">
<?php
$ip_addr=$_SERVER['REMOTE_ADDR'];
$sqlOrdr=$conn->prepare("SELECT * FROM tbl_order WHERE order_pid='$pid'");
$sqlOrdr->execute();
$resultOrdr=$sqlOrdr->fetch(PDO::FETCH_OBJ);
$ipaddr=$resultOrdr->ip_address;
if($ipaddr!=$ip_addr)
{
?>
  <span class="left_dis">Time Left</span>
  <span class="days">00</span>
  <span class="timeRefDays">days</span>
    <span>:</span>
  <span class="hours">00</span>
  <span class="timeRefHours">hours</span>
    <span>:</span>
  <span class="minutes">00</span>
  <span class="timeRefMinutes">minutes</span>
    <span>:</span>
  <span class="seconds">00</span>
  <span class="timeRefSeconds">seconds</span>
<?php } else {  echo "<span>Time Left : In the buying process</span>"; }?>
</div>
<input type="hidden" id="hdnCurrentDate" value="<?php echo $ffdate ?>" >
<div id="amazingslider-wrapper-1" style="display:block;position:relative;margin:0px 0px 51px;">
        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
            <ul class="amazingslider-slides" style="display:none;">
			
			 <?php if($row_p->p_image1!="") { ?>
                <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image1;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image1;?>" class="img-responsive img-thumbnail"  /></a>
                </li>
			   <?php } ?>
			  <?php if($row_p->p_image2!="") { ?>
                <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image2;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image2;?>" class="img-responsive img-thumbnail" /></a>
                </li>
				 <?php } ?>
				  <?php if($row_p->p_image3!="") { ?>
                <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image3;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image3;?>" class="img-responsive img-thumbnail" /></a>
                </li>
				<?php } ?>
				 <?php if($row_p->p_image4!="") { ?>
                <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image4;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image4;?>" class="img-responsive img-thumbnail" /></a>
                </li>
				<?php } ?>
				 <?php if($row_p->p_image5!="") { ?>
				 <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image5;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image5;?>" class="img-responsive img-thumbnail" /></a>
                </li>
				<?php } ?>
				 <?php if($row_p->p_image6!="") { ?>
				 <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image6;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image6;?>" class="img-responsive img-thumbnail" /></a>
                </li>
				<?php } ?>
				 <?php if($row_p->p_image7!="") { ?>
				 <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image7;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image7;?>" class="img-responsive img-thumbnail" /></a>
                </li>
				<?php } ?>
				 <?php if($row_p->p_image8!="") { ?>
				 <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image8;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image8;?>" class="img-responsive img-thumbnail" /></a>
                </li>
				<?php } ?>
				 <?php if($row_p->p_image9!="") { ?>
				 <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image9;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image9;?>" class="img-responsive img-thumbnail" /></a>
                </li>
				<?php } ?>
				 <?php if($row_p->p_image10!="") { ?>
				 <li><a href="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image10;?>" class="html5lightbox"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image10;?>" class="img-responsive img-thumbnail" /></a>
                </li>
              <?php } ?>
                
            </ul>
            <ul class="amazingslider-thumbnails" style="display:none;">
			    <?php if($row_p->p_image1!="") { ?>
                <li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image1;?>" class="img-responsive img-thumbnail" /></li>
				<?php } ?>
				<?php if($row_p->p_image2!="") { ?>
                <li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image2;?>" class="img-responsive img-thumbnail" /></li>
				<?php } ?>
				<?php if($row_p->p_image3!="") { ?>
                <li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image3;?>" class="img-responsive img-thumbnail" /></li>
				<?php } ?>
				<?php if($row_p->p_image4!="") { ?>
                <li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image4;?>" class="img-responsive img-thumbnail"  /></li>
				<?php } ?>
				<?php if($row_p->p_image5!="") { ?>
				<li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image5;?>" class="img-responsive img-thumbnail" /></li>
				<?php } ?>
				<?php if($row_p->p_image6!="") { ?>
                <li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image6;?>" class="img-responsive img-thumbnail" /></li>
				<?php } ?>
				<?php if($row_p->p_image7!="") { ?>
                <li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image7;?>" class="img-responsive img-thumbnail" /></li>
				<?php } ?>
				<?php if($row_p->p_image8!="") { ?>
                <li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image8;?>" class="img-responsive img-thumbnail" /></li>
				<?php } ?>
				<?php if($row_p->p_image9!="") { ?>
				<li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image9;?>" class="img-responsive img-thumbnail"  /></li>
				<?php } ?>
				<?php if($row_p->p_image10!="") { ?>
                <li><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_p->p_image10;?>" class="img-responsive img-thumbnail" /></li>
               <?php } ?>
				
            </ul>
        </div>
    </div>

</div>
<div class="tog-detail">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Detail</a></li>
    <li><a data-toggle="tab" href="#menu1">Seller’s Description</a></li>
    <li><a data-toggle="tab" href="#menu2">Price</a></li>
   
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
	 <label>Title:</label>  <?=$row_p->p_title;?><br>
     <label>Item # (Referral Code):</label> <?php echo '17990'+$row_p->p_id;?> <br>
     <label>Year:</label> <?php echo $row_p->p_year;?> <br>
     <label>Mileage:</label> <?=number_format($row_p->p_mileage);?><br>
                    
	 <label>VIN #:</label> <?=$row_p->p_vin;?><br>
	       
    <label>Transmission:</label> <?=$row_p->p_transmission;?><br>
	       
       <label>Condition:</label> <?=$row_p->p_condition;?><br>
	       
                      
       <label>Exterior:</label> <?=$row_p->p_exterior;?><br>
	       
                      
       <label>Interior:</label> <?=$row_p->p_interior;?><br>
    </div>
    <div id="menu1" class="tab-pane fade">
      <b>Seller’s Description: </b>
      <p> <?=$row_p->p_desc;?></p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <p>
             <b>Price: </b><?=$row_p->p_currency;?><?=number_format($row_p->p_price);?>      <br>
                          </p>
    </div>
    
  </div>
</div>
</div>
<div class="col-sm-4">
<div class="no-space">
<?php if($row_p->p_status !=2) { ?>
<h2>&nbsp;&nbsp; <?=$row_p->p_currency;?><?=number_format($row_p->p_price);?>
<small></small></h2>
<?php } ?>
<div class="col-md-12" style="padding-top:0px;padding-bottom:10px;">

    
          <div class="btn-group btn-group-justified">
		   <?php
         if($row_p->p_status =='2')
          { ?>
		  <img src="img/sold_out.png">
		  <?php } else {
         if(!empty($_SESSION['USER']))
          { ?>
            <a href="order.php?pid=<?=$row_p->p_id;?>" class="btn btn-contact btn-lg newexpr">  Buy Now</a>
			<?php } else { ?>
			 <a href="register.php" class="btn btn-contact btn-lg newexpr"> Buy Now</a>
		  <?php } } ?>
          </div>
          <br clear="all">
                  </div>
                  <div class="btn-group btn-group-justified" style="margin-bottom:10px;margin-top:-30px;background:#eee;">
              </div>
             
                  <div id="listing-resources" class="col-md-12">
          <div id="listing-resources-inner">
             
            <dl class="dl-horizontal text-left">
			   <table>
			   <tr>
			   <td> <b> Interest Fee:</b>  </td>
			   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			   <td>1%</td>
			   </tr>
			 
			  <tr> <td> <b>Paperwork Incl. EX:</b></td>
			   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			   <td><?=$row_p->p_currency;?> 30.00	</td>
			   </tr>
			   
			    <tr> <td> <b>Auction Fees:</b></td>
			   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			   <td><?=$row_p->p_currency;?> 100.00		</td>
			   </tr>
			   
			    <tr> <td> <b>Free delivery to <span style="color:blue;"><a href="contact_us.php">HUB</a></span></b></td>
			   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			   <td><?=$row_p->p_currency;?> 0.00 <span> <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal" style="color:#fff;">Info</button> <img src="img/arrow.gif" style="height: 18px;"></span></td>
			   </tr>
			   
			    <tr> <td> <b>Total Fees:</b></td>
			   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			   <td><?=$row_p->p_currency;?>130 + 1%	</td>
			   </tr>
			   <?php
			      $GLOBALS['country']=$row_p->p_country;
			    function getCountryName($conn)
			   {
				    $c_id=$GLOBALS['country'];
				   $query=$conn->prepare("select * from tbl_countries where country_id=$c_id");
				   $query->execute();
				   $row=$query->fetch(PDO::FETCH_OBJ);
				  $country_name= $row->country_name;
				  $country_flag_image=$row->country_flag_image;
				  return array($country_name,$country_flag_image);
			   }
			    $country=getCountryName($conn);
			   ?>
			     <tr> <td> <b>Origin:</b></td>
			   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			   <td><?php  echo $country[0]; ?>
			   <img src="newadm/uploaded_file/flag/<?php  echo $country[1]; ?>" height="20" width="18">
			   </td>
			   </tr>
			  
			   </table>
			  <h3>Guarantees </h3>
			  <p>Every auction item on our website is inspected before wearhouse custody and supplied with the relevant manufacturers warranty or guarantee (if applicable).
Inspections are performed by our dedicated team.
Any slight or major faults and defects will be posted on the item page, on the contrary if the description does not contain these subjects it means that there are no faults or defects.
An email receipt will be stored for each auction winner. This receipt will act as the product warranty or guarantee.
Pawn Auction does not sell faulty items in the first place, as this will jeopardize our future sales and the quality of the relation with our custommers.
When purchasing goods from Pawn Auction via the web store, Customers are entitled to assume:
 </p>
 <ul>
 <li> The goods they are purchasing are above satisfactory quality;</li>
  <li> The goods are fit for all purposes for which they are supplied;</li>
   <li>The goods are safe and durable;</li>
    <li> That where any written description is applied to the goods, the goods match that description 100%;</li>
 </ul>
 <p>If the above are breached, customers may be entitled to certain remedies which include refund, repair or replacement.</p>
 <h5>IF YOU CAN’T OR WON’T PAY – DON’T BID!!!</h5>
 <p>We have heard all the excuses including the one about the dog/grandchild/niece/wife/bidding on the laptop!
If you allow this YOU will have to pay!
DO NOT BID UNLESS YOU CAN PAY WITHIN THE PRESCRIBED TIMESCALES. </p>
<p>Bids are non-refundable unless the auction is cancelled. Once bids are placed, they can be neither canceled nor modified. </p>
<p>We reserve the right to suspend an auction if at any time we:<br>
a) Suspect irregular or fraudulent activity.<br>
b) Are experiencing technical issues with any aspect of the Pawn Auction's website.<br>
We reserve the right to block access to your account and/or withhold any outstanding deliveries until full payment for any Product, including any fees due to returned payments, have been paid.<br>
We reserve the right to close an auction early for any reason.
 </p>
			  
                           </dl>
                <br>
             
             
           </div>
        </div>
</div>
</div>
</div>
<div class="related-prdct">
<h3>
Related Stories
</h3>
<div class="row">

<?php
     $pcat=$row_p->p_mcat_id;
	 $country=$row_p->p_country;
	 $condition=$row_p->p_condition;
	$stmt_r=$conn->prepare("select * from tbl_products where p_mcat_id='$pcat' AND p_country='$country' AND p_condition='$condition'  order by p_id DESC LIMIT 8");
	$stmt_r->execute();
	while($row_r=$stmt_r->fetch(PDO::FETCH_OBJ))
	{
	?>
<div class="col-sm-3 zaky">
<div class="img-rlated">
<a href="cer_details.php?pid=<?php echo $row_r->p_id; ?>"><img src="<?=ADMIN_PATH;?>/uploaded_file/products/<?=$row_r->p_image1;?>" class="img-responsive img-thumbnail"></a>
</div>
<h4>
<a href="cer_details.php?pid=<?php echo $row_r->p_id; ?>"><?=$row_r->p_title;?></a>
</h4>
</div>

<?php } ?>



</div>
</div>
</div>
</div>

  <?php include('common/footer.php'); ?>
  
  
   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Terms of delivery</h4>
        </div>
        <div class="modal-body">
          <p>The options and costs:</p>
		  <p>1. The item will be delivered to our logistics center (HUB).</p><hr>
		  <h5>Free Pick-up at our Logistic HUB		<?=$row_p->p_currency;?> 0.00</h5>
		  <p>See <a href="contact_us.php">Contact Page</a> for HUB Locations </p><hr>
		  <p>2. The item will be delivered to your location.</p>
		  <em>Ex: For US and Canada calculate from ZIP 11106 to your location and multiply by <span style="color:blue;">see below price</span> per mile to get an estimate shipping price.</em><hr>
		  <h5>Uship.com & FedEx Freight</h5>
		  <p>
		  For larger items such as vehicles<br>
         <?=$row_p->p_currency;?> 0.32 per mile over 2000miles<br>
         <?=$row_p->p_currency;?> 0.48 per mile over 1000miles<br>
         <?=$row_p->p_currency;?> 0.64 per mile over 500miles<br>
         <?=$row_p->p_currency;?> 0.83 per mile under 500miles<br>
         For small items FedEx / UPS<br>
        <?=$row_p->p_currency;?> 130.00 over 2000miles<br>
        <?=$row_p->p_currency;?> 95.00 over 1000miles<br>
         <?=$row_p->p_currency;?> 65.00 over 500miles<br>
        <?=$row_p->p_currency;?> 55.00 under 500miles<br>
		  </p>
		  <p>Estimated price for the region. You must contact logistics for pricing to your address: <span style="color:blue;">support@pawn-auction.shop</span></p>
        </div>
        
      </div>
      
    </div>
  </div>
  <?php  
$startdate=$row_p->p_date; 
$startdatetime=date_create($startdate);
$ntimedate =date_format($startdatetime,"M d, Y H:i:s");
?>

<script>
// Set the date we're counting down to

var countDownDatet = new Date("<?php echo $ntimedate; ?>").getTime();
var nowt = new Date().getTime();
var distancet = countDownDatet - nowt;
/*
 * Basic Count Down to Date and Time
 * Author: @guwii / guwii.com
 */
(function (e) {
  e.fn.countdown = function (t, n) {
    function i() {
      eventDate = Date.parse(r.date) / 1e3;
      currentDate = Math.floor(e.now() / 1e3);
      if (eventDate <= currentDate) {
        n.call(this);
        clearInterval(interval)
      }
      seconds = eventDate - currentDate;
      days = Math.floor(seconds / 86400);
      seconds -= days * 60 * 60 * 24;
      hours = Math.floor(seconds / 3600);
      seconds -= hours * 60 * 60;
      minutes = Math.floor(seconds / 60);
      seconds -= minutes * 60;
      days == 1 ? thisEl.find(".timeRefDays").text("day") : thisEl.find(".timeRefDays").text("days");
      hours == 1 ? thisEl.find(".timeRefHours").text("hour") : thisEl.find(".timeRefHours").text("hours");
      minutes == 1 ? thisEl.find(".timeRefMinutes").text("minute") : thisEl.find(".timeRefMinutes").text("minutes");
      seconds == 1 ? thisEl.find(".timeRefSeconds").text("second") : thisEl.find(".timeRefSeconds").text("seconds");
      if (r["format"] == "on") {
        days = String(days).length >= 2 ? days : "0" + days;
        hours = String(hours).length >= 2 ? hours : "0" + hours;
        minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
        seconds = String(seconds).length >= 2 ? seconds : "0" + seconds
      }
      if (!isNaN(eventDate)) {
        thisEl.find(".days").text(days);
        thisEl.find(".hours").text(hours);
        thisEl.find(".minutes").text(minutes);
        thisEl.find(".seconds").text(seconds)
      } else {
        alert("Invalid date. Example: 30 Tuesday 2013 15:50:00");
        clearInterval(interval)
      }
    }
    var thisEl = e(this);
    var r = {
      date: null,
      format: null
    };
    t && e.extend(r, t);
    i();
    interval = setInterval(i, 1e3)
  }
})(jQuery);
$(document).ready(function () {
    
    const monthNames = ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"
                        ];

  function e() {
    var e = new Date;
    e.setDate(e.getDate() + 60);
    dd = e.getDate();
    mm = e.getMonth() + 1;
    y = e.getFullYear();
    futureFormattedDate = mm + "/" + dd + "/" + y;
    return futureFormattedDate
  }
		//var ffdate = "7 September 2018";
    var ffDate = $('#hdnCurrentDate').val();
    var ffdate = new Date(ffDate);
    
    
	//var ffdate = "7 September 2018";
    var ffDate = $('#hdnCurrentDate').val();
    var ffdate = new Date(ffDate);
        if(localStorage.dateTwoDayAgo){
        var dateLocal = window.localStorage.getItem("dateTwoDayAgo");   
        dateLocal = new Date(dateLocal);
        var currentDate = new Date();
        if(new Date(currentDate) <= new Date(dateLocal))
        {
            localStorage.clear();
            window.localStorage.setItem("dateTwoDayAgo", ffdate);
        }
    }
    else{
        window.localStorage.setItem("dateTwoDayAgo", ffdate);
    }
    // Initialize the date object as a date object again here
    
    var finalDate = window.localStorage.getItem("dateTwoDayAgo");
    finalDate = new Date(finalDate);
	if($(".btn-lg").hasClass("newexpr")) {
	    $("#countdown").countdown({
        date: finalDate, // Change this to your desired date to countdown to
        format: "on"
    });
  }
  else{
   $("#countdown").html("<span class=''>Time left: Expired</span>");
   $(".left_dis").css("display", "none");
  }
});
</script>
</body>
</html>
