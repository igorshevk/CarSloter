<?php
include('common/config.php');

$pid=$_POST['pid'];
$p_currency=$_POST['p_currency'];
$reffNo=$_POST['reffNo'];
$bid_price = 0;
if(isset($_POST['BidsbmtBtn']))
{
  $order_price=$p_currency.''.number_format($_POST['order_price']);
  $bid_price = $_POST['order_price'];
  $bidType='BID';
} else if(isset($_POST['BuysbmtBtn']))
{
$order_price=$p_currency.''.number_format($_POST['Buy_Price']);
$bidType='BUY NOW';
$bid_price = $_POST['Buy_Price'];
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

$datap=$conn->prepare("select * from tbl_products where id='$pid'");
$datap->execute();
$rowsp=$datap->fetch(PDO::FETCH_OBJ);   

if($rowsp->status == 2 && ($count != 1 || ($count == 1 && $rowOrder->order_status == 2)))
{
  $_SESSION['ERR_MSG']='You can not bid for this item.';
  if($rowsp->category == 1)
    echo "<script>window.location.href='details.php?pid=$pid' </script>";
  else if($rowsp->category == 2)
    echo "<script>window.location.href='truck-details.php?pid=$pid' </script>";
  else if($rowsp->category == 3)
    echo "<script>window.location.href='farm-details.php?pid=$pid' </script>";

  die();
}


if($u_document!="")
{
  $session_id=$_SESSION['USER'];
  $today_date=date("Y-m-d");
  $current_time = date("Y-m-d H:i:s");
  $order_no=$reffNo.rand(100,999);
  $_SESSION['ORDER_NO']=$order_no;
  $order_status=1;
  $ip_addr=$_SERVER['REMOTE_ADDR']; 

  $str_price = explode($p_currency, $rowOrder->order_price)[1];

  $arr_price = explode(',', $str_price);

  $old_price = 0;
  for ($i=0; $i < count($arr_price); $i++) { 
      $old_price += floatval($arr_price[$i]) * pow(10, (count($arr_price) - $i - 1)*3);
  }

  if($count!=1) {
    
    $stmt=$conn->prepare("insert into tbl_order (order_pid,order_price,order_cid,order_no,order_status,ip_address,order_date)values('$pid','$order_price','$session_id','$order_no','$order_status','$ip_addr','$today_date')");
    $stmt->bindParam(":pid",$pid, PDO::PARAM_STR);
    $stmt->bindParam(":session_id",$session_id, PDO::PARAM_STR);
    $stmt->bindParam(":order_status",$order_status, PDO::PARAM_STR);
    $stmt->bindParam(":ip_addr",$ip_addr, PDO::PARAM_STR);
    $stmt->bindParam(":today_date",$today_date, PDO::PARAM_STR);
    $result=$stmt->execute();
  } 
  else if($rowOrder->order_status == 2) {
    $stmt=$conn->prepare("update tbl_order set order_price=:order_price,order_cid=:session_id,order_no=:order_no,order_status=:order_status,ip_address=:ip_addr,order_date=:today_date where order_pid=:pid");

    
    $stmt->bindParam(":order_price",$order_price, PDO::PARAM_STR);
    $stmt->bindParam(":session_id",$session_id, PDO::PARAM_STR);
    $stmt->bindParam(":order_no",$order_no, PDO::PARAM_STR);
    $stmt->bindParam(":order_status",$order_status, PDO::PARAM_STR);
    $stmt->bindParam(":ip_addr",$ip_addr, PDO::PARAM_STR);
    $stmt->bindParam(":today_date",$today_date, PDO::PARAM_STR);
    $stmt->bindParam(":pid",$pid, PDO::PARAM_STR);
    $result=$stmt->execute();
  }
  else {
    $timediff = strtotime(date("Y-m-d H:i:s")) - strtotime($rowOrder->created_at);    

    if($timediff > 300 && $rowOrder->order_status == 1 && $bid_price > $old_price){
      $stmt=$conn->prepare("update tbl_order set order_price=:order_price,order_cid=:session_id,order_no=:order_no,order_status=:order_status,ip_address=:ip_addr,order_date=:today_date,created_at=:current_time where order_pid=:pid");

    
      $stmt->bindParam(":order_price",$order_price, PDO::PARAM_STR);
      $stmt->bindParam(":session_id",$session_id, PDO::PARAM_STR);
      $stmt->bindParam(":order_no",$order_no, PDO::PARAM_STR);
      $stmt->bindParam(":order_status",$order_status, PDO::PARAM_STR);
      $stmt->bindParam(":ip_addr",$ip_addr, PDO::PARAM_STR);
      $stmt->bindParam(":today_date",$today_date, PDO::PARAM_STR);
      $stmt->bindParam(":pid",$pid, PDO::PARAM_STR);
      $stmt->bindParam(":current_time",$current_time, PDO::PARAM_STR);
      $result=$stmt->execute();

    }
    else
    {
      if($rowOrder->order_status == 3)
        $_SESSION['ERR_MSG']='You already bid for this same item.';
      else
        $_SESSION['ERR_MSG']='You bidded too rapidly, wait 5 minutes for higher bid.';

      if($rowsp->category == 1)
        echo "<script>window.location.href='details.php?pid=$pid' </script>";
      else if($rowsp->category == 2)
        echo "<script>window.location.href='truck-details.php?pid=$pid' </script>";
      else if($rowsp->category == 3)
        echo "<script>window.location.href='farm-details.php?pid=$pid' </script>";
    }
    
  }
  if($result)
  {
    $p_title= $rowsp->name;
    $p_currency= $rowsp->p_currency;
    $p_price= $order_price;
    $p_item= '1024' + $rowsp->id;
      
    
    $date=date('d M, Y h:i A');
    $u_fname=$rowDetail->u_fname;
    $u_lname=$rowDetail->u_lname;
    $u_email=$rowDetail->u_email;
    $u_refferral=$rowDetail->u_refferral;
    $u_phone=$rowDetail->u_phone;
    $u_street_house=$rowDetail->u_street_house;
    $u_state_city=$rowDetail->u_state_city;
    $u_country=$rowDetail->u_country;
    $u_postalcode=$rowDetail->u_postalcode;

    ///$to ='gauravsvm07@gmail.com';
    $to ='carolgreen281@gmail.com';
    $subject = "$bidType: Item: $reffNo -  $p_title - $u_fname $u_lname - $order_price";
    $message = "<p>Date: $date</p>
    <p>Order No: $order_no</p>
    <p>Promo Code: $u_refferral</p>
    <p>Name: $u_fname $u_lname</p>
    <p>Email : $u_email</p>
    <p>Phone : $u_phone</p>
    <p>Address : $u_street_house $u_state_city $u_country $u_postalcode</p>";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: Purchase <order@carsloter.eu>' . "\r\n";
    //$headers .= 'Cc: carolgreen281@gmail.com' . "\r\n";
    mail($to,$subject,$message,$headers,'order@carsloter.eu');	
  }

  //echo "<script>window.alert('Thank You for Your Purchase!')</script>";
  ////echo "<script>window.location.href='thank_you.php' </script>";
  echo "<script>window.location.href='accept_order.php?uid=$userid&pid=$pid' </script>";

} else 
	{
		///echo "<script>window.alert('Please upload document!')</script>";
		echo "<script>window.location.href='idupload.php?pid=$pid' </script>";
	}






?>