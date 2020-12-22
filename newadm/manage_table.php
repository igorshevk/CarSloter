<?php include("common/gaurav.library.php");
echo protect_admin();
$successArr = [];
if(isset($_GET['uid']))
{
$uid=$_GET['uid'];
$sql=$conn->prepare("delete from tbl_users where u_id='$uid'");
$result=$sql->execute();
if($result)
{
$successArr[]="Record deleted successfully!!!";	 
}
}
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

<title><?=SITE_NAME;?> | Manage Users</title>

<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.min.css">

<!-- Ionicons -->
<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.min.css">		

<!-- Theme style -->
<link rel="stylesheet" href="css/master_style.css">

<!-- bonitoadmin Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="css/skins/_all-skins.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<script>
function checkDelete(){
return confirm('Are you sure?');
}
</script>
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
Manage Users
</h1>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="breadcrumb-item active"> Manage Users</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-12">

<div class="box">

<!-- /.box-header -->
<div class="box-body">



<div class="row">
<!-- Middle Content Area -->

<div class="col-md-12 col-xs-12 col-sm-12">



<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
<li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
</ul>

<div class="tab-content">
<div id="home" class="tab-pane fade in active">
<h3>HOME</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
<div id="menu1" class="tab-pane fade">
<h3>Menu 1</h3>
<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<div id="menu2" class="tab-pane fade">
<h3>Menu 2</h3>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
</div>
<div id="menu3" class="tab-pane fade">
<h3>Menu 3</h3>
<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
</div>
</div>

<!--/.container-->




<!-- Single Ad End -->

</div>



<!-- Right Sidebar -->

<!-- Middle Content Area  End -->
</div>





</div>
<!-- /.box-body -->
</div>
<!-- /.box -->


<!-- /.box -->          
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include("common/footer_inc.php"); ?>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>

<!-- popper -->
<script src="assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="assets/vendor_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- bonitoadmin App -->
<script src="js/template.js"></script>

<!-- bonitoadmin for demo purposes -->
<script src="js/demo.js"></script>

<!-- This is data table -->
<script src="assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>

<!-- start - This is for export functionality only -->
<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
<script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
<script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
<script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->

<!-- bonitoadmin for Data Table -->
<script src="js/pages/data-table.js"></script>


</body>

</html>
