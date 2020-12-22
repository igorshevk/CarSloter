<?php include("common/gaurav.library.php");
echo protect_admin();
require_once('Mailer/PHPMailerAutoload.php');
if(isset($_POST['send_invoice']))
{
	$item_no=$_POST['item_no'];
	$email_id=$_POST['email_id'];
	$amount=$_POST['amount'];
	$due_amount='';
	$paperwork=$_POST['paperwork'];
	$aucation_fee=$_POST['aucation_fee'];
	$shipping=$_POST['shipping'];
	$total_amount=$_POST['total_amount'];
	$comp_name=$_POST['comp_name'];
	$account_holder=$_POST['account_holder'];
	$account_holder_address=$_POST['account_holder_address'];
	$account_no=$_POST['account_no'];
	$routing=$_POST['routing'];
	$bank_address=$_POST['bank_address'];
	$bank_name=$_POST['bank_name'];
	
	////////////////date
   
   $date=date("d-m-Y");
	
	#find user details
	$stmt_user=$conn->prepare("select * from tbl_users where u_email='$email_id'");
	$stmt_user->execute();
	$row_user=$stmt_user->fetch(PDO::FETCH_OBJ);
	$userfname=$row_user->u_fname;
    $userlname=$row_user->u_lname;
	$userid=$row_user->u_id;
	$u_country=$row_user->u_country;
	$u_state_city=$row_user->u_state_city;
	$u_postalcode=$row_user->u_postalcode;
	$u_street_house=$row_user->u_street_house;

	////////////////////////////////
	
	#find product details
	$new_item=$item_no-'17990';
	$stmt_product=$conn->prepare("select * from tbl_products where p_id='$new_item'");
	$stmt_product->execute();
	$row_product=$stmt_product->fetch(PDO::FETCH_OBJ);
	$p_title=$row_product->p_title;
	$p_currency=$row_product->p_currency;
	$product_img=$row_product->p_image1;
	$invoice_no=$item_no.$userid;
	$subject='Invoice # '. $invoice_no . ' Bank Account Details - '. $p_title;
	////////////////////////////////////
	
	#send mail 
	
	            $msg = "
				<!DOCTYPE html>
<html>

<head>
    <meta content='text/html; charset=ISO-8859-1' http-equiv='content-type'>
    <title>aaa
    </title>
</head>

<body>

    <div style='margin: 0px auto; color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; width: 760px; background-color: rgb(255, 255, 255);'>

        <div style='padding: 0px 5px; overflow: auto; clear: both; margin-top: 0.5em;'>

            <div style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; line-height: 1.5;'>

                <form method='post' name='' action='' target='_blank' onsubmit='try {return window.confirm(' You are submitting information to an external page.\nAre you sure? ');} catch (e) {return false;}' style='margin: 0px; padding: 0px;'>

                    <div style='overflow: visible; clear: both;'>
                        <h2 style='margin: 5px 0px 0.1em; color: rgb(44, 46, 47); font-size: 28px; font-family: helveticaneue,&quot;helvetica neue&quot;,helvetica,arial,sans-serif; font-weight: 300; float: left; line-height: normal;'>Payment Details 
<br>
</h2>

                        <div>
                        </div>
                    </div>

                    <p style='margin: 1em 0px;'>This invoice was created on $date.
                        <br>
                    </p>
                </form>
            </div>

            <div style='border: 1px solid rgb(204, 204, 204); overflow: visible; clear: both;'>

                <div style='margin: 20px; font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>

                    <div>

                        <div style='overflow: visible; clear: both;'>

                            <div style='float: left; width: 350.453px; margin-bottom: 0em;'>

                                <div style='float: left; width: 350.453px; margin-bottom: 0em;'><img src='https://nswmotorauction.com/img/unnamed1.jpg'>
                                </div>

                            </div>

                            <div style='float: right; margin-right: 0px; width: 350.453px; margin-bottom: 0em;'>

                                <div style='float: right; padding-bottom: 1em; background-color: transparent; background-position: 100% 0%; background-repeat: no-repeat;'>
                                    <h3 style='margin: 0.1em 0px; padding: 1em 2.1em 0px 0px; color: rgb(204, 204, 204); font-size: 2.85em; float: right; text-transform: uppercase;'>INVOICE</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style='overflow: visible; clear: both;'>

                        <div style='float: left; width: 350.453px;'>

                            <div>

                                <div style='margin: 0.1em 0px; font-weight: bold; font-size: 1.167em;'>Hi $userfname $userlname,
                                </div>
                            </div>

                            <div style='padding-right: 1em; padding-top: 1em;'>Thanks for buying using NSW Motor Auction ! Here is your payment details.&nbsp;
                                <br>
                                <br>Pay for your purchase, using the instructions below.
                            </div>

                            <div style='padding-right: 1em; padding-top: 1em;'>
                            </div>
                        </div>

                        <div style='float: right; margin-right: 0px; width: 350.453px;'>
                            <table summary='Invoice details' style='border: medium none ; margin: 0px; width: 350px; border-collapse: collapse;'>
                                <tbody>
                                    <tr>
                                        <th style='padding: 0.2em 0.4em; font-weight: normal; text-align: right; vertical-align: top; width: 147.406px;'>Invoice number:
                                        </th>
                                        <td style='margin: 0px; padding: 0.2em 0.4em; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;'>$invoice_no
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style='padding: 0.2em 0.4em; font-weight: normal; text-align: right; vertical-align: top; width: 147.406px;'>Invoice date:
                                        </th>
                                        <td style='margin: 0px; padding: 0.2em 0.4em; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;'>$date
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style='padding: 0.2em 0.4em; font-weight: normal; text-align: right; vertical-align: top; width: 147.406px;'>Payment terms:
                                        </th>
                                        <td style='margin: 0px; padding: 0.2em 0.4em; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;'>Due on receipt
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style='padding: 0.2em 0.4em; font-weight: normal; text-align: right; vertical-align: top; width: 147.406px;'>Due date:
                                        </th>
                                        <td style='margin: 0px; padding: 0.2em 0.4em; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;'>$date
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div style='border: 1px solid rgb(204, 204, 204); margin: 10px 28px 20px 20px; text-align: center; float: right; min-height: 50px; padding-top: 0.5em; padding-bottom: 0.5em; width: 157.703px;'>

                                <div style='padding-top: 3px; font-size: 1.1em;'>

                                    <span style='font-weight: bold;'>Total
</span>:

                                    <p style='margin: 0px; font-weight: bold; font-size: 1.31em;'>$total_amount</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style='border-bottom: 1px solid rgb(204, 204, 204); padding: 10px 10px 0px; vertical-align: bottom; background-color: transparent;'>

                        <div style='clear: both;'>
                        </div>
                    </div>
                </div>

                <div style='margin: 20px; overflow: visible; font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; clear: both;'>
                    <table summary='Invoice summary' style='border-style: solid solid none; border-top: 1px solid rgb(238, 238, 238); border-left: 1px solid rgb(238, 238, 238); border-right: 1px solid rgb(238, 238, 238); margin: 0px; width: 707px; border-collapse: collapse;'>
                        <thead>
                            <tr style='border: 1px solid rgb(216, 216, 216);'>
                                <th style='border: medium none ; padding: 6px 8px; vertical-align: bottom; font-size: 0.9em; background-color: rgb(249, 249, 249);'>Description
                                </th>
                                <th style='border: medium none ; padding: 6px 8px; vertical-align: bottom; font-size: 0.9em; width: 40px; background-color: rgb(249, 249, 249);'>Quantity
                                </th>
                                <th style='border: medium none ; padding: 6px 8px; text-align: right; vertical-align: bottom; font-size: 0.9em; width: 80px; background-color: rgb(249, 249, 249);' nowrap='nowrap'>Price
                                </th>
                                <th style='border: medium none ; padding: 6px 8px; text-align: right; vertical-align: bottom; font-size: 0.9em; width: 80px; background-color: rgb(249, 249, 249);'>Amount
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style='border-bottom: 1px solid rgb(216, 216, 216); margin: 0px; padding: 8px 10px 8px 8px; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;'>$p_title
                                </td>
                                <td style='border-bottom: 1px solid rgb(216, 216, 216); margin: 0px; padding: 8px 10px 8px 8px; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top; text-align: right;'>1
                                </td>
                                <td style='border-bottom: 1px solid rgb(216, 216, 216); margin: 0px; padding: 8px 10px 8px 8px; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top; text-align: right;' nowrap='nowrap'>
                                    <br>

                                </td>
                                <td style='border-bottom: 1px solid rgb(216, 216, 216); margin: 0px; padding: 8px 10px 8px 8px; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top; text-align: right;' nowrap='nowrap'>$amount
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div style='border-style: none solid solid; border-left: 1px solid rgb(238, 238, 238); border-right: 1px solid rgb(238, 238, 238); border-bottom: 1px solid rgb(238, 238, 238); width: auto;'>

                        <div style='border-top: 1px solid rgb(238, 238, 238); width: 706px;'>
                            <table summary='Invoice totals' style='border-style: none none none solid; border-left: 1px solid rgb(238, 238, 238); margin: 1px 0px 0px; width: 345px; border-collapse: collapse; float: right;'>
                                <tbody>
                                    <tr>
                                        <th style='border-left: 1px solid rgb(221, 221, 221); border-right: 1px solid rgb(221, 221, 221); padding: 0.31em 1em; font-weight: normal; text-align: right; vertical-align: top;'>Paperwork Incl. EX
                                        </th>
                                        <td style='margin: 0px; padding: 0.5em 1em; font-family: arial,sans-serif; line-height: 1.2em; text-align: right; vertical-align: top;'>$paperwork
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style='border-left: 1px solid rgb(221, 221, 221); border-right: 1px solid rgb(221, 221, 221); padding: 0.31em 1em; font-weight: normal; text-align: right; vertical-align: top;'>Auction Fee
                                        </th>
                                        <td style='margin: 0px; padding: 0.5em 1em; font-family: arial,sans-serif; line-height: 1.2em; text-align: right; vertical-align: top;'>$aucation_fee
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style='border-left: 1px solid rgb(221, 221, 221); border-right: 1px solid rgb(221, 221, 221); padding: 0.31em 1em; text-align: right; vertical-align: top; font-weight: normal; background-color: rgb(249, 249, 249);'>Shipping &amp; handling
                                        </th>
                                        <td style='margin: 0px; padding: 0.5em 1em; font-family: arial,sans-serif; line-height: 1.2em; text-align: right; vertical-align: top; background-color: rgb(249, 249, 249);'>$shipping
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style='border-left: 1px solid rgb(221, 221, 221); border-right: 1px solid rgb(221, 221, 221); padding: 0.31em 1em; text-align: right; vertical-align: top;'>Total
                                        </th>
                                        <td style='margin: 0px; padding: 0.5em 1em; font-family: arial,sans-serif; line-height: 1.2em; text-align: right; vertical-align: top; font-weight: bold;'>$total_amount
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div><img style='margin-right: 0px; width: 143px; height: 103px;' class='' src='$product_img' alt=''>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <div style='border-top: 1px solid rgb(216, 216, 216); margin: 0px 1em 0px 20px; padding-top: 1em;'>
                    <br>

                    <table class='myTable' style='width: 697px; border-collapse: collapse; font-family: &quot;arial,sans-serif&quot;; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; height: 162px;'>

                        <tbody>
                            <tr>
                                <th style='border: 1px solid rgb(204, 204, 204); padding: 5px; background-color: rgb(245, 245, 245); color: black; width: 189px; text-align: left;'>
                                    <h3 style='margin: 0.1em 0px; font-size: 1.167em;'>Bank Account Details :</h3>

                                </th>
                                <th style='border: 1px solid rgb(204, 204, 204); padding: 5px; background-color: rgb(245, 245, 245); color: black; width: 188px;'>
                                    <br>

                                </th>
                            </tr>
							<tr>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>Company Name:</big>
                                </td>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>$comp_name</big>
                                </td>
                            </tr>
                            <tr>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>Account Holder:</big>
                                </td>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>$account_holder</big>
                                </td>
                            </tr>
							
							 <tr>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>Acount Holder Address:</big>
                                </td>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>$account_holder_address</big>
                                </td>
                            </tr>
							
							
                            <tr>
                            </tr>
                            <tr>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>Account Number:</big>
                                </td>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>$account_no</big>
                                </td>
                            </tr>
                            <tr>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>Routing Number:</big>
                                </td>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>$routing</big>
                                </td>
                            </tr>
                            <tr>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>Bank Address:</big>
                                </td>
								<td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>$bank_address</big>
                                </td>
                            </tr>
                            <tr>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>Bank:</big>
                                </td>
                                <td style='border: 1px solid rgb(204, 204, 204); padding: 5px;font-weight:normal;font-size:12px;'><big style='font-weight:normal;font-size:12px;'>$bank_name</big>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                    <br>

                    <br>

                    <br>

                    <br>

                    <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
</span>

                    <div style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
                        <br>

                    </div>

                    <span style='font-size: 12.8px;'>We are available at the following hours:
</span>
                    <br>

                    <span style='font-size: 12.8px;'>8:00 AM to 8:00 PM MDT Monday through Friday
</span>
                    <br>
                    <br><font style='font-size: 12.8px;' color='#333333' face='arial, helvetica, sans-serif'>

<span style='font-size: 12px;'>Thank you,&nbsp;
</span></font>
                    <br><font style='font-size: 12.8px;' color='#333333' face='arial, helvetica, sans-serif'>

<span style='font-size: 12px;'>NSW Motor Auction Financial Department&nbsp;
</span></font>
                    <br>

                    <p style='margin: 0px 0px 1em; font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'></p>
                </div>

            </div>

            <div style='overflow: visible; font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; clear: both;'>

                <p style='margin: 1em 0px; min-height: 10px; text-align: center;'>

                    <span style='color: rgb(117, 117, 117); font-style: italic;'>
</span>Copyright &#65533; 2013-2018 NSW Motor Auction. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>
				";
                $mail = new PHPMailer;
                $mail->setFrom('invoice@nswmotorauction.com','NSW Motor Auction');
                ///$mail->addAddress('info@stumania.com', $name);
                $mail->addAddress($email_id , 'NSW Motor Auction');
                $mail->addCC('invoice@nswmotorauction.com');
                ///$mail->addReplyTo('invoice@nswmotorauction.com', 'NSW Motor Auction');
                $mail->Subject  = $subject;
                $mail->Body = $msg;
                $mail->IsHTML(true); 
                if(!$mail->send()) {
                  echo "mail not sent";
                }else{
                 echo "mail sent";
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

      <title><?=SITE_NAME;?> | Add Bank Invoice</title>
  
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
        Add Bank Details
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> Add Bank Details</li>
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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Item Number</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="item_no" placeholder="Product Item Number">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Email Id</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="email_id" placeholder="Customer Email Id">
				  </div>
				</div>
				
				
				
				
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Amount</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="amount" placeholder="Enter Amount">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Total Amount</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="total_amount" placeholder="Enter Total Amount">
				  </div>
				</div>
				
				
				
				
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Paperwork Incl. EX	</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="paperwork" placeholder="Paperwork Incl. EX">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Auction Fee</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="aucation_fee" placeholder="Auction Fee">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Shipping & handling	</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="shipping" placeholder="Shipping & handling">
				  </div>
				</div>
				
				
				
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Company Name</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="comp_name" placeholder="Enter Company Name">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Account Holder</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="account_holder" placeholder="Enter Account Holder">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Acount Holder Address</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="account_holder_address" placeholder="Enter Acount Holder Address">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Account Number</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="account_no" placeholder="Enter Account">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Routing Number</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="routing" placeholder="Enter Routing">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Bank Address</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="bank_address" placeholder="Enter Bank Address">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Bank</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="bank_name" placeholder="Enter Bank">
				  </div>
				</div>
				
				
								
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
				  <div class="col-sm-10">
					<input type="submit" class="btn btn-success" name="send_invoice" value="Send Invoice">
					
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
