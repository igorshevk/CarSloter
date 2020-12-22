<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel -->
<?php
$s_admsession_id=$_SESSION['ADM_ID'];
$s_stmt=$conn->prepare("select * from tbl_admin where adm_id='$s_admsession_id'");
$s_stmt->execute();
$s_row=$s_stmt->fetch(PDO::FETCH_OBJ);
?>
<div class="user-panel">
<div class="image float-left">
<?php if($h_row->adm_image !="") { ?>
<img src="uploaded_file/profile/<?=$s_row->adm_image;?>" class="rounded" alt="User Image">
<?php } else { ?>
<img class="rounded" src="images/user.png" alt="User profile picture">
<?php } ?>	
</div>
<div class="info float-left">
<p><?=$s_row->adm_name;?></p>
<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
<!-- search form -->
<form action="#" method="get" class="sidebar-form">
<div class="input-group">
<input type="text" name="q" class="form-control" placeholder="Search...">
<span class="input-group-btn">
<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
</button>
</span>
</div>
</form>
<!-- /.search form -->
</div>

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">

<li class="active">
<a href="myaccount.php">
<i class="fa fa-dashboard"></i>
<span>Dashboard</span>
</a>
</li>

<li class="">
<a href="manage_users.php">
<i class="fa fa-th"></i>
<span>Manage User</span>
</a>
</li>

<?php if($_SESSION['ADM_TYPE'] == 1) { ?>
<li class="">
<a href="manage_agent.php">
<i class="fa fa-th"></i>
<span>Manage Agent</span>
</a>
</li>

<li class="">
<a href="manage_bidding.php">
<i class="fa fa-th"></i>
<span>Manage Bidding</span>
</a>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Country</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_country.php"><i class="fa fa-circle-o"></i> Add Country</a></li>
<li><a href="country_list.php"><i class="fa fa-circle-o"></i> Country List</a></li>
</ul>
</li>


<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Car Make</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_main_category.php"><i class="fa fa-circle-o"></i> Add Car Make</a></li>
<li><a href="main_category_list.php"><i class="fa fa-circle-o"></i> Car Make List</a></li>
</ul>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Car Model</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_sub_category.php"><i class="fa fa-circle-o"></i> Add Car Model</a></li>
<li><a href="sub_category_list.php"><i class="fa fa-circle-o"></i> Car Model List</a></li>
</ul>
</li>


<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Cars</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_product.php"><i class="fa fa-circle-o"></i> Add Car</a></li>
<li><a href="product_list.php"><i class="fa fa-circle-o"></i> Car List</a></li>
</ul>
</li>


<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Truck Make</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_truck_make.php"><i class="fa fa-circle-o"></i> Add Truck Make</a></li>
<li><a href="truck_make_list.php"><i class="fa fa-circle-o"></i> Truck Make List</a></li>
</ul>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Truck Model</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_truck_model.php"><i class="fa fa-circle-o"></i> Add Truck Model</a></li>
<li><a href="truck_model_list.php"><i class="fa fa-circle-o"></i> Truck Model List</a></li>
</ul>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Truck Property</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_truck_property.php"><i class="fa fa-circle-o"></i> Add Truck Property</a></li>
<li><a href="truck_property_list.php"><i class="fa fa-circle-o"></i> Truck Property List</a></li>
</ul>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Trucks</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_truck.php"><i class="fa fa-circle-o"></i> Add Truck</a></li>
<li><a href="truck_list.php"><i class="fa fa-circle-o"></i> Truck List</a></li>
</ul>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Farm Make</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_farm_make.php"><i class="fa fa-circle-o"></i> Add Farm Make</a></li>
<li><a href="farm_make_list.php"><i class="fa fa-circle-o"></i> Farm Make List</a></li>
</ul>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Farm Model</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_farm_model.php"><i class="fa fa-circle-o"></i> Add Farm Model</a></li>
<li><a href="farm_model_list.php"><i class="fa fa-circle-o"></i> Farm Model List</a></li>
</ul>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Farm Property</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_farm_property.php"><i class="fa fa-circle-o"></i> Add Farm Property</a></li>
<li><a href="farm_property_list.php"><i class="fa fa-circle-o"></i> Farm Property List</a></li>
</ul>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-th"></i>
<span>Manage Farms</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="add_farm.php"><i class="fa fa-circle-o"></i> Add Farm</a></li>
<li><a href="farm_list.php"><i class="fa fa-circle-o"></i> Farm List</a></li>
</ul>
</li>

<li class="treeview">
<a href="#">
<i class="fa fa-envelope"></i>
<span>Mailbox</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="compose_mail.php"><i class="fa fa-circle-o"></i> Compose Mail</a></li>
<li><a href="sent_mail.php"><i class="fa fa-circle-o"></i> Sent Mail</a></li>

</ul>
</li>


<li class="">
<a href="enquiry_list.php">
<i class="fa fa-th"></i>
<span>Manage Enquiry</span>
</a>
</li>

<li class="">
<a href="log_list.php">
<i class="fa fa-th"></i>
<span>Visit Log</span>
</a>
</li>

<?php } ?>

<li class="">
<a href="manage_order.php">
<i class="fa fa-th"></i>
<span>Manage Order</span>
</a>
</li>


<li class="">
<a href="profile.php">
<i class="fa fa-user"></i>
<span>My Profile</span>
</a>
</li>

<li class="">
<a href="change_password.php">
<i class="fa fa-user"></i>
<span>Change Password</span>
</a>
</li>


<li class="logout.php">
<a href="logout.php">
<i class="fa fa-user"></i>
<span>Logout</span>
</a>
</li>




</ul>
</section>
<!-- /.sidebar -->
<div class="sidebar-footer">
<!-- item-->
<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
<!-- item-->
<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
<!-- item-->
<a href="logout.php" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
</div>
</aside>