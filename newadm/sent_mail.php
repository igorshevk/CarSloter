<?php include("common/gaurav.library.php");; 
echo protect_admin();
$successArr = [];
if(isset($_GET['mailid']))
{
 $mailid=$_GET['mailid'];
 $sql=$conn->prepare("delete from tbl_mailbox where mail_id='$mailid'");
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

    <title><?=SITE_NAME;?> | Sent Mail</title>
    
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
        <a href="compose_mail.php" class="btn btn-info">Compose Mail</a>
      </h1>
      
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
                                            <th style="color:#fff;">S.No</th>
											<th style="color:#fff;">Mail To</th>
											<th style="color:#fff;">Subject</th>
											<th style="color:#fff;">Message</th>
											<th style="color:#fff;">Date/Time</th>
											<th style="color:#fff;">Delete</th>
					</tr>
				</thead>				
				<tbody>
				<?php $sql=$conn->prepare("select * from tbl_mailbox order by mail_id DESC"); 
				 $sql->execute();
				$sno=1;
				 while($row=$sql->fetch(PDO::FETCH_OBJ))
				  {
					?>
					<tr>
						<td style="width:10%;"><?php echo $sno; ?></td>
											<td style="width:10%;"><?php echo $row->mail_to; ?></td>
											<td style="width:20%;"><?php echo $row->mail_subject; ?></td>
											<td style="width:40%;"><?php echo $row->mail_message; ?></td>
                                            <td style="width:10%;"><?php echo $row->created_at; ?></td>	
<td style="width:10%;">
						<a href="sent_mail.php?mailid=<?=$row->mail_id;?>" onclick="return checkDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>
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


  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  
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
