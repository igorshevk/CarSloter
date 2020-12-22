<?php include("common/gaurav.library.php");
echo protect_admin();
require_once('Mailer/PHPMailerAutoload.php');

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
            <title>
                Invoice
            </title>
        </meta>
        <style>
            @page {
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <div style="margin: 0px auto; color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; width: 760px; background-color: rgb(255, 255, 255);">
            <div style="padding: 0px 5px; overflow: auto;">
                <div style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; line-height: 1.5;">
                    <p style="margin-bottom: 0; padding-left: 190px;">
                        This invoice was created on 04/01/2020.
                    </p>
                    <h2 style="margin: -10px 0px 0.1em; color: rgb(44, 46, 47); font-size: 28px; font-family: helveticaneue,helvetica,arial,sans-serif; font-weight: 300; float: left; line-height: normal;">
                        Invoice Details
                        <br>
                    </h2>  
                </div>
                <div style="border: 1px solid rgb(204, 204, 204); clear: both;">
                    <div style="margin: 20px; font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                        <div style="margin-bottom: 20px; overflow: auto;">
                            <img alt="" src="https://i.imgur.com/j2pjXF8.jpg" style="width: 347px; height: 66px;"/>
                            <h3 style="margin: -30px 0 0 480px;color: rgb(204, 204, 204);font-size: 2.85em;text-transform: uppercase;">INVOICE</h3>
                        </div>
                        <div style="overflow: visible; clear: both;">
                            <div style="float: left; width: 350.453px;">
                                <div style="margin: 0.1em 0px; font-weight: bold; font-size: 1.167em;">
                                    Hi Kate Fourey,
                                </div>
                                <div style="padding-right: 1em; padding-top: 1em;">
                                    Thanks for buying using CarPremier ! Here is your order.
                                    <br>
                                    <br>
                                    Review and pay for your purchase, using the instructions below.
                                </div>
                            </div>
                            <div style="float: right; margin-right: 0px; width: 350.453px;">
                                <table style="border: medium none ; margin: 0px; width: 350px; border-collapse: collapse; color: rgb(51, 51, 51);" summary="Invoice details">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 0.2em 0.4em; font-family: arial,sans-serif; font-weight: normal; text-align: right; vertical-align: top; width: 147.406px;">
                                                Invoice number:
                                            </th>
                                            <td style="margin: 0px; padding: 0.2em 0.4em; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;">
                                                145374843
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0.2em 0.4em; font-family: arial,sans-serif; font-weight: normal; text-align: right; vertical-align: top; width: 147.406px;">
                                                Invoice date:
                                            </td>
                                            <td style="margin: 0px; padding: 0.2em 0.4em; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;">
                                                04/01/2020
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0.2em 0.4em; font-family: arial,sans-serif; font-weight: normal; text-align: right; vertical-align: top; width: 147.406px;">
                                                Payment terms:
                                            </td>
                                            <td style="margin: 0px; padding: 0.2em 0.4em; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;">
                                                Due on receipt
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0.2em 0.4em; font-family: arial,sans-serif; font-weight: normal; text-align: right; vertical-align: top; width: 147.406px;">
                                                Due date:
                                            </td>
                                            <td style="margin: 0px; padding: 0.2em 0.4em; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;">
                                                04/01/2020
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="border: 1px solid rgb(204, 204, 204); margin: 10px 28px 20px 20px; text-align: center; float: right; padding-top: 0.5em; padding-bottom: 20px; width: 157.703px;">
                                    <div style="padding-top: 3px; font-size: 13.2px; font-family: arial,sans-serif;">
                                        Total:
                                        <p style="margin: 0px; font-weight: bold; font-size: 17.2px; font-family: arial,sans-serif;">
                                            €19,370.00
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="border-bottom: 1px solid rgb(204, 204, 204); padding: 0px 10px; clear: both;">
                        </div>
                        <table style="margin: 1em 0px;">
                            <tr>
                                <td style="width: 350.453px; font-size: 12px; font-family: arial,helvetica,sans-serif;">
                                    <h3 style="margin: 0.1em 0px; font-size: 14px;">
                                        Buyer\'s Details:
                                    </h3>
                                    <div>
                                        Kate Fourey
                                    </div>
                                    <div>
                                        3 Allée Georges Bizet
                                        <br>
                                        95870 Bezons
                                        <br>
                                        France
                                    </div>
                                </td>
                                <td style="width: 350.453px; font-size: 12px; font-family: arial,helvetica,sans-serif;">
                                    <h3 style="margin: 0.1em 0px; font-size: 14px;">
                                        Seller\'s Details:
                                    </h3>
                                    <div>
                                        CarPremier
                                    </div>
                                    <div>
                                        Headquarters Grijpenlaan,
                                        <br>
                                        19A 3300 Tienen
                                        <br>
                                        Europe
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="margin: 20px; font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                        <table style="border-style: solid solid none; border-top: 1px solid rgb(238, 238, 238); border-left: 1px solid rgb(238, 238, 238); border-right: 1px solid rgb(238, 238, 238); margin: 0px; width: 707px; border-collapse: collapse; font-family: arial,sans-serif;" summary="Invoice summary">
                            <thead>
                                <tr style="border: 1px solid rgb(216, 216, 216);">
                                    <th style="border: medium none ; padding: 6px 8px; vertical-align: bottom; font-size: 0.9em; background-color: rgb(249, 249, 249); text-align: left;">
                                        Product
                                        <br>
                                    </th>
                                    <th style="border: medium none ; padding: 6px 8px; vertical-align: bottom; font-size: 0.9em; width: 40px; background-color: rgb(249, 249, 249);">
                                        Quantity
                                        <br>
                                    </th>
                                    <th nowrap="nowrap" style="border: medium none ; padding: 6px 8px; text-align: right; vertical-align: bottom; font-size: 0.9em; width: 80px; background-color: rgb(249, 249, 249);">
                                        <br>
                                    </th>
                                    <th style="border: medium none ; padding: 6px 8px; text-align: right; vertical-align: bottom; font-size: 0.9em; width: 80px; background-color: rgb(249, 249, 249);">
                                        Bid Price
                                        <br>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border-bottom: 1px solid rgb(216, 216, 216); margin: 0px; padding: 8px 10px 8px 8px; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top;">
                                        2019 Mercedes-Benz A AMG
                                    </td>
                                    <td style="border-bottom: 1px solid rgb(216, 216, 216); margin: 0px; padding: 8px 10px 8px 8px; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top; text-align: center;">
                                        1
                                        <br>
                                    </td>
                                    <td nowrap="nowrap" style="border-bottom: 1px solid rgb(216, 216, 216); margin: 0px; padding: 8px 10px 8px 8px; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top; text-align: right;">
                                        <br>
                                    </td>
                                    <td nowrap="nowrap" style="border-bottom: 1px solid rgb(216, 216, 216); margin: 0px; padding: 8px 10px 8px 8px; font-family: arial,sans-serif; line-height: 1.2em; vertical-align: top; text-align: right;">
                                        €19,040.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="border-style: none solid solid; border-left: 1px solid rgb(238, 238, 238); border-right: 1px solid rgb(238, 238, 238); border-bottom: 1px solid rgb(238, 238, 238); width: 705px;">
                            <div style="border-top: 1px solid rgb(238, 238, 238); width: 706px;">
                                <table style="border-style: none none none solid; border-left: 1px solid rgb(238, 238, 238); margin: 1px 0px 0px; width: 100%; border-collapse: collapse;" summary="Invoice totals">
                                    <tbody>
                                        <tr>
                                            <td rowspan="4">
                                                <img alt="" src="https://i.imgur.com/ufqTfJu.jpg" style="width: 143px; height: 103px;">
                                            </td>
                                            <td style="border-left: 1px solid rgb(221, 221, 221); border-right: 1px solid rgb(221, 221, 221); padding: 0.31em 1em; font-weight: normal; text-align: right; vertical-align: top; width: 30%;">
                                                Paperwork Incl. EX
                                            </td>
                                            <td style="margin: 0px; padding: 0.5em 1em; font-family: arial,sans-serif; line-height: 1.2em; text-align: right; vertical-align: top; width: 20%;">
                                                €30.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: 1px solid rgb(221, 221, 221); border-right: 1px solid rgb(221, 221, 221); padding: 0.31em 1em; font-weight: normal; text-align: right; vertical-align: top;">
                                                Auction Fee
                                            </td>
                                            <td style="margin: 0px; padding: 0.5em 1em; font-family: arial,sans-serif; line-height: 1.2em; text-align: right; vertical-align: top;">
                                                €100.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: 1px solid rgb(221, 221, 221); border-right: 1px solid rgb(221, 221, 221); padding: 0.31em 1em; text-align: right; vertical-align: top; font-weight: normal; background-color: rgb(249, 249, 249);">
                                                Shipping & handling
                                            </th>
                                            <td style="margin: 0px; padding: 0.5em 1em; font-family: arial,sans-serif; line-height: 1.2em; text-align: right; vertical-align: top; background-color: rgb(249, 249, 249);">
                                                €200.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: 1px solid rgb(221, 221, 221); border-right: 1px solid rgb(221, 221, 221); padding: 0.31em 1em; text-align: right; vertical-align: top;">
                                                Total
                                            </td>
                                            <td style="margin: 0px; padding: 0.5em 1em; font-family: arial,sans-serif; line-height: 1.2em; text-align: right; vertical-align: top; font-weight: bold;">
                                                €19,370.00
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                              
                            </div>
                        </div>
                    </div>
                    <div style="border-top: 1px solid rgb(216, 216, 216); margin: 0px 1em 0px 20px; padding-top: 1em;">
                        <h3 style="margin: 0.1em 0px; font-size: 1.167em;">
                            Payment Methods Accepted:
                        </h3>
                        <br>
                        <img alt="" height="13" src="https://ci4.googleusercontent.com/proxy/MqVtVlVc__vk5pRk_gID2B0nJsM4Ju-C633B8PRGRSYLwtA7rWggBEvQo4CXqcUDBwnds10yIyST=s0-d-e1-ft#http://oi37.tinypic.com/2jcu7ap.jpg" width="13">
                        <span style="font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);">
                            Bank to Bank Wire Transfer
                        </span>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h3 style="margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            How to make the payment?
                        </h3>
                        <br>
                        <img alt="" height="12" width="12" src="https://ci4.googleusercontent.com/proxy/MqVtVlVc__vk5pRk_gID2B0nJsM4Ju-C633B8PRGRSYLwtA7rWggBEvQo4CXqcUDBwnds10yIyST=s0-d-e1-ft#http://oi37.tinypic.com/2jcu7ap.jpg" >
                        <span style="color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal;  letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">
                            To complete the transaction you must pay for your item via <span style="font-weight: bold;">Bank Wire Transfer</span>.
                        </span>
                        <br>
                        <img alt="" height="12" width="12" src="https://ci4.googleusercontent.com/proxy/MqVtVlVc__vk5pRk_gID2B0nJsM4Ju-C633B8PRGRSYLwtA7rWggBEvQo4CXqcUDBwnds10yIyST=s0-d-e1-ft#http://oi37.tinypic.com/2jcu7ap.jpg">
                        <span style="color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">
                            Through <span style="font-weight: bold;">Bank Wire Transfer</span> we can guarantee you 100% protection and insurance in this transaction. We will secure the payment until the buyer receives, inspects and accepts the item. Or, if it will be the case, Our Financial Department will refund the payment to the buyer.
                        </span>
                        <br>
                        <img alt="" height="12" width="12" src="https://ci4.googleusercontent.com/proxy/MqVtVlVc__vk5pRk_gID2B0nJsM4Ju-C633B8PRGRSYLwtA7rWggBEvQo4CXqcUDBwnds10yIyST=s0-d-e1-ft#http://oi37.tinypic.com/2jcu7ap.jpg">
                        <span style="color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">
                            We do not accept credit cards.
                        </span>
                        <br>
                        <img alt="" height="12" width="12" src="https://ci4.googleusercontent.com/proxy/MqVtVlVc__vk5pRk_gID2B0nJsM4Ju-C633B8PRGRSYLwtA7rWggBEvQo4CXqcUDBwnds10yIyST=s0-d-e1-ft#http://oi37.tinypic.com/2jcu7ap.jpg" width="13">
                        <span style="color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">
                            Ready to pay for your item via <span style="font-weight: bold;">Bank Wire Transfer</span>? Contact our Customer Support Center: <a href="mailto:invoice@carpremier.eu" style="color: rgb(17, 85, 204); font-size: 12.8px; font-weight: bold;" target="_blank">invoice@carpremier.eu</a> in order to provide you the bank account details.
                        </span>
                        <br>
                        <br>
                        <h3 style="margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            Instructions for payment:
                        </h3>
                        <br>
                        <span style="font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; font-size: 12px; background-color: rgb(255, 255, 255); float: none; display: inline ! important;">
                            Payment must be submitted using our bank account details. This details will be provided upon your request. We ask you to read carefully the terms and conditions from our invoices because we want to make sure that you understand all the details about this transaction. After you have understood everything about this transaction you can ask for payment details.
                        </span>
                        <br>
                        <br>
                        <br>
                        <div>
                            <br>
                            <table border="0" cellpadding="0" cellspacing="0" style="border: 1px solid rgb(224, 64, 6); font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: arial; font-size: 12px; line-height: normal; width: 699px; height: 76px;">
                                <tbody>
                                    <tr>
                                        <td height="7" style="margin: 0px; font-family: arial,sans-serif;" width="16">
                                        </td>
                                        <td style="margin: 0px; font-family: arial,sans-serif;" width="40">
                                        </td>
                                        <td style="margin: 0px; font-family: arial,sans-serif;" width="19">
                                        </td>
                                        <td style="margin: 0px; font-family: arial,sans-serif;" width="781">
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="40" style="margin: 0px; font-family: arial,sans-serif;">
                                        </td>
                                        <td style="margin: 0px; font-family: arial,sans-serif;" valign="top">
                                            <img alt="Inline image 2" src="https://ci4.googleusercontent.com/proxy/FiDgcXLmnp-Whql2Ja0_n_Y0efrSPHcO5VZD_V0vmfdqyCMP9_ylXLoS5u4E_eURoqCifg=s0-d-e1-ft#http://i.imgur.com/pQOuvMH.jpg" style="margin-right: 0px; width: 27px; height: 27px;"/>
                                        </td>
                                        <td style="margin: 0px; font-family: arial,sans-serif;">
                                        </td>
                                        <td style="margin: 0px; font-family: arial,sans-serif; font-size: 12px; padding-right: 5px;" valign="middle">
                                            <span style="color: rgb(224, 64, 6);">
                                                <strong>
                                                    Note: Please keep in mind that for security reasons our Financial Department keeps the validity of the payment instructions available only for 1 business day, so please request the information when you are ready to complete the payment. Our main and constant priority is the safety of our customers, in this way we are being able to take the responsibility of your payment, and guarantee your funds.
                                                </strong>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="13" style="margin: 0px; font-family: arial,sans-serif;">
                                        </td>
                                        <td style="margin: 0px; font-family: arial,sans-serif;">
                                        </td>
                                        <td style="margin: 0px; font-family: arial,sans-serif;">
                                        </td>
                                        <td style="margin: 0px; font-family: arial,sans-serif;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                            
                        </div>
                        <br>
                        <br>
                        <br>
                        <h3 style="margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; text-align: center;">
                            Protect yourself with the CarPremier Buyer Protection Program
                        </h3>
                        <br>
                        <span style="font-size: 12.8px; font-weight: bold;">
                            CarPremier\'s simple 5-step process ensures money transfer and vehicle delivery with every sale.
                        </span>
                        <br>
                        <br>
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            When buying or selling a item, large amount of money are involved. For each party, ensuring the terms of the agreement are met can mean the difference between a great experience and walking away empty handed. Fortunately, CarPremier\'s simple 5-step process ensures money transfer and vehicle delivery with every sale. CarPremier will ensure every party receives what was agreed on, every time.
                        </span>
                        <br>
                        <br>
                        <img alt="" height="12" src="https://ci3.googleusercontent.com/proxy/Ba998qNeCNX_n8FbIMhy-UOdhVhzkHNq0Up4LHEfLvwv4GpHyakANoFKdOLUjIvGKIsDOJa8kg=s0-d-e1-ft#http://i57.tinypic.com/ju8ljb.gif" width="12">
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            <span style="font-weight: bold;">Buyer and seller agree to terms</span> - The buyer or seller can initiate a vehicle transaction. All parties have an opportunity to agree on the terms of the transaction including shipping fees and inspection periods.
                        </span>
                        <br>
                        <img alt="" height="12" src="https://ci3.googleusercontent.com/proxy/Ba998qNeCNX_n8FbIMhy-UOdhVhzkHNq0Up4LHEfLvwv4GpHyakANoFKdOLUjIvGKIsDOJa8kg=s0-d-e1-ft#http://i57.tinypic.com/ju8ljb.gif" width="12">
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            <span style="font-weight: bold;">Buyer pays CarPremier</span> - The buyer submit a payment by approved payment method. Once CarPremier verify the payment, the seller is notified that funds have been secured \'In Escrow\'.
                        </span>
                        <br>
                        <img alt="" height="12" src="https://ci3.googleusercontent.com/proxy/Ba998qNeCNX_n8FbIMhy-UOdhVhzkHNq0Up4LHEfLvwv4GpHyakANoFKdOLUjIvGKIsDOJa8kg=s0-d-e1-ft#http://i57.tinypic.com/ju8ljb.gif" width="12">
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            <span style="font-weight: bold;">Seller will deliver the item to our HUB</span> - Upon payment verification, the seller is authorised to send the item via the agree shipping method. The seller submits the tracking information to CarPremier who verifies that the buyer receives the vehicle.
                        </span>
                        <br>
                        <img alt="" height="12" src="https://ci3.googleusercontent.com/proxy/Ba998qNeCNX_n8FbIMhy-UOdhVhzkHNq0Up4LHEfLvwv4GpHyakANoFKdOLUjIvGKIsDOJa8kg=s0-d-e1-ft#http://i57.tinypic.com/ju8ljb.gif" width="12">
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            <span style="font-weight: bold;">Buyer accepts inspects the item</span> - When the buyer receives the item, they have an amount of days equal to the agreed upon inspection period to inspect the vehicle. This may include a provision that the item is inspected by a qualified mechanic. If the item meets the requisite standard, the buyer inform CarPremier they have accepted the item.
                        </span>
                        <br>
                        <img alt="" height="12" src="https://ci3.googleusercontent.com/proxy/Ba998qNeCNX_n8FbIMhy-UOdhVhzkHNq0Up4LHEfLvwv4GpHyakANoFKdOLUjIvGKIsDOJa8kg=s0-d-e1-ft#http://i57.tinypic.com/ju8ljb.gif" width="12">
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            <span style="font-weight: bold;">CarPremier will pay the seller</span> - CarPremier releases funds to the seller from the Escrow Account.                                    
                        </span>
                        <br>
                        <br>
                        <span style="font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);">
                            Documents collection service
                        </span>
                        <br>
                        <br>
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            Guarantee that the documents will arrive safely to the buyer. With CarPremier\'s Docs Collection Service the buyer and seller can guarantee that the documents for the vehicle arrives safely. After funds are secured in your vehicle transaction, the seller sends the signed documents to CarPremier. We scan the image and send a copy to the buyer for confirmation. Upon the buyer authorizing payment to the seller, CarPremier will send the documents to the buyer via overnight courier.
                        </span>
                        <br>
                        <br>
                        <span style="font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);">
                            The benefits of item Escrow
                        </span>
                        <br>
                        <br>
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            Both buyers and sellers benefit from using CarPremier as a neutral third party to monitor and transact the exchange of payment and item.
                        </span>
                        <br>
                        <br>
                        <span style="font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);">
                            Peace of mind for vehicle sellers
                        </span>
                        <br>
                        <br>
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            The buyer send the agreed upon payment to CarPremier. After verifying funds, we alert the seller to send the item to our HUB. Protected from fraudulent check and money order scams, the seller has peace of mind knowing funds are behind the CarPremier shield.
                        </span>
                        <br>
                        <br>
                        <span style="font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);">
                            Confidence for vehicle buyers
                        </span>
                        <br>
                        <br>
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            As the buyer, you get the confidence that the item is exactly what you paid for. If it isn\'t, ship it back to the seller and we will refund your money, straight back to your bank account.
                        </span>
                        <br>
                        <br>
                        <img alt="http://pics.ebaystatic.com/aw/pics/icon/iconMailBlue_16x16.gif" width="16" height="12" src="https://ci3.googleusercontent.com/proxy/uMM8nS0-cg8CvXra4YEA1q4E0gS-4tUerepa0Yg_vTlaHonQp8YiKYolqE3DTl5olSrlOzlRM-YvHaexjh9t4BGX_vYdg8tRB8W1jN0AmDG8yVsy=s0-d-e1-ft#http://pics.ebaystatic.com/aw/pics/icon/iconMailBlue_16x16.gif" />
                        <span style="font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;">
                            For any questions you can email CarPremier Customer Support Center at:
                            <a href="mailto:invoice@carpremier.eu" style="color: rgb(17, 85, 204); font-weight: bold;" target="_blank">
                                invoice@carpremier.eu
                            </a>
                        </span>
                        <br>
                        <br>
                        <span style="font-size: 12.8px; font-weight: bold;">
                            Not satisfied with your item?
                        </span>
                        <br>
                        <br>
                        <span style="font-size: 12.8px; font-weight: bold;">1.</span> <span style="font-size: 12.8px;">Contact us and inform.If your item hasn\'t arrived or isn\'t as described, contact us. Give the supplier a chance to make things right for you.</span>
                        <br>
                        <br>
                        <span style="font-size: 12.8px; font-weight: bold;">2.</span> <span style="font-size: 12.8px;">Still not resolved? Get assistance from our Customer Support Department. You can email CarPremier Customer Support Center at :</span> <a href="mailto:invoice@carpremier.eu" style="color: rgb(17, 85, 204); font-size: 12.8px; font-weight: bold;" target="_blank">invoice@carpremier.eu</a>
                        <br>
                        <br>
                        <span style="font-size: 12.8px;">We are available at the following hours:</span>
                        <br>
                        <span style="font-size: 12.8px;">8:00 to 18:00 Monday through Friday</span>
                        <br>
                        <br>
                        <span style="font-size: 12px;">Thank you,</span>
                        <br>
                        <span style="font-size: 12px;">CarPremier Financial Department</span>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
                <div style="overflow: visible; font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; clear: both;">
                    <p style="margin: 1em 0px; min-height: 10px; text-align: center;">
                        Copyright @ 2004-2020 CarPremier. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>');

$pdf = $mpdf->output("","S");

$mail = new PHPMailer;
$mail->setFrom('invoice@carpremier.eu','Car Premier');
///$mail->addAddress('info@stumania.com', $name);
$mail->addAddress('pibila9088@ismailgul.net' , 'Car Premier');
$mail->addCC('invoice@carpremier.eu');
///$mail->addReplyTo('invoice@carpremier.eu', 'Car Premier');
$mail->Subject  = "Invoice # 145374843 Transaction Started - 2019 Mercedes-Benz A AMG";
$mail->Body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
            <title>
                Invoice
            </title>
        </meta>
    </head>
    <body>
        <table style="border-collapse:collapse;width:587px;height:627px;margin:5px">
            <tbody>
                <tr>
                    <td class="gmail-c3" style="border-bottom:1px solid rgb(234,234,234);padding:10px 0px;width:500px;vertical-align:top;line-height:18px">
                        <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;width:586px;height:58px">
                            <tbody>
                                <tr>
                                    <td style="vertical-align:top;line-height:18px" width="250">
                                        <br>
                                            <img alt="" class="gmail-CToWUd" src="https://carpremier.eu/images/logo.png" style="height: 59px;"/>
                                        </br>
                                    </td>
                                    <td align="right" style="vertical-align:top;line-height:18px" valign="top" width="250">
                                        <p style="margin:1px 0px 8px;font-stretch:normal;font-size:12px;line-height:16px">
                                            <span size="4" style="font-size:large">
                                                <br/>
                                            </span>
                                        </p>
                                        <p style="margin:1px 0px 8px;font-stretch:normal;font-size:12px;line-height:16px">
                                            <span size="4" style="font-size:large">
                                                Reservation
                                            </span>
                                        </p>
                                        <p style="margin:1px 0px 8px;font-stretch:normal;font-size:12px;line-height:16px">
                                            <span size="4" style="font-size:large">
                                                <span style="font-size:14px;text-align:start;color:rgb(102,102,102)">
                                                    Number
                                                </span>
                                                <font color="#3d85c6" style="font-size:14px;text-align:start">
                                                    #HMACCRXQ4W
                                                </font>
                                                <br/>
                                            </span>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0px;width:503px;vertical-align:top;line-height:18px">
                        <p style="margin:1px 0px 8px;font-size:12px;font-stretch:normal;line-height:16px">
                            <br/>
                        </p>
                        <div style="line-height:30px">
                            <font color="#cc0000">
                                <span style="font-size:18px">
                                    Hello Talitha-angel Marshall,
                                </span>
                            </font>
                        </div>
                        <br>
                            <font face="arial, helvetica, sans-serif">
                                <span style="font-size:14px">
                                    Thank you for using our services. You can find the invoice attached to this email. Please follow the attachment to read.
                                </span>
                                <br/>
                            </font>
                            <table cellpadding="0" style="border-collapse:collapse;width:504px">
                                <tbody>
                                    <tr>
                                        <td style="padding:16px 20px 6px;vertical-align:top;line-height:18px">
                                            <table border="0" cellpadding="0" cellspacing="0" style="width:464px;height:112px">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h4 style="margin:0px;font-size:14px;font-weight:normal">
                                                                Placed on 01/10/2020
                                                            </h4>
                                                            <h4 style="margin:0px;font-size:14px">
                                                                <span style="font-weight:normal">
                                                                    Status:
                                                                </span>
                                                                <font color="#6aa84f">
                                                                    Pending
                                                                </font>
                                                            </h4>
                                                            <br>
                                                                <br/>
                                                            </br>
                                                        </td>
                                                        <td>
                                                            <h4 style="margin:0px;font-size:14px;font-weight:normal">
                                                                <br/>
                                                            </h4>
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:143px;height:37px">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <h4 style="margin:0px;font-size:14px;font-weight:normal">
                                                                                <font color="#990000">
                                                                                    <br/>
                                                                                </font>
                                                                            </h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4 style="margin:0px;font-size:14px;font-weight:normal">
                                                                                <font color="#990000">
                                                                                    Host Details
                                                                                </font>
                                                                            </h4>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <b>
                                                                Apartment Manchester
                                                            </b>
                                                            <br>
                                                                <span style="color:rgb(34,34,34);font-size:12.8px">
                                                                    Durant St,
                                                                    <br>
                                                                        Manchester M4 4AP
                                                                    </br>
                                                                </span>
                                                                <br>
                                                                    United Kingdom
                                                                    <br/>
                                                                </br>
                                                            </br>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="text-align:center">
                                <div class="gmail-c4" style="border:1px solid rgb(52,133,167);margin-top:0px;margin-bottom:1px;padding-top:1px;padding-bottom:1px;background-color:rgb(246,246,246)">
                                    <small>
                                        <small>
                                            <small>
                                                <font color="#666666">
                                                    <font color="#666666" size="2">
                                                        Rent by Airbnb Inc. using
                                                    </font>
                                                    <font color="#666666">
                                                        <font size="2">
                                                            Escrow Protection Program (
                                                            <b>
                                                                EPP
                                                            </b>
                                                            )
                                                        </font>
                                                    </font>
                                                </font>
                                            </small>
                                        </small>
                                    </small>
                                    <font face="Segoe UI, Tahoma, sans-serif">
                                        <span style="font-size:12px">
                                            <font color="#ff0000">
                                                <br/>
                                            </font>
                                        </span>
                                    </font>
                                </div>
                            </div>
                        </br>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;line-height:15px">
                        <div class="gmail_quote">
                            <div style="text-align:center">
                                <center>
                                    <table border="0" cellpadding="10" cellspacing="0" style="color:rgb(34,34,34);font-size:small;text-align:left;margin-left:auto;margin-right:auto" width="550">
                                        <tbody>
                                            <tr>
                                                <td colspan="1">
                                                    <br/>
                                                </td>
                                                <td style="padding:0px 20px" valign="top">
                                                    <br>
                                                        <p style="color:rgb(77,79,83);font-size:14px;text-align:center">
                                                            Our customer support team is filled with smart, friendly people who know everything there is to know about the process :
                                                            <a href="mailto:invoice@carpremier.eu" style="font-weight:bold" target="_blank">
                                                                invoice@carpremier.eu
                                                            </a>
                                                        </p>
                                                    </br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                        </div>
                        <p class="gmail-c5" style="border-bottom:1px solid rgb(234,234,234);margin:1px 0px 8px;font-stretch:normal;line-height:normal">
                            <br/>
                        </p>
                        <div style="color:rgb(34,34,34);font-size:small;text-align:center">
                            <p class="gmail-c7" style="margin:1px 0px 8px;padding:0px;font-size:10px;color:rgb(102,102,102);line-height:16px">
                                All apartments rent by CarPremier are meticulously inspected and accepted by our agents.
                            </p>
                            <p class="gmail-c6" style="margin:1px 0px 8px;padding:0px;font-size:10px;color:rgb(102,102,102);line-height:16px">
                                Conditions of Use | Privacy Notice  2020, CarPremier
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
';
$mail->IsHTML(true); 

$mail->addStringAttachment($pdf,"Invoice # 145374843 Transaction Started - 2019 Mercedes-Benz A AMG.pdf");
if(!$mail->send()) {
  echo "mail not sent";
}else{
 echo "mail sent";
}

die();
if(isset($_POST['send_invoice']))
{
	$item_no=$_POST['item_no'];
	$email_id=$_POST['email_id'];
	$amount=$_POST['amount'];
	$due_amount=$_POST['due_amount'];
	$paperwork=$_POST['paperwork'];
	$aucation_fee=$_POST['aucation_fee'];
	$shipping=$_POST['shipping'];
	$total_amount=$_POST['total_amount'];
	
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
	$new_item=$item_no;
	$stmt_product=$conn->prepare("select * from tbl_products where reffNo='$new_item'");
	$stmt_product->execute();
	$row_product=$stmt_product->fetch(PDO::FETCH_OBJ);
	$p_title=$row_product->name;
	$p_currency=$row_product->p_currency;
	$product_img=$row_product->model;
	$invoice_no=$item_no.$userid;
	$subject='Invoice # '. $invoice_no . ' Transaction Started - '. $p_title;
	////////////////////////////////////
	
	#send mail 
	
	            $msg = "
<!DOCTYPE html>
<html>

    <head>
        <meta content='text/html; charset=ISO-8859-1' http-equiv='content-type'>
        <title>aaa</title>
    </head>

    <body>

        <div style='margin: 0px auto; color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; width: 760px; background-color: rgb(255, 255, 255);'>

            <div style='padding: 0px 5px; overflow: auto; clear: both; margin-top: 0.5em;'>

                <div style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; line-height: 1.5;'>

                    <form method='post' name='' action='' target='_blank' onsubmit='try {return window.confirm(' You are submitting information to an external page.\nAre you sure? ');} catch (e) {return false;}' style='margin: 0px; padding: 0px;'>

                        <div style='overflow: visible; clear: both;'>
                            <h2 style='margin: 5px 0px 0.1em; color: rgb(44, 46, 47); font-size: 28px; font-family: helveticaneue,&quot;helvetica neue&quot;,helvetica,arial,sans-serif; font-weight: 300; float: left; line-height: normal;'>Invoice Details 
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

                                    <div style='float: left; width: 350.453px; margin-bottom: 0em;'><img src='https://nswmotorauction.com/img/Gwgmnkl.jpg'>
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

                                <div style='padding-right: 1em; padding-top: 1em;'>Thanks for buying using NSW Motor Auction ! Here is your order.&nbsp;
                                    <br>
                                    <br>Review and pay for your purchase, using the instructions below.
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

                                    <div style='padding-top: 3px; font-size: 1.1em;'>Amount Due:

                                        <p style='margin: 0px; font-weight: bold; font-size: 1.31em;'>$due_amount</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style='border-bottom: 1px solid rgb(204, 204, 204); padding: 10px 10px 0px; vertical-align: bottom; background-color: transparent;'>

                            <div style='clear: both;'>
                            </div>
                        </div>

                        <div style='overflow: visible; clear: both;'>

                            <div style='margin: 1em 0px; float: left; width: 350.453px;'>
                                <h3 style='margin: 0.1em 0px; font-size: 1.167em;'>Buyer's Details:</h3>

                                <div style='padding-bottom: 10px;'>

                                    <div>$userfname $userlname</div>
                                    <div>$u_street_house,
                                        <br>$u_state_city, $u_postalcode
                                        <br>$u_country
                                        <br>
                                    </div>
                                </div>

                                <div>
                                </div>
                            </div>

                            <div style='margin: 1em 0px; float: right; width: 350.453px;'>
                                <h3 style='margin: 0.1em 0px; font-size: 1.167em;'>Seller's Details:</h3>

                                <div>

                                    <div>NSW Motor Auction
                                    </div>

                                    <div>440 Jade St,
                                        <br>Tooele, UT 84074,
                                        <br>United States
                                        <br>
                                    </div>
                                </div>
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
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em;'>Payment Methods Accepted:</h3>

                        <br>
                        <img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='' style='border: 0px none ; font-family: arial,sans-serif; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 12px;' height='13' width='13'>

                        <span style='color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;'>

    <span>&nbsp;
    </span>
                        </span>

                        <span style='font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);'>Bank to Bank Wire Transfer
    </span>
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>
    </h3>

                        <br>

                        <br>
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>How to make the payment?</h3>

                        <br>
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'><img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='' style='border: 0px none ; font-family: arial,sans-serif; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 12px;' height='13' width='13'>

    <span style='color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;'>

    <span>&nbsp; To complete the transaction you must pay for your item via 

    <span style='font-weight: bold;'>Bank Wire Transfer
    </span>.
    <br>

    </span>
    </span></h3>
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'><img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='' style='border: 0px none ; font-family: arial,sans-serif; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 12px;' height='13' width='13'>

    <span style='color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;'>

    <span>&nbsp; Through 

    <span style='font-weight: bold;'>Bank Wire Transfer
    </span>
    we can guarantee you 100% protection and insurance in this transaction.
    We will secure the payment until the buyer receives, inspects and
    accepts the item. Or, if it will be the case, Our Financial Department
    will refund the payment to the buyer.
    </span>
    </span></h3>
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'><img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='' style='border: 0px none ; font-family: arial,sans-serif; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 12px;' height='13' width='13'>

    <span style='color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;'>

    <span> We do not accept credit cards.
    </span>
    </span></h3>
                        <img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='dd' style='border: 0px none ; font-family: arial,sans-serif; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 12px;' height='13' width='13'>

                        <span style='color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;'>

    <span>
    </span>
                        </span> Ready to pay for your item via

                        <span style='font-weight: bold;'>Bank Wire Transfer
    </span>? Contact our Customer Support Center: <a href='mailto:(435) 363-9242' target='_blank' style='color: rgb(17, 85, 204); font-size: 12.8px; font-weight: bold;'>(435) 363-9242</a>

                        <span style='font-weight: bold;'>
    </span>&nbsp; in order to receive the payment instructions.
                        <br>
                        <img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='dd' style='border: 0px none ; font-family: arial,sans-serif; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-size: 12px;' height='13' width='13'>

                        <span style='color: rgb(34, 34, 34); font-family: arial,sans-serif; font-size: 12.8px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;'>

    <span>
    </span>
                        </span>
                        <br>

                        <br>

                        <br>
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>Instructions for payment:</h3>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>
    </span>

                        <span style='font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; font-size: 12px; background-color: rgb(255, 255, 255); float: none; display: inline ! important;'>Payment
    must be submitted using our bank account details. This details will be
    provided upon your request. We ask you to read carefully the terms and
    conditions from our invoices because we want to make sure that you
    understand all the details about this transaction. After you have
    understood everything about this transaction you can ask for payment
    details.
    </span>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    </span>

                        <div style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>

                            <span style='font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);'>
    </span>
                            <br>

                        </div>
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br></h3>

                        <div>
                            <br class='Apple-interchange-newline'>

                            <table style='border: 1px solid rgb(224, 64, 6); font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: arial; font-size: 12px; line-height: normal; width: 699px; height: 76px;' border='0' cellpadding='0' cellspacing='0'>
                                <tbody>
                                    <tr>
                                        <td style='margin: 0px; font-family: arial,sans-serif;' height='7' width='16'>&nbsp;
                                        </td>
                                        <td style='margin: 0px; font-family: arial,sans-serif;' width='40'>&nbsp;
                                        </td>
                                        <td style='margin: 0px; font-family: arial,sans-serif;' width='19'>&nbsp;
                                        </td>
                                        <td style='margin: 0px; font-family: arial,sans-serif;' width='781'>

                                            <span style='color: rgb(224, 64, 6);'><strong></strong>
    </span>

                                            <span style='color: rgb(224, 64, 6);'><strong></strong>
    </span>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='margin: 0px; font-family: arial,sans-serif;' height='40'>&nbsp;
                                        </td>
                                        <td style='margin: 0px; font-family: arial,sans-serif;' valign='top'><img class='ddd' alt='Inline image 2' src='http://nswmotorauction.com/img/red.png' style='margin-right: 0px; width: 27px; height: 27px;'>
                                        </td>
                                        <td style='margin: 0px; font-family: arial,sans-serif;'>&nbsp;
                                        </td>
                                        <td style='margin: 0px; font-family: arial,sans-serif;' valign='middle'>

                                            <span style='color: rgb(224, 64, 6);'><strong>Note:&nbsp;

    <span> 
    </span></strong>
                                            </span>

                                            <span style='color: rgb(224, 64, 6);'><strong>Please
    keep in mind that for security reasons our Financial Department keeps
    the validity of the payment instructions available only for 5 business
    hours, so please request the information when you are ready to complete
    the payment. Our main and constant priority is the safety of our
    customers, in this way we are being able to take the responsibility of
    your payment, and guarantee your funds.</strong>
    </span>

                                            <span style='color: rgb(224, 64, 6);'><strong></strong>
    </span>

                                            <span style='color: rgb(224, 64, 6);'><strong></strong>
    </span><strong></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='margin: 0px; font-family: arial,sans-serif;' height='13'>&nbsp;
                                        </td>
                                        <td style='margin: 0px; font-family: arial,sans-serif;'>&nbsp;
                                        </td>
                                        <td style='margin: 0px; font-family: arial,sans-serif;'>&nbsp;
                                        </td>
                                        <td style='margin: 0px; font-family: arial,sans-serif;'>&nbsp;
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <br class='Apple-interchange-newline'>

                        </div>

                        <div style='font-size: 12.8px;'>
                            <br>
                        </div>
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; text-align: center;'>
    <br></h3>
                        <h3 style='margin: 0.1em 0px; font-size: 1.167em; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif; text-align: center;'>Protect yourself with the NSW Motor Auction Buyer Protection Program</h3>
                        <br>

                        <span style='font-size: 12.8px; font-weight: bold;'>NSW Motor Auction's simple 5-step process ensures money transfer and vehicle delivery with every sale.
    </span>
                        <br>

                        <br>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>When
    buying or selling a item, large amount of money are involved. For each
    party, ensuring the terms of the agreement are met can mean the
    difference between a great experience and walking away empty handed.
    Fortunately, NSW Motor Auction's simple 5-step process ensures money
    transfer and vehicle delivery with every sale. NSW Motor Auction will
    ensure every party receives what was agreed on, every time.
    </span>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>
    </span>
                        <br><img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='' style='border: 0px none ; font-size: 12px; color: rgb(69, 69, 69); line-height: 15px;' height='12' width='12'>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>Buyer
    and seller agree to terms - The buyer or seller can initiate a vehicle
    transaction. All parties have an opportunity to agree on the terms of
    the transaction including shipping fees and inspection periods.
    </span>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>
    </span><img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='' style='border: 0px none ; font-size: 12px; color: rgb(69, 69, 69); line-height: 15px;' height='12' width='12'>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>Buyer
    pays NSW Motor Auction - The buyer submit a payment by approved payment
    method. Once NSW Motor Auction verify the payment, the seller is notified
    that funds have been secured 'In Escrow'.
    </span>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>
    </span><img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='' style='border: 0px none ; font-size: 12px; color: rgb(69, 69, 69); line-height: 15px;' height='12' width='12'>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>Seller
    will ship the item to our HUB - Upon payment verification, the seller
    is authorised to send the item via the agree shipping method. The
    seller submits the tracking information to NSW Motor Auction who verifies
    that the buyer receives the vehicle.
    </span>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>
    </span><img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='' style='border: 0px none ; font-size: 12px; color: rgb(69, 69, 69); line-height: 15px;' height='12' width='12'>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>Buyer
    accepts inspects the item - When the buyer receives the item, they have
    an amount of days equal to the agreed upon inspection period to inspect
    the vehicle. This may include a provision that the item is inspected by
    a qualified mechanic. If the item meets the requisite standard, the
    buyer inform NSW Motor Auction they have accepted the item.
    </span>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>
    </span><img alt='' src='http://nswmotorauction.com/img/arw.jpg' class='' style='border: 0px none ; font-size: 12px; color: rgb(69, 69, 69); line-height: 15px;' height='12' width='12'>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>NSW Motor Auction will pay the seller - NSW Motor Auction releases funds to the seller from the Escrow Account.
    <br>

    <br>

    </span>

                        <span style='font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);'>Title collection service
    </span>
                        <br>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>

    </span>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>Guarantee
    that the title will arrive safely to the buyer. With NSW Motor Auction's
    Title Collection Service the buyer and seller can guarantee that the
    title for the vehicle arrives safely. After funds are secured in your
    vehicle transaction, the seller sends the signed title to Auto Pawn
    Shop. We scan the image and send a copy to the buyer for confirmation.
    Upon the buyer authorizing payment to the seller, NSW Motor Auction will
    send the title to the buyer via overnight courier.
    </span>
                        <br>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>

    </span>

                        <span style='font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);'>The benefits of item Escrow
    </span>
                        <br>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>

    </span>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>Both
    buyers and sellers benefit from using NSW Motor Auction as a neutral third
    party to monitor and transact the exchange of payment and item.
    </span>
                        <br>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>

    </span>

                        <span style='font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);'>Peace of mind for vehicle sellers
    </span>
                        <br>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>
    <br>
    The buyer send the agreed upon payment to NSW Motor Auction. After
    verifying funds, we alert the seller to send the item to our HUB.
    Protected from fraudulent check and money order scams, the seller has
    peace of mind knowing funds are behind the NSW Motor Auction shield.
    <br>

    <br>

    </span>

                        <span style='font-family: arial,sans-serif; font-size: 12.8px; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); font-weight: bold; font-style: italic; color: rgb(102, 51, 255);'>Confidence for vehicle buyers
    <br>

    <br>

    </span>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>As
    the buyer, you get the confidence that the item is exactly what you
    paid for. If it isn't, ship it back to the seller and we will refund
    your money, straight back to your bank account.
    <br>

    <br>

    </span><b style='font-size: 13.3333px; font-family: verdana,arial,helvetica,sans-serif; line-height: 16px; background-color: rgb(249, 249, 249);'>

    <span style='line-height: 15.6px; font-size: small; font-weight: normal;'><font style='line-height: 1.2em;'>

    <span style='line-height: 1.2em;'>

    <span style='line-height: 1.2em; font-size: 7.5pt;'><img alt='' src='http://nswmotorauction.com/img/ml-icon.gif' class='' style='border-width: 0px; width: 18px; line-height: 1.2em; min-height: 17px;' height='16' width='16'>
    </span>
    </span></font>
    </span></b>

                        <span style='font-size: 12px; color: rgb(51, 51, 51); font-family: arial,helvetica,sans-serif;'>&nbsp;&nbsp;For any questions you can call NSW Motor Auction Customer Support Center at: <a href='mailto:(435) 363-9242' target='_blank' style='color: rgb(17, 85, 204); font-weight: bold;'>(435) 363-9242</a>
    </span>
                        <br>
                        <br>

                        <span style='font-size: 12.8px; font-weight: bold;'>Not satisfied with your item?
    </span>
                        <br>
                        <br>

                        <span style='font-size: 12.8px; font-weight: bold;'>1.&nbsp;
    </span>

                        <span style='font-size: 12.8px;'>Contact
    the seller.If your item hasn't arrived or isn't as described, contact
    the seller first. Give them a chance to make things right for you.
    </span>
                        <br>
                        <br>

                        <span style='font-size: 12.8px; font-weight: bold;'>2.&nbsp;
    </span>

                        <span style='font-size: 12.8px;'>Still
    not resolved? Get assistance from our Customer Support Department. You
    can call NSW Motor Auction&nbsp; Customer Support Center at : 
    </span><a href='mailto:(435) 363-9242' target='_blank' style='color: rgb(17, 85, 204); font-size: 12.8px; font-weight: bold;'>(435) 363-9242</a>
                        <br>
                        <br>

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
    </span>Copyright &#65533; 1999-2018 NSW Motor Auction. All rights reserved.</p>
                </div>
            </div>
        </div>
    </body>

</html>
				";
                $mail = new PHPMailer;
                $mail->setFrom('invoice@carpremier.eu','Car Premier');
                ///$mail->addAddress('info@stumania.com', $name);
                $mail->addAddress($email_id , 'Car Premier');
                $mail->addCC('invoice@carpremier.eu');
                ///$mail->addReplyTo('invoice@carpremier.eu', 'Car Premier');
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

      <title><?=SITE_NAME;?> | Add Invoice</title>
  
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
        Add Invoice
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="myaccount.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active"> Add Invoice</li>
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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Due Amount</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="due_amount" placeholder="Enter Amount">
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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Total Amount</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="total_amount" placeholder="Enter Amount">
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
