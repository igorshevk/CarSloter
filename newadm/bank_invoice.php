<?php include("common/gaurav.library.php");
echo protect_admin();
require_once('Mailer/PHPMailerAutoload.php');

require_once __DIR__ . '/vendor/autoload.php';

if(isset($_POST['send_invoice']))
{
    $account_holder=$_POST['account_holder'];
    $iban=$_POST['iban'];
    $swift=$_POST['swift'];
    $bank_name=$_POST['bank_name'];

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
    $stmt_product=$conn->prepare("select * from tbl_products where id='$product_id'");
    $stmt_product->execute();
    $row_product=$stmt_product->fetch(PDO::FETCH_OBJ);
    $productname=$row_product->name;
    $invoiceno=$row_product->reffNo;

    $productInfo = "";
    if($row_product->category == 1)
        $productInfo = number_format($row_product->Mileage)."KM ".$row_product->Fuel_type." ".$row_product->Transmission_type." ".$row_product->Power." ".$row_product->Engine_size;
    else if($row_product->category == 2)
        $productInfo = number_format($row_product->Mileage)."KM";
    else if($row_product->category == 3)
        $productInfo = number_format($row_product->Mileage)."HOURS";

    $id=$row_product->id;
    $getImage=$conn->prepare("select * from productimages WHERE pid='$id'");
    $getImage->execute();
    $rowImg=$getImage->fetch(PDO::FETCH_OBJ);

    $to =$useremail;



    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('
    <!DOCTYPE html>
    <html>
      <head>        
        <style>
            @page { sheet-size: Tabloid-L; }
            @page {
                margin: 0;
            }
            body {
                font-size: 12px;                
            }
            .left-side{
                background-image: url("../images/circle-left.png") !important;
                background-repeat: repeat-y;
                background-position: left;
                background-size: 150px;
                height: 1200px;
            }
            .right-side{
                background-image: url("../images/circle-right.png") !important;
                background-repeat: repeat-y;
                background-position: right;
                background-size: 150px;
                height: 1200px;
            }
            .paper{
                height: 100%;
                margin:0px;
            }
            .content{
                padding: 0px;
            }
            .header{
                padding-top: 80px;
                overflow: hidden;
            }
            .header p{
                color: #4a498a;
                font-size: 13px;
            }
            .cell{
                float: left;
                padding: 2px 4px;
                border-right: 1px solid #808080;
            }
            .cell2{
                float: left;
                padding: 2px 4px;
                border-left: 1px solid #808080;
            }
            .each-block{
                float: left;
                width: 100%;
                border: 2px solid #808080;
                margin-bottom: 10px;
                margin-right: 10px;    
                margin-left: 10px;            
            }
            .each-block-bank {
                float: left;
                width: 100%;
                border-left: 1px solid #808080;
                border-right: 1px solid #808080;
            }
            .cell-top{
                text-align: left;
                padding-bottom: 0px;
                margin-bottom: 0px;
            }
            .cell-top label{
                padding-bottom: 0px;
                margin-bottom: 0px;
                font-size: 13px;
                font-weight: 700 !important;
            }
            .cell label{
                margin: 0px;
            }
            .cell-bottom label{
                font-size: 13px;
            }
            .cell-bottom0{
                text-align: left;
            }
            .cell-bottom{
                text-align: center;
            }

            .each-block .cell:last-child{
                border-right: none;                
            }
            .each-block-header{
                padding: 2px 4px;
                text-align: center;
                background-color: rgb(200,200,200);
                color: white;
                font-weight: bold;
                border-bottom: 1px solid #808080;
            }
            .cell-row{
                overflow: hidden;
                border-bottom: 1px solid #5d7963;
            }
            .cell-row2{
                overflow: hidden;
                border-top: 1px solid #5d7963;
            }

            .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
                float: left;
            }

            .col-xs-1 {
                width: 8.33333333%;
            }

            .col-xs-2 {
                width: 16.66666667%;
            }

            .col-xs-3 {
                width: 25%;
            }

            .col-xs-4 {
                width: 33.33333333%;
            }

            .col-xs-5 {
                width: 41.66666667%;
            }

            .col-xs-7 {
                width: 58.33333333%;
            }

            .col-xs-10 {
                width: 83.33333333%;
            }

            .col-xs-12 {
                width: 100%;
            }

            p {
                margin: 0 0 10px;
            }

        </style>
      </head>
      <body>
        <div style="width: 100%;margin: auto;">
          <div class="col-xs-12 row paper">
            <div class="col-xs-1 left-side"></div>
            <div class="col-xs-10 content">
              <section class="header"  style="width: 99%;">
                <div class="col-xs-3">
                  <div style="margin-top: 20px;">
                    <img src="../images/logo-grey.png" class="img-responsive"  >
                  </div>
                </div>
                <div class="col-xs-3">
                  <p style="font-weight: bold;">CarSloter Company</p>
                  <p style="margin-bottom: 0px;"><b>Radarweg 18</b></p>
                  <p style="margin-bottom: 0px;"><b>1042 AA Amsterdam</b></p>
                  <p><b>Netherlands</b></p>
                </div>
                <div class="col-xs-6" style="padding-right: 20px; text-align: right;">
                  <h1 style="color: #4a498a;font-weight: bold;font-size: 35px; font-family: Helvetica">INVOICE</h1>
                </div>
              </section>
              <section class="first-table">
                <div class="col-xs-7">
                  <div class="each-block">
                    <div class="cell-row">
                      <div class="cell" style="width: 25%;">
                        <div class="cell-top">
                          <label>Date</label>
                        </div>
                        <div class="cell-bottom">
                          <label>'.$date.'</label>
                        </div>
                      </div>
                      <div class="cell" style="width: 45%;">
                        <div class="cell-top">
                          <label>Invoice #</label>
                        </div>
                        <div class="cell-bottom">
                          <label>'.$invoiceno.'</label>
                        </div>
                      </div>
                      <div class="cell" style="width: 24%;border-right: none;">
                        <div class="cell-top">
                          <label>Declared Value</label>
                        </div>
                        <div class="cell-bottom">
                          <label>€'.number_format((float)$total_price, 2, '.', ',').'</label>
                        </div>              
                      </div>                
                    </div>

                  </div>
                  <div class="each-block">
                    <div class="each-block-header">
                      Sender\'s information
                    </div>
                    <div class="cell-row">
                      <div class="cell" style="width: 52%; border-right: none;">
                        <div class="cell-top">
                          <label>Sender\'s name</label>
                        </div>
                        <div class="cell-bottom">
                          <label>CarSloter</label>
                        </div>
                      </div>
                    </div>
                    <div class="cell-row">
                      <div class="cell" style="width: 70%;">
                        <div class="cell-top">
                          <label>Street address</label>
                        </div>
                        <div class="cell-bottom" style="width: 62%;">
                          <label>Radarweg 18</label>
                        </div>
                      </div>
                      <div class="cell" style="width: 25%;border-right: none;">
                        <div class="cell-top">
                          <label>Postal Code</label>
                        </div>
                        <div class="cell-bottom">
                          <label>1042 AA</label>
                        </div>
                      </div>
                    </div>
                    <div class="cell-row">
                      <div class="cell" style="width: 58%; border-right: none;">
                        <div class="cell-top">
                          <label>Town/City - County</label>
                        </div>
                        <div class="cell-bottom">
                          <label>Amsterdam</label>
                        </div>
                      </div>
                    </div>
                    <div class="cell-row">
                      <div class="cell" style="width: 54%; border-right: none;">
                        <div class="cell-top">
                          <label>Country-Phone Number</label>
                        </div>
                        <div class="cell-bottom">
                          <label>Netherlands</label>
                        </div>
                      </div>
                    </div>                              
                    <div style="overflow: hidden;">
                      <div class="cell" style="width: 40%; border-right: none;">
                        <div class="cell-top">
                          <label>Other information</label>
                        </div>
                        <div class="cell-bottom">
                          <label>- - - -</label>
                        </div>
                      </div>
                    </div>                                 
                    <div class="cell-row2" style="width: 90%; height: 30px; float: right;">
                    </div>   
                  </div>            
                </div>
                <div class="col-xs-5">
                  <div style="height: 30px">
                  </div>
                  <div class="each-block">
                    <div class="each-block-header">
                      Payment information
                    </div>
                    <div class="cell-row">
                      <div class="col-xs-5">
                        <div class="custom-control custom-checkbox" style="margin-top: 12px; margin-left: 10px;">
                            <table style="margin-top: 2px;">
                                <tr>
                                    <td><img src="../images/Annotation 2020-04-24 235804.png" style="margin-left: 0.5px;"></td>
                                    <td style="font-size: 13px;padding-left: 4.5px;">Bank Transfer</td>                                    
                                </tr>
                            </table>
                        </div>
                        <div class="custom-control custom-checkbox" style="margin-top: 5px; margin-left: 10px;">
                            <table style="margin-top: 2px;">
                                <tr>
                                    <td><table><tr><td style="width: 15px;height: 14px;border: solid 1px black;"></td></tr></table></td>
                                    <td style="font-size: 13px;padding-left: 5px;">Credit Card</td>                                    
                                </tr>
                            </table>
                        </div>
                        <div class="custom-control custom-checkbox" style="margin-top: 5px; margin-left: 10px;">
                            <table style="margin-top: 2px;">
                                <tr>
                                    <td><table><tr><td style="width: 15px;height: 14px;border: solid 1px black;"></td></tr></table></td>
                                    <td style="font-size: 13px;padding-left: 5px;">Cash</td>                                    
                                </tr>
                            </table>
                        </div>
                      </div>
                      <div class="col-xs-7" style="display: flex; align-items: center;">
                        <div class="cell2" style="padding-left: 50px">
                          <img src="../images/MSR-1105210344.png" width="110" >
                        </div>
                      </div>
                    </div>
                    <div class="each-block-bank">
                    <div class="each-block-header" style="background-color: rgb(200,200,200);">
                      Bank transfer information
                    </div>
                    <div class="cell-row">
                      <div class="cell-bottom" style="text-align: left">

                        <div class="cell-row">
                          <div class="cell" style="width: 37%; ">
                            <div>
                              <label>Account Holder</label>
                            </div>
                          </div>
                          <div class="cell" style="width: 55%;border-right: none;">
                            <div>
                              <label>'.$account_holder.'</label>
                            </div>
                          </div>
                        </div>
                        <div class="cell-row">
                          <div class="cell" style="width: 37%;">
                            <div>
                              <label>IBAN</label>
                            </div>
                          </div>
                          <div class="cell" style="width: 55%;border-right: none;">
                            <div>
                              <label>'.$iban.'</label>
                            </div>
                          </div>
                        </div>
                        <div class="cell-row">
                          <div class="cell" style="width: 37%;">
                            <div>
                              <label>Swift Code/BIC</label>
                            </div>
                          </div>
                          <div class="cell" style="width: 55%;border-right: none;">
                            <div>
                              <label>'.$swift.'</label>
                            </div>
                          </div>
                        </div>
                        <div class="cell-row">
                          <div class="cell" style="width: 37%;">
                            <div>
                              <label>Bank Name</label>
                            </div>
                          </div>
                          <div class="cell" style="width: 55%;border-right: none;">
                            <div>
                              <label>'.$bank_name.'</label>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
                  </div>            
                </div>
              </section>
              <section class="first-table">
                <div class="col-xs-7">
                  <div class="each-block">
                    <div class="each-block-header">
                      <span>Receiver\'s  information</span>
                    </div>
                    <div class="cell-row">
                      <div class="cell" style="width: 65%; border-right: none;">
                        <div class="cell-top">
                          <label>Receiver\'s name</label>
                        </div>
                        <div class="cell-bottom">
                          <label>'.$userfname.' '.$userlname.'</label>
                        </div>
                      </div>
                    </div>
                    <div class="cell-row">
                      <div class="cell" style="width: 70%;">
                        <div class="cell-top">
                          <label>Street address</label>
                        </div>
                        <div class="cell-bottom" style="width: 65%;">
                          <label>'.$row_user->u_street_house.'</label>
                        </div>
                      </div>
                      <div class="cell" style="width: 25%;border-right: none;">
                        <div class="cell-top">
                          <label>Postal Code</label>
                        </div>
                        <div class="cell-bottom">
                          <label>'.$row_user->u_postalcode.'</label>
                        </div>
                      </div>
                    </div>
                    <div class="cell-row">
                      <div class="cell" style="width: 45%; border-right: none;">
                        <div class="cell-top">
                          <label>Town/City - County</label>
                        </div>
                        <div class="cell-bottom">
                          <label>'.$row_user->u_state_city.'</label>
                        </div>
                      </div>
                    </div>
                    <div class="cell-row">
                      <div class="cell" style="width: 70%; border-right: none;">
                        <div class="cell-top">
                          <label>Country-Phone number</label>
                        </div>
                        <div class="cell-bottom">
                          <label>'.$row_user->u_country.' / '.$row_user->u_phone.'</label>
                        </div>
                      </div>
                    </div>                             
                    <div style="overflow: hidden;">
                      <div class="cell" style="width: 40%; border-right: none;">
                        <div class="cell-top">
                          <label>Other information</label>
                        </div>
                        <div class="cell-bottom">
                          <label>- - - -</label>
                        </div>
                      </div>
                    </div>                               
                    <div class="cell-row2" style="width: 90%; height: 30px; float: right;">
                    </div>   
                  </div>            
                </div>
                <div class="col-xs-5">
                  <div class="each-block">
                    <div class="each-block-header">
                      Sender\'s acceptance
                    </div>
                    <div class="cell-row" style="padding: 25px 10px">
                          <label>
                            The undersigned seller affirms that the above information about this vehicle is accurate to the best his/her knowledge.
                          </label>
                    </div>  
                    <div class="cell-row"  style="margin-bottom: 10px">
                      <div class="cell" style="width: 50%;float: left;">
                          <div class="cell-top">
                            <label>Signature</label>
                          </div>
                          <div class="cell-bottom">
                            <img src="../img/signature.png" >
                          </div>
                      </div>
                      <div class="cell" style="width: 45%;border-right: none;float: left;">
                          <div class="cell-top">
                            <label>Date</label>
                          </div>
                          <div class="cell-bottom" style="margin: 15px; margin-left: 25px">
                            <label style="font-size: 13px;">'.$date.'</label>
                          </div>
                      </div>
                    </div>
                    <div class="cell-row">
                      <div class="cell" style="width: 30%;border-right: none;">
                        <div class="cell-top">
                          <label>Notes</label>
                        </div>
                        <div class="cell-bottom">
                          <label style="padding-bottom: 10px">- - - -</label>
                        </div>
                      </div>
                    </div>  
                  </div>     
                </div>
              </section>
              <section class="first-table">
                <div class="col-xs-7">
                    <div class="each-block">
                        <div class="each-block-header">
                          Shipment information
                        </div>
                        <div class="cell-row">
                          <div class="cell" style="width: 100%;background-color: #f6f6f6;line-height: 25px;border-right: none;">
                            <div class="cell2" style="width: 30%; border: none; font-weight: 700; text-align: start;">
                              <span>Product</span>
                            </div>
                            <div class="cell2" style="width: 25%; border: none; font-weight: 700; text-align: center;">
                              <span>VIN</span>
                            </div>
                            <div class="cell2" style="width: 25%; border: none; font-weight: 700; text-align: center;">
                              <span>Quantity</span>
                            </div>
                            <div class="cell2" style="width: 15%; border: none; font-weight: 700; text-align: right;">
                              <span>Bid price</span>
                            </div>
                          </div>
                        </div>
                        <div class="cell-row">
                          <div class="cell" style="width: 100%;line-height: 25px;border-right: none;">
                            <div class="cell2" style="width: 30%; border: none; text-align: start;">
                              <span>'.$productname.'</span>
                            </div>
                            <div class="cell2" style="width: 25%; border: none; text-align: center;">
                              <span>'.$row_product->VIN.'</span>
                            </div>
                            <div class="cell2" style="width: 25%; border: none; text-align: center;">
                              <span>1</span>
                            </div>
                            <div class="cell2" style="width: 15%; border: none; text-align: right;">
                              <span>€'.number_format((float)$bid_price, 2, '.', ',').'</span>
                            </div>
                          </div>
                        </div>
                        <div class="cell-row">
                          <div class="cell2" style="width: 50%;border-left: none;">
                            <div style="padding: 10px;border-bottom: 1px solid #808080;">
                                <div style="float: left; width: 30%;">
                                    <table style="margin-top: 2px;">
                                        <tr>
                                            <td><label class="custom-control-label state p-danger-o" for="customCheck4">No accidents</label></td>
                                            <td><img src="../images/Annotation 2020-04-24 235804.png"></td>
                                        </tr>
                                    </table>                          
                                </div>
                                <div style="float: left; width: 25%;margin-left: 50px;">
                                    <table style="margin-top: 2px;">
                                        <tr>
                                            <td><label class="custom-control-label state p-danger-o" for="customCheck4">No leaks</label></td>
                                            <td><img src="../images/Annotation 2020-04-24 235804.png"></td>
                                        </tr>
                                    </table> 
                                </div>
                                <div style="float: right; width: 20%;">
                                    <table style="margin-top: 2px;">
                                        <tr>
                                            <td><label class="custom-control-label state p-danger-o" for="customCheck4">Isured</label></td>
                                            <td><img src="../images/Annotation 2020-04-24 235804.png"></td>
                                        </tr>
                                    </table> 
                                </div>
                            </div>
                            <div style="padding-top: 5px;padding-left: 10px;">
                                <table>
                                    <tr>
                                        <td><label class="custom-control-label state p-danger-o" for="customCheck4">Inspection PASS</label></td>
                                        <td><img src="../images/Annotation 2020-04-24 235804.png"></td>
                                    </tr>
                                </table> 
                            </div>
                          </div>
                          <div class="cell2" style="width: 25%;border: none;padding: 5px 4px;">
                            <div style="text-align: right;padding-right: 10px;border-left: 1px solid #808080;border-right: 1px solid #808080;line-height: 25px;">
                              <span>Paperwork Incl. EX</span><br/>
                              <span>Auction Fee</span><br/>
                              <span>Delivery & handling</span><br/>
                              <span>VAT</span><br/>
                              <span style="font-weight: 700;">Total</span><br/>
                            </div>
                          </div>
                          <div class="cell2" style="width: 20%;border: none;padding: 5px 9px;">
                            <div style="text-align: right;line-height: 25px;">
                              <span>€120.00</span><br/>
                              <span>€270.00</span><br/>
                              <span>€325.00</span><br/>
                              <span>%21</span><br/>
                              <span style="font-weight: 700;">€'.number_format((float)$total_price, 2, '.', ',').'</span><br/>
                            </div>
                          </div>
                        </div>
                    </div>            
                </div>
                <div class="col-xs-5">
                  <div class="each-block">
                    <div class="each-block-header">
                      Receiver\'s acceptance
                    </div>
                    <div style="padding: 17px 10px">
                          <label>
                            The undersigned purchaser acknowledges receipt of the above vehicle,receipt of which the vendor hereby acknowledges. It is understood the vehicle is sold as seen, tried and approved by purchaser.
                          </label>
                    </div>  
                    <div class="cell-row">
                      <div class="col-xs-4">
                          <div class="cell-bottom">
                            <label>Signature</label>
                          </div>
                      </div>
                      <div class="col-xs-8" style="padding-right: 0">                             
                        <div class="cell-row2">
                          <div class="cell2" style="width: 40%;">
                            <div class="cell-top">
                              <label>Notes</label>
                            </div>
                            <div class="cell-bottom">
                              <label> <br> </label>
                            </div>
                          </div>
                        </div>                              
                        <div class="cell-row2">
                          <div class="cell2">
                            <div class="cell-top">
                              <label>Date</label>
                            </div>
                            <div class="cell-bottom">
                              <label> <br> </label>
                            </div>
                          </div>
                        </div>      
                      </div>
                    </div>
                  </div>     
                </div>
              </section>
            </div>
            <div class="col-xs-1 right-side"></div>
          </div>
        </div>
      </body>
    </html>');
    
    // echo $mpdf->output();
    // die();
    $pdf = $mpdf->output("","S");

    $mail = new PHPMailer;
    $mail->setFrom('invoice@carsloter.eu','CarSloter');
    ///$mail->addAddress('info@stumania.com', $name);
    $mail->addAddress($to , 'CarSloter');
    $mail->addCC('invoice@carsloter.eu');
    ///$mail->addReplyTo('invoice@carsloter.eu', 'CarSloter');
    $mail->Subject  = "Invoice # ".$invoiceno." Account Details - ".$productname;

    $title = 'Account Details';
    $subjectTitle = 'Invoice # '.$invoiceno.' Account Details - '.$productname;
    $messageHeader = 'Hello '.$userfname.' '.$userlname.',';
    $messageContent = 'Thank you for your confirmation. You can find the account attached to this email in <b>PDF format</b>. Please follow the attachment to read the details.';
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

    $mail->addStringAttachment($pdf,"Invoice # ".$invoiceno." Account Details - ".$productname.".pdf");
    $mail->send();

    echo "<script>window.location.href='manage_bidding.php'</script>";
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

      <title><?=SITE_NAME;?> | Send Bank Invoice</title>
  
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
        Send Bank Invoice
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> Send Bank Invoice</li>
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
                  <label for="example-text-input" class="col-sm-2 col-form-label">Account Holder</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="account_holder" placeholder="Enter Account Holder" required="">
                  </div>
                </div>
                
                
                <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">IBAN</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="iban" placeholder="Enter IBAN" required="">
                  </div>
                </div>
                
                
                <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">SWIFT</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="swift" placeholder="Enter SWIFT" required="">
                  </div>
                </div>
                               
                
                <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Bank</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bank_name" placeholder="Enter Bank" required="">
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