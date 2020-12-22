<?php include("common/gaurav.library.php");
echo protect_agent();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/favicon.ico">

<title><?=SITE_NAME;?> | Myaccount</title>

<!-- bootstrap 4.0 -->
<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">

<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

<!-- font awesome -->
<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.css">

<!-- ionicons -->
<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.css">

<!-- theme style -->
<link rel="stylesheet" href="css/master_style.css">

<!-- mpt_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="css/skins/_all-skins.css">

<!-- morris chart -->
<link rel="stylesheet" href="assets/vendor_components/morris.js/morris.css">

<!-- jvectormap -->
<link rel="stylesheet" href="assets/vendor_components/jvectormap/jquery-jvectormap.css">

<!-- date picker -->
<link rel="stylesheet" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

<!-- daterange picker -->
<link rel="stylesheet" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include("common/header_inc.php"); ?>

<!-- Left side column. contains the logo and sidebar -->
<?php include("common/sidebar_inc.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Dashboard
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">

<div class="col-12 col-md-6 col-lg-4">
<div class="info-box bg-blue">
<span class="info-box-icon push-bottom"><i class="ion ion-ios-eye-outline"></i></span>
<?php $t_order=$conn->prepare("select count(order_id) as total_order  from tbl_order");
$t_order->execute();
$row_order=$t_order->fetch(PDO::FETCH_OBJ);
$total_order=$row_order->total_order;
?>
<div class="info-box-content">
<span class="info-box-text">Total Orders</span>
<span class="info-box-number"><?=$total_order;?></span>

<div class="progress">
<div class="progress-bar" style="width: <?=$total_order;?>%"></div>
</div>

</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-md-6 col-lg-4">
<div class="info-box bg-blue">
<span class="info-box-icon push-bottom"><i class="ion ion-ios-eye-outline"></i></span>
<?php $t_products=$conn->prepare("select count(id) as total_product  from tbl_products");
$t_products->execute();
$rowProducts=$t_products->fetch(PDO::FETCH_OBJ);
$total_product=$rowProducts->total_product;
?>
<div class="info-box-content">
<span class="info-box-text">Total Products</span>
<span class="info-box-number"><?php echo $total_product; ?></span>

<div class="progress">
<div class="progress-bar" style="width: 11%"></div>
</div>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix visible-sm-block"></div>

<div class="col-12 col-md-6 col-lg-4">
<div class="info-box bg-blue">
<span class="info-box-icon push-bottom"><i class="ion ion-ios-eye-outline"></i></span>
<?php $t_reg=$conn->prepare("select count(u_id) as total_register from tbl_users");
$t_reg->execute();
$row_reg=$t_reg->fetch(PDO::FETCH_OBJ);
$total_reg=$row_reg->total_register;
?>
<div class="info-box-content">
<span class="info-box-text">Total Registration</span>
<span class="info-box-number"><?=$total_reg;?></span>

<div class="progress">
<div class="progress-bar" style="width: <?=$total_reg;?>%"></div>
</div>

</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="clearfix visible-sm-block"></div>

<div class="col-12 col-md-6 col-lg-4">
<div class="info-box bg-golden" style="background-color: goldenrod;">
<span class="info-box-icon push-bottom"><i class="ion ion-ios-eye-outline"></i></span>
<?php 
$count_live_order=$conn->prepare("select count(order_cid) as total_order_cid  from tbl_order where order_status='1'");
$count_live_order->execute();
$row_live_order=$count_live_order->fetch(PDO::FETCH_OBJ);
$total_live_order=$row_live_order->total_order_cid;
?>
<div class="info-box-content">
<span class="info-box-text">Total Live Order</span>
<span class="info-box-number"><?=$total_live_order;?></span>

<div class="progress">
<div class="progress-bar" style="width: <?=$total_live_order;?>%"></div>
</div>

</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>


<div class="clearfix visible-sm-block"></div>

<div class="col-12 col-md-6 col-lg-4">
<div class="info-box bg-green">
<span class="info-box-icon push-bottom"><i class="ion ion-ios-eye-outline"></i></span>
<?php 
$count_won_order=$conn->prepare("select count(order_cid) as total_won_order_cid  from tbl_order where order_status='3'");
$count_won_order->execute();
$row_won_order=$count_won_order->fetch(PDO::FETCH_OBJ);
$total_won_order=$row_won_order->total_won_order_cid;
?>
<div class="info-box-content">
<span class="info-box-text">Total Won Order</span>
<span class="info-box-number"><?=$total_won_order;?></span>

<div class="progress">
<div class="progress-bar" style="width: <?=$total_won_order;?>%"></div>
</div>

</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>


<div class="clearfix visible-sm-block"></div>

<div class="col-12 col-md-6 col-lg-4">
<div class="info-box bg-red">
<span class="info-box-icon push-bottom"><i class="ion ion-ios-eye-outline"></i></span>
<?php 
$count_lost_order=$conn->prepare("select count(order_cid) as total_lost_order_cid  from tbl_order where order_status='2'");
$count_lost_order->execute();
$row_lost_order=$count_lost_order->fetch(PDO::FETCH_OBJ);
$total_lost_order=$row_lost_order->total_lost_order_cid;
?>
<div class="info-box-content">
<span class="info-box-text">Total Lost Order</span>
<span class="info-box-number"><?=$total_lost_order;?></span>

<div class="progress">
<div class="progress-bar" style="width: <?=$total_lost_order;?>%"></div>
</div>

</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
<?php if($_SESSION['ADM_TYPE']!='2') { ?>
<!-- Main row -->
<div class="row">

<div class="col-lg-12 col-xl-12">


<!-- TABLE: LATEST ORDERS -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Latest Enquiry</h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button>
<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
<table class="table table-bordered table-striped table-responsive">
<thead>
<tr style="background-color:#122F3B;">
<th style="width:10%;color:#fff;">S.No</th>
<th style="width:20%;color:#fff;">Name</th>
<th style="width:25%;color:#fff;">Mobile No</th>
<th style="width:25%;color:#fff;">Email Id</th>
<th style="width:20%;color:#fff;">Date</th>

</tr>
</thead>
<tbody>
<?php
$stmt=$conn->prepare("select * from tbl_enquiry order by enq_id DESC LIMIT 10");
$sno=1;
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_OBJ))
{
?>
<tr>
<td><?php echo $sno;?></td>
<td><?=$row->enq_name;?></td>
<td><?=$row->enq_mobile;?></td>
<td><?=$row->enq_email;?></td>
<?php $date=$row->created_at;
$create=date_create($date);
$format=date_format($create,"d M, Y");
?>
<td><span class="label bg-danger"><?=$format;?></span></td>
</tr>
<?php $sno++; } ?>

</tbody>
</table>
</div>
<!-- /.table-responsive -->
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
<a href="enquiry_list.php" class="btn btn-sm btn-info btn-flat pull-right">View All Enquiry</a>
</div>
<!-- /.box-footer -->
</div>
<!-- /.box -->
</div>


</div>
<?php } ?>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("common/footer_inc.php"); ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->



</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="assets/vendor_components/jquery/dist/jquery.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="assets/vendor_components/jquery-ui/jquery-ui.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>

<!-- popper -->
<script src="assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0 -->
<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

<!-- FLOT CHARTS -->
<script src="assets/vendor_components/Flot/jquery.flot.js"></script>

<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="assets/vendor_components/Flot/jquery.flot.resize.js"></script>

<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="assets/vendor_components/Flot/jquery.flot.pie.js"></script>

<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="assets/vendor_components/Flot/jquery.flot.categories.js"></script>

<!-- Sparkline -->
<script src="assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>

<!-- jvectormap -->
<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>	
<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- jQuery Knob Chart -->
<script src="assets/vendor_components/jquery-knob/js/jquery.knob.js"></script>

<!-- daterangepicker -->
<script src="assets/vendor_components/moment/min/moment.min.js"></script>
<script src="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->
<script src="assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>

<!-- Slimscroll -->
<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- mpt_admin App -->
<script src="js/template.js"></script>

<!-- mpt_admin dashboard demo (This is only for demo purposes) -->
<script src="js/pages/dashboard.js"></script>

<!-- mpt_admin for demo purposes -->
<script src="js/demo.js"></script>


</body>
</html>
