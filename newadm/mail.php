<?php
require_once('Mailer/PHPMailerAutoload.php');

            if(isset($_POST['submit']))
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                
                $msg = $message;
                $mail = new PHPMailer;
                $mail->setFrom('info@autospawnshop.com','Auto Pawnshop');
                ///$mail->addAddress('info@stumania.com', $name);
                $mail->addAddress($email , 'Auto Pawnshop');
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
<form method="POST" action="">
Name: <input type="text" name="name">  <br> <br>
email: <input type="email" name="email"> <br> <br>
phone: <input type="text" name="phone"> <br> <br>
subject: <input type="text" name="subject"> <br> <br>
message: <input type="text" name="message"> <br> <br>
<input type="submit" name="submit" value="submit">
</form>
