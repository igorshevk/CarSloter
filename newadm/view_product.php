<?php include("common/gaurav.library.php");
echo protect_admin();
if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
}
$sql=$conn->prepare("select * from tbl_products where p_id=:pid");
$sql->bindParam(":pid",$pid,PDO::PARAM_STR);
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

      <title><?=SITE_NAME;?> | View Product</title>
  
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
        View Product
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> View Product</li>
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
	  <th style="width:50%;">Item No.</th>
       <td style="width:50%;"><? echo '17990' + $results->p_id; ?></td>
      </tr>
	
      <tr>
	  <th style="width:50%;">Product Title</th>
       <td style="width:50%;"><?=$results->p_title;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Year</th>
       <td style="width:50%;"><?=$results->p_year;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Mileage</th>
       <td style="width:50%;"><?=$results->p_mileage;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Location</th>
       <td style="width:50%;"><?=$results->p_location;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Transmission</th>
       <td style="width:50%;"><?=$results->p_transmission;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Condition</th>
       <td style="width:50%;"><?=$results->p_condition;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Interior</th>
       <td style="width:50%;"><?=$results->p_interior;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Stock</th>
       <td style="width:50%;"><?=$results->p_stock;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">VIN</th>
       <td style="width:50%;"><?=$results->p_vin;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Exterior</th>
       <td style="width:50%;"><?=$results->p_exterior;?></td>
      </tr>
	     <?php if($results->p_image1!="") { ?>
	   <tr>
	  <th style="width:50%;"> Product Image1</th>
       <td style="width:50%;"><img src="<?=$results->p_image1;?>" height="80" width="80"></td>
      </tr>
	    <?php } ?>
	   <?php if($results->p_image2!="") { ?>
	   <tr>
	  <th style="width:50%;">Product Image2</th>
       <td style="width:50%;"><img src="<?=$results->p_image2;?>" height="80" width="80"></td>
      </tr>
	    <?php } ?>
	    <?php if($results->p_image3!="") { ?>
	   <tr>
	  <th style="width:50%;">Product Image3</th>
       <td style="width:50%;"><img src="<?=$results->p_image3;?>" height="80" width="80"></td>
      </tr>
	    <?php } ?>
	   <?php if($results->p_image4!="") { ?>
	   <tr>
	  <th style="width:50%;">Product Image4</th>
       <td style="width:50%;"><img src="<?=$results->p_image4;?>" height="80" width="80"></td>
      </tr>
	  	   <?php } ?>
	     <?php if($results->p_image5!="") { ?>
	    <tr>
	  <th style="width:50%;">Product Image5</th>
       <td style="width:50%;"><img src="<?=$results->p_image5;?>" height="80" width="80"></td>
      </tr>
	   <?php } ?>
	   <?php if($results->p_image6!="") { ?>
	    <tr>
	  <th style="width:50%;">Product Image6</th>
       <td style="width:50%;"><img src="<?=$results->p_image6;?>" height="80" width="80"></td>
      </tr>
	   <?php } ?>
	  
	  <?php if($results->p_image7!="") { ?>
	    <tr>
	  <th style="width:50%;">Product Image7</th>
       <td style="width:50%;"><img src="<?=$results->p_image7;?>" height="80" width="80"></td>
      </tr>
	  <?php } ?>
	  
	   <?php if($results->p_image8!="") { ?>
	    <tr>
	  <th style="width:50%;">Product Image8</th>
       <td style="width:50%;"><img src="<?=$results->p_image8;?>" height="80" width="80"></td>
      </tr>
	   <?php } ?>
	  
	    <?php if($results->p_image9!="") { ?>
	    <tr>
	  <th style="width:50%;">Product Image9</th>
       <td style="width:50%;"><img src="<?=$results->p_image9;?>" height="80" width="80"></td>
      </tr>
	   <?php } ?>
	  
	  <?php if($results->p_image10!="") { ?>
	   <tr>
	  <th style="width:50%;">Product Image10</th>
       <td style="width:50%;"><img src="<?=$results->p_image10;?>" height="80" width="80"></td>
      </tr>
	  <?php } ?>
	   <tr>
	  <th style="width:50%;">Product Description</th>
       <td style="width:50%;"><?=$results->p_desc;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Price</th>
       <td style="width:50%;">$<?=$results->p_price;?></td>
      </tr>
	  
	   <tr>
	  <th style="width:50%;">Country</th>
	  <?php $sql2=$conn->prepare("select * from tbl_countries where country_id=$results->p_country");
                            $sql2->execute();
							$row2=$sql2->fetch(PDO::FETCH_OBJ);
					       ?>
       <td style="width:50%;"><?php echo $row2->country_name; ?></td>
      </tr>
	  
	  
	  
	   <tr>
	  <th style="width:50%;">Category</th>
	  <?php $sql=$conn->prepare("select * from tbl_maincategory where mcat_id=$results->p_mcat_id");
                            $sql->execute();
						$row=$sql->fetch(PDO::FETCH_OBJ);
							  
					  ?>
       <td style="width:50%;"><?php echo $row->mcat_name; ?></td>
      </tr>
     
	 
	  <tr>
	  <th style="width:50%;">End Date</th>
       <td style="width:50%;"><?=$results->p_date;?></td>
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
