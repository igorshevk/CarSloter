<?php include("common/gaurav.library.php");
echo protect_admin();
if(isset($_GET['cid']))
{
	$cid=$_GET['cid'];
}
$sql=$conn->prepare("select * from tbl_countries where country_id=:cid");
$sql->bindParam(":cid",$cid,PDO::PARAM_STR);
$sql->execute();
$results=$sql->fetch(PDO::FETCH_OBJ);


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

      <title><?=SITE_NAME;?> | Edit Country</title>
  
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
	
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
 
	
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
        Edit Country
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> Edit Country</li>
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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Country Name</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="country_name" required="" placeholder="Country Name" value="<?=$results->country_name;?>">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">ISO Code</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="country_iso_code" required="" placeholder="ISO Code" value="<?=$results->country_iso_code;?>">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">ISD Code</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="country_isd_code" required="" placeholder="ISD Code" value="<?=$results->country_isd_code;?>">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Flag Image</label>
				  <div class="col-sm-10">
					<input type="file" class="form-control" name="country_flag_image">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Previous Flag Image</label>
				  <div class="col-sm-10">
				  <?php if(!empty($results->country_flag_image)) { ?>
					<img src="uploaded_file/flag/<?=$results->country_flag_image;?>" height="80" width="80">
				     <?php } else {?>
				  <img src="images/no-img.png" height="80" width="80">
				  <?php } ?>
				 </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
				  <div class="col-sm-10">
					<select class="form-control" name="country_status">
                      <option value="0" <?php if($results->country_status=='') echo "selected='selected'"; ?>>--Select Status--</option>
					  <option value="1" <?php if($results->country_status=='1') echo "selected='selected'"; ?>>Active</option>
					  <option value="0" <?php if($results->country_status=='0') echo "selected='selected'"; ?>>Inactive</option>
					</select>
				  </div>
				</div>
				
								
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				  <div class="col-sm-10">
					<input type="submit" class="btn btn-success" name="update" value="Update">
				  </div>
				</div>
		     	</form>
				<?php
				if(isset($_POST['update']))
         {
      $country_name=$_POST['country_name'];
	  $country_iso_code=$_POST['country_iso_code'];
	  $country_isd_code=$_POST['country_isd_code'];
	  
	  
	 $country_img=$_FILES['country_flag_image']['name'];
	 $img_location=$_FILES['country_flag_image']['tmp_name'];
	 $date_time=date('d-m-Y h-i-s');
	 $rand=rand();
	 if($country_img!="")
	 {
	 $ncountry_img=$date_time.'-'.$rand.'-'.$country_img;
	 } else 
	 {
		$ncountry_img=$results->country_flag_image;
	 }
	move_uploaded_file($img_location,"uploaded_file/flag/".$ncountry_img);
	$country_status=$_POST['country_status'];
	
    $stmt=$conn->prepare("update tbl_countries set country_name=:country_name,country_iso_code=:country_iso_code,country_isd_code=:country_isd_code,country_flag_image=:ncountry_img,country_status=:country_status where country_id=:cid");	

	if($country_status==1)
	{
	$stmt_prdct=$conn->prepare("update tbl_products set p_status=1  where p_country='$cid'");
     $stmt_prdct->execute();	
	} else
	{
	$stmt_prdct=$conn->prepare("update tbl_products set p_status=0  where p_country='$cid'");	
     $stmt_prdct->execute();
	}
    
	
   $stmt->bindParam(":country_name",$country_name, PDO::PARAM_STR);
   $stmt->bindParam(":country_iso_code",$country_iso_code, PDO::PARAM_STR);
   $stmt->bindParam(":country_isd_code",$country_isd_code, PDO::PARAM_STR);
   $stmt->bindParam(":ncountry_img",$ncountry_img, PDO::PARAM_STR);
   $stmt->bindParam(":country_status",$country_status, PDO::PARAM_STR);
    $stmt->bindParam(":cid",$cid, PDO::PARAM_STR);
 
   try {
	    $result=$stmt->execute();
      }
   catch (PDOException $e){
	echo $e->getMessage();
   }
   if($result)
   {
	   echo "<script>window.location.href='country_list.php'</script>";
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
