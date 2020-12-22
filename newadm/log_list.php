<?php include("common/gaurav.library.php");
echo protect_admin();
$successArr = [];
if(isset($_GET['delete_id']))
{
	$delete_id=$_GET['delete_id'];
	$sql=$conn->prepare("select * from tbl_log where id='$delete_id'");
	$sql->execute();
	$row=$sql->fetch(PDO::FETCH_OBJ);

	if($row)
	{
		$ip_address = $row->ip_address;
		$sql=$conn->prepare("delete from tbl_log where ip_address='$ip_address'");
		$result=$sql->execute();
		if($result)
		{
			$successArr[]="Record deleted successfully!!!";	 
		}
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

<title><?=SITE_NAME;?> | Visit Log</title>

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
&nbsp;
</h1>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="breadcrumb-item active">Visit Log</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-12">

<div class="box">

<!-- /.box-header -->
<div class="box-body">

<table id="example1" class="table table-bordered table-striped table-responsive">
<thead>
<tr style="background-color:#122F3B;">
<th style="width:15%;color:#fff;">No</th>
<th style="width:15%;color:#fff;">Visit Time</th>
<th style="width:20%;color:#fff;">User IP</th>
<th style="width:25%;color:#fff;">User Location</th>
<th style="width:15%;color:#fff;">Action</th>
</tr>
</thead>				
<tbody>

<?php
$stmt=$conn->prepare("select id, ip_address, country_code, country, city, max(created_at) created_at from tbl_log GROUP BY ip_address order by created_at DESC");
$sno=1;
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_OBJ))
{

?>
<tr>
<td><?=$sno;?></td>
<td><?php echo date('m/d/Y H:i:s', strtotime($row->created_at));?></td>
<td><?=$row->ip_address;?></td>
<td><img src="https://www.countryflags.io/<?php echo $row->country_code; ?>/shiny/64.png" height="32" width="32">&nbsp;
	<?=$row->city;?>, <?=$row->country;?>
</td>
<td><a href="view_log.php?id=<?=$row->id;?>" class="btn btn-info btn-xs">View Log</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="log_list.php?delete_id=<?=$row->id;?>" class="btn btn-danger btn-xs" onclick="return checkDelete()">Delete</a>
</td>
</tr>
<?php $sno++; } ?>
</tbody>

</table>
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
