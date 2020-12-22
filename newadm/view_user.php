<?php include("common/gaurav.library.php");
echo protect_admin();
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

      <title><?=SITE_NAME;?> | View User</title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.min.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.min.css">
		
	<!-- Glyphicons -->
	<link rel="stylesheet" href="assets/vendor_components/glyphicons/glyphicon.css">
	
	<!-- daterange picker -->
	
	<link rel="stylesheet" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
	
	<!-- bootstrap datepicker -->	
	<link rel="stylesheet" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="assets/vendor_plugins/iCheck/all.css">
	
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
	
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
	
	<!-- Select2 -->
	<link rel="stylesheet" href="assets/vendor_components/select2/dist/css/select2.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="css/master_style.css">

	<!-- minimal_admin Skins. Choose a skin from the css/skins
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
 
	<script>
function getorigin(val) {
	$.ajax({
	type: "POST",
	url: "edit_get_origin.php",
	data:'o_country_id='+val,
	success: function(data){
		$("#country_list").html(data);
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
        View User Details
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> View User Details</li>
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
			 <table class="table table-bordered table-striped table-responsive">
   
    <tbody>
      <tr>
	  <th style="width:50%;">First Name</th>
       <td style="width:50%;"><?=$results->u_fname;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Last Name
</th>
       <td style="width:50%;"><?=$results->u_lname;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Refferral Code
</th>
       <td style="width:50%;"><?=$results->u_refferral;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Phone Number
</th>
       <td style="width:50%;"><?=$results->u_phone;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Email Id
</th>
       <td style="width:50%;"><?=$results->u_email;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Country</th>
       <td style="width:50%;"><?=$results->u_country;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">State / City
</th>
       <td style="width:50%;"><?=$results->u_state_city;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Street Number /House
</th>
       <td style="width:50%;"><?=$results->u_street_house;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Postal Code
</th>
       <td style="width:50%;"><?=$results->u_postalcode;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Company Name
</th>
       <td style="width:50%;"><?=$results->u_company;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;"> Company Code
</th>
  <td style="width:50%;"><?=$results->u_ccode;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">VAT Type
</th>
  <td style="width:50%;"><?=$results->vat_type;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">VAT Number
</th>
  <td style="width:50%;"><?=$results->vat_number;?></td>
      </tr>
	  
	  
	 
	 
     
    </tbody>
  </table>
			   
				
			
			
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
			CKEDITOR.replace( 'p_desc' );
		</script>
	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Select2 -->
	<script src="assets/vendor_components/select2/dist/js/select2.full.js"></script>
	
	<!-- InputMask -->
	<script src="assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
	<script src="assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
	
	<!-- date-range-picker -->
	<script src="assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<!-- bootstrap datepicker -->
	<script src="assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	
	<!-- bootstrap color picker -->
	<script src="assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	
	<!-- bootstrap time picker -->
	<script src="assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- iCheck 1.0.1 -->
	<script src="assets/vendor_plugins/iCheck/icheck.min.js"></script>
	
	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- minimal_admin App -->
	<script src="js/template.js"></script>
	
	<!-- minimal_admin for demo purposes -->
	<script src="js/demo.js"></script>
	
	<!-- minimal_admin for advanced form element -->
	<script src="js/pages/advanced-form-element.js"></script>
	
</body>
</html>
