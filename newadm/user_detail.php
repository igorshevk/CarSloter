<?php include("common/gaurav.library.php");
echo protect_agent();
if(isset($_GET['uid']))
{
	$uid=$_GET['uid'];
}
$sql=$conn->prepare("select * from tbl_users where u_id=:uid");
$sql->bindParam(":uid",$uid,PDO::PARAM_STR);
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

      <title><?=SITE_NAME;?> | User Detail</title>
  
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
        User Detail
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> User Detail</li>
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
				
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
				  <div class="col-sm-10">
					<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_fname;?></label>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_lname;?></label>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Refferral Code</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_refferral;?></label>
				  </div>
				</div>
				
				 <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_phone;?></label>
				  </div>
				</div>

                   <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Email Id</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_email;?></label>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Document</label>
				  <div class="col-sm-10">
					<a href="uploaded_file/document/<?=$results->u_document;?>" class="btn btn-success" download>Download</a>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Country</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_country;?></label>
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">State / City</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_state_city;?></label>
				  </div>
				</div>
				

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Street Number</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_street_house;?></label>
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Postal Code</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_postalcode;?></label>
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Company Name</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_company;?></label>
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Company Code</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->u_ccode;?></label>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">VAT Type</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->vat_type;?></label>
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">VAT Number</label>
				  <div class="col-sm-10">
				  	<label for="example-text-input" class="col-sm-2 col-form-label"><?=$results->vat_number;?></label>
				  </div>
				</div>
								
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
				  <div class="col-sm-10">
				  	<?php if($results->u_status=='') { ?>
				  		<label for="example-text-input" class="col-sm-2 col-form-label"></label>
				  	<?php }else if($results->u_status=='1') { ?>
				  		<label for="example-text-input" class="col-sm-2 col-form-label">Active</label>
				  	<?php }else if($results->u_status=='0') { ?>
				  		<label for="example-text-input" class="col-sm-2 col-form-label">Block</label>
				  	<?php } ?>
				  </div>
				</div>
				
			
			
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
        <script>
			CKEDITOR.replace( 'brand_desc' );
		</script>
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
