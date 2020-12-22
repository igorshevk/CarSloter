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

      <title><?=SITE_NAME;?> | Edit User</title>
  
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
        Edit User
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> Edit User</li>
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
				  <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_fname"  placeholder="First Name" value="<?=$results->u_fname;?>">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_lname"  placeholder="Last Name" value="<?=$results->u_lname;?>">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Refferral Code</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_refferral"  placeholder="Refferral Code" value="<?=$results->u_refferral;?>">
				  </div>
				</div>
				
				 <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_phone"  placeholder="Phone Number" value="<?=$results->u_phone;?>">
				  </div>
				</div>

                   <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Email Id</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_email"  placeholder="Email Id" value="<?=$results->u_email;?>">
				  </div>
				</div>

                    

                   <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_password"  placeholder="Password" value="<?=$results->u_password;?>">
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
					<input type="text" class="form-control" name="u_country"  placeholder="Country" value="<?=$results->u_country;?>">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">State / City</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_state_city"  placeholder="State / City" value="<?=$results->u_state_city;?>">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Street Number</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_street_house"  placeholder="Street Number / House" value="<?=$results->u_street_house;?>">
				  </div>
				</div>
				
				

				
			 <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Postal Code</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_postalcode"  placeholder="Postal Code" value="<?=$results->u_postalcode;?>">
				  </div>
				</div>
				
				 <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Company Name</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_company"  placeholder="Company Name" value="<?=$results->u_company;?>">
				  </div>
				</div>
				
				
				 <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Company Code:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="u_ccode"  placeholder="Company Code" value="<?=$results->u_ccode;?>">
				  </div>
				</div>
				
				
				 <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">VAT Type</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="vat_type"  placeholder="VAT Type" value="<?=$results->vat_type;?>">
				  </div>
				</div>
				
				
				 <div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label"> VAT Number</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="vat_number"  placeholder="VAT Number" value="<?=$results->vat_number;?>">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
				  <div class="col-sm-10">
					<select class="form-control" name="u_status">
                      <option value="0" <?php if($results->u_status=='') echo "selected='selected'"; ?>>--Select Status--</option>
					  <option value="1" <?php if($results->u_status=='1') echo "selected='selected'"; ?>>Active</option>
					  <option value="0" <?php if($results->u_status=='0') echo "selected='selected'"; ?>>Block</option>
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
	$u_fname=$_POST['u_fname'];
	$u_lname=$_POST['u_lname'];
	$u_refferral=$_POST['u_refferral'];
    $u_phone=$_POST['u_phone'];
	$u_email=$_POST['u_email'];
	$u_password=$_POST['u_password'];
	$u_country=$_POST['u_country'];
	$u_state_city=$_POST['u_state_city'];
	$u_street_house=$_POST['u_street_house'];
	$u_postalcode=$_POST['u_postalcode'];
	$u_company=$_POST['u_company'];
	$u_ccode=$_POST['u_ccode'];
	$vat_type=$_POST['vat_type'];
	$vat_number=$_POST['vat_number'];
	$u_status=$_POST['u_status'];
	
    $stmt=$conn->prepare("update tbl_users set u_fname=:u_fname,u_lname=:u_lname,u_refferral=:u_refferral,u_phone=:u_phone,u_email=:u_email,u_password=:u_password,u_country=:u_country,u_state_city=:u_state_city,u_street_house=:u_street_house,u_postalcode=:u_postalcode,u_company=:u_company,u_ccode=:u_ccode,vat_type=:vat_type,vat_number=:vat_number,u_status=:u_status where u_id=:uid");	

   $stmt->bindParam(':u_fname',$u_fname,PDO::PARAM_STR);
   $stmt->bindParam(':u_lname',$u_lname,PDO::PARAM_STR);
   $stmt->bindParam(':u_refferral',$u_refferral,PDO::PARAM_STR);
   $stmt->bindParam(':u_phone',$u_phone,PDO::PARAM_STR);
   $stmt->bindParam(':u_email',$u_email,PDO::PARAM_STR);
   $stmt->bindParam(':u_password',$u_password,PDO::PARAM_STR);
   $stmt->bindParam(':u_country',$u_country,PDO::PARAM_STR);
   $stmt->bindParam(':u_state_city',$u_state_city,PDO::PARAM_STR);
	$stmt->bindParam(':u_street_house',$u_street_house,PDO::PARAM_STR);
	$stmt->bindParam(':u_postalcode',$u_postalcode,PDO::PARAM_STR);
	 $stmt->bindParam(':u_company',$u_company,PDO::PARAM_STR);
	$stmt->bindParam(':u_ccode',$u_ccode,PDO::PARAM_STR);
	 $stmt->bindParam(':vat_type',$vat_type,PDO::PARAM_STR);
	 $stmt->bindParam(':vat_number',$vat_number,PDO::PARAM_STR);
   $stmt->bindParam(':u_status',$u_status,PDO::PARAM_STR);
   $stmt->bindParam(':uid',$uid,PDO::PARAM_STR);
 
   try {
	    $result=$stmt->execute();
      }
   catch (PDOException $e){
	echo $e->getMessage();
   }
   if($result)
   {
	   echo "<script>window.location.href='manage_users.php'</script>";
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
