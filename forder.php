<?php
include('common/config.php');
if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
}

$userid=$_SESSION['USER'];
$userOrder=$conn->prepare("select * from tbl_order where order_cid='$userid' AND order_pid='$pid'");
$userOrder->execute();
$rowOrder=$userOrder->fetch(PDO::FETCH_OBJ);
$count=$userOrder->rowCount();


$userDetail=$conn->prepare("select * from tbl_users where u_id='$userid'");
$userDetail->execute();
$rowDetail=$userDetail->fetch(PDO::FETCH_OBJ);
$u_document=$rowDetail->u_document;

if($u_document!="")
{
$session_id=$_SESSION['USER'];
$today_date=date("Y-m-d");
$order_status=1;
if($count!=1) {
$ip_addr=$_SERVER['REMOTE_ADDR'];
   $stmt=$conn->prepare("insert into tbl_order (order_pid,order_cid,order_status,ip_address,order_date)values(:pid,:session_id,:order_status,:ip_addr,:today_date)");
   $stmt->bindParam(":pid",$pid, PDO::PARAM_STR);
   $stmt->bindParam(":session_id",$session_id, PDO::PARAM_STR);
   $stmt->bindParam(":order_status",$order_status, PDO::PARAM_STR);
    $stmt->bindParam(":ip_addr",$ip_addr, PDO::PARAM_STR);
   $stmt->bindParam(":today_date",$today_date, PDO::PARAM_STR);
  $result=$stmt->execute();
  } else {
	echo "<script>window.alert('You already bid for this same item')</script>";
	echo "<script>window.location.href='index.php' </script>";
   }
if($result)
{   
$datap=$conn->prepare("select * from tbl_products where id='$pid'");
 $datap->execute();
 $rowsp=$datap->fetch(PDO::FETCH_OBJ);    
 $p_title= $rowsp->name;
 $p_currency= $rowsp->p_currency;
 $p_price= $rowsp->Buy_Price;
 $p_item= '17990' + $rowsp->id;
       
    
    

$date=date('d M, Y h:i A');
///$u_uid=$rowDetail->u_id;
$u_fname=$rowDetail->u_fname;
$u_lname=$rowDetail->u_lname;
$u_email=$rowDetail->u_email;
$u_refferral=$rowDetail->u_refferral;
$u_phone=$rowDetail->u_phone;
$u_street_house=$rowDetail->u_street_house;
$u_state_city=$rowDetail->u_state_city;
$u_country=$rowDetail->u_country;
$u_postalcode=$rowDetail->u_postalcode;

$to ='Carolgreen281@gmail.com';
$subject = "Purchase: Item: $p_item -  $p_title - $u_fname $u_lname";
$message = "
<p>BidWon: $date</p>
<p>Promo Code: $u_refferral</p>
<p>Name: $u_fname $u_lname</p>
<p>Email Id : $u_email</p>
<p>Phone : $u_phone</p>
<p>Address : $u_street_house $u_state_city $u_country $u_postalcode</p>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: Purchase  <purchase@carsloter.eu>' . "\r\n";
///$headers .= 'Cc: Carolgreen281@gmail.com' . "\r\n";
$a=mail($to,$subject,$message,$headers,'purchase@carsloter.eu');
}

//echo "<script>window.alert('Thank You for Your Purchase!')</script>";
//echo "<script>window.location.href='thank_you.php' </script>";
echo "<script>window.location.href='accept_order.php?uid=$userid&pid=$pid' </script>";
} else 
	{
		echo "<script>window.alert('Please upload document!')</script>";
		echo "<script>window.location.href='idupload.php' </script>";
	}






?>