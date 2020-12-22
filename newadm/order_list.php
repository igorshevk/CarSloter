<?php include("common/gaurav.library.php");
echo protect_admin();
$successArr = [];
if(isset($_GET['oid']))
{
 $oid=$_GET['oid'];
 $sql=$conn->prepare("delete from tbl_order where order_id='$oid'");
 $result=$sql->execute();
 if($result)
 {
	$successArr[]="Record deleted successfully!!!";	 
 }
}

if(isset($_POST['search']))
	  {
		  $start_date=$_POST['start_date'];
		  $end_date=$_POST['end_date'];
		 
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

   <title><?=SITE_NAME;?> | Manage Order</title>
  
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
	 <a href="manage_order.php" class="btn btn-info">  Back To Order List</a>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Manage Order</li>
      </ol>
    </section>

    <!-- Main content -->
	
    <section class="content">
	
	
	
      <div class="row">
        <div class="col-12">
         
         <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
			  <?php foreach($successArr as $successlist)  { ?>
			  <div class="alert alert-success"><?php echo $successlist;
			   echo "<br>"; ?></div>
			   <?php }  ?> 
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
					<tr style="background-color:#122F3B;">
						<th style="width:10%;color:#fff;">S.No</th>
						<th style="width:15%;color:#fff;">Email Id</th>
						<th style="width:20%;color:#fff;">Name</th>
						<th style="width:20%;color:#fff;">Product Title</th>
						<th style="width:10%;color:#fff;">Price</th>
						<th style="width:10%;color:#fff;">Status</th>
						<th style="width:15%;color:#fff;">Action</th>
					</tr>
				</thead>				
				<tbody>
					
					<?php
					$stmt=$conn->prepare("select * from tbl_order where order_date BETWEEN '$start_date' AND '$end_date' order by order_id DESC");
					$sno=1;
					$stmt->execute();
					while($row=$stmt->fetch(PDO::FETCH_OBJ))
					{
						$order_pid=$row->order_pid;
						$order_cid=$row->order_cid;
						$order_status=$row->order_status;
						/////find user details/////
						$query=$conn->prepare("select * from tbl_users where u_id='$order_cid'");
                        $query->execute();
                        $res=$query->fetch(PDO::FETCH_OBJ);
                        $username=$res->u_email;
						$fname=$res->u_fname;
						/////end of user details/////
						
						/////find product details/////
						$query2=$conn->prepare("select * from tbl_products where p_id='$order_pid'");
                        $query2->execute();
                        $res2=$query2->fetch(PDO::FETCH_OBJ);
                        $product_title=$res2->p_title;
						$product_price=$res2->p_price;
						$p_currency=$res2->p_currency;
						
							/////end of product details/////
							/////find order status details/////
							if($order_status==1)
							{
							$status="Pending";	
							} else if($order_status==2)
							{
							 $status="Rejected";
							} else if($order_status==3)
							{
								$status="Accepted";
							}
							/////end of order status/////
					?>
					 <tr>
						<td><?=$sno;?></td>
						<td><?=$username;?></td>
						<td><?=$fname;?></td>
						<td><?=$product_title;?></td>
						<td><?=$p_currency?><?=$product_price;?></td>
						<td><?=$status;?></td>
						<td>
						<a href="manage_order.php?oid=<?=$row->order_id;?>" onclick="return checkDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
