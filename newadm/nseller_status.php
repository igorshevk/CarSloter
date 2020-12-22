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
$query=$conn->prepare("update tbl_order set order_sellstatus='1' where order_pid='$product_id' AND order_cid='$uid'");
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


$to =$useremail;
$subject = "Seller Received!";
$message = "<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
<html>

<head>

<meta content='text/html; charset=ISO-8859-1' http-equiv='content-type'>
<title>Supplier Accept</title>
</head>

<body>
<table style='color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);' border='0' cellpadding='0' cellspacing='0' width='100%'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' align='center' bgcolor='#ffffff' width='100%'>
<table class='m_-7866541958304104160width-320px m_-7866541958304104160align-center m_-7866541958304104160padding-left-20px' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td class='m_-7866541958304104160width-300px' style='margin: 0px; font-family: arial,sans-serif;' align='center' valign='top' width='590'>
<table class='m_-7866541958304104160width-290px m_-7866541958304104160align-center m_-7866541958304104160padding-left-20px' align='left' border='0' cellpadding='0' cellspacing='0'>
<tbody>
<tr>
<td class='m_-7866541958304104160align-center' style='margin: 0px; font-family: arial,sans-serif;' valign='top'>
<a href='carpremier.eu' target='_blank' style='color: rgb(255, 255, 255); text-decoration: none;'><img src='https://carpremier.eu/images/logo.png'></a>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-300px' align='right' border='0' cellpadding='0' cellspacing='0' width='225'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' valign='top'>
<table class='m_-7866541958304104160width-300px m_-7866541958304104160padding-left-20px m_-7866541958304104160padding-right-20px' align='right' cellpadding='0' cellspacing='0'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' height='8'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' height='8'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' height='8'>
<br>
</td>
</tr>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;'><img alt='' src='https://carpremier.eu/img/unnamed.gif' class='CToWUd' style='border: medium none ; display: block;' border='0' height='54' width='36'></td>
<td style='margin: 0px; font-family: arial,sans-serif;' width='8'>&nbsp;</td>
<td style='margin: 0px; font-family: arial,sans-serif;' align='left' nowrap='nowrap'><font style='color: rgb(45, 55, 64); font-size: 14px; font-variant: normal; font-weight: bold; font-family: Helvetica,Arial,Verdana,sans-serif;'>Car Premier Support<span> </span></font>
<br><font style='color: rgb(240, 134, 25); font-size: 20px; font-style: normal; font-family: Helvetica,Arial,Verdana,sans-serif;'>Chat
</font></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' height='15'>
<br>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif; background-color: #01948C' align='center' bgcolor='#03347a' height='50' width='100%'>
<table style='width: 650px; text-align: left; margin-left: auto; margin-right: auto;' class='m_-7866541958304104160width-320px m_-7866541958304104160padding-top-10px m_-7866541958304104160padding-bottom-10px' cellpadding='0' cellspacing='0'>
<tbody>
<tr>
<td class='m_-7866541958304104160align-center' style='margin: 0px; width: 648px; vertical-align: top; text-align: left; font-family: arial,sans-serif; background-color: #01948C;'><font style='font-size: 21px; color: rgb(255, 255, 255); line-height: 1.3;' face='Helvetica, Arial, Verdana, sans-serif'><strong>Success ! The supplier accepted your offer</strong></font></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' style='color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px;' align='center' bgcolor='#f1f1f1' border='0' cellpadding='0' cellspacing='0' width='100%'>
<tbody>
<tr>
<td class='m_-7866541958304104160border-none' style='margin: 0px; font-family: arial,sans-serif;' align='center' bgcolor='#f1f1f1'>
<table class='m_-7866541958304104160width-320px' align='center' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' align='center' height='10' valign='top'>
<br>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' bgcolor='#ffffff' height='20' width='650'>
<br>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' align='center' bgcolor='#ffffff' valign='top' width='650'>
<table class='m_-7866541958304104160width-280px' border='0' cellpadding='0' cellspacing='0' width='590'>
<tbody>
<tr>
<td border='0' style='margin: 0px; font-family: arial,sans-serif;' align='left' bgcolor='#ffffff' width='590'><font style='font-size: 21px; color: rgb(51, 63, 73); line-height: 1.3;' face='Helvetica, Arial, Verdana, sans-serif'><strong>Hello $userfname $userlname,</strong></font></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' bgcolor='#ffffff' height='20' width='650'>
<br>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' align='center' valign='top'>
<table class='m_-7866541958304104160width-280px m_-7866541958304104160align-center' border='0' cellpadding='0' cellspacing='0' width='590'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' align='left' bgcolor='#ffffff' width='590'><font style='font-size: 14px; line-height: 1.3;' face='Helvetica, Arial, Verdana, sans-serif'>One of your bids has been accepted by the supplier. We'll prepare the
invoice right away.<span>&nbsp;</span><br>If
you have any other questions contact our support department <span style='font-weight: bold;'>support@carpremier.eu
<br><br>You
can see all the items in your account area.</font></td>
 <td>
</tr>




</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' bgcolor='#ffffff' height='20' width='650'>
<br>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' align='center'>
<table class='m_-7866541958304104160width-280px' border='0' cellpadding='0' cellspacing='0' width='590'>
<tbody>
<tr>
<td class='m_-7866541958304104160width-280px m_-7866541958304104160padding-bottom-10px' style='margin: 0px; font-family: arial,sans-serif;' align='center' valign='middle' width='590'>
<img style='width: 345px; height: 243px;' src='https://carpremier.eu/img/seller_img.jpg'>
<table class='m_-7866541958304104160width-280px' align='right' border='0' cellpadding='0' cellspacing='0' width='195'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' height='30'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' height='30' width='10'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' height='30'>
<br>
</td>
</tr>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' valign='top'><img src='https://www.carpremier.eu/img/unnamed.png' alt='-' class='CToWUd' style='display: block;' width='20'></td>
<td style='margin: 0px; font-family: arial,sans-serif;' width='10'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' align='left'><font style='font-size: 15px; color: rgb(51, 63, 73);' face='Helvetica, Arial, Verdana, sans-serif'><strong>Check My Live Order
</strong></font></td>
</tr>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' height='20'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' height='20'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' align='left' height='20'>
<br>
</td>
</tr>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' valign='top'><img src='https://www.carpremier.eu/img/unnamed.png' alt='-' class='CToWUd' style='display: block;' width='20'></td>
<td style='margin: 0px; font-family: arial,sans-serif;' width='10'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' align='left'><font style='font-size: 15px; color: rgb(51, 63, 73);' face='Helvetica, Arial, Verdana, sans-serif'><strong>Check Won Order
</strong></font></td>
</tr>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' height='20'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' height='20'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' align='left' height='20'>
<br>
</td>
</tr>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' valign='top'><img src='https://www.carpremier.eu/img/unnamed.png' alt='-' class='CToWUd' style='display: block;' width='20'></td>
<td style='margin: 0px; font-family: arial,sans-serif;' width='10'>
<br>
</td>
<td style='margin: 0px; font-family: arial,sans-serif;' align='left'><font style='font-size: 15px; color: rgb(51, 63, 73);' face='Helvetica, Arial, Verdana, sans-serif'><strong>View My Profile
</strong></font></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' bgcolor='#ffffff' height='30' width='650'>
<br>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' height='5'>
<br>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' bgcolor='#ffffff' height='20' width='650'>
<br>
</td>
</tr>
</tbody>
</table>


<table class='m_-7866541958304104160width-320px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' align='center' bgcolor='#ffffff' valign='top' width='650'>
<table class='m_-7866541958304104160width-280px m_-7866541958304104160align-center' border='0' cellpadding='10' cellspacing='0' width='590'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' align='center' bgcolor='#ffffff' width='590'><font style='font-size: 21px; line-height: 1.3; color: rgb(240, 134, 25);' face='Helvetica, Arial, Verdana, sans-serif'><strong>Questions? Support: Chat</strong></font>
<br>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' height='20'>
<br>
</td>
</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: Helvetica,Arial,Verdana,sans-serif; font-size: 11px; color: rgb(112, 118, 124);' align='center'>Copyright @ 2020 CarPremier. All rights reserved<span> 
</td>



</tr>
</tbody>
</table>
<table class='m_-7866541958304104160width-320px' border='0' cellpadding='0' cellspacing='0' width='650'>
<tbody>
<tr>
<td style='margin: 0px; font-family: arial,sans-serif;' height='20'>
<br>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</body>

</html>";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: Carpremier<accepted@carpremier.eu>' . "\r\n";
///$headers .= 'Cc: Carolgreen281@gmail.com' . "\r\n";
$a=mail($to,$subject,$message,$headers,'-faccepted@carpremier.eu');



echo "<script>window.location.href='manage_bidding.php'</script>";
}
?>