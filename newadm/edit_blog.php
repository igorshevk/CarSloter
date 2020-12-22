<?php include("common/gaurav.library.php");
echo protect_admin();
if(isset($_GET['bid']))
{
	$bid=$_GET['bid'];
}
$sql=$conn->prepare("select * from tbl_blog where b_id=:bid");
$sql->bindParam(":bid",$bid,PDO::PARAM_STR);
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

      <title><?=SITE_NAME;?> | Edit Blog</title>
  
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
        Edit Blog
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> Edit Blog</li>
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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
				  <div class="col-sm-10">
					<select class="form-control" name="b_bcat_id">
                      <option value="0">--Select Category--</option>
					  <?php $sql=$conn->prepare("select * from tbl_blog_category where bcat_status='1'");
                            $sql->execute();
							while($row=$sql->fetch(PDO::FETCH_OBJ))
							{
					  ?>
					  <option value="<?php echo $row->bcat_id; ?>" <?php if($row->bcat_id==$results->b_bcat_id) {echo "selected='selected'";} ?>><?php echo $row->bcat_name; ?></option>
						<?php } ?>
					</select>
				  </div>
				</div>
				
				
				
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
				  <div class="col-sm-10">
					<textarea class="form-control" name="b_title" required="" placeholder="Blog Title"><?=$results->b_title;?></textarea>
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
				  <div class="col-sm-10">
					<input type="file" class="form-control" name="b_image">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Previous Blog Image</label>
				  <div class="col-sm-10">
				  <?php if(!empty($results->b_image)) { ?>
					<img src="uploaded_file/blog/<?=$results->b_image;?>" height="80" width="80">
				     <?php } else {?>
				  <img src="images/no-img.png" height="80" width="80">
				  <?php } ?>
				 </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
				  <div class="col-sm-10">
					<textarea class="form-control" name="b_desc" required="" placeholder="Blog Description"><?=$results->b_desc;?></textarea>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Blog Status</label>
				  <div class="col-sm-10">
					<select class="form-control" name="b_status">
                      <option value="0" <?php if($results->b_status=='') echo "selected='selected'"; ?>>--Select Status--</option>
					  <option value="1" <?php if($results->b_status=='1') echo "selected='selected'"; ?>>Active</option>
					  <option value="0" <?php if($results->b_status=='0') echo "selected='selected'"; ?>>Inactive</option>
					</select>
				  </div>
				</div>
				
								
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				  <div class="col-sm-10">
					<input type="submit" class="btn btn-success" name="update" value="Update Blog">
				  </div>
				</div>
		     	</form>
				<?php
				if(isset($_POST['update']))
{
	$b_bcat_id=$_POST['b_bcat_id'];
	$b_title=$_POST['b_title'];
	
	$blog_img=$_FILES['b_image']['name'];
	$img_location=$_FILES['b_image']['tmp_name'];
	$date_time=date('d-m-Y h-i-s');
	$rand=rand();
	if($blog_img!="")
	{
	$nblog_img=$date_time.'-'.$rand.'-'.$blog_img;
	} else 
	{
		$nblog_img=$results->b_image;
	}
	move_uploaded_file($img_location,"uploaded_file/blog/".$nblog_img);
	
	$b_desc=$_POST['b_desc'];
	$b_status=$_POST['b_status'];
	
    $stmt=$conn->prepare("update tbl_blog set b_bcat_id='$b_bcat_id',b_title='$b_title',b_image='$nblog_img',b_desc='$b_desc',b_status='$b_status' where b_id='$bid'");	

   $stmt->bindParam(":b_bcat_id",$b_bcat_id, PDO::PARAM_STR);
   $stmt->bindParam(":b_title",$b_title, PDO::PARAM_STR);
   $stmt->bindParam(":nblog_img",$nblog_img, PDO::PARAM_STR);
   $stmt->bindParam(":b_desc",$b_desc, PDO::PARAM_STR);
   $stmt->bindParam(":b_status",$b_status, PDO::PARAM_STR);
 
   try {
	    $result=$stmt->execute();
      }
   catch (PDOException $e){
	echo $e->getMessage();
   }
   if($result)
   {
	   echo "<script>window.location.href='blog_list.php'</script>";
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
			CKEDITOR.replace( 'b_desc' );
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
