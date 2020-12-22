<?php
include("common/gaurav.library.php");

if(isset($_GET['product_id']))
{
	$product_id=$_GET['product_id'];
}
if(isset($_GET['uid']))
{
	$uid=$_GET['uid'];
}
$query=$conn->prepare("update tbl_order set order_status='3' where order_pid='$product_id' AND order_cid='$uid'");
$result=$query->execute();
if($result)
{
	/////find user detail//////
	$stmt_user=$conn->prepare("select * from tbl_users where u_id='$uid'");
	$stmt_user->execute();
	$row_user=$stmt_user->fetch(PDO::FETCH_OBJ);
	$username=$row_user->u_fname;
	$userfname=$row_user->u_fname;
	$userlname=$row_user->u_lname;
	$useremail=$row_user->u_email;
	
	/////find product detail//////
	$stmt_product=$conn->prepare("select * from tbl_products where id='$product_id'");
	$stmt_product->execute();
	$row_product=$stmt_product->fetch(PDO::FETCH_OBJ);
	$productname=$row_product->name;
	$reffNo=$row_product->reffNo;

	$to =$useremail;
	$subject = "Your bid has been accepted";

	$title = 'Bid WON';
    $subjectTitle = 'Bid won - Your price was the highest';
    $messageHeader = 'Hello '.$userfname.' '.$userlname.',';
    $messageContent = '<b> Congratulations</b>, one of your bids has been accepted !<br><br> We will prepare the purchase contract and paperwork right away. You will be notified soon on email.<br><br>If you have any other questions contact our support department: <b>invoice@carsloter.eu</b>';
    $imageUrl = 'https://www.carsloter.eu/img/bidwon.jpg';

    $message = '
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
                  <div style="margin-left: 50px; margin-top: 5px; line-height: 1.2; font-family: Helvetica,Arial,Verdana,sans-serif;">
                    <div style="color: rgb(45, 55, 64); font-size: 14px; font-weight: bold;">
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
            <div style="font-size: 21px; color: rgb(255, 255, 255); line-height: 1.3; font-family: Helvetica, Arial, Verdana, sans-serif;
          padding: 12px 15px;">
              '.$subjectTitle.'
            </div>
          </div>
        </div>
        <div style="margin-top: 15px;">
          <div style="background-color: #ffffff; max-width: 600px; margin: auto; padding: 30px;">
            <div style="font-size: 21px; color: rgb(51, 63, 73); line-height: 1.3; font-weight: bold;">
              '.$messageHeader.'
            </div>      
            <div style="font-size: 14px; line-height: 1.3; margin-top: 20px;">
              '.$messageContent.'
            </div>
            <div>
              <div style="text-align: center;">
                <img src="'.$imageUrl.'" style="width: 345px; max-width: 100%; padding: 15px 0;">
              </div>
              <div style="display: flex;">
                <div style="margin: auto;">
                  <div style="padding: 10px;">
                    <img src="https://www.carsloter.eu/img/unnamed.png" alt="-" class="float-left mt-1 mr-2" width="20">
                    <span class="status-title" style="font-size: 15px; color: rgb(51, 63, 73); font-weight: bold;vertical-align: top;">
                      Check My Live Order
                    </span>
                  </div>
                  <div style="padding: 10px;">
                    <img src="https://www.carsloter.eu/img/unnamed.png" alt="-" class="float-left mt-1 mr-2" width="20">
                    <span class="status-title" style="font-size: 15px; color: rgb(51, 63, 73); font-weight: bold;vertical-align: top;">
                      Check Won Order
                    </span>
                  </div>
                  <div style="padding: 10px;">
                    <img src="https://www.carsloter.eu/img/unnamed.png" alt="-" class="float-left mt-1 mr-2" width="20">
                    <span class="status-title" style="font-size: 15px; color: rgb(51, 63, 73); font-weight: bold;vertical-align: top;">
                      View My Profile
                    </span>
                  </div>
                </div>
              </div>
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
            Copyright @ 2020 carsloter. All rights reserved
          </div>
        </div>
      </body>
    </html>
    '; 


	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// More headers
	$headers .= 'From: CarSloter<bid-won@carsloter.eu>' . "\r\n";
	///$headers .= 'Cc: Carolgreen281@gmail.com' . "\r\n";
	$a=mail($to,$subject,$message,$headers,'-fbid-won@carsloter.eu');
	echo "<script>window.location.href='manage_bidding.php'</script>";

}
?>