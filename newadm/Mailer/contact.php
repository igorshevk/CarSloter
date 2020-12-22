<?php
include "../mycon.php";
require_once('PHPMailerAutoload.php');

$to = "";

if(isset($_GET['id'])){
	$id = $_GET['id'];
        $sql="SELECT * from books where id='$id'";
	$result=mysqli_query($con,$sql);
	if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $title = $row['title'];
            $u = $row['user'];
            if($u>0)
                $to = getmail($u);
            else
                $to = $row['email'];

            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $message=$_POST['message'];

                    $mail = new PHPMailer;
            $mail->setFrom('info@stumania.com', $name);
            $mail->addAddress($to, "Stumania");
            $mail->Subject  = "Mail From Stumania Regarding Your Book ".$title;

                    $mail->Body     = " Name : " .$name."\n Phone : ".$phone."\n Email : " .$email."\n Message : ".$message;
            if($mail->send()) {
                echo "sent";
            } else {
                echo "failed";
            }
        }
}

function getmail($uid){
	global $con;
	$sql="SELECT * FROM `myuser` where id='$uid'";
	$result=mysqli_query($con,$sql);
	if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row['email'];
	}
}

?>