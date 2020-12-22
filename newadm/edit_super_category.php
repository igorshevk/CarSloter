<?php include("common/gaurav.library.php");
echo protect_admin();	
if(isset($_GET['supercatid']))
{
	$supercatid=$_GET['supercatid'];
}
$sql=$conn->prepare("select * from tbl_supercategory where supercat_id='$supercatid'");
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

      <title><?=SITE_NAME;?> | Edit Super Category</title>
  
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  <script>
function getsubcategory(val) {
	$.ajax({
	type: "POST",
	url: "edit_get_super_subcategory.php",
	data:'scat_mcat_id='+val,
	success: function(data){
		$("#subcategory_list").html(data);
	}
	});
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
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
        Edit Super Category
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> Edit Super Category</li>
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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Main Category</label>
				  <div class="col-sm-10">
					<select class="form-control" name="supercat_mcat_id" onChange="getsubcategory(this.value);">
                      <option value="0">--Select Main Category--</option>
					  <?php $sql2=$conn->prepare("select * from tbl_maincategory where mcat_status='1'");
                            $sql2->execute();
							while($row2=$sql2->fetch(PDO::FETCH_OBJ))
							{
					  ?>
					  <option value="<?php echo $row2->mcat_id; ?>" <?php if($row2->mcat_id==$row->supercat_mcat_id) {echo "selected='selected'";} ?>><?php echo $row2->mcat_name; ?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Sub Category</label>
				  <div class="col-sm-10">
					<select class="form-control" name="supercat_scat_id" id="subcategory_list">
					<?php 
					  $subcatid=$row->supercat_scat_id;
					  $query=$conn->prepare("select * from tbl_subcategory where scat_id=$subcatid");
					  $query->bindParam(":subcatid",$subcatid,PDO::PARAM_STR);
					  $query->execute();
					  $nres=$query->fetch(PDO::FETCH_OBJ);
					  ?>
					    <option value="<?php echo $row->supercat_scat_id; ?>"><?php echo $nres->scat_name; ?></option>
					</select>
				  </div>
				</div>
				
				
            	<div class="form-group row" id="#frmgrp">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Super Category Name</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="supercat_name" value="<?=$row->supercat_name;?>"	>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Category Status</label>
				  <div class="col-sm-10">
					<select class="form-control" name="supercat_status">
                      <option value="0" <?php if($row->supercat_status=='') {echo "selected='selected'"; }?>>--Select Status--</option>
					  <option value="1" <?php if($row->supercat_status=='1') {echo "selected='selected'"; }?>>Active</option>
					  <option value="0" <?php if($row->supercat_status=='0') {echo "selected='selected'"; }?>>Inactive</option>
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
			   $supercat_mcat_id=$_POST['supercat_mcat_id'];
	           $supercat_scat_id=$_POST['supercat_scat_id'];
	           $supercat_name=$_POST['supercat_name'];
			   $supercat_status=$_POST['supercat_status'];
               $stmt=$conn->prepare("update tbl_supercategory set supercat_mcat_id=:supercat_mcat_id, supercat_scat_id=:supercat_scat_id,supercat_name=:supercat_name,supercat_status=:supercat_status where supercat_id=:supercatid");	
               $stmt->bindParam(":supercat_mcat_id",$supercat_mcat_id, PDO::PARAM_STR);
               $stmt->bindParam(":supercat_scat_id",$supercat_scat_id, PDO::PARAM_STR);
			   $stmt->bindParam(":supercat_name",$supercat_name, PDO::PARAM_STR);
			   $stmt->bindParam(":supercat_status",$supercat_status, PDO::PARAM_STR);
			   $stmt->bindParam(":supercatid",$supercatid, PDO::PARAM_STR);
			
               $result=$stmt->execute();
               if($result)
               {
	           echo "<script>window.location.href='super_category_list.php'</script>";
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
