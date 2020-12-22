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
$query=$conn->prepare("update tbl_order set order_status='2' where order_pid='$product_id' AND order_cid='$uid'");
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
	$productname=$row_product->p_title;
	
	
$to =$useremail;
$subject = "Your bid has been declined";
$message = "Seller status has been changed<";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: carpremier <deanmark22@carpremier.eu>' . "\r\n";
///$headers .= 'Cc: Carolgreen281@gmail.com' . "\r\n";
$a=mail($to,$subject,$message,$headers,'-fdeanmark22@carpremier.eu');
	
	
	
echo "<script>window.location.href='manage_bidding.php'</script>";
}
?>