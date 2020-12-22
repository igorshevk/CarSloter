<div class="colored-header" style="position: fixed;width: 100%;z-index: 1000;background: white;box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.4);">
<!-- Top Bar -->
<div class="header-top">
<div class="container">
<div class="row">
<!-- Header Top Right Social -->
<div class="header-right col-md-12 col-sm-12 col-xs-12 ">
<div class="pull-right">
<ul class="listnone">
<?php

$url = $_SERVER['REQUEST_URI']; 
if (isset($_SESSION['USER']) && $_SESSION['USER']!='') { ?>
<li><a href="logout.php"> Logout <i class="fa fa-user" aria-hidden="true"></i></a></li>
<?php } else { ?>
<li><a href="register.php"> Register <i class="fa fa-user" aria-hidden="true"></i></a></li>
<?php } ?>	
<li class="hidden-lg hidden-md hidden-xs hidden-sm">
<form method="get" action="listing.php">
<input type="text" class="searh-header" name="reffNo" placeholder="Reference number" />
<button type="submit" name="sbmtSrch"><i class="fa fa-search" aria-hidden="true"></i>  </button>

</form>	
<!--<select class="select-custme">
<option>English</option>
<option>Swedish</option>
<option>Arabic</option>
<option>Russian</option>
<option>chinese</option>
</select>
<i class="fa fa-globe" aria-hidden="true"></i>-->


</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- Top Bar End -->
<!-- Navigation Menu -->
<div class="clearfix"></div>
<!-- menu start -->

<nav id="menu-1" class="mega-menu">
<!-- menu list items container -->
<section class="menu-list-items">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 menu-container">
	<!-- menu logo -->
	<ul class="menu-logo">
	<li class="for-desktop-view"> <a href="index.php"><img src="images/logo.png" alt="logo"> </a> </li>
	<li class="for-mobile-view"> <a href="index.php"><img src="images/logo-mobile.png" alt="logo" class="mobile-logo"> </a> </li>
	</ul>
	<!-- menu links -->
	<ul class="menu-links pull-right">
	<!-- active class -->
	<!-- <li class="hidden-xs">
		<form method="get" action="listing.php" style="margin-right: 40px;position: relative;">
		<input type="text" class="searh-header" name="reffNo" placeholder="Reference number" style="background: white;
	    border: 1px solid #979797;
	    height: 30px;
	    line-height: 20px;
	    border-radius: 5px;
	    padding-left: 1em;
	    font-size: 12px;
	    margin-top: 50px;
	    width: 170px;">
		<button type="submit" name="sbmtSrch" style="position: absolute;
	    right: 0;
	    top: 50px;
	    height: 30px;
	    line-height: 30px;
	    width: 30px;
	    -webkit-transition: opacity .2s;
	    transition: opacity .2s;
	    border-top-right-radius: 5px;
	    border-bottom-right-radius: 5px;
	    background: #008C95;
	    border: 0;
	    color: #fff;
	    outline: 0!important;"><i class="fa fa-search" aria-hidden="true"></i>  </button>
		</form>
	</li> -->
	<li> <a href="index.php" class="<?php echo strpos($url, 'index.php') !== false ? 'active' : ''; ?>">Home</a> </li>
	<?php 
		$TotalProducts=$conn->prepare("select count(id) as total_products  from tbl_products where category = 1 and status > 0");
		$TotalProducts->execute();
		$rowProducts=$TotalProducts->fetch(PDO::FETCH_OBJ);
		$gettProducts=$rowProducts->total_products;

		$TotalTrucks=$conn->prepare("select count(id) as total_trucks  from tbl_products where category = 2 and status > 0");
		$TotalTrucks->execute();
		$rowTrucks=$TotalTrucks->fetch(PDO::FETCH_OBJ);
		$getTrucks=$rowTrucks->total_trucks;

		$TotalFarms=$conn->prepare("select count(id) as total_farms  from tbl_products where category = 3 and status > 0");
		$TotalFarms->execute();
		$rowFarms=$TotalFarms->fetch(PDO::FETCH_OBJ);
		$getFarms=$rowFarms->total_farms;
	?>

	<li> <a href="faq.php" class="<?php echo strpos($url, 'faq.php') !== false ? 'active' : ''; ?>">faq</a> </li>
	
	<!-- <li> <a href="how-to-buy.php" class="<?php echo strpos($url, 'how-to-buy.php') !== false ? 'active' : ''; ?>">How to buy</a> </li> -->

	<li class="dropdown header-dropdown">
        <a class="dropdown-toggle <?php echo (strpos($url, 'listing.php') !== false || strpos($url, 'truck-list.php') !== false || strpos($url, 'farm-list.php') !== false) ? 'active' : ''; ?>" data-toggle="dropdown" href="#">
        	Find Products <span class="badge badge-warning"><?php echo number_format($gettProducts + $getTrucks); ?></span>
        	<span class="caret" style="float: right;margin-top: 9px;"></span>
        </a>
        <ul class="dropdown-menu">
          <li>
          	<a href="listing.php" class="<?php echo strpos($url, 'listing.php') !== false ? 'active' : ''; ?>">
          		<strong>Cars</strong> <span class="badge badge-warning"><?php echo number_format($gettProducts); ?></span>
          	</a>
          </li>
          <li>
          	<a href="truck-list.php" class="<?php echo strpos($url, 'truck-list.php') !== false ? 'active' : ''; ?>">
          		<strong>Trucks</strong> <span class="badge badge-warning"><?php echo number_format($getTrucks); ?></span>
          	</a>
          </li>
          <li>
          	<a href="farm-list.php" class="<?php echo strpos($url, 'farm-list.php') !== false ? 'active' : ''; ?>">
          		<strong>Farms</strong> <span class="badge badge-warning"><?php echo number_format($getFarms); ?></span>
          	</a>
          </li>
        </ul>
    </li>
	<li> <a href="contact.php" class="<?php echo strpos($url, 'contact.php') !== false ? 'active' : ''; ?>">Contact</a> </li>
	<?php
	if (isset($_SESSION['USER']) && $_SESSION['USER']!='') { ?>
	<li> <a href="myaccount.php" class="<?php echo strpos($url, 'myaccount.php') !== false ? 'active' : ''; ?>">Myaccount</a> </li>
	<?php } else { ?>
	<li> <a href="login.php" class="login-button">Login</a> </li>
	<?php } ?>	
	</ul>
</div>
</div>
</div>
</section>
</nav>
<!-- menu end -->
</div>
<div style="height: 118px;"></div>