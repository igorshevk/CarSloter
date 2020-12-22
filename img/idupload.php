<?php include('common/config.php');
	$session_id=$_SESSION['USER'];
function protect_user()
{
	if(empty($_SESSION['USER']))
	{
		echo "<script>window.location.href='login.php'</script>";
	}
}
if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
}

echo protect_user();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=SITE_NAME;?></title>
<link href="https://fonts.googleapis.com/css?family=Gidugu" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>

<?php include('common/topbar.php'); ?>
<?php include('common/logo_topbar.php'); ?>
<div class="top-baner">

<div class="menu-top">
<div class="container">
<div class="row">
<div class="col-sm-12">
 <?php include('common/navbar.php'); ?>
</div>
</div>
</div>
</div>

<div class="body-main-section1">
<div class="container">
<div class="row">
<div class="col-sm-12 text-center">
<h1>Upload Id</h1>
<ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Upload Id</li>          
        </ol>
</div><!-- col sm 12 -->
</div><!-- row -->
</div><!-- container -->
</div>
</div>
<div class="new-emplo">
<div class="container mtp content-temp1">
<div class="row">		
	
<div class="col-sm-12 col-xs-12 main-content-widgets">
  <div class="sectionBlock">        
      <div class="sectionContent">
              
		<h2>The final Step</h2>
		
		<div class="col-sm-7 col-xs-12" style="border:3px dotted #DCDFE0;">
		<br>
		<p style="font-size:15px;">The Complete the registration and bid please submit a photo with ID(Passport, ID Card, driving licence) in high quality.</p>
		<p style="font-size:15px;">The copy of the ID is the required to sign an agreement with you, and for invoicing when you buying an item.</p>
		<p style="font-size:15px;">This Servs also as your acceptance of the <a href="page.php?url=terms">terms</a> and full commitment of purchase.</p>
		<p style="font-size:16px;color:red;">In case of payment rejection our lawyers will use this agreement in court to pursue foreclosure proceedings.</p>
		<p style="font-size:15px;">Make sure the document is clearly visible and is 100% readble otherwise your bids will be canceled and your account suspended.</p><br>
		<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file" class="form-control" name="u_document" required>
  </div><br>
  <p>You can send documents by e-mail for manual verification: <a href="#">support@autopawn.shop</a> </p>
 <p style="font-size:15px;">(.jpg, .jpeg, .png) image type accepted 16mb max size.  </p>
  <button type="submit" class="btn btn-success" name="update">Continue</button>
</form>

<?php
	if(isset($_POST['update']))
    {
	$doc_img1=$_FILES['u_document']['name'];
	$img1_location=$_FILES['u_document']['tmp_name'];
	$admPath=ADMIN_PATH;
	$rand=rand();
	if($doc_img1!="")
	{
	$ndoc_img1=$date_time.'-'.$rand.'-'.$doc_img1;
	} else 
	{
		$ndoc_img1="";
	}
	move_uploaded_file($img1_location,$admPath."/uploaded_file/document/".$ndoc_img1);
	//echo "update tbl_users set u_document='$ndoc_img1' where u_id='$session_id'";
	///exit;
  $stmt=$conn->prepare("update tbl_users set u_document=:ndoc_img1 where u_id=:session_id");	
   $stmt->bindParam(':ndoc_img1',$ndoc_img1, PDO::PARAM_STR);
   $stmt->bindParam(':session_id',$session_id,PDO::PARAM_STR);
    $result=$stmt->execute();
   if($result)
   {
	   
$to ='support@autopawn.shop';
$subject = "Id Prood";
$site_url=SITE_URL;
$admin_path=ADMIN_PATH;
$folder='uploaded_file';
$subfolder='document';
$doc_name=$ndoc_img1;
$message = "
<p>Hi,</p>
<img src='".$site_url."/".$admin_path."/".$folder."/".$subfolder."/".$doc_name."'>
";
///message2="Someone Register on website";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <no-reply@autopawn.shop>' . "\r\n";
//$headers .= 'Cc: support@autopawn.shop' . "\r\n";

mail($to,$subject,$message,$headers); 
     
   echo "<script>window.alert('Id uploaded successfully')</script>";
    echo "<script>window.location.href='forder.php?pid=$pid'</script>";
   
    ///echo "<script> window.history.go(-2)</script>";
	} else 
	{
		echo "<script>window.alert('error')</script>";
	}
   }
				
				?>
		</div>
		<div class="col-sm-5 col-xs-12" style="border:1px solid #DCDFE0;">
		<center>
		 <img src="img/idcard.jpg" height="180" width="300">
		 	</center>
		 </div>
			  </div>
  </div>
    <!-- End sectionBlock -->             
</div>

    <!--end main-content-widgets -->
   

   
            <!-- EndBody -->
        </div>
    </div>
    </div>
  <?php include('common/footer.php'); ?>
</body>
</html>
