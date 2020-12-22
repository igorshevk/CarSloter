<?php include("common/gaurav.library.php");
echo protect_admin();
require_once('Mailer/PHPMailerAutoload.php');

require_once __DIR__ . '/vendor/autoload.php';

$date=date("m/d/Y");


if(isset($_GET['product_id']))
{
    $product_id=$_GET['product_id'];
}
if(isset($_GET['uid']))
{
    $uid=$_GET['uid'];
}


$stmt_order=$conn->prepare("select * from tbl_order where order_pid='$product_id' AND order_cid='$uid'");
$stmt_order->execute();
$row_order=$stmt_order->fetch(PDO::FETCH_OBJ);

$order_price = $row_order->order_price;

$str_price = explode('€', $order_price)[1];

$arr_price = explode(',', $str_price);

$bid_price = 0;
for ($i=0; $i < count($arr_price); $i++) { 
    $bid_price += floatval($arr_price[$i]) * pow(10, (count($arr_price) - $i - 1)*3);
}

$total_price = $bid_price + 715;
/////find user detail//////
$stmt_user=$conn->prepare("select * from tbl_users where u_id='$uid'");
$stmt_user->execute();
$row_user=$stmt_user->fetch(PDO::FETCH_OBJ);
$username=ucfirst($row_user->u_fname);
$userfname=ucfirst($row_user->u_fname);
$userlname=ucfirst($row_user->u_lname);
$useremail=$row_user->u_email;

/////find product detail//////
$stmt_product=$conn->prepare("select *, STR_TO_DATE(Production_date, '%d/%m/%Y') pDate from tbl_products where id='$product_id'");
$stmt_product->execute();
$row_product=$stmt_product->fetch(PDO::FETCH_OBJ);
$productname=$row_product->name;
$invoiceno=$row_product->reffNo;

$id=$row_product->id;
$getImage=$conn->prepare("select * from productimages WHERE pid='$id'");
$getImage->execute();
$rowImg=$getImage->fetch(PDO::FETCH_OBJ);

$getMake=$conn->prepare("select * from tbl_maincategory WHERE mcat_id='$row_product->make'");
$getMake->execute();
$rowMake=$getMake->fetch(PDO::FETCH_OBJ);

$getModel=$conn->prepare("select * from tbl_subcategory WHERE scat_id='$row_product->model'");
$getModel->execute();
$rowModel=$getModel->fetch(PDO::FETCH_OBJ);

$to =$useremail;

$bill_mpdf = new \Mpdf\Mpdf();
$bill_mpdf->WriteHTML('
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Bill of Sale</title>
        <style type="text/css">
        body{
            font-family: sans-serif;
            font-size: 16px;
        }
        .container {
            max-width: 780px;
            margin: 50px auto;
            padding: 0 15px;
        }
        .thick {
            height: 3px;
            background: #000;
        }
        .t-center{
            text-align: center;
        }
        .bold{
            font-weight: bold;
        }
        .cont-table {
            margin-top: 30px;
        }
        .cont-table td{ 
            vertical-align: baseline;
            height: 150px;
        }
        .cont-table td:nth-child(odd){
            padding-right: 30px;
        }
        .stye tr:nth-child(odd){
            background: #ccc;
        }
        .stye{
            width: 100%;
            border-collapse: collapse;
        }
        .stye td {
            padding: 5px 15px;
            width: 20%;
            height: 15px;
            border: 1px solid;
        } 
        li{
            margin-bottom: 15px;
        }
        .thin{
            height: 1px;
            background-color: #000;
        }
        .sig td{
            padding-right: 50px; 
        }
        table { 
            font-size: 16px;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="t-center">BILL OF SALE FOR MOTOR VEHICLE</h2>
            <hr class="thick">
            <p>This Bill of Sale for Motor Vehicle (the "Sales Contract"), is made and effective '.$date.'</p>
            <table class="cont-table">
                <tbody>
                    <tr>
                        <td colspan="1">
                            <span class="bold">BETWEEN:</span>
                        </td>
                        <td colspan="3">
                            <span class="bold">CarSloter</span> (the "Seller"), a company organized and existing under the laws of the <span class="bold">Netherlands </span>, with its head office located at:<br /><br />
                            <p>CarSloter<br />
                                Radarweg 18 1042 AA Amsterdam<br />
                                Netherlands
                            </p>
                            <br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <span class="bold">AND:</span>
                        </td>
                        <td colspan="3">
                            <span class="bold">'.$userfname.' '.$userlname.'</span> (the "Buyer"), an individual with his main address located under the laws of the <span>'.$row_user->u_country.'</span> with its located at:<br /><br />
                            <p>'.$row_user->u_street_house.'<br />
                                '.$row_user->u_state_city.' '.$row_user->u_postalcode.'<br />
                                '.$row_user->u_country.'
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>FOR GOOD CONSIDERATION, and in payment of €'.number_format((float)$total_price, 2, '.', ',').' receipt acknowledged, the undersigned Seller, hereby sells and transfers to the Buyer the following vehicle:</p>
            <table class="stye">
                <tbody>
                    <tr>
                        <td class="bold">Make</td>
                        <td class="bold">Model</td>                        
                        <td class="bold">Year</td>
                    </tr>
                    <tr>
                        <td>'.$rowMake->mcat_name.'</td>
                        <td>'.$rowModel->scat_name.'</td>                        
                        <td>'.($row_product->category == 1 ? date("Y", strtotime($row_product->pDate)) : $row_product->Production_date).'</td>
                    </tr>
                    <tr>
                        <td class="bold">Odometer reading</td>
                        <td class="bold">Vehicle ID Number</td>                        
                        <td class="bold">Date of purchase</td>
                    </tr>
                    <tr>
                        <td>'.number_format($row_product->Mileage).'</td>
                        <td>'.$row_product->VIN.'</td>                        
                        <td>'.date("m/d/Y", strtotime($row_order->created_at)).'</td>
                    </tr>
                </tbody>
            </table>
            <p>SELLER WARRANTS THAT:</p>
            <ol>
                <li>Seller is the sole owner of the vehicle;</li>
                <li>Such vehicle is free of all encumbrances, security interests, and other defenses against seller;</li>
                <li>The cash price does not exceed a reasonable retail price at the time of sale;</li>
                <li>The vehicle will be delivered to buyer with no damages and need to be accepted by buyer;</li>
                <li>All disclosures to buyer and other matters in connection with such transaction are in all respects as required by, and in accordance with, all applicable laws and regulations governing them.</li>
                
            </ol>
            <p>IN WITNESS WHEREOF, the parties hereto have executed this Sales contract on '.$date.'.</p>
            <div class="sig">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="50%">
                                <p>DIRECTOR :</p>
                                <br/><br/>
                            </td>
                            <td width="50%">
                                <p>BUYER :</p>
                                <br/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">
                                <p style="margin-top: 10px">Aaron Schwartz</p>
                            </td>
                            <td width="50%">
                                <p style="margin-top: 10px">'.$userfname.' '.$userlname.'</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">
                                <hr class="thin">
                                <p class="bold" style="margin-top: 15px">Authorized Signature</p>
                            </td>
                        <td width="50%">
                            <hr class="thin">
                            <p class="bold" style="margin-top: 15px">Authorized Signature</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            <img src="https://carsloter.eu/img/signature.png" style="height: 65px;" />
                        </td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="100%">
                                <hr class="thin">
                                <p class="bold">Bill of Sale for a Motor Vehicle</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
');

$payment_mpdf = new \Mpdf\Mpdf();
$payment_mpdf->WriteHTML('
<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Agreement</title>
        <style type="text/css">
            body{
                margin-top: 20px;
                font-family: sans-serif;
                font-size: 16px;
                letter-spacing: 1px;
            }
            .container {
                max-width: 780px;
                margin: 50px auto;
                padding: 0 15px;
                line-height: 28px
            }
            
            h1 {
                font-weight: bold;
                margin: 30px 0 30px 0;
                text-align: center;
                text-decoration: underline;
                letter-spacing: 4px;
                margin-bottom: 40px;
            }
            .lead {
                font-size: 16px;
                font-weight: lighter;
                margin-bottom: 20px;
            }
            p {
                font-size: 16px;
                margin: 0 0 10px;
            }

            .container p {
                padding: 10px;
            }
            
        </style>
    </head>
    <body>
        <div class="container">
            <h2 style="text-align: center;">PAYMENT AGREEMENT</h2>
            <p>I understand and agree that I am financially responsible for payment of my purchase of '.$productname.' (#'.$invoiceno.') the amount stated below. I agree to pay the amount in the time period stated below.</p>
            <p>I understand that is my obligation to complete the payment as long as I won the auction in 48 hours from the moment I received the contract</p>
            <p>For professional services I agree to pay CARSLOTER the total sum of €'.number_format((float)$total_price, 2, '.', ',').'</p>
            <table width="100%">
                <tr>
                    <td style="padding: 10px;">
                        <p>Customer name:</p>
                    </td>
                    <td width="75%">
                        <p>'.$userfname.' '.$userlname.'</p>
                        <hr class="thin">
                    </td>
                </tr>
            </table>
            <table  width="100%">
                <tr>
                    <td style="padding: 10px;">
                        <p>Customer address:</p>
                    </td>
                    <td width="70%">
                        <p>'.$row_user->u_street_house.' '.$row_user->u_state_city.' '.$row_user->u_postalcode.' '.$row_user->u_country.'</p>
                        <hr class="thin">
                    </td>
                </tr>
            </table>
            <table  width="100%">
                <tr>
                    <td style="padding: 10px;">
                        <p>Payment amount:</p>
                    </td>
                    <td width="72%">
                        <p>€'.number_format((float)$total_price, 2, '.', ',').'</p>
                        <hr class="thin">
                    </td>
                </tr>
            </table>
            <p class="lead">By signing this agreement, all parties agree to the terms as described above. Alterations to this agreement can only be made by both parties and must be placed in writing. Both parties will receive a printed copy of this agreement and will be responsible to respect its terms</p>
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="60%">
                            <hr class="thin">
                            <p class="bold">Client Signature :</p>
                        </td>
                        <td width="10%"></td>
                        <td width="30%">
                            <hr class="thin">
                            <p class="bold">Date :</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="60%">
                        </td>
                        <td width="10%"></td>
                        <td width="30%">
                            <p>'.$date.'</p>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </body>
</html>
');

$uship_mpdf = new \Mpdf\Mpdf();
$uship_mpdf->WriteHTML('
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style type="text/css">
            body {
                margin: 0 auto;
                font-family: sans-serif;
                font-size: 16px;
                margin-top: 20px;
            }
            .container {
                max-width: 900px;
                margin: 0 auto;
            }
            .contain {
                max-width: 780px;
                margin: 0 auto;
                margin-top: 30px;
            }
            h2 {
                font-size: 30px;
            }
            h5 {
                font-size: 18px;
            }
            .thin{
                height: 1px;
                background-color: #000;
            }
            .contain table tr {
                line-height: 18px;
            }
            .contain table td{
                line-height: 18px;
                margin-top: 0;
            }
            .footer td{
                padding-right: 50px; 
            }
            .bold{
                font-weight: bold;
            }
        </style>
        <title>CarSloter</title>
    </head>
    <body>
        <div class="container" style="overflow: auto;">
            <img alt="" src="https://carsloter.eu/images/logo-grey.png" style="width: 268px; height: 51px;"/>
            <p style="margin-top: -50px;margin-left: 320px;font-size: 14px;">CarSloter invoice number: <span><b>#'.$invoiceno.'</b></span> / '.$date.' </p>
        </div>
        <div class="contain">
            <h2 class="main" style="text-align: center;">PURCHASE CONTRACT</h2>
            <br/>
            <p style="margin-bottom: 30px;">finished on <u>&nbsp; '.$date.' &nbsp;</u> between </p>
            <table width="100%">
                <tr>
                    <td width="30%" style="text-align: center;">
                        <h5><b>Buyer:</b></h5>
                    </td>
                    <td width="60%">
                        <p>
                            '.$userfname.' '.$userlname.'
                        </p>
                        <hr class="thin" style="margin-top: 0;">
                    </td>
                </tr>
                <tr>
                    <td width="30%">
                    </td>
                    <td width="60%">
                        <p>
                            '.$row_user->u_street_house.' '.$row_user->u_state_city.' '.$row_user->u_postalcode.'
                        </p>
                        <hr class="thin" style="margin-top: 0;">
                    </td>
                </tr>
                <tr>
                    <td width="30%">
                    </td>
                    <td width="60%">
                        <p>'.$row_user->u_country.'</p>
                        <hr class="thin" style="margin-top: 0;">
                    </td>
                </tr>
                <tr><td><p>&nbsp;&nbsp;&nbsp;&nbsp;and</p></td><td></td></tr>
                <tr>
                    <td width="30%" style="text-align: center;">
                        <h5><b>Seller:</b></h5>
                    </td>
                    <td width="60%">
                        <p>
                            CarSloter                            
                        </p>
                        <hr class="thin" style="margin-top: 0;">
                    </td>
                </tr>
                <tr>
                    <td width="30%">
                    </td>
                    <td width="60%">
                        <p>
                            Radarweg 18 1042 AA Amsterdam                            
                        </p>
                        <hr class="thin" style="margin-top: 0;">
                    </td>
                </tr>
                <tr>
                    <td width="30%">
                    </td>
                    <td width="60%">
                        <p>Netherlands</p>
                        <hr class="thin" style="margin-top: 0;">
                    </td>
                </tr>
            </table>
            <table width="100%" style="margin-top: 30px;margin-left: -5px;">
                <tr>
                    <td colspan="2" style="padding-bottom: 10px;">
                        <table width="90%">
                            <tr>
                                <td colspan="2" style="font-size: 17px;">
                                    <b>Subject:</b> The vehicle specified in the registeration certificate 
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 10px;"> 
                        <table width="90%">
                            <tr>
                                <td style="font-size: 17px;">
                                    <b>Make:</b>
                                </td>
                                <td style="text-align: center;font-size: 17px;" width="80%">
                                    '.$rowMake->mcat_name.'
                                    <hr class="thin" style="margin: 0;">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding-bottom: 10px;">
                        <table width="90%">
                            <tr>
                                <td style="font-size: 17px;">
                                    <b>Model:</b>
                                </td>
                                <td style="text-align: center;font-size: 17px;" width="80%">
                                    '.$rowModel->scat_name.'
                                    <hr class="thin" style="margin: 0;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 10px;">
                        <p>
                            <table width="90%">
                                <tr>
                                    <td style="font-size: 17px;">
                                        <b>VIN:</b>
                                    </td>
                                    <td style="text-align: center;font-size: 17px;" width="85%">
                                        '.$row_product->VIN.'
                                        <hr class="thin" style="margin: 0;">
                                    </td>
                                </tr>
                            </table>
                        </p>
                    </td>
                    <td style="padding-bottom: 10px;">
                        <table width="90%">
                            <tr>
                                <td style="font-size: 17px;">
                                    <b>Fuel Type:</b>
                                </td>
                                <td style="text-align: center;font-size: 17px;" width="65%">
                                    '.($row_product->Fuel_type == '' ? '-' : $row_product->Fuel_type).'
                                    <hr class="thin" style="margin: 0;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 10px;">
                        <table width="90%">
                            <tr>
                                <td style="font-size: 17px;">
                                    <b>Engine Capacity:</b>
                                </td>
                                <td style="text-align: center;font-size: 17px;" width="45%">
                                    '.($row_product->Engine_size == '' ? '-' : $row_product->Engine_size).'
                                    <hr class="thin" style="margin: 0;">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding-bottom: 10px;">
                        <table width="90%">
                            <tr>
                                <td style="font-size: 17px;">
                                    <b>KW/PS:</b>
                                </td>
                                <td style="text-align: center;font-size: 17px;" width="75%">
                                    '.($row_product->Power == '' ? '-' : $row_product->Power).'
                                    <hr class="thin" style="margin: 0;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 10px;">
                        <table width="90%">
                            <tr>
                                <td style="font-size: 17px;">
                                    <b>Year:</b>
                                </td>
                                <td style="text-align: center;font-size: 17px;" width="80%">
                                    '.($row_product->category == 1 ? date("Y", strtotime($row_product->pDate)) : $row_product->Production_date).'
                                    <hr class="thin" style="margin: 0;">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding-bottom: 10px;">
                        <table width="90%">
                            <tr>
                                <td style="font-size: 17px;">
                                    <b>Mileage:</b>
                                </td>
                                <td style="text-align: center;font-size: 17px;" width="75%">
                                    '.number_format($row_product->Mileage).' '.($row_product->category == 3 ? 'HOURS' : 'KM').'
                                    <hr class="thin" style="margin: 0;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="90%">
                            <tr>
                                <td style="font-size: 17px;">
                                    <b>Price:</b>
                                </td>
                                <td style="text-align: center;font-size: 17px;" width="80%">
                                    €'.number_format((float)$total_price, 2, '.', ',').'
                                    <hr class="thin" style="margin: 0;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div style="line-height: 1.5;">
                    
                <p>The agreed purchase price was handed over when the contract was signed </p>
                <p>The vehicle is in the inspected state and has been tested. For the vehicle no further warranty is provided by the seller after the 5 days inspection period </p>
                <p>
                <b>Warrenties of the seller:</b>
                <br>
                The Seller Warrents that the vehicle is his unrestricted property and is free of third party 
                rights and in time, in which it was his property and, as far as he knew - even earlier - Accident-free
                <br>
                No damage
                <br>
                No import Vechile 
                <br>
                Original engine
                <br><br>

                </p>

            </div>
            <div class="footer">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="50%">
                                <p>DIRECTOR :</p>
                                
                            </td>
                            <td width="50%">
                                <p>BUYER :</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="padding-top: 10px">
                                <p>Aaron Schwartz</p>
                            </td>
                            <td width="50%" style="padding-top: 10px">
                                <p>'.$userfname.' '.$userlname.'</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="50%">
                                <hr class="thin">
                                    <p class="bold">Authorized Signature</p>
                                </td>
                                <td width="50%">
                                    <hr class="thin">
                                        <p class="bold">Authorized Signature</p>
                                    </td>
                                </tr>
                            <tr>
                            <td width="50%">
                                <img src="https://carsloter.eu/img/signature.png" style="height: 65px;" />
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="100%">
                                <hr class="thin">
                                <p class="bold" class="bold">Bill of Sale for a Motor Vehicle</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>    

    </body>
</html>
');

// echo $uship_mpdf->output();
// die();

$bill_pdf = $bill_mpdf->output("","S");
$payment_pdf = $payment_mpdf->output("","S");
$uship_pdf = $uship_mpdf->output("","S");

$mail = new PHPMailer;
$mail->setFrom('invoice@carsloter.eu','CarSloter');
///$mail->addAddress('info@stumania.com', $name);
$mail->addAddress($to , 'CarSloter');
$mail->addCC('invoice@carsloter.eu');
///$mail->addReplyTo('invoice@carsloter.eu', 'CarSloter');
$mail->Subject  = "Purchase contract # ".$invoiceno." Transaction Started - ".$productname;

$title = 'Invoice Transaction Started';
$subjectTitle = 'Purchase contract # '.$invoiceno.' Transaction Started - '.$productname;
$messageHeader = 'Hello '.$userfname.' '.$userlname.',';
$messageContent = 'Thank you for using our services. You can find the invoice attached to this email. Please follow the attachment to read.<br><br>In order to proceed with payment details, you need to scan all documents and sign them and send copies by replying to this email.<br><br>If you have any other questions contact our support department: <b>invoice@carsloter.eu</b>';
$imageUrl = 'https://www.carsloter.eu/img/success_mail.png';

$mail->Body = '
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
        Copyright @ 2020 CarSloter. All rights reserved
      </div>
    </div>
  </body>
</html>
';  


$mail->IsHTML(true); 

$mail->addStringAttachment($uship_pdf,"Purchase Contract # ".$invoiceno." - ".$productname.".pdf");
$mail->addStringAttachment($bill_pdf,"Bill of sale # ".$invoiceno." - ".$productname.".pdf");
$mail->addStringAttachment($payment_pdf,"Payment agreement for # ".$invoiceno." - ".$productname.".pdf");

$mail->send();

echo "<script>window.location.href='manage_bidding.php'</script>";
  

?>