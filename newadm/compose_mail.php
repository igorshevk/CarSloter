<?php include("common/gaurav.library.php");
echo protect_admin();
require_once('Mailer/PHPMailerAutoload.php');

if(isset($_POST['save']))
{
	$mail_to=$_POST['mail_to'];
	$mail_subject=$_POST['mail_subject'];
	$mail_message=$_POST['mail_message'];
	
    $stmt=$conn->prepare("insert into tbl_mailbox(mail_to,mail_subject,mail_message)values(:mail_to,:mail_subject,:mail_message)");	

   $stmt->bindParam(":mail_to",$mail_to, PDO::PARAM_STR);
   $stmt->bindParam(":mail_subject",$mail_subject, PDO::PARAM_STR);
   $stmt->bindParam(":mail_message",$mail_message, PDO::PARAM_STR);
   $result=$stmt->execute();
   if($result)
   {
	   
		// send mail 
		$title = 'Details about: '.$mail_subject.' on CarSloter';
		$subjectTitle = 'Details about: '.$mail_subject.' on CarSloter';
		$messageContent = $mail_message;

		$msg = '
		<html>

			<head>

				<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
				<title>'.$title.'</title>

			</head>

			<body style="background: #f1f1f1; margin: 0; font-family: Helvetica, Arial, Verdana, sans-serif;">
				<div style="background-color: #ffffff; overflow: auto;">
					<div style="max-width: 680px; width: 100%; margin: auto;">
						<div style="padding: 10px;">
							<div style="float: left;">
								<img src="https://carsloter.eu/images/logo.png" style="max-width: 100%;">
							</div>
							<div style="display: flex; float: right;">
								<div>
									<img alt="" src="https://carsloter.eu/img/unnamed.gif" style="float: left; width: 36px; height: 54px;">
									<div style="margin-left: 50px; margin-top: 5px;	line-height: 1.2; font-family: Helvetica,Arial,Verdana,sans-serif;">
										<div style="color: rgb(45, 55, 64);	font-size: 14px; font-weight: bold;">
											CarSloter Support
										</div>
										<a style="color: rgb(240, 134, 25) !important; font-size: 20px;">
											info@carsloter.eu
										</a>
									</div>
								</div>
							</div>
						</div>			
					</div>		
				</div>	
				<div style="background-color: #01948c;">
					<div style="max-width: 680px; margin: auto;">
						<div style="font-size: 21px; color: rgb(255, 255, 255);	line-height: 1.3; font-family: Helvetica, Arial, Verdana, sans-serif;
					padding: 12px 15px;">
							'.$subjectTitle.'
						</div>
					</div>
				</div>
				<div style="margin-top: 15px;">
					<div style="background-color: #ffffff; max-width: 600px; margin: auto; padding: 30px;">		
						<div style="font-size: 14px; line-height: 1.3; margin-top: 20px;">
							'.$messageContent.'
						</div>
					</div>		
				</div>	
				<div style="margin-top: 15px; text-align: center; ">
					<div style="background-color: #ffffff; max-width: 630px; margin: auto; padding: 15px;">
						<div style="font-size: 14px; line-height: 1.3; color: rgb(240, 134, 25); font-weight: bold;">
							Questions? Support: info@carsloter.eu
						</div>
					</div>
					<div style="font-family: Helvetica,Arial,Verdana,sans-serif; font-size: 11px; color: rgb(112, 118, 124); margin: 15px;">
						Copyright @ 2020 CarSloter. All rights reserved
					</div>
				</div>
			</body>
		</html>
		';	       


        $mail = new PHPMailer;
        $mail->setFrom('mailbox@carsloter.eu','CarSloter');
        ///$mail->addAddress('info@stumania.com', $name);
        $mail->addAddress($mail_to , 'CarSloter');
        ///$mail->addCC('invoice@carsloter.eu');
        ///$mail->addReplyTo('invoice@carsloter.eu', 'CarSloter');
        $mail->Subject  = $mail_subject;
        $mail->Body = $msg;
        $mail->IsHTML(true); 
        if(!$mail->send()) {
          echo "mail not sent";
        }else{
        /// echo "mail sent";
        }
	
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

      <title><?=SITE_NAME;?> | Compose mail</title>
  
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
       Compose mail
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> Compose mail</li>
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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Email Id</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="mail_to" required="" placeholder="Email Id">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Subject</label>
				  <div class="col-sm-10">
					<textarea class="form-control" name="mail_subject" required="" placeholder="Subject"></textarea>
				  </div>
				</div>
				
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Message</label>
				  <div class="col-sm-10">
					<textarea class="form-control" name="mail_message" required="" placeholder="Message"></textarea>
				  </div>
				</div>
				
				
				
				
								
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				  <div class="col-sm-10">
					<input type="submit" class="btn btn-success" name="save" value="Send">
				  </div>
				</div>
		     	</form>
				
			
			
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
			CKEDITOR.replace( 'mail_message' );
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
