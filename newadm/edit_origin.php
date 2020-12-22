<?php include("common/gaurav.library.php");
echo protect_admin();	
if(isset($_GET['oid']))
{
	$oid=$_GET['oid'];
}
$sql=$conn->prepare("select * from tbl_origin where o_id='$oid'");
$sql->execute();
$row=$sql->fetch(PDO::FETCH_OBJ);
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

      <title><?=SITE_NAME;?> | Edit Origin</title>
  
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
        Edit Origin
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> Edit Origin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">&nbsp;</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
			
			    <form method="POST" action="" enctype="multipart/form-data">
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Country</label>
				  <div class="col-sm-10">
					<select class="form-control" name="o_country_id">
                      <option value="0">--Select Country--</option>
					  <?php $sql2=$conn->prepare("select * from tbl_countries where country_status='1'");
                            $sql2->execute();
							while($row2=$sql2->fetch(PDO::FETCH_OBJ))
							{
					  ?>
					  <option value="<?php echo $row2->country_id; ?>" <?php if($row2->country_id==$row->o_country_id) {echo "selected='selected'";} ?>><?php echo $row2->country_name; ?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
				
            	<div class="form-group row" id="#frmgrp">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Origin Name</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="o_title" value="<?=$row->o_title;?>">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Category Status</label>
				  <div class="col-sm-10">
					<select class="form-control" name="o_status">
                      <option value="0" <?php if($row->o_status=='') {echo "selected='selected'"; }?>>--Select Status--</option>
					  <option value="1" <?php if($row->o_status=='1') {echo "selected='selected'"; }?>>Active</option>
					  <option value="0" <?php if($row->o_status=='0') {echo "selected='selected'"; }?>>Inactive</option>
					</select>
				  </div>
				</div>
				
								
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				  <div class="col-sm-10">
					<input type="submit" class="btn btn-success" name="update" value="Update Category">
				  </div>
				</div>
		     	</form>
				<?php
				if(isset($_POST['update']))
                {
			   $o_country_id=$_POST['o_country_id'];
	           $o_title=$_POST['o_title'];
	           $o_status=$_POST['o_status'];
               $stmt=$conn->prepare("update tbl_origin set o_country_id=:o_country_id, o_title=:o_title,o_status=:o_status where o_id=:oid");	
               $stmt->bindParam(":o_country_id",$o_country_id, PDO::PARAM_STR);
               $stmt->bindParam(":o_title",$o_title, PDO::PARAM_STR);
			   $stmt->bindParam(":o_status",$o_status, PDO::PARAM_INT);
			    $stmt->bindParam(":oid",$oid, PDO::PARAM_INT);
               $result=$stmt->execute();
               if($result)
               {
	           echo "<script>window.location.href='origin_list.php'</script>";
              }
              }
			  ?>
			
			
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
     
     
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include("common/footer_inc.php"); ?>


  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- bonitoadmin App -->
	<script src="js/template.js"></script>
	
	<!-- bonitoadmin for demo purposes -->
	<script src="js/demo.js"></script>
	
</body>
</html>
